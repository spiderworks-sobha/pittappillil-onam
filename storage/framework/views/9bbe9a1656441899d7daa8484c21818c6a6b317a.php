<?php if (isset($component)) { $__componentOriginaladf290bccd57f496936d9c59dfb92e6ffd4acdf7 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\DefaultLayout::class, []); ?>
<?php $component->withName('default-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('head', null, []); ?> 
        <style>
label.error {
    color: red;
    font-size: 10px;
    position: absolute; 
    bottom: -18px;
    left:0;
}
.form-check  { 
    position: relative;
}
.form-check label.error { 
    bottom: unset;
    top:23px;
}
 
        </style>
     <?php $__env->endSlot(); ?>
    
    
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog card-modal modal-dialog-centered">
      <div class="modal-content">

        <div class="modal-body success hide" id="step-two">
            <div class="row m-0 d-flex align-items-center">
                <div class="col-md-5 p-0">
                    <div class="success-data-cntr">
                       


                            <div class="wrapper"> 
                                <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52"> 
                                   <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/> 
                                   <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
        </svg>
        </div>
                            

                        <h3>Success!</h3>
                        <p>Congragulations! Your application has been submitted. You will get updates from us soon.</p>
                        <!--<a class="btn"><svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">-->
                        <!--    <path d="M8.56299 9.5797C7.5211 10.6216 4.85289 9.6426 2.60336 7.39307C0.353844 5.14355 -0.62514 2.47534 0.416741 1.43346L1.10274 0.747457C1.57632 0.273873 2.35667 0.286392 2.8457 0.775418L3.90825 1.83797C4.39728 2.327 4.4098 3.10735 3.93622 3.58093L3.78887 3.72828C3.53318 3.98397 3.50816 4.39646 3.74575 4.68437C3.97492 4.96208 4.22198 5.2387 4.48986 5.50658C4.75774 5.77446 5.03436 6.02152 5.31207 6.25069C5.59998 6.48828 6.01247 6.46326 6.26816 6.20757L6.41551 6.06022C6.88909 5.58664 7.66944 5.59916 8.15847 6.08818L9.22102 7.15074C9.71005 7.63977 9.72257 8.42011 9.24898 8.8937L8.56299 9.5797Z" fill="white"/>-->
                        <!--    <path d="M7.79753 3.59892C7.66745 3.28162 7.4736 2.98434 7.21596 2.7267C6.97286 2.4836 6.69448 2.2973 6.39729 2.16777" stroke="white" stroke-width="0.5" stroke-linecap="round"/>-->
                        <!--    <path d="M6.3974 0.353627C7.10891 0.611392 7.7765 1.02549 8.34693 1.59592C8.93168 2.18067 9.35215 2.86751 9.60834 3.59911" stroke="white" stroke-width="0.5" stroke-linecap="round"/>-->
                        <!--    </svg>   Support</a>-->


                    </div>




  </div>
  <div class="col-md-7 p-0">
<div class="success-img-cntr">
    <img src="<?php echo e(asset('public/assets/web')); ?>/img/prev.png" alt="..." class="img-fluid">
    <span class="blur-text">xxx xxx</span>
    <p id="success_name"></p>
</div>

</div>
</div>
            </div>

        
        <div class="modal-body" id="step-first">
            <div class="row m-0 flex-row-reverse">



                <div class="col-md-6 mob-pad0 pe-0 d-flex align-items-center">


                    <div class="btn-cntr" id="btn-cntr-div">

                        <h4>Confirm Details</h4>
                        <span>Make sure the details submitted are correct</span>

                        <a   class="btn btn-secondary" id="next-step" >It is correct</a>
                        <a   class="btn btn-primary" data-bs-dismiss="modal" id="cancel">  Need to edit </a>
                        <label id="oops-error" class="error" style="display:none;"></label>
                      </div>
                      
                      
                      
                       <div  id="otp-cntr" class="btn-cntr hide otp-div">

                        <h4>  Enter OTP </h4>
                        <span> An One-Time password has been sent your mobile number <i id="otp_phone"></i>  </span>

                        <div class="row">
                            <div class="col-7 otp-fild">
                                <form id="otp-form">
                                    <?php echo csrf_field(); ?>
                                  <input type="text" name="otp_number" id="otp_number" class="form-control" placeholder="- - - -  " aria-label="First name" maxlength= "4">

                                </form>
                                <i class="loading"><img src="<?php echo e(asset('public/assets/img/loading.gif')); ?>" width="50" height="30"  /></i>
                              <i class="ri-check-fill pass" id="pass"></i>
                              <i class="ri-close-fill fail" id="fail"></i>
                            </div>
                            <div class="col-5 p-0">
                              <button type="button" class="btn" id="step-two-btn" >Submit  <svg width="10" height="9" viewBox="0 0 10 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10 4.50002C10 4.64841 9.94076 4.78495 9.83306 4.89778L6.25741 8.83969C6.14432 8.95252 6.03123 9 5.90738 9C5.63812 9 5.43349 8.78632 5.43349 8.48947C5.43349 8.35293 5.48196 8.21044 5.56814 8.11542L6.76898 6.7619L8.58912 4.9393L7.28056 5.03432H0.473897C0.193882 5.03432 9.53674e-07 4.80872 9.53674e-07 4.50002C9.53674e-07 4.19132 0.193882 3.97162 0.473897 3.97162H7.28056L8.58374 4.06068L6.76898 2.23813L5.56814 0.890506C5.47655 0.78958 5.43349 0.653036 5.43349 0.510558C5.43349 0.219658 5.63812 0 5.90738 0C6.03123 0 6.1497 0.0534299 6.26817 0.178101L9.83306 4.10226C9.94076 4.22099 10 4.35753 10 4.50002Z" fill="white"/>
                                </svg>
                                 </button>
                            </div>
                          </div>

                          <p>Not received? <a id="resend-otp" style="cursor: pointer;">Resend OTP</a></p>


                      </div>


                </div>
        

                <div class="col-md-6 ps-0 mob-pad0">
                    <div class="data-cntr">
                        <span>Submitted Details</span>
                        <p class="d-flex justify-content-start"><svg width="10" height="12" viewBox="0 0 10 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M8.0882 3.2531C8.0882 4.96637 6.71452 6.34013 5.00004 6.34013C3.28615 6.34013 1.91188 4.96637 1.91188 3.2531C1.91188 1.53984 3.28615 0.166656 5.00004 0.166656C6.71452 0.166656 8.0882 1.53984 8.0882 3.2531ZM5.00004 11.8333C2.46976 11.8333 0.333374 11.4221 0.333374 9.83539C0.333374 8.24812 2.48318 7.85145 5.00004 7.85145C7.53091 7.85145 9.66671 8.2627 9.66671 9.84939C9.66671 11.4367 7.5169 11.8333 5.00004 11.8333Z" fill="#1A0F26" fill-opacity="0.7"/>
                            </svg>
                             <label id="pre_name"></label>
                             </p>
                             
                             
                             
                        <p class="d-flex justify-content-start"><svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M5.76587 6.23619C7.76041 8.23018 8.21289 5.92336 9.48282 7.19241C10.7071 8.41638 11.4108 8.6616 9.85962 10.2124C9.66532 10.3685 8.43081 12.2471 4.0923 7.90983C-0.246739 3.572 1.63079 2.33622 1.78698 2.14197C3.34193 0.586923 3.58293 1.29469 4.80725 2.51866C6.07718 3.78825 3.77133 4.24221 5.76587 6.23619Z" fill="#1A0F26" fill-opacity="0.7"/>
                            </svg>
                             <label id="pre_phone"></label> 

                             &nbsp;&nbsp;&nbsp; 
                             
                             <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_3_206)">
                                <path d="M10.2008 1.74448C9.6506 1.18923 8.99545 0.749034 8.27348 0.44953C7.5515 0.150025 6.77713 -0.00279424 5.9955 -2.40373e-05C2.72025 -2.40373e-05 0.051 2.66848 0.048 5.94448C0.048 6.99373 0.3225 8.01448 0.84075 8.91823L0 12L3.153 11.1735C4.02525 11.6482 5.00245 11.897 5.9955 11.8972H5.9985C9.2745 11.8972 11.943 9.22873 11.946 5.94973C11.9467 5.16826 11.7929 4.39437 11.4932 3.67263C11.1935 2.9509 10.754 2.2956 10.2 1.74448H10.2008ZM5.9955 10.8907C5.10975 10.891 4.24028 10.6527 3.4785 10.2007L3.2985 10.0927L1.428 10.5832L1.9275 8.75848L1.8105 8.57023C1.31536 7.78297 1.05349 6.8715 1.05525 5.94148C1.05525 3.22198 3.273 1.00348 5.9985 1.00348C6.64781 1.00231 7.29092 1.12968 7.89077 1.37824C8.49061 1.62681 9.03532 1.99165 9.4935 2.45173C9.95327 2.91001 10.3178 3.45479 10.5659 4.05465C10.8141 4.6545 10.9411 5.29756 10.9395 5.94673C10.9365 8.67598 8.71875 10.8907 5.9955 10.8907ZM8.70675 7.19023C8.559 7.11598 7.82925 6.75673 7.692 6.70573C7.5555 6.65698 7.45575 6.63148 7.35825 6.77998C7.2585 6.92773 6.9735 7.26448 6.888 7.36123C6.8025 7.46098 6.714 7.47223 6.5655 7.39873C6.41775 7.32373 5.9385 7.16773 5.3715 6.65998C4.929 6.26623 4.63275 5.77873 4.54425 5.63098C4.45875 5.48248 4.536 5.40298 4.61025 5.32873C4.6755 5.26273 4.758 5.15473 4.83225 5.06923C4.90725 4.98373 4.932 4.92073 4.98075 4.82173C5.0295 4.72123 5.00625 4.63573 4.9695 4.56148C4.932 4.48723 4.63575 3.75448 4.5105 3.45898C4.3905 3.16723 4.26825 3.20773 4.17675 3.20398C4.09125 3.19873 3.9915 3.19873 3.89175 3.19873C3.81642 3.2006 3.7423 3.21802 3.67402 3.2499C3.60575 3.28178 3.5448 3.32743 3.495 3.38398C3.3585 3.53248 2.97675 3.89173 2.97675 4.62448C2.97675 5.35723 3.50925 6.06148 3.58425 6.16123C3.65775 6.26098 4.62975 7.76023 6.1215 8.40523C6.474 8.55898 6.7515 8.64973 6.96825 8.71873C7.3245 8.83273 7.64625 8.81548 7.90275 8.77873C8.18775 8.73523 8.781 8.41873 8.90625 8.07148C9.02925 7.72348 9.02925 7.42648 8.99175 7.36423C8.955 7.30123 8.85525 7.26448 8.70675 7.19023Z" fill="#1A0F26" fill-opacity="0.7"/>
                                </g>
                                <defs>
                                <clipPath id="clip0_3_206">
                                <rect width="12" height="12" fill="white"/>
                                </clipPath>
                                </defs>
                                </svg>
                                                             <label id="pre_whatsapp"></label> 
