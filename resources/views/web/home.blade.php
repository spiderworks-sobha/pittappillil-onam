<x-default-layout>
    <x-slot name="head">
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
    </x-slot>
    
    
  <!-- Modal -->

 
 <div class="aster-header" id="navbar-example">
<div class="container">
<nav class="navbar navbar-expand-lg ">
  <div class="container-fluid p-0">
    <a class="navbar-brand" href="#"><img src="{{asset('public/assets/web')}}/img/pittappillil-logo.png" alt="..."> </a>
</nav>
</div>
</div>


<section class="banner">
    <div class="container">
        <div class="row d-flex align-items-center flex-row-reverse justify-content-center">
           
            <div class="col-md-7" id="response-body">
                <div class="form-cntr">
                    <!-- <h2 >Become a Swasthyam Beneficiary. Enroll Now. </h2> -->
                    

                    <form id="InputFrm" role="form"  method="POST" action="{{url('submissions/save')}}">
                                @csrf

                        <div class=" form-cntr-main">

                            <div class="row g-3">



                        <div class="col-lg-12 col-md-12  col-12 "> 
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
                                 <img src="{{asset('public/assets/web')}}/img/india.png" alt="..." class="img-fluid">
                                        
                                    <span class="input-group-text" id="basic-addon1">  +91</span>  
                                      <input type="tel" id="phone_number" name="phone_number" class="form-control"  placeholder="Phone Number" maxlength= "10">
                                  </div>
                                                           
                           
                        </div>                                  
                        
                     
                        </div>

                        <div class="col-lg-6 col-md-12 col-12"> 
                            <div class="form-group"> 
                                                                     
                                <select id="inputState" class="form-select" name="branch">
                                    <option value="">Branch</option>
                                    @foreach($branches as $branch)
                                    <option value="{{$branch->name}}">{{$branch->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                         
                        <div class="col-md-12 col-12"> 
                            <div class="form-group"> 
                                <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15.1834 1.82899C14.8291 1.46534 14.3047 1.32986 13.8157 1.47247L2.41399 4.78808C1.89812 4.9314 1.53247 5.34282 1.43397 5.86547C1.33334 6.3974 1.68482 7.07264 2.14401 7.355L5.70909 9.54615C6.07474 9.77076 6.54669 9.71443 6.84927 9.40925L10.9316 5.30146C11.1371 5.08755 11.4773 5.08755 11.6828 5.30146C11.8883 5.50824 11.8883 5.84337 11.6828 6.05728L7.59332 10.1658C7.29003 10.4702 7.23334 10.9444 7.45656 11.3123L9.63487 14.9132C9.88997 15.341 10.3293 15.5834 10.8112 15.5834C10.8679 15.5834 10.9316 15.5834 10.9883 15.5763C11.5411 15.505 11.9804 15.1271 12.1434 14.5923L15.5235 3.20514C15.6723 2.72028 15.5377 2.19263 15.1834 1.82899" fill="#130F26" fill-opacity="0.83"/>
                                    </svg>
                                    
                          <input type="text" id="invoice" name="invoice" class="form-control" placeholder="Invoice Number" >
                        </div>
                        </div>


                        <div id="errors-holder" style="display:none;" class="alert alert-danger alert-dismissible fade show">
                                            <strong>Error!</strong>
                                            <p id="errors"></p>
                                        </div>


                    </div>
                </div>



                        <div class="col-12">
                         

                            <button type="submit"  id="submit-btn" class="btn btn-primary" >
                                Apply Now  <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M17.0286 9.28977C17.0286 9.48302 16.9435 9.66083 16.7889 9.80776L11.6554 14.9412C11.4931 15.0881 11.3307 15.1499 11.1529 15.1499C10.7663 15.1499 10.4726 14.8717 10.4726 14.4851C10.4726 14.3073 10.5422 14.1217 10.6659 13.998L12.3899 12.2353L15.003 9.86183L13.1243 9.98557H3.35223C2.95022 9.98557 2.67188 9.69178 2.67188 9.28977C2.67188 8.88777 2.95022 8.60166 3.35223 8.60166H13.1243L14.9953 8.71764L12.3899 6.3442L10.6659 4.58924C10.5344 4.45781 10.4726 4.27999 10.4726 4.09445C10.4726 3.71562 10.7663 3.42957 11.1529 3.42957C11.3307 3.42957 11.5008 3.49915 11.6709 3.6615L16.7889 8.77179C16.9435 8.9264 17.0286 9.10421 17.0286 9.28977Z" fill="white"/>
                                    </svg>
                              </button>
                            
                        </div>
                      </form>



                      <div class="loader-animation">

                      <div class="gift-animation">
                        <div class="giftbox">
                            <div class="giftbox__top">
                            <svg width="120" height="55" viewBox="0 0 120 55"     fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M89.2501 3.47471C84.7628 -0.941748 77.654 -1.10707 73.3792 3.09683C70.4034 6.00177 62.8223 16.913 59.9882 24.7776C57.1541 16.913 49.5729 6.00177 46.5971 3.09683C42.3224 -1.10707 35.2135 -0.941748 30.7262 3.47471C26.2389 7.89116 26.05 14.8819 30.3247 19.0858C34.5522 23.2189 55.0994 36.4682 59.9882 32.595C64.877 36.4682 85.4241 23.2189 89.6516 19.0858C93.9264 14.8819 93.7374 7.89116 89.2501 3.47471ZM35.8748 13.6302C34.6703 12.4493 34.8356 10.3238 36.2763 8.93032C37.3155 7.91478 38.4491 7.74945 39.0395 7.74945C39.6064 7.74945 40.4093 7.89116 41.0706 8.52883C43.4088 10.8433 47.9197 17.6215 50.7301 23.1244C45.1564 20.3611 38.2365 15.9447 35.8748 13.6302ZM84.1015 13.6302C81.7634 15.9447 74.8435 20.3611 69.2462 23.1244C72.0803 17.6451 76.5676 10.8433 78.9057 8.52883C79.567 7.89116 80.37 7.74945 80.9368 7.74945C81.5272 7.74945 82.6609 7.89116 83.7 8.93032C85.1171 10.3238 85.306 12.4493 84.1015 13.6302Z" fill="#E078AF"/>
                        <path d="M114.969 27.9896H5.00689C2.24365 27.9896 0 30.2332 0 32.9965V46.0805C0 48.8437 2.24365 51.0874 5.00689 51.0874H114.993C117.756 51.0874 120 48.8437 120 46.0805V32.9965C119.976 30.2332 117.733 27.9896 114.969 27.9896Z" fill="#F8B64C"/>
                        <path opacity="0.2" d="M111.994 51.111H7.98267V54.441H111.994V51.111Z" fill="#C47920"/>
                        <path d="M72.0331 27.9067H47.9434V51.0517H72.0331V27.9067Z" fill="#EF87BE"/>
                        </svg>
                            </div>

                            <div class="giftbox__middle">
                            <svg width="59" height="35" viewBox="0 0 59 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M57.0968 0H13.3226V0.951605C13.3226 1.47765 12.8969 1.90321 12.371 1.90321C11.8449 1.90321 11.4194 1.47753 11.4194 0.951605V0H1.90321C0.852158 0 0 0.852043 0 1.90321V10.2804C0 10.7601 0.235885 11.216 0.643814 11.4684C2.54046 12.6414 3.80642 14.7349 3.80642 17.129C3.80642 19.523 2.54046 21.6166 0.643814 22.7897C0.235885 23.042 0 23.498 0 23.9776V32.3548C0 33.4059 0.852158 34.258 1.90321 34.258H11.4194V33.3064C11.4194 32.7804 11.8451 32.3548 12.371 32.3548C12.897 32.3548 13.3226 32.7805 13.3226 33.3064V34.258H57.0968C58.1478 34.258 59 33.4059 59 32.3548V1.90321C59 0.852043 58.1478 0 57.0968 0ZM13.3226 29.5C13.3226 30.026 12.8969 30.4516 12.371 30.4516C11.8449 30.4516 11.4194 30.0259 11.4194 29.5V27.5968C11.4194 27.0707 11.8451 26.6452 12.371 26.6452C12.897 26.6452 13.3226 27.0709 13.3226 27.5968V29.5ZM13.3226 23.7903C13.3226 24.3163 12.8969 24.7419 12.371 24.7419C11.8449 24.7419 11.4194 24.3162 11.4194 23.7903V21.887C11.4194 21.361 11.8451 20.9354 12.371 20.9354C12.897 20.9354 13.3226 21.3611 13.3226 21.887V23.7903ZM13.3226 18.0806C13.3226 18.6067 12.8969 19.0322 12.371 19.0322C11.8449 19.0322 11.4194 18.6065 11.4194 18.0806V16.1774C11.4194 15.6514 11.8451 15.2258 12.371 15.2258C12.897 15.2258 13.3226 15.6515 13.3226 16.1774V18.0806ZM13.3226 12.371C13.3226 12.897 12.8969 13.3226 12.371 13.3226C11.8449 13.3226 11.4194 12.8969 11.4194 12.371V10.4678C11.4194 9.94173 11.8451 9.51617 12.371 9.51617C12.897 9.51617 13.3226 9.94185 13.3226 10.4678V12.371ZM13.3226 6.66124C13.3226 7.18728 12.8969 7.61284 12.371 7.61284C11.8449 7.61284 11.4194 7.18717 11.4194 6.66124V4.75803C11.4194 4.23198 11.8451 3.80642 12.371 3.80642C12.897 3.80642 13.3226 4.2321 13.3226 4.75803V6.66124Z" fill="#CF689F"/>
                        <path d="M56.1303 32.4106H16.1625C15.637 32.4106 15.2109 31.9846 15.2109 31.459V2.91059C15.2109 2.38501 15.637 1.95898 16.1625 1.95898H56.1303C56.6559 1.95898 57.0819 2.38501 57.0819 2.91059V31.459C57.0819 31.9846 56.6559 32.4106 56.1303 32.4106Z" fill="#EF88BF"/>
                        <path d="M35.9633 25.6906C36.0412 25.7299 36.1191 25.7299 36.197 25.7299C36.2749 25.7299 36.3527 25.7299 36.4306 25.6906C36.4423 25.6828 36.4748 25.6632 36.5261 25.6324C36.9902 25.3537 38.9921 24.1515 41.0256 22.3124C42.3496 21.0947 43.44 19.8377 44.1799 18.62C45.1923 17.0488 45.6596 15.4775 45.6596 13.9455C45.6596 10.9994 43.3231 8.64258 40.4415 8.64258C39.468 8.64258 38.4166 9.03539 37.521 9.70317C36.9758 10.096 36.5474 10.5674 36.197 11.0387C35.8854 10.5674 35.4182 10.096 34.873 9.70317C33.9774 9.03539 32.926 8.64258 31.9525 8.64258C29.0708 8.64258 26.7344 10.9994 26.7344 13.9455C26.7344 15.4775 27.2406 17.0488 28.2141 18.62C28.9929 19.8377 30.0444 21.0947 31.3683 22.3124C33.2242 23.9909 35.0802 25.1389 35.7261 25.5385C35.8663 25.6252 35.9494 25.6766 35.9633 25.6906Z" fill="white"/>
                        </svg>
                            </div>

                            <div class="giftbox__bottom">
                            <svg width="106" height="70" viewBox="0 0 106 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0.982666 0.110992V64.0197C0.982666 66.7829 3.22632 69.0266 5.98955 69.0266H100.01C102.774 69.0266 105.017 66.7829 105.017 64.0197V0.110992H0.982666V0.110992Z" fill="#FFD15C"/>
                        <path d="M65.0331 0.051712H40.9434V69.0145H65.0331V0.051712Z" fill="#EF87BE"/>
                        </svg>
                            </div>
                        </div>

                        <div class="gift-animation__text">
                        All done! You can now redeem your gift.</div>
                        
                        <!--<div class="gift-animation__text">Tudo certo! Você já pode resgatar seu mimo.</div>-->
                        </div>

                    </div>


                      <div class="form-cntr pageload">
    <div class="form-cntr-main text-center ">

       

        <h3 class="green-text">Congratulations!</h3>
        <div class="presents">
            <div class="present orange">
            <div class="lid"></div>
            <div class="box"></div>
            <div class="bow"></div>
            <div class="ribbon"></div>
            </div>
            <div class="present blue">
            <div class="lid"></div>
            <div class="box"></div>
            <div class="bow"></div>
            <div class="ribbon"></div>
            </div>
            <div class="present green">
            <div class="lid"></div>
            <div class="box"></div>
            <div class="bow"></div>
            <div class="ribbon"> </div>
            </div>
        </div>
        <p>You have received a <span></span></p>
    </div>
</div>

                </div>
                
            </div>

        </div>

 
</div>



</section>
  


        <x-slot name="footer">
        <script src="{{asset('public/assets/web')}}/js/validate.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
         $(document).ready(function() {
        $('#InputFrm').validate({
                rules: {
                    name: {
                        required: true,
                    },
                    phone_number: {
                        required: true,
                        minlength: 10,
                        maxlength: 10,
                        digits: true,
                    },
                    branch: {
                        required: true,
                    },
                    invoice: {
                        required: true,
                        remote: {
                            url: "{{ url('check-invoice') }}",
                            type: 'POST',
                            async: false,
                            data: {
                                _token: function() {
                                    var token = "{{csrf_token()}}";
                                    return token;
                                },
                                invoice: function() {
                                    return $("#invoice").val();
                                }
                            }
                        }
                    }
                },
                messages: {
                    name: {
                        required: "Please enter name",
                    },
                    phone_number: {
                        required: "Please enter phone number",
                    },
                    branch: {
                        required: "Please select a branch",
                    },
                    invoice: {
                        required: "Please enter invoice number",
                        remote: "This invoice is already claimed"
                    }
                },
                submitHandler:function(form)
                {
                    var submit_btn_text = $('#submit-btn').html();
                    $('#submit-btn').prop('disabled', true).html('Processing...');
                    var formurl = $('#InputFrm').attr('action');
                        $.ajax({
                            url: formurl ,
                            type: "POST", 
                            data: new FormData($('#InputFrm')[0]),
                            cache: false, 
                            processData: false,
                            contentType: false, 
                            success: function(data) {
                                $('#submit-btn').prop('disabled', false).html(submit_btn_text);
                                if (typeof data.errors != "undefined") {
                                    var errors = JSON.parse(JSON.stringify(data.errors))
                                    display_error(errors);
                                }
                                else
                                {
                                    $('#response-body').html(data);
                                }
                            },
                            error:function(xhr){
                                $('#submit-btn').prop('disabled', false).html(submit_btn_text);
                                var errors = $.parseJSON(xhr.responseText);
                                display_error(errors);
                            }
                        });
                }
            })
    });
    var display_error = function(errors){
            var html = "<ul>";
            $.each(errors, function (key, val) {
                html +='<li>'+val+'</li>';
            });
            html += '</ul>';
            $('#errors').html(html);
            $('#errors-holder').show();
        } 
        </script>



<script>
    $(window).ready(function(){
    setInterval(function(){ 
        $('.pageload').addClass("active")
    }, 4000);

    });


    $(window).ready(function(){
    setInterval(function(){ 
        $('.loader-animation').addClass("remove")
    }, 4000);

    });

</script>


    </x-slot>
</x-default-layout>