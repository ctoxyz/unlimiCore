<!-- START Standard FOOTER STANDARD NAV-disabled -->
<footer>
	
<div id="bottom_nav" style="position: relative; margin: 0 auto; margin-bottom: 25px; top: 91px; z-index: 100; background: #000000; width: 940px; height: 50px; border: 0px solid #fff; border-top: 1px solid #676767;">

<!-- logo & copyright -->
  <div style="position: absolute; top: 5px; left: 0px; width: 250px; height: 25px; border: 0px solid #fff;">
  	<img src="/common/img/logo/copyright.gif" alt="&copy; 2011 unlimiCore - All rights reserved." height="23" width="273">
 	</div>
<!-- END logo & copyright -->


<!-- bottom menu -->
  <div style="position: absolute; top: 10px; right: 0px; width: auto; border: 0px solid #fff;">
		<table border="0" style="width: 450px; border: 1;">
			<tr>
				<td><a style="text-decoration: none; font-size: 10px; color: #ffffff;" href="http://<? echo $_SERVER['SERVER_NAME']; ?>/about">About Us</a></td>
				<td><a style="text-decoration: none; font-size: 10px; color: #ffffff;" href="http://<? echo $_SERVER['SERVER_NAME']; ?>/helpdesk">Common Questions</a></td>
				<td><a style="text-decoration: none; font-size: 10px; color: #ffffff;" href="http://<? echo $_SERVER['SERVER_NAME']; ?>/our-privacy-policy">Privacy Policy</a></td>
				<td><a style="text-decoration: none; font-size: 10px; color: #ffffff;" href="http://<? echo $_SERVER['SERVER_NAME']; ?>/terms-of-service">Terms of Service</a></td>
				<td><a style="text-decoration: none; font-size: 10px; color: #ffffff;" href="http://<? echo $_SERVER['SERVER_NAME']; ?>/HelpDesk">Help Desk</a></td>
				<!-- <td><a href="http://<? echo $_SERVER['SERVER_NAME']; ?>/accessibility-special-needs" accesskey="0"><font size="2" style="text-decoration: none; font-weight: bold;">Accessibility</font></a></td> -->
			</tr>
		</table>
 	</div>
<!-- END bottom menu -->


<!-- message -->
  <div style="position: absolute; top: 24px; left: 5px; width: 350px; border: 0px solid #fff;">
  	<font size="1"><a href="about">unlimi<font color="#00d2ff">Core</font> Copyright &copy;2011</a> &nbsp; - <font color="#9a9a9a">Authorized Personnel Only</font>
 	</div>
<!-- END message -->

</div>




<!-- google analytics -->

<!-- end google analytics -->


<!-- Start Quantcast tag -->

<!-- End Quantcast tag -->





		<?
  		//if( (strtolower($_SERVER['REQUEST_URI']) != '/signup') || (strtolower($_SERVER['REQUEST_URI']) != '/home' || $obj_Member->MemberAuthorized == false) ){
  		if($obj_Member->MemberAuthorized == true){
		?>

			<!-- kampyle code was here -->

    <?
    	}
    ?>
</footer>

</body>
</html>

<?php
# Make a Content-Length: header
//header('Content-Length: ' . ob_get_length());
//ob_end_flush();
?>
