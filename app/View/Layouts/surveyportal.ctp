<!DOCTYPE html>
<html>
<head>

<title>Planit Survey Questionnare</title>

<!--<?php echo $this->Html->script('//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js');?>-->

<script type="text/javascript">

var formSubmitting = false;
var setFormSubmitting = function() { formSubmitting = true; };

window.onload = function() {
    if (window.addEventListener) {
	    window.addEventListener("beforeunload", function (e) {
	        var confirmationMessage = 'It looks like you have been editing something. ';
	        confirmationMessage += 'If you leave before saving, your changes will be lost.';
	        if ((formSubmitting) || (typeof document.Answer == 'undefined')){
	            return undefined;
	        }

	        (e || window.event).returnValue = confirmationMessage; //Gecko + IE
	        return confirmationMessage; //Gecko + Webkit, Safari, Chrome etc.
	    });
	    //handle ie8 and lower
	} else if (window.attachEvent) {
		window.attachEvent("onbeforeunload", function (e) {
	        var confirmationMessage = 'It looks like you have been editing something. ';
	        confirmationMessage += 'If you leave before saving, your changes will be lost.';
	        if ((formSubmitting) || (typeof document.Answer == 'undefined')){
	            return undefined;
	        }

	        (e || window.event).returnValue = confirmationMessage; //Gecko + IE
	        return confirmationMessage; //Gecko + Webkit, Safari, Chrome etc.
		});
	}
}

</script>

<style>
html, body {
	text-align: center;
	background-color: #DEE4E4;
	margin: 0;
    padding: 0;
    height: 100%;
    font-family: ProximaNova-Regular, Helvetica, sans-serif;
    
}
#header {
	width: 900px;
	margin: 0 auto;
	text-align: left;
	background-color: white;
	border-bottom-right-radius: 15px;
	border-bottom-left-radius: 15px;
	border-bottom: 2px solid #DEE4E4;	
	padding: 2px 0px 0px 4px;
	height: 16%;
	min-height: 100px;
	max-height: 100px;
	position: relative;
}

#container {
	width: 900px;
	margin: 0 auto;
	text-align: left;
	background-color: white;
	border-radius: 15px;
	border-radius: 15px;
	border-top: 2px solid #DEE4E4;
	border-bottom: 2px solid #DEE4E4;
	min-height: 70%;
	
}

#footer {
	width: 900px;
	margin: 0 auto;
	text-align: right;
	background-color: white;
	border-top-right-radius: 15px;
	border-top-left-radius: 15px;
	border-top: 2px solid #DEE4E4;
	padding: 4px 4px 0px 0px;
	height: 13%;	
	position: relative;
}

#header img {
	width: 13%; 
  	height: auto;
  	position: absolute;
  	bottom: 6px;
  	left: 11px;
}

#header .headertext {
	font-family: ProximaNova-Regular, Helvetica, sans-serif;
	font-weight: bold;
	font-size: 22px;
	padding-left: 170px; 
	padding-top: 3px;
	color: #4747D1; 
}

#header .headersubtext {
	font-family: ProximaNova-Regular, Helvetica, sans-serif;
	font-size: 18px;
	color: black;
}


#footer img {
	width: 55%; 
  	height: auto;
    position: absolute;
  	top: 20px;
  	right: 20px;
}

#footer .footertext {
	text-align: left;
	line-height:15px;
	padding-top: 10px;
	padding-left: 20px; 
	font-family: ProximaNova-Regular, Helvetica, sans-serif;
	font-size: 12px;
	color: gray;
	text-decoration: none;
}

#footer .footerlink {
	text-decoration: none;
	color: #718EE8;
}

.container { 
	max-width: 900px;
	height: 100%;
	overflow: auto;
	float: center; 
	margin: 10px 0; 
	font-family: ProximaNova-Regular, Helvetica, sans-serif;
	font-size: 10pt;
	padding-top: 10px;
    padding-right: 20px;
    padding-bottom: 10px;
    padding-left: 20px;
    background-color: #F0FAFF;
}

.container .onecolumn { 
	width: 100%; 
	float: left; 
}

.container .twocolumn { 
	width: 49.9%; 
	float: left; 
}

.tokenheader {
	max-width: 890px;
	height: 100%;
	overflow: auto;
	float: center; 
	margin: 10px 0; 
	font-family: ProximaNova-Regular, Helvetica, sans-serif;
	font-weight: bold;
	color: #4747D1;
	font-size: 16px;
	padding-top: 10px;
    padding-right: 20px;
    padding-bottom: 10px;
    padding-left: 20px;
    background-color: #B8DCFF;
}

.mainerrorcontainer {
	max-width: 890px;
	height: 100%;
	overflow: auto;
	float: center; 
	margin: 10px 0; 
	font-family: ProximaNova-Regular, Helvetica, sans-serif;
	font-weight: bold;
	color: black;
	font-size: 10pt;
	padding-top: 10px;
    padding-right: 20px;
    padding-bottom: 10px;
    padding-left: 20px;
    background-color: #FF5C5C;
}

.question {
	font-family: ProximaNova-Regular, Helvetica, sans-serif;
	font-weight: bold;
	max-width: 890px; 
}


.error {
	font-family: ProximaNova-Regular, Helvetica, sans-serif;
	color: red;
	width: 100%; 
	float: left; 
}

#submit, #save, #confirm, #cancel {
	font-family: ProximaNova-Regular, Helvetica, sans-serif;
    width: 18em;  height: 1.8em;
}

.commitbuttons {
	width: 900px; 
	overflow: auto;
	float: center; 
	padding-left: 20px;
}
.commitbuttons > div{
	width: 35%; 
	float: left; 
}

.div-spacer {
	width: 100%; 
	float: left;
}

</style>

</head>
<body>

<div id="header">			
		<p class="headertext">Planit Software Testing - Perth, WA </br>
			<span class="headersubtext">Online Survey Portal</span>
		</p>
		<?php echo $this->Html->image('planit.png', array('alt' => 'Planit'));?>
	</div>
	
	<div id="container">
	
		<?php echo $this->Session->flash(); ?>

		<?php echo $this->fetch('content'); ?>
	
	</div>
	
	<div id="footer">
		<p class="footertext">
		Suite 1.5/9 Havelock Street, West Perth, WA 6005 </br> 
		T: 08 6109 3800</br>
		<a href="http://www.planit.net.au" class="footerlink">http://www.planit.net.au<a>
		</p>
		<?php echo $this->Html->image('Footer-logos.jpg', array('alt' => 'Planit'));?>
	</div>

</body>
</html>