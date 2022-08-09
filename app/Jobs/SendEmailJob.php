<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Config, Mail;
use App\Models\Setting;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $mail_obj, $mailer;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($mail_obj, $mailer)
    {
        $this->mail_obj = $mail_obj;
        $this->mailer = $mailer;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        $smtp_settings = Setting::where('code', 'smtp-settings')->first();
        $smtp_settings = json_decode($smtp_settings->content);
        $config_data = [];
        $config_data['smtp_host'] = $smtp_settings->host;
        $config_data['smtp_port'] = $smtp_settings->port;
        $config_data['smtp_from_address'] = $smtp_settings->username;
        $config_data['smtp_user'] = $smtp_settings->username;
        $config_data['smtp_password'] = $smtp_settings->password;
        $config_data['smtp_encryption'] = $smtp_settings->smtp_security;
        $config_data['smtp_from_name'] = $smtp_settings->name;

        if ($config_data) {
            $config = array(
                'driver'     => 'smtp',
                'host'       => $config_data['smtp_host'],
                'port'       => $config_data['smtp_port'],
                'from'       => array('address' => $config_data['smtp_from_address'], 'name' => $config_data['smtp_from_name']),
                'encryption' => $config_data['smtp_encryption'],
                'username'   => $config_data['smtp_user'],
                'password'   => $config_data['smtp_password'],
                'sendmail'   => '/usr/sbin/sendmail -bs',
                'pretend'    => false,
            );


            Config::set('mail', $config);

            $mail = Mail::to($this->mail_obj['to']);
            if (!empty($this->mail_obj['cc']))
                $mail->cc($this->mail_obj['cc']);
            if (!empty($this->mail_obj['bcc']))
                $mail->bcc($this->mail_obj['bcc']);
            try {
                $mail->send($this->mailer);
            } catch (\Swift_TransportException $e) {
                //error
            }
        }
    }
}