</p>
                        <p class="d-flex justify-content-start"><svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11 7.97009C11 9.36509 9.88 10.4951 8.485 10.5001H8.48H3.525C2.135 10.5001 1 9.37509 1 7.98009V7.97509C1 7.97509 1.003 5.76209 1.007 4.64909C1.0075 4.44009 1.2475 4.32309 1.411 4.45309C2.599 5.39559 4.7235 7.11409 4.75 7.13659C5.105 7.42109 5.555 7.58159 6.015 7.58159C6.475 7.58159 6.925 7.42109 7.28 7.13109C7.3065 7.11359 9.3835 5.44659 10.5895 4.48859C10.7535 4.35809 10.9945 4.47509 10.995 4.68359C11 5.78809 11 7.97009 11 7.97009Z" fill="#1A0F26" fill-opacity="0.7"/>
                            <path d="M10.7381 2.83679C10.3051 2.02079 9.45306 1.49979 8.51506 1.49979H3.52506C2.58706 1.49979 1.73506 2.02079 1.30206 2.83679C1.20506 3.01929 1.25106 3.24679 1.41256 3.37579L5.12506 6.34529C5.38506 6.55529 5.70006 6.65979 6.01506 6.65979C6.01706 6.65979 6.01856 6.65979 6.02006 6.65979C6.02156 6.65979 6.02356 6.65979 6.02506 6.65979C6.34006 6.65979 6.65506 6.55529 6.91506 6.34529L10.6276 3.37579C10.7891 3.24679 10.8351 3.01929 10.7381 2.83679Z" fill="#1A0F26" fill-opacity="0.7"/>
                            </svg>
                                                          <label id="pre_email"></label> 
