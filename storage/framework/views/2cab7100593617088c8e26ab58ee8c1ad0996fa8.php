
<!DOCTYPE html>

<html>
<head>
	  <!-- Required meta tags -->
    <meta charset="utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Aster Medcity </title>
	<link rel="shortcut icon" href="http://localhost/tist/assets/images/fav.png"/>
<!-- styles-->
<link rel="stylesheet" href="<?php echo e(asset('public/assets/web')); ?>/css/bootstrap.css "/> 
<link rel="stylesheet" href="<?php echo e(asset('public/assets/web')); ?>/css/theme.css "/>  
<link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">  

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet"> 
        <?php echo e($head??''); ?>

 
	<!-- top -->
 
</head>
<body data-bs-spy="scroll" data-bs-target="#navbar-example">


    <!-- Button trigger modal -->

              <?php echo e($slot); ?>


   

     
 
  <!-- footer start-->
         <footer > 
            <div class="container">
                <div class="row d-flex align-items-center">
                    <div class="col-md-4">
                        <svg width="149" height="43" viewBox="0 0 149 43" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <rect width="149" height="43" fill="url(#pattern0)" fill-opacity="0.3"/>
                            <defs>
                            <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                            <use xlink:href="#image0_9_127" transform="translate(-0.00503356) scale(0.00288591 0.01)"/>
                            </pattern>
                            <image id="image0_9_127" width="350" height="100" xlink:href="data:image/png;base64,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"/>
                            </defs>
                            </svg>
                            
                    </div>
                     <div class="col-md-4 foot-text" style="">
                         <!--<a href="https://www.spiderworks.in/" target="_blank" rel="nofollow">Developed By: SpiderWorks</a>-->
                        
                    </div>
                    <div class="col-md-4 foot-text">
                         
                        <a href="https://www.asterhospitals.in/privacy-policy" target="_blank">Privacy Policy</a>
                        <span><svg width="4" height="4" viewBox="0 0 4 4" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="2" cy="2" r="2" fill="#D9D9D9"/>
                            </svg>
                            </span> 
                            <a href="https://www.spiderworks.in/"target="_blank" rel="nofollow">Developed By: SpiderWorks</a>
                    </div>
                </div>
 
               
            </div>
         </footer>
         <!-- footer end-->




 



      
</div>

 

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"  ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"  ></script>
      
 

 
  <?php echo e($footer??''); ?>


<script type="text/javascript"> 
 

  
 $(document).ready(function(){



//   $("#next-step").click(function(){
//     $("#step-first").addClass("hide");
//     $("#step-two").removeClass("hide");
//   });


 


});


 


 
 
</script>
 

  



 

</body>
</html><?php /**PATH /home/asterprivilege/public_html/resources/views/layouts/default.blade.php ENDPATH**/ ?>