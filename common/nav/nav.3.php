<?php

// navigation generation -----------------------------------------------------------------





// unauthorized user mavigation ======================================
	if($obj_Member->MemberAuthorized == false){

		?>
			<div id="navbuttons" style="width: 100%; height: 30px; text-align: center; z-index: 5; ">
    	</div>
    	<!-- END nav div buttons -->
		<?


// authorized user mavigation : CLIENT ===============================
	}elseif($obj_Member->MemberAuthorized == true){

    // get user modules ----------
    $_ArrayResult_USERMODULES = $obj_Member->GetUserModules($_SESSION['ActiveUser']['userid']);

    ?>
    	<!-- nav div buttons -->
    	<div id="navbuttons" style="z-index: 5; width: 100%; height: 30px; background-color: #454545;">
    <?





    $_menuItem_COUNTER = 0;
    foreach($_ArrayResult_USERMODULES as $RecordSet => $Value){
    	//print_r($Value);
    	?>
      	<!-- dashboard -->
      		<?
      			// get core URI ----------------------
      			$__Exploded_URI	=	explode('.',$_SERVER['REQUEST_URI']);
      		
      			// navigation bg color -----------------
      			if(strtolower($__Exploded_URI[0]) == $Value['uri']){
      				$_NAV_MENU_BG0 = '750000';
      			}else{
      				$_NAV_MENU_BG0 = '767676';
      			}
      			// -------------------------------------
      		?>
      		<div id="_functionA" style="position: absolute; bottom: 0px; left: <? echo $_menuItem_COUNTER.'0'.$_menuItem_COUNTER.'px'; ?>; width: 100px; height: 30px; border: 0px solid #e9e9e9; text-align: center; align: center; z-index: 10; color: #fff; background-color: #<? echo $_NAV_MENU_BG0; ?>;">
      			<div style="position: absolute; top: 5px; width: 100%;">
      				<a href="http://<? echo $_SERVER['SERVER_NAME'].ucwords($Value['uri']); ?>" style="text-decoration: none; font-size: 17px;"><? echo $Value['name']; ?></a>
      			</div>
      		</div>
      	<!-- END dashboard -->
    	<?
    $_menuItem_COUNTER++;
    }
?>
			<!-- progress meter -->
      <div id="_progressMeter_container" style="position: absolute; bottom: 0px; left: <? echo $_menuItem_COUNTER.'0'.$_menuItem_COUNTER.'px'; ?>; width: 100px; height: 30px; border: 0px solid #e9e9e9; text-align: center; align: center; z-index: 10; color: #fff; background-color: #767676">
      	<div id="_progressMeter" style="position: absolute; top: 5px; width: 100%; font-size: 17px; color: #53ddff;">
      	</div>
      </div>
      <!-- END progress meter -->

    </div>
    <?

	}
// ===================================================================



?>