</p>
                        <p class="d-flex justify-content-start"><svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M1.89587 5.58878C1.89587 3.09719 3.97798 1.08333 6.49649 1.08333C9.0221 1.08333 11.1042 3.09719 11.1042 5.58878C11.1042 6.84433 10.6476 8.00996 9.89602 8.99793C9.06689 10.0877 8.04496 11.0372 6.89467 11.7826C6.6314 11.9548 6.39381 11.9678 6.10487 11.7826C4.94802 11.0372 3.92609 10.0877 3.10406 8.99793C2.35195 8.00996 1.89587 6.84433 1.89587 5.58878ZM4.98025 5.72907C4.98025 6.56375 5.66136 7.22023 6.49649 7.22023C7.33217 7.22023 8.01983 6.56375 8.01983 5.72907C8.01983 4.90088 7.33217 4.21245 6.49649 4.21245C5.66136 4.21245 4.98025 4.90088 4.98025 5.72907Z" fill="#1A0F26" fill-opacity="0.7"/>
                            </svg>
                                                          <label id="pre_locality"></label> 
    

                             &nbsp;&nbsp;&nbsp; 
                             
                             <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.7177 1.29099C10.4676 1.0343 10.0974 0.938669 9.75229 1.03933L1.704 3.37976C1.33985 3.48093 1.08174 3.77134 1.01222 4.14028C0.941186 4.51575 1.18929 4.99239 1.51342 5.19171L4.02995 6.7384C4.28806 6.89695 4.62119 6.85719 4.83478 6.64177L7.71646 3.74215C7.86152 3.59116 8.10162 3.59116 8.24668 3.74215C8.39174 3.88811 8.39174 4.12467 8.24668 4.27567L5.35999 7.17579C5.14591 7.3907 5.10589 7.72541 5.26346 7.98512L6.80108 10.5269C6.98116 10.8289 7.29129 11 7.63142 11C7.67144 11 7.71646 11 7.75648 10.995C8.14664 10.9446 8.45676 10.6779 8.57181 10.3004L10.9578 2.2624C11.0628 1.92014 10.9678 1.54768 10.7177 1.29099Z" fill="#1A0F26" fill-opacity="0.7"/>
                                </svg>
                                                              <label id="pre_pincode"></label> 
</p> 


                    </div>

                </div>
               
           
        </div>
    </div>
      </div>


      
    </div>
  </div>

 
 <div class="aster-header" id="navbar-example">
<div class="container">
<nav class="navbar navbar-expand-lg ">
  <div class="container-fluid p-0">
    <a class="navbar-brand" href="#"><img src="<?php echo e(asset('public/assets/web')); ?>/img/logo.png" alt="..."> </a>
   
    
      <div class="nav-rigt d-flex justify-content-end">
        <span class="me-auto call-cntr d-flex align-items-center mob-dis-none">
            <svg class="me-2" width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="16" cy="16" r="16" fill="#00BC84"/>
                <path d="M20.6004 22.4789C19.1889 23.7817 15.5743 22.5575 12.5268 19.7445C9.47936 16.9315 8.15312 13.5948 9.56456 12.292L10.4939 11.4341C11.1355 10.8419 12.1926 10.8576 12.8551 11.4691L14.2946 12.7978C14.957 13.4093 14.974 14.3852 14.3324 14.9774L14.1328 15.1616C13.7864 15.4814 13.7525 15.9972 14.0744 16.3572C14.3849 16.7045 14.7196 17.0504 15.0825 17.3854C15.4454 17.7204 15.8201 18.0294 16.1963 18.3159C16.5864 18.613 17.1452 18.5818 17.4915 18.262L17.6912 18.0778C18.3327 17.4855 19.3899 17.5012 20.0524 18.1127L21.4918 19.4414C22.1543 20.053 22.1713 21.0288 21.5297 21.621L20.6004 22.4789Z" fill="white"/>
                <path d="M19.1579 14.6882C18.9885 14.2749 18.736 13.8876 18.4003 13.552C18.0837 13.2353 17.721 12.9926 17.3339 12.8239" stroke="white" stroke-width="1.5" stroke-linecap="round"/>
                <path d="M17.334 10.4607C18.2609 10.7964 19.1306 11.3359 19.8737 12.079C20.6354 12.8407 21.1832 13.7355 21.5169 14.6886" stroke="white" stroke-width="1.5" stroke-linecap="round"/>
                </svg>
                <a href="tel:+918111998098">81119 98098 </a>  
                <svg width="3" height="3" viewBox="0 0 3 3" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="1.5" cy="1.5" r="1.5" fill="#00BC84"/>
                    </svg>
                    
                 <a  href="tel:+918111998077">81119 98077</a>
                


        </span>
         <a class="btn" href="#Benefits">Benefits </a>
         </div>
    
  
  </div>
</nav>
</div>
</div>


