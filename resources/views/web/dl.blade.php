<html>
    <head>
        
  
    <title>
        Privilege Card
    </title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css"/>
    <style>
        *{padding:0;margin:0;}

.float{
	position:fixed;
	width:60px;
	height:60px;
	bottom:40px;
	right:40px;
	background-color:#0C9;
	color:#FFF;
	border-radius:50px;
	text-align:center;
	box-shadow: 2px 2px 3px #999;
}

.my-float{
	margin-top:22px;
}
    </style>
  </head>
<body>
    <img src="{{$data->card_path}}" />

<!-- Code begins here -->

<!--<a href="{{$data->card_path}}" class="float" download>-->
<!--<i class="fa fa-download" class="my-float"></i>-->
<!--<span>Save Card</span>-->
<!--</a>-->
</body>
</html>