<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US">
<head profile="http://gmpg.org/xfn/11">
<META HTTP-EQUIV="Pragma" CONTENT="no-cache" />	
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	      <title>TEMP PROJECT PLACEHOLDER | syntheticMagic Advanced Business Services</title>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <meta http-equiv="Content-Language" content="en-us" />
        <!-- <META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE"> -->
        <meta name="description" content="Future Project Domain of syntheticMagic Advanced Business Services" />
        <meta name="copyright" content="Copyright &copy;2010 syntheticMagic Advanced Business Services - All rights reserved" />
        <meta http-equiv="Author" name="Webmaster" content="<? echo $_SERVER['SERVER_NAME']; ?>" />
        <meta http-equiv="Reply-to" content="contact@syntheticmagic.com" />
        <meta name="ROBOTS" content="noindex,nofollow" /> 
				<meta name="Rating" content="General" />



        <style type="text/css">
        html{
        	height: 					100%;
        	margin: 					0;
        	padding: 					0;
        }
        
        body{ 
          margin-left: 			0%; 
          padding-left: 		0%;
          background-color: #000;
          color: 						#ffffff;
          font-family: 			Arial;
          text-decoration: 	bold;
          height: 					100%;
          margin: 					0;
          padding: 					0;
          
        }

        a:link { 
      	  	color: #fff;
        	}
        a:visited { 
    	    	color: #fff;
        	}
        a:hover { 
	        	color: 				#a7fea0;
  	      	text-decoration: none;
        	}
        a:active { 
        		color: #333333;
        	}


        </style>




</head>


<body>

<br>
<center>

<table>
	<tr>
		<td colspan=3><h1>TEMP SITE</h1></td>
	</tr>
	
	<tr>
		<td><h2>PROJECT:</h2></td>
		<td width=40></td>
		<td><h2>TEMP SITE</h2></td>
	</tr>

	<tr>
		<td><h2>STATUS:</h2></td>
		<td width=40></td>
		<td><h2>IN PROCESS</h2></td>
	</tr>


</table>

<br><br>

	<img id="image" src="http://syntheticmagic.com/common/img/logo/sm-product-unlimicore.jpg" />


      			<script type="text/javascript">


// -----------------------------------------------------------------------------
function changeOpacity(opacity, id) { 
    var object = document.getElementById(id).style; 
    object.opacity = (opacity / 100); 
    object.MozOpacity = (opacity / 100); 
    object.KhtmlOpacity = (opacity / 100); 
    object.filter = "alpha(opacity=" + opacity + ")"; 
}
// -----------------------------------------------------------------------------


// -----------------------------------------------------------------------------
function invisi(cID, Ease){
	if(Ease == 'out'){
		document.getElementById(cID).style.display 	= 'none';
	}else if(Ease == 'in'){
		document.getElementById(cID).style.display 	= 'inline';
	}
}
// -----------------------------------------------------------------------------
	


// -----------------------------------------------------------------------------
function opacity(id, opacStart, opacEnd, millisec) { 
    //speed for each frame 
    var speed = Math.round(millisec / 100); 
    var timer = 0; 

    //determine the direction for the blending, if start and end are the same nothing happens 
    if(opacStart > opacEnd) { 
        for(i = opacStart; i >= opacEnd; i--) { 
            setTimeout("changeOpacity(" + i + ",'" + id + "')",(timer * speed)); 
            timer++; 
        } 
    } else if(opacStart < opacEnd) { 
        for(i = opacStart; i <= opacEnd; i++) 
            { 
            setTimeout("changeOpacity(" + i + ",'" + id + "')",(timer * speed)); 
            timer++; 
        } 
    } 
}
// -----------------------------------------------------------------------------




function fade(cID, Ease){
	//var divID = 'conversation' + cID;
	var divID = cID;
	
	if(Ease == 'out'){
		opacity(divID, 100, 0, 2000);
		setTimeout(function() {invisi(divID, Ease)},2000);	
	}else if(Ease == 'in'){
		opacity(divID, 0, 100, 2000);
		setTimeout(function() {invisi(divID, Ease)},2000);
	}

	
}


fade('image', 'in');


      			</script>

</center>
</body>
</html>