<section class="banner">
    <div class="container">
        <div class="row d-flex align-items-center flex-row-reverse">
           
            <div class="col-md-5">
                <div class="form-cntr">
                    <h2 >Become a Swasthyam Beneficiary. Enroll Now. </h2>
                    
                     <span class="me-auto call-cntr d-flex align-items-center web-dis-none mob-dis-block">
                        <svg class="me-2" width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="16" cy="16" r="16" fill="#00BC84"/>
                            <path d="M20.6004 22.4789C19.1889 23.7817 15.5743 22.5575 12.5268 19.7445C9.47936 16.9315 8.15312 13.5948 9.56456 12.292L10.4939 11.4341C11.1355 10.8419 12.1926 10.8576 12.8551 11.4691L14.2946 12.7978C14.957 13.4093 14.974 14.3852 14.3324 14.9774L14.1328 15.1616C13.7864 15.4814 13.7525 15.9972 14.0744 16.3572C14.3849 16.7045 14.7196 17.0504 15.0825 17.3854C15.4454 17.7204 15.8201 18.0294 16.1963 18.3159C16.5864 18.613 17.1452 18.5818 17.4915 18.262L17.6912 18.0778C18.3327 17.4855 19.3899 17.5012 20.0524 18.1127L21.4918 19.4414C22.1543 20.053 22.1713 21.0288 21.5297 21.621L20.6004 22.4789Z" fill="white"/>
                            <path d="M19.1579 14.6882C18.9885 14.2749 18.736 13.8876 18.4003 13.552C18.0837 13.2353 17.721 12.9926 17.3339 12.8239" stroke="white" stroke-width="1.5" stroke-linecap="round"/>
                            <path d="M17.334 10.4607C18.2609 10.7964 19.1306 11.3359 19.8737 12.079C20.6354 12.8407 21.1832 13.7355 21.5169 14.6886" stroke="white" stroke-width="1.5" stroke-linecap="round"/>
                            </svg>
                            <a href="tel:+918111998098">81119 98098 </a>  
                            <svg width="3" height="3" viewBox="0 0 3 3" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="1.5" cy="1.5" r="1.5" fill="#00BC84"/>
                                </svg>
                                
                             <a  href="tel:+918111998077">81119 98077</a>
                            
            
            
                    </span>

                    <form id="application-form" role="form"  >
                                <?php echo csrf_field(); ?>

                        <div class=" form-cntr-main">

                            <div class="row g-3">
                            <input type="hidden" name="card_type" value="<?php echo e($card_type_id); ?>">

                        <div class="col-lg-2 col-md-3 col-2 pe-0"> 
                            <select id="salutation" name="salutation"  class="form-select">
                                                <option value="Mr." >Mr.</option>
                                                <option value="Ms.">Ms.</option>
                                                <option value="Mrs.">Mrs.</option>
                                                <option value="Dr.">Dr.</option>
                                <option>...</option>
                              </select>
                        </div>

                        <div class="col-lg-10 col-md-9  col-10 "> 
                            <div class="form-group">
                            <svg  width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M12.2499 5.16458C12.2499 7.24497 10.5819 8.91312 8.5 8.91312C6.41884 8.91312 4.75009 7.24497 4.75009 5.16458C4.75009 3.08418 6.41884 1.41675 8.5 1.41675C10.5819 1.41675 12.2499 3.08418 12.2499 5.16458ZM8.5 15.5834C5.42751 15.5834 2.83333 15.084 2.83333 13.1573C2.83333 11.23 5.44381 10.7483 8.5 10.7483C11.5732 10.7483 14.1667 11.2477 14.1667 13.1743C14.1667 15.1017 11.5562 15.5834 8.5 15.5834Z" fill="#130F26" fill-opacity="0.83"/>
                            </svg> 
                          <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                        </div>
                        </div>


                        <div class="col-lg-6 col-md-12 col-12"> 
                            <div class="form-group phon-number-fld">

                                <div class="input-group  ">
                                 <img src="<?php echo e(asset('public/assets/web')); ?>/img/india.png" alt="..." class="img-fluid">
                                        
                                    <span class="input-group-text" id="basic-addon1">  +91</span>  
                                      <input type="tel" id="phone" name="phone" class="form-control"  placeholder="Phone Number" maxlength= "10">
                                  </div>
                                                           
                           
                        </div>                                  
                        
                     
                        </div>

                        <div class="col-lg-6 col-md-12 col-12"> 
                            <div class="form-group"> 
                                <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_131_65)">
                                    <path d="M14.2546 2.32605C13.521 1.58573 12.6475 0.998793 11.6849 0.599454C10.7222 0.200115 9.68974 -0.00364427 8.64756 4.93305e-05C4.28056 4.93305e-05 0.721564 3.55805 0.717564 7.92605C0.717564 9.32505 1.08356 10.686 1.77456 11.891L0.653564 16L4.85756 14.898C6.02057 15.531 7.32349 15.8627 8.64756 15.863H8.65156C13.0196 15.863 16.5776 12.305 16.5816 7.93305C16.5826 6.89109 16.3774 5.85924 15.9778 4.89693C15.5783 3.93462 14.9923 3.06088 14.2536 2.32605H14.2546ZM8.64756 14.521C7.46656 14.5214 6.30727 14.2036 5.29156 13.601L5.05156 13.457L2.55756 14.111L3.22356 11.6781L3.06756 11.427C2.40737 10.3774 2.05821 9.16208 2.06056 7.92205C2.06056 4.29605 5.01756 1.33805 8.65156 1.33805C9.51731 1.3365 10.3748 1.50632 11.1746 1.83774C11.9744 2.16916 12.7007 2.65561 13.3116 3.26905C13.9246 3.8801 14.4106 4.60647 14.7415 5.40628C15.0724 6.20609 15.2417 7.06349 15.2396 7.92905C15.2356 11.568 12.2786 14.521 8.64756 14.521ZM12.2626 9.58705C12.0656 9.48805 11.0926 9.00905 10.9096 8.94105C10.7276 8.87605 10.5946 8.84205 10.4646 9.04005C10.3316 9.23705 9.95156 9.68605 9.83756 9.81505C9.72356 9.94805 9.60556 9.96305 9.40756 9.86505C9.21056 9.76505 8.57156 9.55705 7.81556 8.88005C7.22556 8.35505 6.83056 7.70505 6.71256 7.50805C6.59856 7.31005 6.70156 7.20405 6.80056 7.10505C6.88756 7.01705 6.99756 6.87305 7.09656 6.75905C7.19656 6.64505 7.22956 6.56105 7.29456 6.42905C7.35956 6.29505 7.32856 6.18105 7.27956 6.08205C7.22956 5.98305 6.83456 5.00605 6.66756 4.61205C6.50756 4.22305 6.34456 4.27705 6.22256 4.27205C6.10856 4.26505 5.97556 4.26505 5.84256 4.26505C5.74213 4.26755 5.64329 4.29078 5.55226 4.33328C5.46123 4.37579 5.37996 4.43665 5.31356 4.51205C5.13156 4.71005 4.62256 5.18905 4.62256 6.16605C4.62256 7.14305 5.33256 8.08205 5.43256 8.21505C5.53056 8.34805 6.82656 10.347 8.81556 11.207C9.28556 11.412 9.65557 11.533 9.94456 11.625C10.4196 11.7771 10.8486 11.754 11.1906 11.705C11.5706 11.647 12.3616 11.225 12.5286 10.762C12.6926 10.298 12.6926 9.90205 12.6426 9.81905C12.5936 9.73505 12.4606 9.68605 12.2626 9.58705Z" fill="#130F26" fill-opacity="0.83"/>
                                    </g>
                                    <defs>
                                    <clipPath id="clip0_131_65">
                                    <rect width="16" height="16" fill="white" transform="translate(0.653564)"/>
                                    </clipPath>
                                    </defs>
                                    </svg>
                                     
                          <input type="tel" id="whatsapp_no" name="whatsapp_no" class="form-control"   placeholder="  Whatsapp" maxlength= "10">
                            </div>
                        </div>

                        <div class="col-md-12"> 
                            <div class="form-group"> 
                                <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15.5833 11.2909C15.5833 13.2672 13.9966 14.868 12.0203 14.8751H12.0133H4.99368C3.02451 14.8751 1.4166 13.2813 1.4166 11.3051V11.298C1.4166 11.298 1.42085 8.16291 1.42651 6.58616C1.42722 6.29008 1.76722 6.12433 1.99885 6.3085C3.68185 7.64371 6.69155 10.0782 6.7291 10.1101C7.23201 10.5132 7.86951 10.7405 8.52118 10.7405C9.17285 10.7405 9.81035 10.5132 10.3133 10.1023C10.3508 10.0775 13.2932 7.71596 15.0017 6.35879C15.2341 6.17391 15.5755 6.33966 15.5762 6.63504C15.5833 8.19975 15.5833 11.2909 15.5833 11.2909" fill="#130F26" fill-opacity="0.83"/>
                                    <path d="M15.2122 4.01884C14.5987 2.86284 13.3917 2.12476 12.0629 2.12476H4.99375C3.66491 2.12476 2.45791 2.86284 1.8445 4.01884C1.70708 4.27738 1.77225 4.59967 2.00104 4.78242L7.26041 8.98921C7.62875 9.28671 8.075 9.43476 8.52125 9.43476C8.52408 9.43476 8.52621 9.43476 8.52833 9.43476C8.53046 9.43476 8.53329 9.43476 8.53541 9.43476C8.98166 9.43476 9.42791 9.28671 9.79625 8.98921L15.0556 4.78242C15.2844 4.59967 15.3496 4.27738 15.2122 4.01884" fill="#130F26" fill-opacity="0.83"/>
                                    </svg>
                                    
                            <input type="email" id="email" name="email"  class="form-control"   placeholder="Email ID">
                          </div>
                          </div>


                        <div class="col-md-6 col-6">  
                            <div class="form-group"> 
                                <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M2.47916 7.30849C2.47916 4.05025 5.20191 1.41675 8.49535 1.41675C11.7981 1.41675 14.5208 4.05025 14.5208 7.30849C14.5208 8.95036 13.9237 10.4747 12.9409 11.7666C11.8567 13.1917 10.5203 14.4334 9.01605 15.408C8.67178 15.6333 8.36107 15.6503 7.98323 15.408C6.47043 14.4334 5.13406 13.1917 4.0591 11.7666C3.07557 10.4747 2.47916 8.95036 2.47916 7.30849ZM6.51258 7.49195C6.51258 8.58346 7.40325 9.44193 8.49535 9.44193C9.58817 9.44193 10.4874 8.58346 10.4874 7.49195C10.4874 6.40894 9.58817 5.50867 8.49535 5.50867C7.40325 5.50867 6.51258 6.40894 6.51258 7.49195Z" fill="#130F26" fill-opacity="0.83"/>
                                    </svg>
                                    
                          <input type="text" id="locality"  name="locality" class="form-control" placeholder="Locality">
                        </div>
                        </div>
                         
                        <div class="col-md-6 col-6"> 
                            <div class="form-group"> 
                                <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15.1834 1.82899C14.8291 1.46534 14.3047 1.32986 13.8157 1.47247L2.41399 4.78808C1.89812 4.9314 1.53247 5.34282 1.43397 5.86547C1.33334 6.3974 1.68482 7.07264 2.14401 7.355L5.70909 9.54615C6.07474 9.77076 6.54669 9.71443 6.84927 9.40925L10.9316 5.30146C11.1371 5.08755 11.4773 5.08755 11.6828 5.30146C11.8883 5.50824 11.8883 5.84337 11.6828 6.05728L7.59332 10.1658C7.29003 10.4702 7.23334 10.9444 7.45656 11.3123L9.63487 14.9132C9.88997 15.341 10.3293 15.5834 10.8112 15.5834C10.8679 15.5834 10.9316 15.5834 10.9883 15.5763C11.5411 15.505 11.9804 15.1271 12.1434 14.5923L15.5235 3.20514C15.6723 2.72028 15.5377 2.19263 15.1834 1.82899" fill="#130F26" fill-opacity="0.83"/>
                                    </svg>
                                    
                          <input type="text" id="pincode" name="pincode" class="form-control" placeholder="Pincode" maxlength= "6">
                        </div>
                        </div>



                        <div class="col-12">
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="check" name="check">
                            <label class="form-check-label" for="gridCheck">
                                I agree to the <b>terms and conditions</b>
                            </label>
                          </div>
                          <span class="shot-dis">
                            By agreeing to the terms & conditions, you are giving permission to Aster DM Healthcare group to send health-related information and promotional contents to you by SMS, WhatsApp, and E-Mail.
                          </span>
                        </div>


                    </div>
                </div>



                        <div class="col-12">
                         

                            <button type="button"  id="application-btn" class="btn btn-primary" >
                                Apply Now  <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M17.0286 9.28977C17.0286 9.48302 16.9435 9.66083 16.7889 9.80776L11.6554 14.9412C11.4931 15.0881 11.3307 15.1499 11.1529 15.1499C10.7663 15.1499 10.4726 14.8717 10.4726 14.4851C10.4726 14.3073 10.5422 14.1217 10.6659 13.998L12.3899 12.2353L15.003 9.86183L13.1243 9.98557H3.35223C2.95022 9.98557 2.67188 9.69178 2.67188 9.28977C2.67188 8.88777 2.95022 8.60166 3.35223 8.60166H13.1243L14.9953 8.71764L12.3899 6.3442L10.6659 4.58924C10.5344 4.45781 10.4726 4.27999 10.4726 4.09445C10.4726 3.71562 10.7663 3.42957 11.1529 3.42957C11.3307 3.42957 11.5008 3.49915 11.6709 3.6615L16.7889 8.77179C16.9435 8.9264 17.0286 9.10421 17.0286 9.28977Z" fill="white"/>
                                    </svg>
                              </button>
                            
                        </div>
                      </form>


                </div>
            </div>

            <div class="col-md-7 text-sm-center">
                <img src="<?php echo e(asset('public/assets/web')); ?>/img/card.png" alt="..." class="img-fluid"> 
            </div>


        </div>

 
