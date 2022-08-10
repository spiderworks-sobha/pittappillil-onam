(function() {
    'use strict';

    $('#sidebarCollapse').on('click', function() {
        $('#sidebar').toggleClass('active');
        $('#body').toggleClass('active');
    });

    $(document).on('click', '.webadmin-btn-warning-popup', function(event){
        event.preventDefault();
        var url = $(this).attr('href');
        var redirect_url = $(this).data('redirect-url');
        var message = $(this).data('message');
        if (typeof redirect_url !== typeof undefined && redirect_url !== false)
            var action = 'redirect';

        $.confirm({
                title: 'Warning',
                content: message,
                closeAnimation: 'scale',
                opacity: 0.5,
                buttons: {
                    'ok_button': {
                        text: 'Proceed',
                        btnClass: 'btn-blue',
                        action: function(){
                            var obj = this;
                            obj.buttons.ok_button.setText('Processing..'); // setText for 'hello' button
                            obj.buttons.ok_button.disable();
                            $.get(url).done(function (data) {
                                obj.$$close_button.trigger('click');
                                if (typeof data.error != "undefined") {
                                    var title = "Alert!";
                                    var response_msg = data.error;
                                }
                                else
                                {
                                    var title = "Success!";
                                    var response_msg = data.success;
                                }
                                $.confirm({
                                    title: title,
                                    content: response_msg,
                                    type: 'red',
                                    buttons: {
                                      'ok': function(){
                                        if(action == 'redirect')
                                            window.location.href= redirect_url;
                                        else
                                            dt();
                                      }
                                    },
                                   
                                });
                            });
                            return false;
                        }
                    },
                    close_button: {
                          text: 'Cancel',
                          action: function () {
                        }
                    },
                }
            });
    });
})();