</div>

</section>
  




<section class="content-area" id="Benefits">
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <h3>Privileged Member Benefits</h3>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="cnt-pnt d-flex align-items-start">
                    <svg width="16" height="13" viewBox="0 0 16 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15.7846 3.2567C15.7846 3.00558 15.6842 2.75446 15.5033 2.57366L14.1373 1.20759C13.9565 1.02679 13.7054 0.926339 13.4542 0.926339C13.2031 0.926339 12.952 1.02679 12.7712 1.20759L6.18192 7.80692L3.22879 4.84375C3.04799 4.66295 2.79688 4.5625 2.54576 4.5625C2.29464 4.5625 2.04353 4.66295 1.86272 4.84375L0.496652 6.20982C0.315848 6.39062 0.215402 6.64174 0.215402 6.89286C0.215402 7.14397 0.315848 7.39509 0.496652 7.57589L4.13281 11.2121L5.49888 12.5781C5.67969 12.7589 5.9308 12.8594 6.18192 12.8594C6.43304 12.8594 6.68415 12.7589 6.86496 12.5781L8.23103 11.2121L15.5033 3.93973C15.6842 3.75893 15.7846 3.50781 15.7846 3.2567Z" fill="#00BC84"/>
                    </svg>     
                   <p> 20% discount on OPD consultation fees </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="cnt-pnt d-flex align-items-start">
                    <svg width="16" height="13" viewBox="0 0 16 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15.7846 3.2567C15.7846 3.00558 15.6842 2.75446 15.5033 2.57366L14.1373 1.20759C13.9565 1.02679 13.7054 0.926339 13.4542 0.926339C13.2031 0.926339 12.952 1.02679 12.7712 1.20759L6.18192 7.80692L3.22879 4.84375C3.04799 4.66295 2.79688 4.5625 2.54576 4.5625C2.29464 4.5625 2.04353 4.66295 1.86272 4.84375L0.496652 6.20982C0.315848 6.39062 0.215402 6.64174 0.215402 6.89286C0.215402 7.14397 0.315848 7.39509 0.496652 7.57589L4.13281 11.2121L5.49888 12.5781C5.67969 12.7589 5.9308 12.8594 6.18192 12.8594C6.43304 12.8594 6.68415 12.7589 6.86496 12.5781L8.23103 11.2121L15.5033 3.93973C15.6842 3.75893 15.7846 3.50781 15.7846 3.2567Z" fill="#00BC84"/>
                    </svg>     
                    <p> 20% discount on Aster Wellness/ Health Check packages  </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="cnt-pnt d-flex align-items-start">
                    <svg width="16" height="13" viewBox="0 0 16 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15.7846 3.2567C15.7846 3.00558 15.6842 2.75446 15.5033 2.57366L14.1373 1.20759C13.9565 1.02679 13.7054 0.926339 13.4542 0.926339C13.2031 0.926339 12.952 1.02679 12.7712 1.20759L6.18192 7.80692L3.22879 4.84375C3.04799 4.66295 2.79688 4.5625 2.54576 4.5625C2.29464 4.5625 2.04353 4.66295 1.86272 4.84375L0.496652 6.20982C0.315848 6.39062 0.215402 6.64174 0.215402 6.89286C0.215402 7.14397 0.315848 7.39509 0.496652 7.57589L4.13281 11.2121L5.49888 12.5781C5.67969 12.7589 5.9308 12.8594 6.18192 12.8594C6.43304 12.8594 6.68415 12.7589 6.86496 12.5781L8.23103 11.2121L15.5033 3.93973C15.6842 3.75893 15.7846 3.50781 15.7846 3.2567Z" fill="#00BC84"/>
                    </svg>     
                    <p> 10% discount on all in house Lab investigations </p>
                </div>
            </div>


            <div class="col-md-4">
                <div class="cnt-pnt d-flex align-items-start">
                    <svg width="16" height="13" viewBox="0 0 16 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15.7846 3.2567C15.7846 3.00558 15.6842 2.75446 15.5033 2.57366L14.1373 1.20759C13.9565 1.02679 13.7054 0.926339 13.4542 0.926339C13.2031 0.926339 12.952 1.02679 12.7712 1.20759L6.18192 7.80692L3.22879 4.84375C3.04799 4.66295 2.79688 4.5625 2.54576 4.5625C2.29464 4.5625 2.04353 4.66295 1.86272 4.84375L0.496652 6.20982C0.315848 6.39062 0.215402 6.64174 0.215402 6.89286C0.215402 7.14397 0.315848 7.39509 0.496652 7.57589L4.13281 11.2121L5.49888 12.5781C5.67969 12.7589 5.9308 12.8594 6.18192 12.8594C6.43304 12.8594 6.68415 12.7589 6.86496 12.5781L8.23103 11.2121L15.5033 3.93973C15.6842 3.75893 15.7846 3.50781 15.7846 3.2567Z" fill="#00BC84"/>
                    </svg>     
                    <p>  10% discount on Radiology services including CT, MRI, X-ray etc. </p>
                </div>
            </div>



            <div class="col-md-4">
                <div class="cnt-pnt d-flex align-items-start">
                    <svg width="16" height="13" viewBox="0 0 16 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15.7846 3.2567C15.7846 3.00558 15.6842 2.75446 15.5033 2.57366L14.1373 1.20759C13.9565 1.02679 13.7054 0.926339 13.4542 0.926339C13.2031 0.926339 12.952 1.02679 12.7712 1.20759L6.18192 7.80692L3.22879 4.84375C3.04799 4.66295 2.79688 4.5625 2.54576 4.5625C2.29464 4.5625 2.04353 4.66295 1.86272 4.84375L0.496652 6.20982C0.315848 6.39062 0.215402 6.64174 0.215402 6.89286C0.215402 7.14397 0.315848 7.39509 0.496652 7.57589L4.13281 11.2121L5.49888 12.5781C5.67969 12.7589 5.9308 12.8594 6.18192 12.8594C6.43304 12.8594 6.68415 12.7589 6.86496 12.5781L8.23103 11.2121L15.5033 3.93973C15.6842 3.75893 15.7846 3.50781 15.7846 3.2567Z" fill="#00BC84"/>
                    </svg>     
                    <p> 10% discount on In Patient bill (excluding consumables, implants, and medicines)  </p>
                </div>
            </div>
            
        </div>

     


        <div class="row">
            <div class="col-md-12">
                <div class="note">
                    <span>Note</span>
                    <ul>
                        <li> <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="5" cy="5" r="5" fill="#00BC84"/>
                            </svg>
                             These benefits are applicable only for self-pay category and
                            cannot be clubbed with any other schemes/ promotional offers.
                            </li>
                        <li><svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="5" cy="5" r="5" fill="#00BC84"/>
                            </svg>
                             This card/ privileges cannot be transferred.</li> 
                             
                    </ul>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>




        </div>
</section>

         <?php $__env->slot('footer', null, []); ?> 
        <script src="<?php echo e(asset('public/assets/web')); ?>/js/validate.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
         $(document).ready(function() {
        $('#application-form').validate({
                rules: {
                    name: {
                        required: true,
                    },
                    phone: {
                        required: true,
                        minlength: 10,
                        maxlength: 10,
                        digits: true,
                        remote: {
                            url: "<?php echo e(url('phone_check')); ?>",
                            type: 'POST',
                            async: false,
                            data: {
                                _token: function() {
                                    var token = $('input[name="_token"]').attr('value');
                                    return token;
                                },
                                phone: function() {
                                    return $("#phone").val();
                                }
                            }
                        }
                    },
                    whatsapp_no: {
                        required: true,
                        minlength: 10,
                        maxlength: 10,
                        digits: true,

                    },
                    email: {
                        required: true,
                        email: true
                    },
                    dob: {
                        required: true,
                    },
                    pincode: {
                        required: true,
                        minlength: 6,
                        maxlength: 6,
                        digits: true
                    },
                    locality: {
                        required: true,
                    },
                    check: {
                        required: true,
                    },
                },
                messages: {
                    name: {
                        required: "Please enter name",
                    },
                    phone: {
                        required: "Please enter phone number",
                        remote: "This phone number already applied!"
                    },
                    whatsapp_no: {
                        required: "Please enter WhatsApp number",
                    },
                    email: {
                        required: "Please enter email",
                        email: "Please enter a valid email address."
                    },
                    dob: {
                        required: "Please select date of birth",
                    },
                    pincode: {
                        required: "Please enter pin code",
                    },
                    locality: {
                        required: "Please enter the locality",
                    },
                    check: {
                        required: "Please agree to the terms and conditions",
                    },
                }
            }),
            $('#application-btn').on("click", function(e) {
                e.preventDefault();
                var img = "<?php echo e(asset('public/assets')); ?>/img/logo.jpg";
                if ($("#application-form").valid()) {
                    $("#exampleModal").modal('show');
                    $("#pre_name").text($("#salutation").val() + $("#name").val());
                    $("#pre_phone").text($("#phone").val());
                    $("#otp_phone").text('+91'+$("#phone").val());
                    $("#pre_whatsapp").text($("#whatsapp_no").val());
                    $("#pre_email").text($("#email").val());
                    $("#pre_locality").text($("#locality").val());
                    $("#pre_pincode").text($("#pincode").val());
                    $("#step-two-btn").on("click", function(e) {
                        
                        var result = true;
                        if (result == true) {
                            $('#step-two-btn').prop('disabled', true).text('Saving...');
                            var data = $("#application-form").serialize();
                                        var otp_state ="verified";

                            $.ajax({
                                type: 'POST',
                                url: "<?php echo e(url('application/save')); ?>",
                                data: data+"&otp_state="+otp_state,
                                success: function(data) {
                                    if (JSON.stringify(data.success)) {
                                        // Swal.fire('Saved!', '', 'success')
                                        $('#application-btn').prop('disabled', false).val('Save Application');
                                        $("#step-first").addClass("hide");
                                        $("#step-two").removeClass("hide");
                                        $("#success_name").text(data.name);
                                        $('input[type=text]').val('');
                                        $('input[type=tel]').val('');
                                        $('input[type=date]').val('');
                                        $('input[type=email]').val('');
                                        $('input[type=number]').val('');
                                        // setTimeout(function(){
                                        //      location.reload(); 
                                        // }, 2000);
                                         $("#exampleModal").on("hidden.bs.modal", function () {
                                             location.reload(); 
                                          });
                                        // $('textarea').val('');
                                    }
                                    if (JSON.stringify(data.errors)) {
                                        $("#step-two-btn").text('It is correct');
                                        var oops = data.errors;
                                        $("#oops-error").css({
                                            "display": "block"
                                        });
                                        $("#oops-error").text(oops[0]);
                                        // Swal.fire(oops[0], '', 'info')
                                        window.setTimeout(function() {
                                            $("#oops-error").css({
                                                "display": "none"
                                            });
                                        }, 2000);
                                        $("#step-two-btn").bind('click', true);
                                    }
                                },
                                error: function(data) {
                                    swal("NOT SAVED!", "Something blew up.", "error");
                                }
                            });
                        }
                    });
                    $("#cancel").on("click", function(e) {
                        var result = false;
                        if (result == false) {
                            // Swal.fire('Changes are not saved', '', 'info')
                        }
                    });
                }
            });
        $('#otp-form').validate({
                rules: {
                    otp_number: {
                        required: true,
                        minlength: 4,
                        maxlength: 4,
                    },
                },
                messages: {
                    otp_number: {
                        required: "Please enter OTP",
                    },
                }
            }),
            $("#otp_number").on('keyup', function() {
                if ($("#otp-form").valid()) {
                    var data = $("#otp-form").serialize();
                    var otp = $(this).val();
                    if (otp.length == 4) {
                        $('.loading').addClass('active');
                        $.ajax({
                            type: 'post',
                            url: "<?php echo e(url('otp_check')); ?>",
                            data: data,
                            success: function(res) {
                                if (res.faild) {
                                    $('.loading').removeClass('active');
                                    $('.fail').addClass('active');
                                    $('.pass').removeClass('active');
                                      
                                }
                                if (res.success) {
                                    $('.loading').removeClass('active');
                                    $('.pass').addClass('active');
                                    $('.fail').removeClass('active');
                                    $('#step-two-btn').prop('disabled', false).text('Submit ');
                                  
                                }
                            }
                        });
                    }
                    
                }
            });
           
        $("#next-step").click(function() {
            $('#next-step').prop('disabled', true).text('Sending OTP');

            var phone =$("#phone").val();
            
          
             $.ajax({
                            type: 'post',
                            url: "<?php echo e(url('otp_send')); ?>",
                            data: {
                                _token: function() {
                                    var token = $('input[name="_token"]').attr('value');
                                    return token;
                                },
                                phone: phone
                            },
                            success: function(res) {
                                if (res.faild) {
                                  window.alert('someting went wrong');
                                }
                                if (res.success) {
                                     $("#btn-cntr-div").addClass("hide");
                                     $("#otp-cntr").removeClass("hide");
                                     $('#step-two-btn').prop('disabled', true).text('Verify OTP');
                                     $input = $('<input type="hidden" name="otp" class="otp"/>').val(res.otp);

                                     $('#otp-form').append($input);
                                      $_input = $('<input type="hidden" name="application_otp" class="application_otp"/>').val(res.otp);
                                     if($('#application-form').append($_input)){
                                        var _data = $("#application-form").serialize();
                                        var otp_state ="pending";

                                          $.ajax({
                                                        type: 'POST',
                                                        url: "<?php echo e(url('application/save')); ?>",
                                                        data: _data+"&otp_state="+otp_state,
                                                        success: function(res) {
                                                        if (res.faild) {
                                                          window.alert('someting went wrong');
                                                        }
                                                        if (res.success) {
                                                            $input = $('<input type="hidden" name="application_id" class="application_id"/>').val(res.application_id);
                        
                                                             $('#application-form').append($input);
                                                        }
                                                    }
                                                });
                                     }
                                    

                                }
                            }
                        });
                     
                        //  $("#btn-cntr-div").addClass("hide");
                        //              $("#otp-cntr").removeClass("hide");
                        //              $('#step-two-btn').prop('disabled', true).text('Verify OTP');
           
        });
        
        var count = 0;
        
         $("#resend-otp").click(function() {
               
             $('#step-two-btn').prop('disabled', true).text('Resending OTP');
             $('input[class="otp"]').remove();
             $('input[class="application_otp"]').remove();

             var phone =$("#phone").val();
              $.ajax({
                            type: 'post',
                            url: "<?php echo e(url('otp_send')); ?>",
                            data: {
                                _token: function() {
                                    var token = $('input[name="_token"]').attr('value');
                                    return token;
                                },
                                phone: phone
                            },
                            success: function(res) {
                                if (res.faild) {
                                  window.alert('someting went wrong');
                                }
                                if (res.success) {
                                     
                                     $('#step-two-btn').prop('disabled', true).text('Verify OTP');
                                     $input = $('<input type="hidden" name="otp" class="otp"/>').val(res.otp);

                                     $('#otp-form').append($input);
                                     $_input = $('<input type="hidden" name="application_otp" class="application_otp"/>').val(res.otp);

                                     if($('#application-form').append($_input)){
                                        var _data = $("#application-form").serialize();
                                        var otp_state ="pending";

                                          $.ajax({
                                                        type: 'POST',
                                                        url: "<?php echo e(url('application/save')); ?>",
                                                        data: _data+"&otp_state="+otp_state,
                                                        success: function(res) {
                                                        if (res.faild) {
                                                          window.alert('someting went wrong');
                                                        }
                                                        if (res.success) {
                                                            $input = $('<input type="hidden" name="application_id" class="application_id"/>').val(res.application_id);
                        
                                                             $('#application-form').append($input);
                                                        }
                                                    }
                                                });
                                     }
                                }
                            }
                        });
                        count += 1;
                        if(count >= 2) { 
                               $("#resend-otp").text('');
                               $("#resend-otp").bind('click', false);
                          }
            });
        //   $("#step-two-btn").click(function(){
        //     $("#step-first").addClass("hide");
        //     $("#step-two").removeClass("hide");
        //  });
    }); 
        </script>
     <?php $__env->endSlot(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaladf290bccd57f496936d9c59dfb92e6ffd4acdf7)): ?>
<?php $component = $__componentOriginaladf290bccd57f496936d9c59dfb92e6ffd4acdf7; ?>
<?php unset($__componentOriginaladf290bccd57f496936d9c59dfb92e6ffd4acdf7); ?>
<?php endif; ?><?php /**PATH /home/asterprivilege/public_html/resources/views/web/home.blade.php ENDPATH**/ ?>