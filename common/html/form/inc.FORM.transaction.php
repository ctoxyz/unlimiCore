



<?
//echo $_GET['_e'];
//echo 'WTF';

//echo $_GET['_e'];
//$__test = $_GET['_e'];

//echo $obj_Member->Decrypt($__test, 'private');
//echo 'WTF';

//echo $obj_Member->Decrypt($_GET['_e'], 'private');

//die();



//print_r($_RESULT_TRANS);



$_RESULT_TRANS	=	$obj_Member->GetTransactions('transaction_specific', $obj_Member->Decrypt($_GET['_e'], 'private'));


if($_RESULT_TRANS){
	$_SESSION['ActiveUser']['TransactionEdit'] = true;
	$__Transaction_Panel_TITLE	=	'EDIT Transaction - REVISING: <font color="#f99b15">'.$_RESULT_TRANS['io'].'</font>';
}else{
	$_SESSION['ActiveUser']['TransactionEdit'] = false;
	$__Transaction_Panel_TITLE	=	'NEW Transaction';
}







//echo date('m',0);

//die();

//echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('m',$_RESULT_TRANS['ts_start']) == '0'?'selected':'') : ''  );

//die();
//echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['ts_sold']) == '01'?'selectede':'') : (date('d',time()) == '01'?'selectedn':'')  );
//echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['ts_sold']) == '02'?'selectede':'') : (date('d',time()) == '02'?'selectedn':'')  );
//echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['ts_sold']) == '03'?'selectede':'') : (date('d',time()) == '03'?'selectedn':'')  );
///die();
?>
















<form action="#" method="post" enctype="multipart/form-data" name="form_transaction_new" id="form_transaction_new">











<!-- TRANSACTION PANEL -->
	<div style="position: relative; top: 10px; height: 680px; width: 938px; left: 10px; border: 1px solid #760000; " >

		<!-- title -->
		<div id="panel_title" style="height: 30px; background-color: #414141; color: #ffffff; font-size: 20px; font-weight: bold; border-bottom: 1px solid #656565;">
			<div style="position: absolute; top: 4px; left: 4px;"><? echo '&nbsp;'.$__Transaction_Panel_TITLE; ?></div>
			<div style="position: absolute; top: 4px; right: 4px;"><? echo '&nbsp;'.date('F d Y',time()); ?></div>
		</div>
		<!-- END title -->





		<!-- LEFT -->
		<div id="panel_control_1" style="position: absolute; left: 10px; top: 45px; width: 450px; height: 280px; background-color: #414141; color: #ffffff; font-size: 15px; font-weight: normal; border: 1px solid #760000;">

			<!-- title -->
			<div id="panel_title" style="height: 40px; background-color: #760000; color: #ffffff; font-size: 15px; font-weight: bold; border-bottom: 1px solid #656565;">
				<div style="position: absolute; top: 4px; left: 6px;"><h2 style="color: #ffffff;">Campaign</h2></div>
			</div>
			<!-- END title -->


			<table class="form_transaction_new" cellpadding="1" cellspacing="0" border="0" width="100%" style="position: absolute; top: 50px; left: 10px;">
	
     		    <!-- date range element -->
           	<tr>
    					<td class="formControl_label_TRANSACTION" width=100>
    						&nbsp;&nbsp;Date of Sale
    					</td>

           		<td height="25">
							<table>
								<tr>
									<td>
               			<select name="form_transaction_new.booking.date_sale_month" id="form_transaction_new.booking.date_sale_month" class="formControl_input" style="width: 80px;" tabindex="1">
               				<option id="form_transaction_new.booking.date_sale_month-nan" value="nan" >Month</option>
               				<option id="form_transaction_new.booking.date_sale_month-jan" value="01" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('m',$_RESULT_TRANS['ts_sold']) == '01'?'selected':'') : (date('m',time()) == '01'?'selected':'')  ); ?>>Jan</option>
               				<option id="form_transaction_new.booking.date_sale_month-feb" value="02" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('m',$_RESULT_TRANS['ts_sold']) == '02'?'selected':'') : (date('m',time()) == '02'?'selected':'')  ); ?>>Feb</option>
               				<option id="form_transaction_new.booking.date_sale_month-march" value="03" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('m',$_RESULT_TRANS['ts_sold']) == '03'?'selected':'') : (date('m',time()) == '03'?'selected':'')  ); ?>>Mar</option>
               				<option id="form_transaction_new.booking.date_sale_month-april" value="04" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('m',$_RESULT_TRANS['ts_sold']) == '04'?'selected':'') : (date('m',time()) == '04'?'selected':'')  ); ?>>Apr</option>
               				<option id="form_transaction_new.booking.date_sale_month-may" value="05" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('m',$_RESULT_TRANS['ts_sold']) == '05'?'selected':'') : (date('m',time()) == '05'?'selected':'')  ); ?>>May</option>
               				<option id="form_transaction_new.booking.date_sale_month-june" value="06" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('m',$_RESULT_TRANS['ts_sold']) == '06'?'selected':'') : (date('m',time()) == '06'?'selected':'')  ); ?>>Jun</option>
               				<option id="form_transaction_new.booking.date_sale_month-july" value="07" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('m',$_RESULT_TRANS['ts_sold']) == '07'?'selected':'') : (date('m',time()) == '07'?'selected':'')  ); ?>>Jul</option> 
               				<option id="form_transaction_new.booking.date_sale_month-august" value="08" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('m',$_RESULT_TRANS['ts_sold']) == '08'?'selected':'') : (date('m',time()) == '08'?'selected':'')  ); ?>>Aug</option> 
               				<option id="form_transaction_new.booking.date_sale_month-sep" value="09" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('m',$_RESULT_TRANS['ts_sold']) == '09'?'selected':'') : (date('m',time()) == '09'?'selected':'')  ); ?>>Sep</option> 
               				<option id="form_transaction_new.booking.date_sale_month-oct" value="10" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('m',$_RESULT_TRANS['ts_sold']) == '10'?'selected':'') : (date('m',time()) == '10'?'selected':'')  ); ?>>Oct</option> 
               				<option id="form_transaction_new.booking.date_sale_month-nov" value="11" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('m',$_RESULT_TRANS['ts_sold']) == '11'?'selected':'') : (date('m',time()) == '11'?'selected':'')  ); ?>>Nov</option> 
               				<option id="form_transaction_new.booking.date_sale_month-dec" value="12" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('m',$_RESULT_TRANS['ts_sold']) == '12'?'selected':'') : (date('m',time()) == '12'?'selected':'')  ); ?>>Dec</option> 
               			</select>
               		</td>
									<td>
               			<select name="form_transaction_new.booking.date_sale_day" id="form_transaction_new.booking.date_sale_day" class="formControl_input" style="width: 70px;" tabindex="2">
               				<option id="form_transaction_new.booking.date_sale_day-nan" value="nan">Day</option>
               				<option id="form_transaction_new.booking.date_sale_day-1" value="01" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['ts_sold']) == '01'?'selected':'') : (date('d',time()) == '01'?'selected':'')  ); ?>>1</option>
               				<option id="form_transaction_new.booking.date_sale_day-2" value="02" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['ts_sold']) == '02'?'selected':'') : (date('d',time()) == '02'?'selected':'')  ); ?>>2</option>
               				<option id="form_transaction_new.booking.date_sale_day-3" value="03" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['ts_sold']) == '03'?'selected':'') : (date('d',time()) == '03'?'selected':'')  ); ?>>3</option>
               				<option id="form_transaction_new.booking.date_sale_day-4" value="04" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['ts_sold']) == '04'?'selected':'') : (date('d',time()) == '04'?'selected':'')  ); ?>>4</option>
               				<option id="form_transaction_new.booking.date_sale_day-5" value="05" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['ts_sold']) == '05'?'selected':'') : (date('d',time()) == '05'?'selected':'')  ); ?>>5</option>
               				<option id="form_transaction_new.booking.date_sale_day-6" value="06" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['ts_sold']) == '06'?'selected':'') : (date('d',time()) == '06'?'selected':'')  ); ?>>6</option>
               				<option id="form_transaction_new.booking.date_sale_day-7" value="07" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['ts_sold']) == '07'?'selected':'') : (date('d',time()) == '07'?'selected':'')  ); ?>>7</option>
               				<option id="form_transaction_new.booking.date_sale_day-8" value="08" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['ts_sold']) == '08'?'selected':'') : (date('d',time()) == '08'?'selected':'')  ); ?>>8</option>
               				<option id="form_transaction_new.booking.date_sale_day-9" value="09" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['ts_sold']) == '09'?'selected':'') : (date('d',time()) == '09'?'selected':'')  ); ?>>9</option>
               				<option id="form_transaction_new.booking.date_sale_day-10" value="10" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['ts_sold']) == '10'?'selected':'') : (date('d',time()) == '10'?'selected':'')  ); ?>>10</option>
               				<option id="form_transaction_new.booking.date_sale_day-11" value="11" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['ts_sold']) == '11'?'selected':'') : (date('d',time()) == '11'?'selected':'')  ); ?>>11</option>
               				<option id="form_transaction_new.booking.date_sale_day-12" value="12" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['ts_sold']) == '12'?'selected':'') : (date('d',time()) == '12'?'selected':'')  ); ?>>12</option>
               				<option id="form_transaction_new.booking.date_sale_day-13" value="13" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['ts_sold']) == '13'?'selected':'') : (date('d',time()) == '13'?'selected':'')  ); ?>>13</option>
               				<option id="form_transaction_new.booking.date_sale_day-14" value="14" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['ts_sold']) == '14'?'selected':'') : (date('d',time()) == '14'?'selected':'')  ); ?>>14</option>
               				<option id="form_transaction_new.booking.date_sale_day-15" value="15" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['ts_sold']) == '15'?'selected':'') : (date('d',time()) == '15'?'selected':'')  ); ?>>15</option>
               				<option id="form_transaction_new.booking.date_sale_day-16" value="16" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['ts_sold']) == '16'?'selected':'') : (date('d',time()) == '16'?'selected':'')  ); ?>>16</option>
               				<option id="form_transaction_new.booking.date_sale_day-17" value="17" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['ts_sold']) == '17'?'selected':'') : (date('d',time()) == '17'?'selected':'')  ); ?>>17</option>
               				<option id="form_transaction_new.booking.date_sale_day-18" value="18" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['ts_sold']) == '18'?'selected':'') : (date('d',time()) == '18'?'selected':'')  ); ?>>18</option>
               				<option id="form_transaction_new.booking.date_sale_day-19" value="19" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['ts_sold']) == '19'?'selected':'') : (date('d',time()) == '19'?'selected':'')  ); ?>>19</option>
               				<option id="form_transaction_new.booking.date_sale_day-20" value="20" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['ts_sold']) == '20'?'selected':'') : (date('d',time()) == '20'?'selected':'')  ); ?>>20</option>
               				<option id="form_transaction_new.booking.date_sale_day-21" value="21" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['ts_sold']) == '21'?'selected':'') : (date('d',time()) == '21'?'selected':'')  ); ?>>21</option>
               				<option id="form_transaction_new.booking.date_sale_day-22" value="22" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['ts_sold']) == '22'?'selected':'') : (date('d',time()) == '22'?'selected':'')  ); ?>>22</option>
               				<option id="form_transaction_new.booking.date_sale_day-23" value="23" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['ts_sold']) == '23'?'selected':'') : (date('d',time()) == '23'?'selected':'')  ); ?>>23</option>
               				<option id="form_transaction_new.booking.date_sale_day-24" value="24" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['ts_sold']) == '24'?'selected':'') : (date('d',time()) == '24'?'selected':'')  ); ?>>24</option>
               				<option id="form_transaction_new.booking.date_sale_day-25" value="25" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['ts_sold']) == '25'?'selected':'') : (date('d',time()) == '25'?'selected':'')  ); ?>>25</option>
               				<option id="form_transaction_new.booking.date_sale_day-26" value="26" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['ts_sold']) == '26'?'selected':'') : (date('d',time()) == '26'?'selected':'')  ); ?>>26</option>
               				<option id="form_transaction_new.booking.date_sale_day-27" value="27" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['ts_sold']) == '27'?'selected':'') : (date('d',time()) == '27'?'selected':'')  ); ?>>27</option>
               				<option id="form_transaction_new.booking.date_sale_day-28" value="27" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['ts_sold']) == '28'?'selected':'') : (date('d',time()) == '28'?'selected':'')  ); ?>>28</option>
               				<option id="form_transaction_new.booking.date_sale_day-29" value="29" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['ts_sold']) == '29'?'selected':'') : (date('d',time()) == '29'?'selected':'')  ); ?>>29</option>
               				<option id="form_transaction_new.booking.date_sale_day-30" value="30" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['ts_sold']) == '30'?'selected':'') : (date('d',time()) == '30'?'selected':'')  ); ?>>30</option>
               				<option id="form_transaction_new.booking.date_sale_day-31" value="31" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['ts_sold']) == '31'?'selected':'') : (date('d',time()) == '31'?'selected':'')  ); ?>>31</option>
               			</select>
               		</td>
									<td>
          			   		<select name="form_transaction_new.booking.date_sale_year" id="form_transaction_new.booking.date_sale_year" class="formControl_input" style="width: 70px;" tabindex="3">
											 <option value="nan" id="form_transaction_new.booking.date_sale_year-nan">Year</option>
              				 <option value="2013" id="form_transaction_new.booking.date_sale_year-2013" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('Y',$_RESULT_TRANS['ts_sold']) == '2013'?'selected':'') : (date('Y',time()) == '2013'?'selected':'')  ); ?>>2013</option>
              				 <option value="2012" id="form_transaction_new.booking.date_sale_year-2012" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('Y',$_RESULT_TRANS['ts_sold']) == '2012'?'selected':'') : (date('Y',time()) == '2012'?'selected':'')  ); ?>>2012</option>
              				 <option value="2011" id="form_transaction_new.booking.date_sale_year-2011" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('Y',$_RESULT_TRANS['ts_sold']) == '2011'?'selected':'') : (date('Y',time()) == '2011'?'selected':'')  ); ?>>2011</option>
              				 <option value="2010" id="form_transaction_new.booking.date_sale_year-2010" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('Y',$_RESULT_TRANS['ts_sold']) == '2010'?'selected':'') : (date('Y',time()) == '2010'?'selected':'')  ); ?>>2010</option>
              				 <option value="2009" id="form_transaction_new.booking.date_sale_year-2009" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('Y',$_RESULT_TRANS['ts_sold']) == '2009'?'selected':'') : (date('Y',time()) == '2009'?'selected':'')  ); ?>>2009</option>
               			</select>
            				</td>
            			</tr>
           		</table>
           		</td>

           		<td width="5">
           		</td>
 
     					<td>
               	<div id="VALIDATIONRESPONSE.date_sale"></div>
               </td>
           	</tr>

           	<!-- date range element -->








     		    <!-- date range element -->
           	<tr>
    					<td class="formControl_label_TRANSACTION" width=100>
    						&nbsp;&nbsp;Date Check Rec
    					</td>

           		<td height="25">
							<table>
								<tr>
									<td>
               			<select name="form_transaction_new.booking.date_check_rec_month" id="form_transaction_new.booking.date_check_rec_month" class="formControl_input" style="width: 80px;" tabindex="1">
               				<option id="form_transaction_new.booking.date_check_rec_month-nan" value="nan" >Month</option>
               				<option id="form_transaction_new.booking.date_check_rec_month-jan" value="01" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('m',$_RESULT_TRANS['date_check_rec']) == '01'?'selected':'') : (date('m',time()) == '01'?'selected':'')  ); ?>>Jan</option>
               				<option id="form_transaction_new.booking.date_check_rec_month-feb" value="02" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('m',$_RESULT_TRANS['date_check_rec']) == '02'?'selected':'') : (date('m',time()) == '02'?'selected':'')  ); ?>>Feb</option>
               				<option id="form_transaction_new.booking.date_check_rec_month-march" value="03" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('m',$_RESULT_TRANS['date_check_rec']) == '03'?'selected':'') : (date('m',time()) == '03'?'selected':'')  ); ?>>Mar</option>
               				<option id="form_transaction_new.booking.date_check_rec_month-april" value="04" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('m',$_RESULT_TRANS['date_check_rec']) == '04'?'selected':'') : (date('m',time()) == '04'?'selected':'')  ); ?>>Apr</option>
               				<option id="form_transaction_new.booking.date_check_rec_month-may" value="05" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('m',$_RESULT_TRANS['date_check_rec']) == '05'?'selected':'') : (date('m',time()) == '05'?'selected':'')  ); ?>>May</option>
               				<option id="form_transaction_new.booking.date_check_rec_month-june" value="06" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('m',$_RESULT_TRANS['date_check_rec']) == '06'?'selected':'') : (date('m',time()) == '06'?'selected':'')  ); ?>>Jun</option>
               				<option id="form_transaction_new.booking.date_check_rec_month-july" value="07" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('m',$_RESULT_TRANS['date_check_rec']) == '07'?'selected':'') : (date('m',time()) == '07'?'selected':'')  ); ?>>Jul</option> 
               				<option id="form_transaction_new.booking.date_check_rec_month-august" value="08" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('m',$_RESULT_TRANS['date_check_rec']) == '08'?'selected':'') : (date('m',time()) == '08'?'selected':'')  ); ?>>Aug</option> 
               				<option id="form_transaction_new.booking.date_check_rec_month-sep" value="09" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('m',$_RESULT_TRANS['date_check_rec']) == '09'?'selected':'') : (date('m',time()) == '09'?'selected':'')  ); ?>>Sep</option> 
               				<option id="form_transaction_new.booking.date_check_rec_month-oct" value="10" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('m',$_RESULT_TRANS['date_check_rec']) == '10'?'selected':'') : (date('m',time()) == '10'?'selected':'')  ); ?>>Oct</option> 
               				<option id="form_transaction_new.booking.date_check_rec_month-nov" value="11" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('m',$_RESULT_TRANS['date_check_rec']) == '11'?'selected':'') : (date('m',time()) == '11'?'selected':'')  ); ?>>Nov</option> 
               				<option id="form_transaction_new.booking.date_check_rec_month-dec" value="12" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('m',$_RESULT_TRANS['date_check_rec']) == '12'?'selected':'') : (date('m',time()) == '12'?'selected':'')  ); ?>>Dec</option> 
               			</select>
               		</td>
									<td>
               			<select name="form_transaction_new.booking.date_check_rec_day" id="form_transaction_new.booking.date_check_rec_day" class="formControl_input" style="width: 70px;" tabindex="2">
               				<option id="form_transaction_new.booking.date_check_rec_day-nan" value="nan">Day</option>
               				<option id="form_transaction_new.booking.date_check_rec_day-1" value="01" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['date_check_rec']) == '01'?'selected':'') : (date('d',time()) == '01'?'selected':'')  ); ?>>1</option>
               				<option id="form_transaction_new.booking.date_check_rec_day-2" value="02" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['date_check_rec']) == '02'?'selected':'') : (date('d',time()) == '02'?'selected':'')  ); ?>>2</option>
               				<option id="form_transaction_new.booking.date_check_rec_day-3" value="03" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['date_check_rec']) == '03'?'selected':'') : (date('d',time()) == '03'?'selected':'')  ); ?>>3</option>
               				<option id="form_transaction_new.booking.date_check_rec_day-4" value="04" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['date_check_rec']) == '04'?'selected':'') : (date('d',time()) == '04'?'selected':'')  ); ?>>4</option>
               				<option id="form_transaction_new.booking.date_check_rec_day-5" value="05" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['date_check_rec']) == '05'?'selected':'') : (date('d',time()) == '05'?'selected':'')  ); ?>>5</option>
               				<option id="form_transaction_new.booking.date_check_rec_day-6" value="06" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['date_check_rec']) == '06'?'selected':'') : (date('d',time()) == '06'?'selected':'')  ); ?>>6</option>
               				<option id="form_transaction_new.booking.date_check_rec_day-7" value="07" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['date_check_rec']) == '07'?'selected':'') : (date('d',time()) == '07'?'selected':'')  ); ?>>7</option>
               				<option id="form_transaction_new.booking.date_check_rec_day-8" value="08" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['date_check_rec']) == '08'?'selected':'') : (date('d',time()) == '08'?'selected':'')  ); ?>>8</option>
               				<option id="form_transaction_new.booking.date_check_rec_day-9" value="09" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['date_check_rec']) == '09'?'selected':'') : (date('d',time()) == '09'?'selected':'')  ); ?>>9</option>
               				<option id="form_transaction_new.booking.date_check_rec_day-10" value="10" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['date_check_rec']) == '10'?'selected':'') : (date('d',time()) == '10'?'selected':'')  ); ?>>10</option>
               				<option id="form_transaction_new.booking.date_check_rec_day-11" value="11" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['date_check_rec']) == '11'?'selected':'') : (date('d',time()) == '11'?'selected':'')  ); ?>>11</option>
               				<option id="form_transaction_new.booking.date_check_rec_day-12" value="12" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['date_check_rec']) == '12'?'selected':'') : (date('d',time()) == '12'?'selected':'')  ); ?>>12</option>
               				<option id="form_transaction_new.booking.date_check_rec_day-13" value="13" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['date_check_rec']) == '13'?'selected':'') : (date('d',time()) == '13'?'selected':'')  ); ?>>13</option>
               				<option id="form_transaction_new.booking.date_check_rec_day-14" value="14" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['date_check_rec']) == '14'?'selected':'') : (date('d',time()) == '14'?'selected':'')  ); ?>>14</option>
               				<option id="form_transaction_new.booking.date_check_rec_day-15" value="15" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['date_check_rec']) == '15'?'selected':'') : (date('d',time()) == '15'?'selected':'')  ); ?>>15</option>
               				<option id="form_transaction_new.booking.date_check_rec_day-16" value="16" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['date_check_rec']) == '16'?'selected':'') : (date('d',time()) == '16'?'selected':'')  ); ?>>16</option>
               				<option id="form_transaction_new.booking.date_check_rec_day-17" value="17" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['date_check_rec']) == '17'?'selected':'') : (date('d',time()) == '17'?'selected':'')  ); ?>>17</option>
               				<option id="form_transaction_new.booking.date_check_rec_day-18" value="18" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['date_check_rec']) == '18'?'selected':'') : (date('d',time()) == '18'?'selected':'')  ); ?>>18</option>
               				<option id="form_transaction_new.booking.date_check_rec_day-19" value="19" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['date_check_rec']) == '19'?'selected':'') : (date('d',time()) == '19'?'selected':'')  ); ?>>19</option>
               				<option id="form_transaction_new.booking.date_check_rec_day-20" value="20" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['date_check_rec']) == '20'?'selected':'') : (date('d',time()) == '20'?'selected':'')  ); ?>>20</option>
               				<option id="form_transaction_new.booking.date_check_rec_day-21" value="21" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['date_check_rec']) == '21'?'selected':'') : (date('d',time()) == '21'?'selected':'')  ); ?>>21</option>
               				<option id="form_transaction_new.booking.date_check_rec_day-22" value="22" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['date_check_rec']) == '22'?'selected':'') : (date('d',time()) == '22'?'selected':'')  ); ?>>22</option>
               				<option id="form_transaction_new.booking.date_check_rec_day-23" value="23" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['date_check_rec']) == '23'?'selected':'') : (date('d',time()) == '23'?'selected':'')  ); ?>>23</option>
               				<option id="form_transaction_new.booking.date_check_rec_day-24" value="24" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['date_check_rec']) == '24'?'selected':'') : (date('d',time()) == '24'?'selected':'')  ); ?>>24</option>
               				<option id="form_transaction_new.booking.date_check_rec_day-25" value="25" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['date_check_rec']) == '25'?'selected':'') : (date('d',time()) == '25'?'selected':'')  ); ?>>25</option>
               				<option id="form_transaction_new.booking.date_check_rec_day-26" value="26" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['date_check_rec']) == '26'?'selected':'') : (date('d',time()) == '26'?'selected':'')  ); ?>>26</option>
               				<option id="form_transaction_new.booking.date_check_rec_day-27" value="27" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['date_check_rec']) == '27'?'selected':'') : (date('d',time()) == '27'?'selected':'')  ); ?>>27</option>
               				<option id="form_transaction_new.booking.date_check_rec_day-28" value="27" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['date_check_rec']) == '28'?'selected':'') : (date('d',time()) == '28'?'selected':'')  ); ?>>28</option>
               				<option id="form_transaction_new.booking.date_check_rec_day-29" value="29" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['date_check_rec']) == '29'?'selected':'') : (date('d',time()) == '29'?'selected':'')  ); ?>>29</option>
               				<option id="form_transaction_new.booking.date_check_rec_day-30" value="30" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['date_check_rec']) == '30'?'selected':'') : (date('d',time()) == '30'?'selected':'')  ); ?>>30</option>
               				<option id="form_transaction_new.booking.date_check_rec_day-31" value="31" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['date_check_rec']) == '31'?'selected':'') : (date('d',time()) == '31'?'selected':'')  ); ?>>31</option>
               			</select>
               		</td>
									<td>
          			   		<select name="form_transaction_new.booking.date_check_rec_year" id="form_transaction_new.booking.date_check_rec_year" class="formControl_input" style="width: 70px;" tabindex="3">
											 <option value="nan" id="form_transaction_new.booking.date_check_rec_year-nan">Year</option>
              				 <option value="2013" id="form_transaction_new.booking.date_check_rec_year-2013" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('Y',$_RESULT_TRANS['date_check_rec']) == '2013'?'selected':'') : (date('Y',time()) == '2013'?'selected':'')  ); ?>>2013</option>
              				 <option value="2012" id="form_transaction_new.booking.date_check_rec_year-2012" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('Y',$_RESULT_TRANS['date_check_rec']) == '2012'?'selected':'') : (date('Y',time()) == '2012'?'selected':'')  ); ?>>2012</option>
              				 <option value="2011" id="form_transaction_new.booking.date_check_rec_year-2011" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('Y',$_RESULT_TRANS['date_check_rec']) == '2011'?'selected':'') : (date('Y',time()) == '2011'?'selected':'')  ); ?>>2011</option>
              				 <option value="2010" id="form_transaction_new.booking.date_check_rec_year-2010" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('Y',$_RESULT_TRANS['date_check_rec']) == '2010'?'selected':'') : (date('Y',time()) == '2010'?'selected':'')  ); ?>>2010</option>
              				 <option value="2009" id="form_transaction_new.booking.date_check_rec_year-2009" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('Y',$_RESULT_TRANS['date_check_rec']) == '2009'?'selected':'') : (date('Y',time()) == '2009'?'selected':'')  ); ?>>2009</option>
               			</select>
            				</td>
            			</tr>
           		</table>
           		</td>

           		<td width="5">
           		</td>
 
     					<td>
               	<div id="VALIDATIONRESPONSE.date_check_rec"></div>
               </td>
           	</tr>

           	<!-- date range element -->












    				<!-- select/dropdown form element -->
						<tr>
    					<td class="formControl_label_TRANSACTION">
    						&nbsp;&nbsp;Medium
    					</td>

							<td align="left">
          			<select name="form_transaction_new.booking.medium_id" id="form_transaction_new.booking.medium_id" tabindex="4" onchange="SM_Validate(this); WMG_MEDIUM_TIMING_SelectPopulation();" onblur="SM_Validate(this);" class="formControl_inputSelect">
          				<option value="nan">Select a Medium</option>
                 <?

  								// get data --------------------------
									$ResultArray_MEDIUM			= $obj_Member->GetMedium();


									foreach($ResultArray_MEDIUM as $_MEDIUM_KEY){
                 		$_MEDIUM_NAME		= strtoupper($_MEDIUM_KEY['type']);
                 		$_MEDIUM_ID			= $_MEDIUM_KEY['id'];
                 		echo '<option value="'.$_MEDIUM_ID.'" '.($_SESSION['ActiveUser']['TransactionEdit'] == true ? ($_RESULT_TRANS['medium_id'] == $_MEDIUM_ID ? 'selected':'') : '' ).' >'.$_MEDIUM_NAME.'</option>';
									}
                 ?>
          			</select>
							</td>

          		<td width="5">
          		</td>

    					<td>
              	<div id="VALIDATIONRESPONSE.medium_id"></div>
              </td>

						</tr>
    				<!-- END select/dropdown form element -->






    				<!-- select/dropdown form element -->
						<tr>
    					<td class="formControl_label_TRANSACTION">
    						&nbsp;&nbsp;Medium Timing
    					</td>

							<td align="left">
          			<select name="form_transaction_new.booking.medium_timing_id" id="form_transaction_new.booking.medium_timing_id" tabindex="5" onchange="SM_Validate(this);" onblur="SM_Validate(this);" class="formControl_inputSelect">
          				<option value="nan">Select Medium Timing</option>
                 <?

                 	if($_SESSION['ActiveUser']['TransactionEdit'] == true){
	  								// get data --------------------------
										$ResultArray_MEDIUMTIMING			= $obj_Member->GetMediumTiming();
	
										foreach($ResultArray_MEDIUMTIMING as $_MEDIUMTIMING_KEY){
	                 		$_MEDIUMTIMING_NAME		= strtoupper($_MEDIUMTIMING_KEY['type']);
	                 		$_MEDIUMTIMING_ID			= $_MEDIUMTIMING_KEY['id'];
                 		
	                 		echo '<option value="'.$_MEDIUMTIMING_ID.'" '.($_SESSION['ActiveUser']['TransactionEdit'] == true ? ($_RESULT_TRANS['medium_timing_id'] == $_MEDIUMTIMING_ID ? 'selected':'') : '' ).' >'.$_MEDIUMTIMING_NAME.'</option>';
										}
                 	}

                 ?>
          			</select>
							</td>

          		<td width="5">
          		</td>

    					<td>
              	<div id="VALIDATIONRESPONSE.medium_timing_id"></div>
              </td>

						</tr>
    				<!-- END select/dropdown form element -->





     		    <!-- date range element -->
           	<tr>
    					<td class="formControl_label_TRANSACTION">
    						&nbsp;&nbsp;Campaign Start
    					</td>

           		<td height="25">
							<table>
								<tr>

									<td>
               			<select name="form_transaction_new.booking.ts_start_month" id="form_transaction_new.booking.ts_start_month" class="formControl_input" style="width: 80px; <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true && $_RESULT_TRANS['ts_start'] != '0' && $_RESULT_TRANS['medium_id'] > 1 ? '':'visibility: hidden;'); ?>" tabindex="1">
               				<option id="form_transaction_new.booking.ts_start_month-nan" value="nan">Month</option>
               				<option id="form_transaction_new.booking.ts_start_month-jan" value="01" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('m',$_RESULT_TRANS['ts_start']) == '01'?'selected':'') : (date('m',time()) == '01'?'selected':'')  ); ?>>Jan</option>
               				<option id="form_transaction_new.booking.ts_start_month-feb" value="02" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('m',$_RESULT_TRANS['ts_start']) == '02'?'selected':'') : (date('m',time()) == '02'?'selected':'')  ); ?>>Feb</option>
               				<option id="form_transaction_new.booking.ts_start_month-march" value="03" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('m',$_RESULT_TRANS['ts_start']) == '03'?'selected':'') : (date('m',time()) == '03'?'selected':'')  ); ?>>Mar</option>
               				<option id="form_transaction_new.booking.ts_start_month-april" value="04" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('m',$_RESULT_TRANS['ts_start']) == '04'?'selected':'') : (date('m',time()) == '04'?'selected':'')  ); ?>>Apr</option>
               				<option id="form_transaction_new.booking.ts_start_month-may" value="05" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('m',$_RESULT_TRANS['ts_start']) == '05'?'selected':'') : (date('m',time()) == '05'?'selected':'')  ); ?>>May</option>
               				<option id="form_transaction_new.booking.ts_start_month-june" value="06" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('m',$_RESULT_TRANS['ts_start']) == '06'?'selected':'') : (date('m',time()) == '06'?'selected':'')  ); ?>>Jun</option>
               				<option id="form_transaction_new.booking.ts_start_month-july" value="07" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('m',$_RESULT_TRANS['ts_start']) == '07'?'selected':'') : (date('m',time()) == '07'?'selected':'')  ); ?>>Jul</option> 
               				<option id="form_transaction_new.booking.ts_start_month-august" value="08" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('m',$_RESULT_TRANS['ts_start']) == '08'?'selected':'') : (date('m',time()) == '08'?'selected':'')  ); ?>>Aug</option> 
               				<option id="form_transaction_new.booking.ts_start_month-sep" value="09" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('m',$_RESULT_TRANS['ts_start']) == '09'?'selected':'') : (date('m',time()) == '09'?'selected':'')  ); ?>>Sep</option> 
               				<option id="form_transaction_new.booking.ts_start_month-oct" value="10" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('m',$_RESULT_TRANS['ts_start']) == '10'?'selected':'') : (date('m',time()) == '10'?'selected':'')  ); ?>>Oct</option> 
               				<option id="form_transaction_new.booking.ts_start_month-nov" value="11" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('m',$_RESULT_TRANS['ts_start']) == '11'?'selected':'') : (date('m',time()) == '11'?'selected':'')  ); ?>>Nov</option> 
               				<option id="form_transaction_new.booking.ts_start_month-dec" value="12" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('m',$_RESULT_TRANS['ts_start']) == '12'?'selected':'') : (date('m',time()) == '12'?'selected':'')  ); ?>>Dec</option> 
               			</select>
               		</td>
									<td>
               			<select name="form_transaction_new.booking.ts_start_day" id="form_transaction_new.booking.ts_start_day" class="formControl_input" style="width: 70px; <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true && $_RESULT_TRANS['ts_start'] != '0' && $_RESULT_TRANS['medium_id'] > 1 ? '':'visibility: hidden;'); ?>" tabindex="2">
               				<option id="form_transaction_new.booking.ts_start_day-nan" value="nan">Day</option>
               				<option id="form_transaction_new.booking.ts_start_day-1" value="01" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['ts_start']) == '01'?'selected':'') : (date('d',time()) == '01'?'selected':'')  ); ?>>1</option>
               				<option id="form_transaction_new.booking.ts_start_day-2" value="02" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['ts_start']) == '02'?'selected':'') : (date('d',time()) == '02'?'selected':'')  ); ?>>2</option>
               				<option id="form_transaction_new.booking.ts_start_day-3" value="03" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['ts_start']) == '03'?'selected':'') : (date('d',time()) == '03'?'selected':'')  ); ?>>3</option>
               				<option id="form_transaction_new.booking.ts_start_day-4" value="04" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['ts_start']) == '04'?'selected':'') : (date('d',time()) == '04'?'selected':'')  ); ?>>4</option>
               				<option id="form_transaction_new.booking.ts_start_day-5" value="05" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['ts_start']) == '05'?'selected':'') : (date('d',time()) == '05'?'selected':'')  ); ?>>5</option>
               				<option id="form_transaction_new.booking.ts_start_day-6" value="06" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['ts_start']) == '06'?'selected':'') : (date('d',time()) == '06'?'selected':'')  ); ?>>6</option>
               				<option id="form_transaction_new.booking.ts_start_day-7" value="07" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['ts_start']) == '07'?'selected':'') : (date('d',time()) == '07'?'selected':'')  ); ?>>7</option>
               				<option id="form_transaction_new.booking.ts_start_day-8" value="08" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['ts_start']) == '08'?'selected':'') : (date('d',time()) == '08'?'selected':'')  ); ?>>8</option>
               				<option id="form_transaction_new.booking.ts_start_day-9" value="09" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['ts_start']) == '09'?'selected':'') : (date('d',time()) == '09'?'selected':'')  ); ?>>9</option>
               				<option id="form_transaction_new.booking.ts_start_day-10" value="10" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['ts_start']) == '10'?'selected':'') : (date('d',time()) == '10'?'selected':'')  ); ?>>10</option>
               				<option id="form_transaction_new.booking.ts_start_day-11" value="11" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['ts_start']) == '11'?'selected':'') : (date('d',time()) == '11'?'selected':'')  ); ?>>11</option>
               				<option id="form_transaction_new.booking.ts_start_day-12" value="12" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['ts_start']) == '12'?'selected':'') : (date('d',time()) == '12'?'selected':'')  ); ?>>12</option>
               				<option id="form_transaction_new.booking.ts_start_day-13" value="13" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['ts_start']) == '13'?'selected':'') : (date('d',time()) == '13'?'selected':'')  ); ?>>13</option>
               				<option id="form_transaction_new.booking.ts_start_day-14" value="14" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['ts_start']) == '14'?'selected':'') : (date('d',time()) == '14'?'selected':'')  ); ?>>14</option>
               				<option id="form_transaction_new.booking.ts_start_day-15" value="15" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['ts_start']) == '15'?'selected':'') : (date('d',time()) == '15'?'selected':'')  ); ?>>15</option>
               				<option id="form_transaction_new.booking.ts_start_day-16" value="16" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['ts_start']) == '16'?'selected':'') : (date('d',time()) == '16'?'selected':'')  ); ?>>16</option>
               				<option id="form_transaction_new.booking.ts_start_day-17" value="17" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['ts_start']) == '17'?'selected':'') : (date('d',time()) == '17'?'selected':'')  ); ?>>17</option>
               				<option id="form_transaction_new.booking.ts_start_day-18" value="18" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['ts_start']) == '18'?'selected':'') : (date('d',time()) == '18'?'selected':'')  ); ?>>18</option>
               				<option id="form_transaction_new.booking.ts_start_day-19" value="19" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['ts_start']) == '19'?'selected':'') : (date('d',time()) == '19'?'selected':'')  ); ?>>19</option>
               				<option id="form_transaction_new.booking.ts_start_day-20" value="20" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['ts_start']) == '20'?'selected':'') : (date('d',time()) == '20'?'selected':'')  ); ?>>20</option>
               				<option id="form_transaction_new.booking.ts_start_day-21" value="21" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['ts_start']) == '21'?'selected':'') : (date('d',time()) == '21'?'selected':'')  ); ?>>21</option>
               				<option id="form_transaction_new.booking.ts_start_day-22" value="22" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['ts_start']) == '22'?'selected':'') : (date('d',time()) == '22'?'selected':'')  ); ?>>22</option>
               				<option id="form_transaction_new.booking.ts_start_day-23" value="23" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['ts_start']) == '23'?'selected':'') : (date('d',time()) == '23'?'selected':'')  ); ?>>23</option>
               				<option id="form_transaction_new.booking.ts_start_day-24" value="24" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['ts_start']) == '24'?'selected':'') : (date('d',time()) == '24'?'selected':'')  ); ?>>24</option>
               				<option id="form_transaction_new.booking.ts_start_day-25" value="25" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['ts_start']) == '25'?'selected':'') : (date('d',time()) == '25'?'selected':'')  ); ?>>25</option>
               				<option id="form_transaction_new.booking.ts_start_day-26" value="26" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['ts_start']) == '26'?'selected':'') : (date('d',time()) == '26'?'selected':'')  ); ?>>26</option>
               				<option id="form_transaction_new.booking.ts_start_day-27" value="27" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['ts_start']) == '27'?'selected':'') : (date('d',time()) == '27'?'selected':'')  ); ?>>27</option>
               				<option id="form_transaction_new.booking.ts_start_day-28" value="27" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['ts_start']) == '28'?'selected':'') : (date('d',time()) == '28'?'selected':'')  ); ?>>28</option>
               				<option id="form_transaction_new.booking.ts_start_day-29" value="29" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['ts_start']) == '29'?'selected':'') : (date('d',time()) == '29'?'selected':'')  ); ?>>29</option>
               				<option id="form_transaction_new.booking.ts_start_day-30" value="30" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['ts_start']) == '30'?'selected':'') : (date('d',time()) == '30'?'selected':'')  ); ?>>30</option>
               				<option id="form_transaction_new.booking.ts_start_day-31" value="31" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['ts_start']) == '31'?'selected':'') : (date('d',time()) == '31'?'selected':'')  ); ?>>31</option>
               			</select>
               		</td>
									<td>
          			   		<select name="form_transaction_new.booking.ts_start_year" id="form_transaction_new.booking.ts_start_year" class="formControl_input" style="width: 70px; <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true && $_RESULT_TRANS['ts_start'] != '0' && $_RESULT_TRANS['medium_id'] > 1 ? '':'visibility: hidden;'); ?>" tabindex="3">
											 <option value="nan" id="form_transaction_new.booking.ts_start_year-nan">Year</option>
              				 <option value="2013" id="form_transaction_new.booking.ts_start_year-2013" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('Y',$_RESULT_TRANS['ts_start']) == '2013'?'selected':'') : (date('Y',time()) == '2013'?'selected':'')  ); ?>>2013</option>
              				 <option value="2012" id="form_transaction_new.booking.ts_start_year-2012" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('Y',$_RESULT_TRANS['ts_start']) == '2012'?'selected':'') : (date('Y',time()) == '2012'?'selected':'')  ); ?>>2012</option>
              				 <option value="2011" id="form_transaction_new.booking.ts_start_year-2011" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('Y',$_RESULT_TRANS['ts_start']) == '2011'?'selected':'') : (date('Y',time()) == '2011'?'selected':'')  ); ?>>2011</option>
              				 <option value="2010" id="form_transaction_new.booking.ts_start_year-2010" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('Y',$_RESULT_TRANS['ts_start']) == '2010'?'selected':'') : (date('Y',time()) == '2010'?'selected':'')  ); ?>>2010</option>
              				 <option value="2009" id="form_transaction_new.booking.ts_start_year-2009" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('Y',$_RESULT_TRANS['ts_start']) == '2009'?'selected':'') : (date('Y',time()) == '2009'?'selected':'')  ); ?>>2009</option>
               			</select>
            				</td>
            			</tr>
           		</table>
           		</td>

           		<td width="5">
           		</td>
 
     					<td>
               	<div id="VALIDATIONRESPONSE.ts_start"></div>
               </td>
           	</tr>

           	<!-- date range element -->









     		    <!-- date range element -->
           	<tr>
    					<td class="formControl_label_TRANSACTION">
    						&nbsp;&nbsp;Campaign End
    					</td>

           		<td height="25">
							<table>
								<tr>
									<td>
               			<select name="form_transaction_new.booking.ts_end_month" id="form_transaction_new.booking.ts_end_month" class="formControl_input" style="width: 80px; <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true && $_RESULT_TRANS['ts_end'] != '0' && $_RESULT_TRANS['medium_id'] > 1 ? '':'visibility: hidden;'); ?>" tabindex="9">
               				<option id="form_transaction_new.booking.ts_end_month-nan" value="nan" >Month</option>
               				<option id="form_transaction_new.booking.ts_end_month-jan" value="01" <? echo (date('m',time()) == '01'?'selected':''); ?>>Jan</option>
               				<option id="form_transaction_new.booking.ts_end_month-feb" value="02" <? echo (date('m',time()) == '02'?'selected':''); ?>>Feb</option>
               				<option id="form_transaction_new.booking.ts_end_month-march" value="03" <? echo (date('m',time()) == '03'?'selected':''); ?>>Mar</option>
               				<option id="form_transaction_new.booking.ts_end_month-april" value="04" <? echo (date('m',time()) == '04'?'selected':''); ?>>Apr</option>
               				<option id="form_transaction_new.booking.ts_end_month-may" value="05" <? echo (date('m',time()) == '05'?'selected':''); ?>>May</option>
               				<option id="form_transaction_new.booking.ts_end_month-june" value="06" <? echo (date('m',time()) == '06'?'selected':''); ?>>Jun</option>
               				<option id="form_transaction_new.booking.ts_end_month-july" value="07" <? echo (date('m',time()) == '07'?'selected':''); ?>>Jul</option> 
               				<option id="form_transaction_new.booking.ts_end_month-august" value="08" <? echo (date('m',time()) == '08'?'selected':''); ?>>Aug</option> 
               				<option id="form_transaction_new.booking.ts_end_month-sep" value="09" <? echo (date('m',time()) == '09'?'selected':''); ?>>Sep</option> 
               				<option id="form_transaction_new.booking.ts_end_month-oct" value="10" <? echo (date('m',time()) == '10'?'selected':''); ?>>Oct</option> 
               				<option id="form_transaction_new.booking.ts_end_month-nov" value="11" <? echo (date('m',time()) == '11'?'selected':''); ?>>Nov</option> 
               				<option id="form_transaction_new.booking.ts_end_month-dec" value="12" <? echo (date('m',time()) == '12'?'selected':''); ?>>Dec</option> 
               			</select>
               		</td>
									<td>
               			<select name="form_transaction_new.booking.ts_end_day" id="form_transaction_new.booking.ts_end_day" class="formControl_input" style="width: 70px; <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true && $_RESULT_TRANS['ts_end'] != '0' && $_RESULT_TRANS['medium_id'] > 1 ? '':'visibility: hidden;'); ?>" tabindex="10">
               				<option id="form_transaction_new.booking.ts_end_day-nan" value="nan" selected>Day</option>
               				<option id="form_transaction_new.booking.ts_end_day-1" value="01" <? echo (date('d',time()) == '01'?'selected':''); ?>>1</option>
               				<option id="form_transaction_new.booking.ts_end_day-2" value="02" <? echo (date('d',time()) == '02'?'selected':''); ?>>2</option>
               				<option id="form_transaction_new.booking.ts_end_day-3" value="03" <? echo (date('d',time()) == '03'?'selected':''); ?>>3</option>
               				<option id="form_transaction_new.booking.ts_end_day-4" value="04" <? echo (date('d',time()) == '04'?'selected':''); ?>>4</option>
               				<option id="form_transaction_new.booking.ts_end_day-5" value="05" <? echo (date('d',time()) == '05'?'selected':''); ?>>5</option>
               				<option id="form_transaction_new.booking.ts_end_day-6" value="06" <? echo (date('d',time()) == '06'?'selected':''); ?>>6</option>
               				<option id="form_transaction_new.booking.ts_end_day-7" value="07" <? echo (date('d',time()) == '07'?'selected':''); ?>>7</option>
               				<option id="form_transaction_new.booking.ts_end_day-8" value="08" <? echo (date('d',time()) == '08'?'selected':''); ?>>8</option>
               				<option id="form_transaction_new.booking.ts_end_day-9" value="09" <? echo (date('d',time()) == '09'?'selected':''); ?>>9</option>
               				<option id="form_transaction_new.booking.ts_end_day-10" value="10" <? echo (date('d',time()) == '10'?'selected':''); ?>>10</option>
               				<option id="form_transaction_new.booking.ts_end_day-11" value="11" <? echo (date('d',time()) == '11'?'selected':''); ?>>11</option>
               				<option id="form_transaction_new.booking.ts_end_day-12" value="12" <? echo (date('d',time()) == '12'?'selected':''); ?>>12</option>
               				<option id="form_transaction_new.booking.ts_end_day-13" value="13" <? echo (date('d',time()) == '13'?'selected':''); ?>>13</option>
               				<option id="form_transaction_new.booking.ts_end_day-14" value="14" <? echo (date('d',time()) == '14'?'selected':''); ?>>14</option>
               				<option id="form_transaction_new.booking.ts_end_day-15" value="15" <? echo (date('d',time()) == '15'?'selected':''); ?>>15</option>
               				<option id="form_transaction_new.booking.ts_end_day-16" value="16" <? echo (date('d',time()) == '16'?'selected':''); ?>>16</option>
               				<option id="form_transaction_new.booking.ts_end_day-17" value="17" <? echo (date('d',time()) == '17'?'selected':''); ?>>17</option>
               				<option id="form_transaction_new.booking.ts_end_day-18" value="18" <? echo (date('d',time()) == '18'?'selected':''); ?>>18</option>
               				<option id="form_transaction_new.booking.ts_end_day-19" value="19" <? echo (date('d',time()) == '19'?'selected':''); ?>>19</option>
               				<option id="form_transaction_new.booking.ts_end_day-20" value="20" <? echo (date('d',time()) == '20'?'selected':''); ?>>20</option>
               				<option id="form_transaction_new.booking.ts_end_day-21" value="21" <? echo (date('d',time()) == '21'?'selected':''); ?>>21</option>
               				<option id="form_transaction_new.booking.ts_end_day-22" value="22" <? echo (date('d',time()) == '22'?'selected':''); ?>>22</option>
               				<option id="form_transaction_new.booking.ts_end_day-23" value="23" <? echo (date('d',time()) == '23'?'selected':''); ?>>23</option>
               				<option id="form_transaction_new.booking.ts_end_day-24" value="24" <? echo (date('d',time()) == '24'?'selected':''); ?>>24</option>
               				<option id="form_transaction_new.booking.ts_end_day-25" value="25" <? echo (date('d',time()) == '25'?'selected':''); ?>>25</option>
               				<option id="form_transaction_new.booking.ts_end_day-26" value="26" <? echo (date('d',time()) == '26'?'selected':''); ?>>26</option>
               				<option id="form_transaction_new.booking.ts_end_day-27" value="27" <? echo (date('d',time()) == '27'?'selected':''); ?>>27</option>
               				<option id="form_transaction_new.booking.ts_end_day-28" value="27" <? echo (date('d',time()) == '27'?'selected':''); ?>>28</option>
               				<option id="form_transaction_new.booking.ts_end_day-29" value="29" <? echo (date('d',time()) == '29'?'selected':''); ?>>29</option>
               				<option id="form_transaction_new.booking.ts_end_day-30" value="30" <? echo (date('d',time()) == '30'?'selected':''); ?>>30</option>
               				<option id="form_transaction_new.booking.ts_end_day-31" value="31" <? echo (date('d',time()) == '31'?'selected':''); ?>>31</option>
               			</select>
               		</td>
									<td>
          			   		<select name="form_transaction_new.booking.ts_end_year" id="form_transaction_new.booking.ts_end_year" class="formControl_input" style="width: 70px; <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true && $_RESULT_TRANS['ts_end'] != '0' && $_RESULT_TRANS['medium_id'] > 1 ? '':'visibility: hidden;'); ?>" tabindex="11">
											 <option value="nan" id="form_transaction_new.booking.ts_end_year-nan">Year</option>
              				 <option value="2013" id="form_transaction_new.booking.ts_end_year-2013" <? echo (date('Y',time()) == '2013'?'selected':''); ?>>2013</option>
              				 <option value="2012" id="form_transaction_new.booking.ts_end_year-2012" <? echo (date('Y',time()) == '2012'?'selected':''); ?>>2012</option>
              				 <option value="2011" id="form_transaction_new.booking.ts_end_year-2011" <? echo (date('Y',time()) == '2011'?'selected':''); ?>>2011</option>
              				 <option value="2010" id="form_transaction_new.booking.ts_end_year-2010" <? echo (date('Y',time()) == '2010'?'selected':''); ?>>2010</option>
              				 <option value="2009" id="form_transaction_new.booking.ts_end_year-2009" <? echo (date('Y',time()) == '2009'?'selected':''); ?>>2009</option>
               			</select>
            				</td>
            			</tr>
           		</table>
           		</td>

           		<td width="5">
           		</td>
 
     					<td>
               	<div id="VALIDATIONRESPONSE.ts_end"></div>
               </td>
           	</tr>

           	<!-- date range element -->




     		    <!-- date range element -->
           	<tr>
    					<td class="formControl_label_TRANSACTION" width=100>
    						&nbsp;&nbsp;Issue
    					</td>

           		<td height="25">
							<table>
								<tr>
									<td>
               			<select name="form_transaction_new.booking.issue_month" id="form_transaction_new.booking.issue_month" class="formControl_input" style="width: 80px;" tabindex="1">
               				<option id="form_transaction_new.booking.issue_month-nan" value="nan" >Month</option>
               				<option id="form_transaction_new.booking.issue_month-jan" value="01" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('m',$_RESULT_TRANS['issue']) == '01'?'selected':'') : (date('m',time()) == '01'?'selected':'')  ); ?>>Jan</option>
               				<option id="form_transaction_new.booking.issue_month-feb" value="02" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('m',$_RESULT_TRANS['issue']) == '02'?'selected':'') : (date('m',time()) == '02'?'selected':'')  ); ?>>Feb</option>
               				<option id="form_transaction_new.booking.issue_month-march" value="03" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('m',$_RESULT_TRANS['issue']) == '03'?'selected':'') : (date('m',time()) == '03'?'selected':'')  ); ?>>Mar</option>
               				<option id="form_transaction_new.booking.issue_month-april" value="04" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('m',$_RESULT_TRANS['issue']) == '04'?'selected':'') : (date('m',time()) == '04'?'selected':'')  ); ?>>Apr</option>
               				<option id="form_transaction_new.booking.issue_month-may" value="05" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('m',$_RESULT_TRANS['issue']) == '05'?'selected':'') : (date('m',time()) == '05'?'selected':'')  ); ?>>May</option>
               				<option id="form_transaction_new.booking.issue_month-june" value="06" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('m',$_RESULT_TRANS['issue']) == '06'?'selected':'') : (date('m',time()) == '06'?'selected':'')  ); ?>>Jun</option>
               				<option id="form_transaction_new.booking.issue_month-july" value="07" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('m',$_RESULT_TRANS['issue']) == '07'?'selected':'') : (date('m',time()) == '07'?'selected':'')  ); ?>>Jul</option> 
               				<option id="form_transaction_new.booking.issue_month-august" value="08" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('m',$_RESULT_TRANS['issue']) == '08'?'selected':'') : (date('m',time()) == '08'?'selected':'')  ); ?>>Aug</option> 
               				<option id="form_transaction_new.booking.issue_month-sep" value="09" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('m',$_RESULT_TRANS['issue']) == '09'?'selected':'') : (date('m',time()) == '09'?'selected':'')  ); ?>>Sep</option> 
               				<option id="form_transaction_new.booking.issue_month-oct" value="10" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('m',$_RESULT_TRANS['issue']) == '10'?'selected':'') : (date('m',time()) == '10'?'selected':'')  ); ?>>Oct</option> 
               				<option id="form_transaction_new.booking.issue_month-nov" value="11" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('m',$_RESULT_TRANS['issue']) == '11'?'selected':'') : (date('m',time()) == '11'?'selected':'')  ); ?>>Nov</option> 
               				<option id="form_transaction_new.booking.issue_month-dec" value="12" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('m',$_RESULT_TRANS['issue']) == '12'?'selected':'') : (date('m',time()) == '12'?'selected':'')  ); ?>>Dec</option> 
               			</select>
               		</td>
									<td>
               			<select name="form_transaction_new.booking.issue_day" id="form_transaction_new.booking.issue_day" class="formControl_input" style="width: 70px;" tabindex="2">
               				<option id="form_transaction_new.booking.issue_day-nan" value="nan">Day</option>
               				<option id="form_transaction_new.booking.issue_day-1" value="01" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['issue']) == '01'?'selected':'') : (date('d',time()) == '01'?'selected':'')  ); ?>>1</option>
               				<option id="form_transaction_new.booking.issue_day-2" value="02" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['issue']) == '02'?'selected':'') : (date('d',time()) == '02'?'selected':'')  ); ?>>2</option>
               				<option id="form_transaction_new.booking.issue_day-3" value="03" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['issue']) == '03'?'selected':'') : (date('d',time()) == '03'?'selected':'')  ); ?>>3</option>
               				<option id="form_transaction_new.booking.issue_day-4" value="04" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['issue']) == '04'?'selected':'') : (date('d',time()) == '04'?'selected':'')  ); ?>>4</option>
               				<option id="form_transaction_new.booking.issue_day-5" value="05" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['issue']) == '05'?'selected':'') : (date('d',time()) == '05'?'selected':'')  ); ?>>5</option>
               				<option id="form_transaction_new.booking.issue_day-6" value="06" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['issue']) == '06'?'selected':'') : (date('d',time()) == '06'?'selected':'')  ); ?>>6</option>
               				<option id="form_transaction_new.booking.issue_day-7" value="07" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['issue']) == '07'?'selected':'') : (date('d',time()) == '07'?'selected':'')  ); ?>>7</option>
               				<option id="form_transaction_new.booking.issue_day-8" value="08" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['issue']) == '08'?'selected':'') : (date('d',time()) == '08'?'selected':'')  ); ?>>8</option>
               				<option id="form_transaction_new.booking.issue_day-9" value="09" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['issue']) == '09'?'selected':'') : (date('d',time()) == '09'?'selected':'')  ); ?>>9</option>
               				<option id="form_transaction_new.booking.issue_day-10" value="10" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['issue']) == '10'?'selected':'') : (date('d',time()) == '10'?'selected':'')  ); ?>>10</option>
               				<option id="form_transaction_new.booking.issue_day-11" value="11" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['issue']) == '11'?'selected':'') : (date('d',time()) == '11'?'selected':'')  ); ?>>11</option>
               				<option id="form_transaction_new.booking.issue_day-12" value="12" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['issue']) == '12'?'selected':'') : (date('d',time()) == '12'?'selected':'')  ); ?>>12</option>
               				<option id="form_transaction_new.booking.issue_day-13" value="13" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['issue']) == '13'?'selected':'') : (date('d',time()) == '13'?'selected':'')  ); ?>>13</option>
               				<option id="form_transaction_new.booking.issue_day-14" value="14" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['issue']) == '14'?'selected':'') : (date('d',time()) == '14'?'selected':'')  ); ?>>14</option>
               				<option id="form_transaction_new.booking.issue_day-15" value="15" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['issue']) == '15'?'selected':'') : (date('d',time()) == '15'?'selected':'')  ); ?>>15</option>
               				<option id="form_transaction_new.booking.issue_day-16" value="16" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['issue']) == '16'?'selected':'') : (date('d',time()) == '16'?'selected':'')  ); ?>>16</option>
               				<option id="form_transaction_new.booking.issue_day-17" value="17" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['issue']) == '17'?'selected':'') : (date('d',time()) == '17'?'selected':'')  ); ?>>17</option>
               				<option id="form_transaction_new.booking.issue_day-18" value="18" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['issue']) == '18'?'selected':'') : (date('d',time()) == '18'?'selected':'')  ); ?>>18</option>
               				<option id="form_transaction_new.booking.issue_day-19" value="19" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['issue']) == '19'?'selected':'') : (date('d',time()) == '19'?'selected':'')  ); ?>>19</option>
               				<option id="form_transaction_new.booking.issue_day-20" value="20" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['issue']) == '20'?'selected':'') : (date('d',time()) == '20'?'selected':'')  ); ?>>20</option>
               				<option id="form_transaction_new.booking.issue_day-21" value="21" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['issue']) == '21'?'selected':'') : (date('d',time()) == '21'?'selected':'')  ); ?>>21</option>
               				<option id="form_transaction_new.booking.issue_day-22" value="22" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['issue']) == '22'?'selected':'') : (date('d',time()) == '22'?'selected':'')  ); ?>>22</option>
               				<option id="form_transaction_new.booking.issue_day-23" value="23" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['issue']) == '23'?'selected':'') : (date('d',time()) == '23'?'selected':'')  ); ?>>23</option>
               				<option id="form_transaction_new.booking.issue_day-24" value="24" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['issue']) == '24'?'selected':'') : (date('d',time()) == '24'?'selected':'')  ); ?>>24</option>
               				<option id="form_transaction_new.booking.issue_day-25" value="25" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['issue']) == '25'?'selected':'') : (date('d',time()) == '25'?'selected':'')  ); ?>>25</option>
               				<option id="form_transaction_new.booking.issue_day-26" value="26" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['issue']) == '26'?'selected':'') : (date('d',time()) == '26'?'selected':'')  ); ?>>26</option>
               				<option id="form_transaction_new.booking.issue_day-27" value="27" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['issue']) == '27'?'selected':'') : (date('d',time()) == '27'?'selected':'')  ); ?>>27</option>
               				<option id="form_transaction_new.booking.issue_day-28" value="27" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['issue']) == '28'?'selected':'') : (date('d',time()) == '28'?'selected':'')  ); ?>>28</option>
               				<option id="form_transaction_new.booking.issue_day-29" value="29" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['issue']) == '29'?'selected':'') : (date('d',time()) == '29'?'selected':'')  ); ?>>29</option>
               				<option id="form_transaction_new.booking.issue_day-30" value="30" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['issue']) == '30'?'selected':'') : (date('d',time()) == '30'?'selected':'')  ); ?>>30</option>
               				<option id="form_transaction_new.booking.issue_day-31" value="31" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('d',$_RESULT_TRANS['issue']) == '31'?'selected':'') : (date('d',time()) == '31'?'selected':'')  ); ?>>31</option>
               			</select>
               		</td>
									<td>
          			   		<select name="form_transaction_new.booking.issue_year" id="form_transaction_new.booking.issue_year" class="formControl_input" style="width: 70px;" tabindex="3">
											 <option value="nan" id="form_transaction_new.booking.issue_year-nan">Year</option>
              				 <option value="2013" id="form_transaction_new.booking.issue_year-2013" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('Y',$_RESULT_TRANS['issue']) == '2013'?'selected':'') : (date('Y',time()) == '2013'?'selected':'')  ); ?>>2013</option>
              				 <option value="2012" id="form_transaction_new.booking.issue_year-2012" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('Y',$_RESULT_TRANS['issue']) == '2012'?'selected':'') : (date('Y',time()) == '2012'?'selected':'')  ); ?>>2012</option>
              				 <option value="2011" id="form_transaction_new.booking.issue_year-2011" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('Y',$_RESULT_TRANS['issue']) == '2011'?'selected':'') : (date('Y',time()) == '2011'?'selected':'')  ); ?>>2011</option>
              				 <option value="2010" id="form_transaction_new.booking.issue_year-2010" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('Y',$_RESULT_TRANS['issue']) == '2010'?'selected':'') : (date('Y',time()) == '2010'?'selected':'')  ); ?>>2010</option>
              				 <option value="2009" id="form_transaction_new.booking.issue_year-2009" <? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? (date('Y',$_RESULT_TRANS['issue']) == '2009'?'selected':'') : (date('Y',time()) == '2009'?'selected':'')  ); ?>>2009</option>
               			</select>
            				</td>
            			</tr>
           		</table>
           		</td>

           		<td width="5">
           		</td>
 
     					<td>
               	<div id="VALIDATIONRESPONSE.issue"></div>
               </td>
           	</tr>

           	<!-- date range element -->





     		    <!-- date range element -->
           	<tr>
    					<td class="formControl_label_TRANSACTION">
    						&nbsp;&nbsp;On Sale Date
    					</td>

           		<td height="25">
							<table>
								<tr>
									<td>
               			<select name="form_transaction_new.booking.date_on_sale_month" id="form_transaction_new.booking.date_on_sale_month" class="formControl_input" style="width: 80px;" tabindex="12">
               				<option id="form_transaction_new.booking.date_on_sale_month-nan" value="nan" >Month</option>
               				<option id="form_transaction_new.booking.date_on_sale_month-jan" value="01" <? echo (date('m',time()) == '01'?'selected':''); ?>>Jan</option>
               				<option id="form_transaction_new.booking.date_on_sale_month-feb" value="02" <? echo (date('m',time()) == '02'?'selected':''); ?>>Feb</option>
               				<option id="form_transaction_new.booking.date_on_sale_month-march" value="03" <? echo (date('m',time()) == '03'?'selected':''); ?>>Mar</option>
               				<option id="form_transaction_new.booking.date_on_sale_month-april" value="04" <? echo (date('m',time()) == '04'?'selected':''); ?>>Apr</option>
               				<option id="form_transaction_new.booking.date_on_sale_month-may" value="05" <? echo (date('m',time()) == '05'?'selected':''); ?>>May</option>
               				<option id="form_transaction_new.booking.date_on_sale_month-june" value="06" <? echo (date('m',time()) == '06'?'selected':''); ?>>Jun</option>
               				<option id="form_transaction_new.booking.date_on_sale_month-july" value="07" <? echo (date('m',time()) == '07'?'selected':''); ?>>Jul</option> 
               				<option id="form_transaction_new.booking.date_on_sale_month-august" value="08" <? echo (date('m',time()) == '08'?'selected':''); ?>>Aug</option> 
               				<option id="form_transaction_new.booking.date_on_sale_month-sep" value="09" <? echo (date('m',time()) == '09'?'selected':''); ?>>Sep</option> 
               				<option id="form_transaction_new.booking.date_on_sale_month-oct" value="10" <? echo (date('m',time()) == '10'?'selected':''); ?>>Oct</option> 
               				<option id="form_transaction_new.booking.date_on_sale_month-nov" value="11" <? echo (date('m',time()) == '11'?'selected':''); ?>>Nov</option> 
               				<option id="form_transaction_new.booking.date_on_sale_month-dec" value="12" <? echo (date('m',time()) == '12'?'selected':''); ?>>Dec</option> 
               			</select>
               		</td>
									<td>
               			<select name="form_transaction_new.booking.date_on_sale_day" id="form_transaction_new.booking.date_on_sale_day" class="formControl_input" style="width: 70px;" tabindex="13">
               				<option id="form_transaction_new.booking.date_on_sale_day-nan" value="nan" selected>Day</option>
               				<option id="form_transaction_new.booking.date_on_sale_day-1" value="01" <? echo (date('d',time()) == '01'?'selected':''); ?>>1</option>
               				<option id="form_transaction_new.booking.date_on_sale_day-2" value="02" <? echo (date('d',time()) == '02'?'selected':''); ?>>2</option>
               				<option id="form_transaction_new.booking.date_on_sale_day-3" value="03" <? echo (date('d',time()) == '03'?'selected':''); ?>>3</option>
               				<option id="form_transaction_new.booking.date_on_sale_day-4" value="04" <? echo (date('d',time()) == '04'?'selected':''); ?>>4</option>
               				<option id="form_transaction_new.booking.date_on_sale_day-5" value="05" <? echo (date('d',time()) == '05'?'selected':''); ?>>5</option>
               				<option id="form_transaction_new.booking.date_on_sale_day-6" value="06" <? echo (date('d',time()) == '06'?'selected':''); ?>>6</option>
               				<option id="form_transaction_new.booking.date_on_sale_day-7" value="07" <? echo (date('d',time()) == '07'?'selected':''); ?>>7</option>
               				<option id="form_transaction_new.booking.date_on_sale_day-8" value="08" <? echo (date('d',time()) == '08'?'selected':''); ?>>8</option>
               				<option id="form_transaction_new.booking.date_on_sale_day-9" value="09" <? echo (date('d',time()) == '09'?'selected':''); ?>>9</option>
               				<option id="form_transaction_new.booking.date_on_sale_day-10" value="10" <? echo (date('d',time()) == '10'?'selected':''); ?>>10</option>
               				<option id="form_transaction_new.booking.date_on_sale_day-11" value="11" <? echo (date('d',time()) == '11'?'selected':''); ?>>11</option>
               				<option id="form_transaction_new.booking.date_on_sale_day-12" value="12" <? echo (date('d',time()) == '12'?'selected':''); ?>>12</option>
               				<option id="form_transaction_new.booking.date_on_sale_day-13" value="13" <? echo (date('d',time()) == '13'?'selected':''); ?>>13</option>
               				<option id="form_transaction_new.booking.date_on_sale_day-14" value="14" <? echo (date('d',time()) == '14'?'selected':''); ?>>14</option>
               				<option id="form_transaction_new.booking.date_on_sale_day-15" value="15" <? echo (date('d',time()) == '15'?'selected':''); ?>>15</option>
               				<option id="form_transaction_new.booking.date_on_sale_day-16" value="16" <? echo (date('d',time()) == '16'?'selected':''); ?>>16</option>
               				<option id="form_transaction_new.booking.date_on_sale_day-17" value="17" <? echo (date('d',time()) == '17'?'selected':''); ?>>17</option>
               				<option id="form_transaction_new.booking.date_on_sale_day-18" value="18" <? echo (date('d',time()) == '18'?'selected':''); ?>>18</option>
               				<option id="form_transaction_new.booking.date_on_sale_day-19" value="19" <? echo (date('d',time()) == '19'?'selected':''); ?>>19</option>
               				<option id="form_transaction_new.booking.date_on_sale_day-20" value="20" <? echo (date('d',time()) == '20'?'selected':''); ?>>20</option>
               				<option id="form_transaction_new.booking.date_on_sale_day-21" value="21" <? echo (date('d',time()) == '21'?'selected':''); ?>>21</option>
               				<option id="form_transaction_new.booking.date_on_sale_day-22" value="22" <? echo (date('d',time()) == '22'?'selected':''); ?>>22</option>
               				<option id="form_transaction_new.booking.date_on_sale_day-23" value="23" <? echo (date('d',time()) == '23'?'selected':''); ?>>23</option>
               				<option id="form_transaction_new.booking.date_on_sale_day-24" value="24" <? echo (date('d',time()) == '24'?'selected':''); ?>>24</option>
               				<option id="form_transaction_new.booking.date_on_sale_day-25" value="25" <? echo (date('d',time()) == '25'?'selected':''); ?>>25</option>
               				<option id="form_transaction_new.booking.date_on_sale_day-26" value="26" <? echo (date('d',time()) == '26'?'selected':''); ?>>26</option>
               				<option id="form_transaction_new.booking.date_on_sale_day-27" value="27" <? echo (date('d',time()) == '27'?'selected':''); ?>>27</option>
               				<option id="form_transaction_new.booking.date_on_sale_day-28" value="27" <? echo (date('d',time()) == '27'?'selected':''); ?>>28</option>
               				<option id="form_transaction_new.booking.date_on_sale_day-29" value="29" <? echo (date('d',time()) == '29'?'selected':''); ?>>29</option>
               				<option id="form_transaction_new.booking.date_on_sale_day-30" value="30" <? echo (date('d',time()) == '30'?'selected':''); ?>>30</option>
               				<option id="form_transaction_new.booking.date_on_sale_day-31" value="31" <? echo (date('d',time()) == '31'?'selected':''); ?>>31</option>
               			</select>
               		</td>
									<td>
          			   		<select name="form_transaction_new.booking.date_on_sale_year" id="form_transaction_new.booking.date_on_sale_year" class="formControl_input" style="width: 70px;" tabindex="14">
											 <option value="nan" id="form_transaction_new.booking.date_on_sale_year-nan">Year</option>
              				 <option value="2013" id="form_transaction_new.booking.date_on_sale_year-2013" <? echo (date('Y',time()) == '2013'?'selected':''); ?>>2013</option>
              				 <option value="2012" id="form_transaction_new.booking.date_on_sale_year-2012" <? echo (date('Y',time()) == '2012'?'selected':''); ?>>2012</option>
              				 <option value="2011" id="form_transaction_new.booking.date_on_sale_year-2011" <? echo (date('Y',time()) == '2011'?'selected':''); ?>>2011</option>
              				 <option value="2010" id="form_transaction_new.booking.date_on_sale_year-2010" <? echo (date('Y',time()) == '2010'?'selected':''); ?>>2010</option>
              				 <option value="2009" id="form_transaction_new.booking.date_on_sale_year-2009" <? echo (date('Y',time()) == '2009'?'selected':''); ?>>2009</option>
               			</select>
            				</td>
            			</tr>
           		</table>
           		</td>

           		<td width="5">
           		</td>
 
     					<td>
               	<div id="VALIDATIONRESPONSE.date_on_sale"></div>
               </td>
           	</tr>

           	<!-- date range element -->












	    </table>





		</div>
		<!-- END LEFT -->



















		<!-- RIGHT -->
		<div id="panel_control_2" style="position: absolute; right: 10px; top: 45px; width: 450px; height: 280px; background-color: #414141; color: #ffffff; font-size: 15px; font-weight: normal; border: 1px solid #760000;">

			<!-- title -->
			<div id="panel_title" style="height: 40px; background-color: #760000; color: #ffffff; font-size: 15px; font-weight: bold; border-bottom: 1px solid #656565;">
				<div style="position: absolute; top: 4px; left: 6px;"><h2 style="color: #ffffff;">Stakeholders</h2></div>
			</div>
			<!-- END title -->


			<table class="form_transaction_new" cellpadding="1" cellspacing="0" border="0" width="100%" style="position: absolute; top: 50px; left: 10px;">




    				<!-- form element -->
    				<tr>
    					<td class="formControl_label_TRANSACTION">
    						&nbsp;&nbsp;PO
    					</td>

          		<td>
          			<input id="form_transaction_new.booking.po" tabindex="16" size="25" maxlength="50" type="text" class="formControl_input" autocomplete="off" onblur="SM_Validate(this); clickrecall(this,'PO');" onclick="clickclear(this, 'PO')" onfocus="clickclear(this, 'PO')" onKeyUp="" value="<? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? $_RESULT_TRANS['po'] : 'PO' ); ?>" />
          		</td>

          		<td width="5">
          		</td>

    					<td>
              	<div id="VALIDATIONRESPONSE.po"></div>
              </td>
    				</tr>
    				<!-- END form element -->




    				<!-- form element -->
    				<tr>
    					<td class="formControl_label_TRANSACTION">
    						&nbsp;&nbsp;IO
    					</td>

          		<td>
          			<input id="form_transaction_new.booking.io" tabindex="16" size="25" maxlength="50" type="text" class="formControl_input" autocomplete="off" onblur="SM_Validate(this); clickrecall(this,'IO');" onclick="clickclear(this, 'IO')" onfocus="clickclear(this, 'IO')" onKeyUp="" value="<? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? $_RESULT_TRANS['io'] : 'IO' ); ?>" />
          		</td>

          		<td width="5">
          		</td>

    					<td>
              	<div id="VALIDATIONRESPONSE.io"></div>
              </td>
    				</tr>
    				<!-- END form element -->


    				<!-- select/dropdown form element -->
						<tr>
    					<td class="formControl_label_TRANSACTION">
    						&nbsp;&nbsp;Origin
    					</td>

							<td align="left">
          			<select name="form_transaction_new.booking.origin_id" id="form_transaction_new.booking.origin_id" tabindex="17" onchange="SM_Validate(this);" onblur="SM_Validate(this);" class="formControl_inputSelect">
          				<option value="nan">Select a Origin</option>
                 <?

  								// get data --------------------------
									$ResultArray_ORIGIN			= $obj_Member->GetOrigin();


									foreach($ResultArray_ORIGIN as $_ORIGIN_KEY){
                 		$_ORIGIN_NAME		= strtoupper($_ORIGIN_KEY['name']);
                 		$_ORIGIN_ID			= $_ORIGIN_KEY['id'];
                 		echo '<option value="'.$_ORIGIN_ID.'" '.($_SESSION['ActiveUser']['TransactionEdit'] == true ? ($_RESULT_TRANS['origin_id'] == $_ORIGIN_ID ? 'selected':'') : '' ).' >'.$_ORIGIN_NAME.'</option>';
									}
                 ?>
          			</select>
							</td>

          		<td width="5">
          		</td>

    					<td>
              	<div id="VALIDATIONRESPONSE.origin_id"></div>
              </td>

						</tr>
    				<!-- END select/dropdown form element -->







    				<!-- select/dropdown form element -->
						<tr>
    					<td class="formControl_label_TRANSACTION">
    						&nbsp;&nbsp;Sales Person
    					</td>

							<td align="left">
          			<select name="form_transaction_new.booking.sales_person_id" id="form_transaction_new.booking.sales_person_id" tabindex="18" onchange="SM_Validate(this);" onblur="SM_Validate(this);" class="formControl_inputSelect">
          				<option value="nan">Select a Sales Person</option>
                 <?
	 								// get data --------------------------
									$ResultArray_SalesPeople			= $obj_Member->GetHumanCapital('organization');
									
									foreach($ResultArray_SalesPeople as $_SalesPeople_KEY){
										
										$_UserType						=	$obj_Member->UserID_to_UserType($_SalesPeople_KEY['userid']);
										
                 		$_SalesPeople_NAME		= '('.strtoupper($_UserType->user_type_abbreviation).') '.ucwords($_SalesPeople_KEY['first_name'].' '.$_SalesPeople_KEY['last_name']);
                 		$_SalesPeople_ID			= $_SalesPeople_KEY['userid'];
                 		echo '<option value="'.$_SalesPeople_ID.'" '.($_SESSION['ActiveUser']['TransactionEdit'] == true ? ($_RESULT_TRANS['sales_person_id'] == $_SalesPeople_ID ? 'selected':'') : '' ).' >'.$_SalesPeople_NAME.'</option>';
									}
                 ?>
          			</select>
							</td>

          		<td width="5">
          		</td>

    					<td>
              	<div id="VALIDATIONRESPONSE.sales_person_id"></div>
              </td>

						</tr>
    				<!-- END select/dropdown form element -->



    				<!-- select/dropdown form element -->
						<tr>
    					<td class="formControl_label_TRANSACTION">
    						&nbsp;&nbsp;Team Leader
    					</td>

							<td align="left">
          			<select name="form_transaction_new.booking.manager_id" id="form_transaction_new.booking.manager_id" tabindex="19" onchange="SM_Validate(this);" onblur="SM_Validate(this);" class="formControl_inputSelect">
          				<option value="nan">Select a Team Leader</option>
          				<option value="<? echo $_SESSION['ActiveUser']['userid']; ?> ">No Team Leader / Self</option>
                 <?
	 								// get data --------------------------
									$ResultArray_MANAGERS		= $obj_Member->GetManagers('organization');

									foreach($ResultArray_MANAGERS as $_MANAGERS_KEY){

                 		$_MANAGERS_NAME				= '(MGR) '.ucwords($_MANAGERS_KEY['first_name'].' '.$_MANAGERS_KEY['last_name']);
                 		$_MANAGERS_ID					= $_MANAGERS_KEY['userid'];
                 		echo '<option value="'.$_MANAGERS_ID.'" '.($_SESSION['ActiveUser']['TransactionEdit'] == true ? ($_RESULT_TRANS['manager_id'] == $_MANAGERS_ID ? 'selected':'') : '' ).' >'.$_MANAGERS_NAME.'</option>';
									}
                 ?>
          			</select>
							</td>

          		<td width="5">
          		</td>

    					<td>
              	<div id="VALIDATIONRESPONSE.manager_id"></div>
              </td>

						</tr>
    				<!-- END select/dropdown form element -->








    				<!-- select/dropdown form element -->
						<tr>
    					<td class="formControl_label_TRANSACTION">
    						&nbsp;&nbsp;Client
    					</td>

							<td align="left">
          			<select name="form_transaction_new.booking.client_id" id="form_transaction_new.booking.client_id" tabindex="20" onchange="SM_Validate(this);" onblur="SM_Validate(this);" class="formControl_inputSelect">
          				<option value="nan">Select a Client</option>
                 <?
  								// get data --------------------------
									$ResultArray_Clients			= $obj_Member->GetClients('organization');

									$__BG_COLOR_COUNTER	=	0;
									foreach($ResultArray_Clients as $_Clients_KEY){

       							if($__BG_COLOR_COUNTER%2 == 0){
       								$__SELECT_BG_RGB = '#c9f5ff';
       							}else{
       								$__SELECT_BG_RGB = '#e3ffe0';
       							}

                 		$_Clients_NAME		= ucwords($_Clients_KEY['name']);
                 		$_Clients_ID			= $_Clients_KEY['id'];
                 		echo '<option style="background: '.$__SELECT_BG_RGB.';"  value="'.$_Clients_ID.'" '.($_SESSION['ActiveUser']['TransactionEdit'] == true ? ($_RESULT_TRANS['client_id'] == $_Clients_ID ? 'selected':'') : '' ).' >'.$_Clients_NAME.'</option>';
										$__BG_COLOR_COUNTER++;
									}
                 ?>
          			</select>
							</td>

          		<td width="5">
          		</td>

    					<td>
              	<div id="VALIDATIONRESPONSE.client_id"></div>
              </td>

						</tr>
    				<!-- END select/dropdown form element -->



    				<!-- select/dropdown form element -->
						<tr>
    					<td class="formControl_label_TRANSACTION">
    						&nbsp;&nbsp;Advertiser
    					</td>

							<td align="left">
          			<select name="form_transaction_new.booking.advertiser_id" id="form_transaction_new.booking.advertiser_id" tabindex="21" onchange="SM_Validate(this);" onblur="SM_Validate(this);" class="formControl_inputSelect">
          				<option value="nan">Select an Advertiser</option>
                 <?
  								// get data --------------------------
									$ResultArray_ADVERTISERS			= $obj_Member->GetAdvertisers('organization');

									$__BG_COLOR_COUNTER	=	0;
									foreach($ResultArray_ADVERTISERS as $_ADVERTISERS_KEY){

       							if($__BG_COLOR_COUNTER%2 == 0){
       								$__SELECT_BG_RGB = '#c9f5ff';
       							}else{
       								$__SELECT_BG_RGB = '#e3ffe0';
       							}

                 		$_ADVERTISERS_NAME		= ucwords($_ADVERTISERS_KEY['name']);
                 		$_ADVERTISERS_ID			= $_ADVERTISERS_KEY['id'];
                 		echo '<option style="background: '.$__SELECT_BG_RGB.';" value="'.$_ADVERTISERS_ID.'"  '.($_SESSION['ActiveUser']['TransactionEdit'] == true ? ($_RESULT_TRANS['advertiser_id'] == $_ADVERTISERS_ID ? 'selected':'') : '' ).'  >'.$_ADVERTISERS_NAME.'</option>';
										$__BG_COLOR_COUNTER++;
									}
                 ?>
          			</select>
							</td>

          		<td width="5">
          		</td>

    					<td>
              	<div id="VALIDATIONRESPONSE.advertiser_id"></div>
              </td>

						</tr>
    				<!-- END select/dropdown form element -->



    				<!-- select/dropdown form element -->
						<tr>
    					<td class="formControl_label_TRANSACTION">
    						&nbsp;&nbsp;Vendor
    					</td>

							<td align="left">
          			<select name="form_transaction_new.booking.vendor_id" id="form_transaction_new.booking.vendor_id" tabindex="22" onchange="SM_Validate(this);" onblur="SM_Validate(this);" class="formControl_inputSelect">
          				<option value="nan">Select a Vendor</option>
                 <?
  								// get data --------------------------
									$ResultArray_VENDORS			= $obj_Member->GetVendors('organization');

									$__BG_COLOR_COUNTER	=	0;
									foreach($ResultArray_VENDORS as $_VENDORS_KEY){

       							if($__BG_COLOR_COUNTER%2 == 0){
       								$__SELECT_BG_RGB = '#c9f5ff';
       							}else{
       								$__SELECT_BG_RGB = '#e3ffe0';
       							}

                 		$_VENDORS_NAME		= ucwords($_VENDORS_KEY['name']);
                 		$_VENDORS_ID			= $_VENDORS_KEY['id'];
                 		echo '<option style="background: '.$__SELECT_BG_RGB.';" value="'.$_VENDORS_ID.'"  '.($_SESSION['ActiveUser']['TransactionEdit'] == true ? ($_RESULT_TRANS['publication_id'] == $_VENDORS_ID ? 'selected':'') : '' ).'  >'.$_VENDORS_NAME.'</option>';
										$__BG_COLOR_COUNTER++;
									}
                 ?>
          			</select>
							</td>

          		<td width="5">
          		</td>

    					<td>
              	<div id="VALIDATIONRESPONSE.vendor_id"></div>
              </td>

						</tr>
    				<!-- END select/dropdown form element -->

	    </table>


		</div>
		<!-- END RIGHT -->












		<!-- LEFT II -->
		<div id="panel_control_1" style="position: absolute; left: 10px; top: 340px; width: 450px; height: 280px; background-color: #414141; color: #ffffff; font-size: 15px; font-weight: normal; border: 1px solid #760000;">

			<!-- title -->
			<div id="panel_title" style="height: 40px; background-color: #760000; color: #ffffff; font-size: 15px; font-weight: bold; border-bottom: 1px solid #656565;">
				<div style="position: absolute; top: 4px; left: 6px;"><h2 style="color: #ffffff;">Financials</h2></div>
			</div>
			<!-- END title -->



			<table class="form_transaction_new" cellpadding="1" cellspacing="0" border="0" width="100%" style="position: absolute; top: 50px; left: 10px;">
	
	

	
	
	


    				<!-- form element -->
    				<tr>
    					<td class="formControl_label_TRANSACTION">
    						&nbsp;&nbsp;Inserts
    					</td>

          		<td>
          			<input id="form_transaction_new.booking.num_inserts" tabindex="16" size="25" maxlength="50" type="text" class="formControl_input" autocomplete="off" onblur="SM_Validate(this); clickrecall(this,'Inserts');" onclick="clickclear(this, 'Inserts')" onfocus="clickclear(this, 'Inserts')" onKeyUp="" value="<? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? $_RESULT_TRANS['num_inserts'] : 'Inserts'  ); ?>" />
          		</td>

          		<td width="5">
          		</td>

    					<td>
              	<div id="VALIDATIONRESPONSE.num_inserts"></div>
              </td>
    				</tr>
    				<!-- END form element -->


    				<!-- form element -->
    				<tr>
    					<td class="formControl_label_TRANSACTION_WIDER">
    						&nbsp;&nbsp;Total Rate Card
    					</td>

          		<td>
          			<input id="form_transaction_new.booking.total_rate_card" tabindex="23" size="25" maxlength="50" type="text" class="formControl_input" autocomplete="off" onblur="SM_Validate(this); clickrecall(this,'Total Rate Card');" onclick="clickclear(this, 'Total Rate Card')" onfocus="clickclear(this, 'Total Rate Card')" onKeyUp="" value="<? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? $_RESULT_TRANS['rate_card_total'] : 'Total Rate Card' ); ?>" />
          		</td>

          		<td width="5">
          		</td>

    					<td>
              	<div id="VALIDATIONRESPONSE.total_rate_card"></div>
              </td>
    				</tr>
    				<!-- END form element -->




    				<!-- form element -->
    				<tr>
    					<td class="formControl_label_TRANSACTION_WIDER">
    						&nbsp;&nbsp;Total Client Net
    					</td>

          		<td class="formControl_input_td">
          			<input id="form_transaction_new.booking.total_client_net" tabindex="24" size="25" maxlength="50" type="text" class="formControl_input" autocomplete="off" onblur="SM_Validate(this); clickrecall(this,'Total Client Net'); WMG_CALC_GrossProfit();" onKeyUp="WMG_CALC_GrossProfit();" onchange="WMG_CALC_GrossProfit();" onclick="clickclear(this, 'Total Client Net')" onfocus="clickclear(this, 'Total Client Net')" onKeyUp="" value="<? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? $_RESULT_TRANS['client_net_total'] : 'Total Client Net' ); ?>" />
          		</td>

          		<td width="5">
          		</td>

    					<td>
              	<div id="VALIDATIONRESPONSE.total_client_net"></div>
              </td>
    				</tr>
    				<!-- END form element -->




    				<!-- form element -->
    				<tr>
    					<td class="formControl_label_TRANSACTION_WIDER">
    						&nbsp;&nbsp;PO Cost
    					</td>

          		<td class="formControl_input_td">
          			<input id="form_transaction_new.booking.po_cost" tabindex="25" size="25" maxlength="50" type="text" class="formControl_input" autocomplete="off" onblur="SM_Validate(this); clickrecall(this,'PO Cost'); WMG_CALC_GrossProfit();" onKeyUp="WMG_CALC_GrossProfit();" onchange="WMG_CALC_GrossProfit();" onclick="clickclear(this, 'PO Cost')" onfocus="clickclear(this, 'PO Cost')" value="<? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? $_RESULT_TRANS['po_cost'] : 'PO Cost' ); ?>" />
          		</td>

          		<td width="5">
          		</td>

    					<td>
              	<div id="VALIDATIONRESPONSE.po_cost"></div>
              </td>
    				</tr>
    				<!-- END form element -->



    				<!-- form element -->
    				<tr>
    					<td class="formControl_label_TRANSACTION_WIDER">
    						&nbsp;&nbsp;Gross Profit
    					</td>

          		<td class="formControl_input_td">
          			<input id="form_transaction_new.booking.gross_profit" tabindex="26" size="25" maxlength="50" type="text" class="formControl_input" readonly="readonly" autocomplete="off" onblur="SM_Validate(this); clickrecall(this,'Gross Profit');" onclick="clickclear(this, 'Gross Profit')" onfocus="clickclear(this, 'PO Cost')" onKeyUp="" value="<? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? $_RESULT_TRANS['gross_profit'] : 'Gross Profit' ); ?>" />
          		</td>

          		<td width="5">
          		</td>

    					<td>
              	<div id="VALIDATIONRESPONSE.gross_profit"></div>
              </td>
    				</tr>
    				<!-- END form element -->



    				<!-- form element -->
    				<tr>
    					<td class="formControl_label_TRANSACTION_WIDER">
    						&nbsp;&nbsp;Profit Percentage
    					</td>

          		<td class="formControl_input_td">
          			<input id="form_transaction_new.booking.profit_percentage" tabindex="27" size="25" maxlength="50" type="text" class="formControl_input" readonly="readonly" autocomplete="off" onblur="SM_Validate(this); clickrecall(this,'Profit Percentage');" onclick="clickclear(this, 'Profit Percentage')" onfocus="clickclear(this, 'PO Cost')" onKeyUp="" value="<? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? $_RESULT_TRANS['profit_percentage'] : 'Profit Percentage' ); ?>" />
          		</td>

          		<td width="5">
          		</td>

    					<td>
              	<div id="VALIDATIONRESPONSE.profit_percentage"></div>
              </td>
    				</tr>
    				<!-- END form element -->


	    </table>





		</div>
		<!-- END LEFT 2 -->


























		<!-- RIGHT II -->
		<div id="panel_control_1" style="position: absolute; right: 10px; top: 340px; width: 450px; height: 280px; background-color: #414141; color: #ffffff; font-size: 15px; font-weight: normal; border: 1px solid #760000;">


			<!-- title -->
			<div id="panel_title" style="height: 40px; background-color: #760000; color: #ffffff; font-size: 15px; font-weight: bold; border-bottom: 1px solid #656565;">
				<div style="position: absolute; top: 4px; left: 6px;"><h2 style="color: #ffffff;">Commissions</h2></div>
			</div>
			<!-- END title -->


			<table class="form_transaction_new" cellpadding="1" cellspacing="0" border="0" width="100%" style="position: absolute; top: 50px; left: 10px;">



    				<!-- select/dropdown form element -->
						<tr>
    					<td class="formControl_label_TRANSACTION_WIDER">
    						&nbsp;&nbsp;Direct
    					</td>

							<td align="left">
          			<select name="form_transaction_new.booking.direct_commission" id="form_transaction_new.booking.direct_commission" tabindex="28" onchange="SM_Validate(this);" onblur="SM_Validate(this);" class="formControl_inputSelect">
          				<option value="nan">Select a Direct Comission</option>
                 <?

  								// get data --------------------------
									$ResultArray_DIRECT_COMMISSION			= $obj_Member->GetCommissionRates();

									foreach($ResultArray_DIRECT_COMMISSION as $_DIRECT_COMMISSION_KEY){
                 		$_DIRECT_COMMISSION_NAME		= ucwords($_DIRECT_COMMISSION_KEY['name']);
                 		
                 		// name correction (MINOR) -------------
                 		if($_DIRECT_COMMISSION_NAME == '05%'){
                 			$_DIRECT_COMMISSION_NAME = '5%';
                 		}
                 		
                 		$_DIRECT_COMMISSION_ID			= $_DIRECT_COMMISSION_KEY['id'];
                 		echo '<option value="'.$_DIRECT_COMMISSION_ID.'" '.($_SESSION['ActiveUser']['TransactionEdit'] == true ? ($_RESULT_TRANS['direct_commission_id'] == $_DIRECT_COMMISSION_ID ? 'selected':'') : '' ).' >'.$_DIRECT_COMMISSION_NAME.'</option>';
									}
                 ?>
          			</select>
							</td>

          		<td width="5">
          		</td>

    					<td>
              	<div id="VALIDATIONRESPONSE.direct_commission"></div>
              </td>

						</tr>
    				<!-- END select/dropdown form element -->





    				<!-- select/dropdown form element -->
						<tr>
    					<td class="formControl_label_TRANSACTION_WIDER">
    						&nbsp;&nbsp;Override
    					</td>

							<td align="left">
          			<select name="form_transaction_new.booking.override_commission" id="form_transaction_new.booking.override_commission" tabindex="29" onchange="SM_Validate(this);" onblur="SM_Validate(this);" class="formControl_inputSelect">
          				<option value="nan">Select a Override Comission</option>
                 <?

  								// get data --------------------------
									$ResultArray_OVERRIDE_COMMISSION			= $obj_Member->GetCommissionRates();

									foreach($ResultArray_OVERRIDE_COMMISSION as $_OVERRIDE_COMMISSION_KEY){
                 		$_OVERRIDE_COMMISSION_NAME		= ucwords($_OVERRIDE_COMMISSION_KEY['name']);
                 		
                 		// name correction (MINOR) -------------
                 		if($_OVERRIDE_COMMISSION_NAME == '05%'){
                 			$_OVERRIDE_COMMISSION_NAME = '5%';
                 		}
                 		
                 		$_OVERRIDE_COMMISSION_ID			= $_OVERRIDE_COMMISSION_KEY['id'];
                 		echo '<option value="'.$_OVERRIDE_COMMISSION_ID.'" '.($_SESSION['ActiveUser']['TransactionEdit'] == true ? ($_RESULT_TRANS['override_commission_id'] == $_OVERRIDE_COMMISSION_ID ? 'selected':'') : '' ).' >'.$_OVERRIDE_COMMISSION_NAME.'</option>';
									}
                 ?>
          			</select>
							</td>

          		<td width="5">
          		</td>

    					<td>
              	<div id="VALIDATIONRESPONSE.override_commission"></div>
              </td>

						</tr>
    				<!-- END select/dropdown form element -->







    				<!-- select/dropdown form element -->
						<tr>
    					<td class="formControl_label_TRANSACTION_WIDER">
    						&nbsp;&nbsp;Marketing
    					</td>

							<td align="left">
          			<select name="form_transaction_new.booking.marketing_commission" id="form_transaction_new.booking.marketing_commission" tabindex="30" onchange="SM_Validate(this);" onblur="SM_Validate(this);" class="formControl_inputSelect">
          				<option value="nan">Select a Marketing Comission</option>
                 <?

  								// get data --------------------------
									$ResultArray_MARKETING_COMMISSION			= $obj_Member->GetCommissionRates();

									foreach($ResultArray_MARKETING_COMMISSION as $_MARKETING_COMMISSION_KEY){
                 		$_MARKETING_COMMISSION_NAME		= ucwords($_MARKETING_COMMISSION_KEY['name']);
                 		
                 		// name correction (MINOR) -------------
                 		if($_MARKETING_COMMISSION_NAME == '05%'){
                 			$_MARKETING_COMMISSION_NAME = '5%';
                 		}
                 		
                 		$_MARKETING_COMMISSION_ID			= $_MARKETING_COMMISSION_KEY['id'];
                 		echo '<option value="'.$_MARKETING_COMMISSION_ID.'" '.($_SESSION['ActiveUser']['TransactionEdit'] == true ? ($_RESULT_TRANS['marketing_commission_id'] == $_MARKETING_COMMISSION_ID ? 'selected':'') : '' ).' >'.$_MARKETING_COMMISSION_NAME.'</option>';
									}
                 ?>
          			</select>
							</td>

          		<td width="5">
          		</td>

    					<td>
              	<div id="VALIDATIONRESPONSE.marketing_commission"></div>
              </td>

						</tr>
    				<!-- END select/dropdown form element -->





    				<!-- select/dropdown form element -->
						<tr>
    					<td class="formControl_label_TRANSACTION_WIDER">
    						&nbsp;&nbsp;Marketing Person
    					</td>

							<td align="left">
          			<select name="form_transaction_new.booking.marketing_person_id" id="form_transaction_new.booking.marketing_person_id" tabindex="31" onchange="SM_Validate(this);" onblur="SM_Validate(this);" class="formControl_inputSelect">
          				<option value="nan">Select a Marketing Person</option>
          				<option value="9999999999">No Marketing Person</option>
                 <?
	 								// get data --------------------------

									$ResultArray_HUMANCAPITAL			= $obj_Member->GetHumanCapital('organization');
									
									foreach($ResultArray_HUMANCAPITAL as $_HUMANCAPITAL_KEY){
										
										$_UserType						=	$obj_Member->UserID_to_UserType($_HUMANCAPITAL_KEY['userid']);
										
                 		$_HUMANCAPITAL_NAME		= '('.strtoupper($_UserType->user_type_abbreviation).') '.ucwords($_HUMANCAPITAL_KEY['first_name'].' '.$_HUMANCAPITAL_KEY['last_name']);
                 		$_HUMANCAPITAL_ID			= $_HUMANCAPITAL_KEY['userid'];
                 		echo '<option value="'.$_HUMANCAPITAL_ID.'" '.($_SESSION['ActiveUser']['TransactionEdit'] == true ? ($_RESULT_TRANS['marketing_person_id'] == $_HUMANCAPITAL_ID ? 'selected':'') : '' ).' >'.$_HUMANCAPITAL_NAME.'</option>';
									}
                 ?>
          			</select>
							</td>

          		<td width="5">
          		</td>

    					<td>
              	<div id="VALIDATIONRESPONSE.marketing_person_id"></div>
              </td>

						</tr>
    				<!-- END select/dropdown form element -->





    				<!-- select/dropdown form element -->
						<tr>
    					<td class="formControl_label_TRANSACTION_WIDER">
    						&nbsp;&nbsp;3rd Party
    					</td>

							<td align="left">
          			<select name="form_transaction_new.booking.third_party_commission" id="form_transaction_new.booking.third_party_commission" tabindex="32" onchange="SM_Validate(this);" onblur="SM_Validate(this);" class="formControl_inputSelect">
          				<option value="nan">Select a 3rd Party Comission</option>
                 <?

  								// get data --------------------------
									$ResultArray_COMMISSION			= $obj_Member->GetCommissionRates();

									foreach($ResultArray_COMMISSION as $_COMMISSION_KEY){
                 		$_COMMISSION_NAME		= ucwords($_COMMISSION_KEY['name']);
                 		
                 		// name correction (MINOR) -------------
                 		if($_COMMISSION_NAME == '05%'){
                 			$_COMMISSION_NAME = '5%';
                 		}
                 		
                 		$_COMMISSION_ID			= $_COMMISSION_KEY['id'];
                 		echo '<option value="'.$_COMMISSION_ID.'" '.($_SESSION['ActiveUser']['TransactionEdit'] == true ? ($_RESULT_TRANS['third_party_commission_id'] == $_COMMISSION_ID ? 'selected':'') : '' ).' >'.$_COMMISSION_NAME.'</option>';
									}
                 ?>
          			</select>
							</td>

          		<td width="5">
          		</td>

    					<td>
              	<div id="VALIDATIONRESPONSE.third_party_commission"></div>
              </td>

						</tr>
    				<!-- END select/dropdown form element -->





    				<!-- select/dropdown form element -->
						<tr>
    					<td class="formControl_label_TRANSACTION_WIDER">
    						&nbsp;&nbsp;3rd Party Person
    					</td>

							<td align="left">
          			<select name="form_transaction_new.booking.third_party_person_id" id="form_transaction_new.booking.third_party_person_id" tabindex="33" onchange="SM_Validate(this);" onblur="SM_Validate(this);" class="formControl_inputSelect">
          				<option value="nan">Select a 3rd Party Person</option>
          				<option value="9999999999">No Third Party</option>
                 <?
	 								// get data --------------------------

									$ResultArray_HUMANCAPITAL			= $obj_Member->GetHumanCapital('organization');
									
									foreach($ResultArray_HUMANCAPITAL as $_HUMANCAPITAL_KEY){
										
										$_UserType						=	$obj_Member->UserID_to_UserType($_HUMANCAPITAL_KEY['userid']);
										
                 		$_HUMANCAPITAL_NAME		= '('.strtoupper($_UserType->user_type_abbreviation).') '.ucwords($_HUMANCAPITAL_KEY['first_name'].' '.$_HUMANCAPITAL_KEY['last_name']);
                 		$_HUMANCAPITAL_ID			= $_HUMANCAPITAL_KEY['userid'];
                 		echo '<option value="'.$_HUMANCAPITAL_ID.'" '.($_SESSION['ActiveUser']['TransactionEdit'] == true ? ($_RESULT_TRANS['third_party_person_id'] == $_HUMANCAPITAL_ID ? 'selected':'') : '' ).' >'.$_HUMANCAPITAL_NAME.'</option>';
									}
                 ?>
          			</select>
							</td>

          		<td width="5">
          		</td>

    					<td>
              	<div id="VALIDATIONRESPONSE.third_party_person_id"></div>
              </td>

						</tr>
    				<!-- END select/dropdown form element -->

				</table>




		</div>
		<!-- END LEFT 2 -->











		<!-- RIGHT III -->
		<div id="panel_control_process" style="position: absolute; right: 10px; bottom: 8px; width: 450px; height: 40px; background-color: #760000; color: #ffffff; font-size: 15px; font-weight: normal; border: 1px solid #760000;">



			<!-- title -->
			<div id="panel_title" style="height: 40px; background-color: #760000; color: #ffffff; font-size: 15px; font-weight: bold;">


			<div style="position: absolute; top: 4px; left: 6px;"><h2 style="color: #ffffff;">Process</h2></div>

				<div style="position: absolute; top: 7px; right: 6px;">

    						<!-- <input type="hidden" value='member-Create' name="_function" id="_function"/> -->
                <?
                	// security token ----------------------------------
                	$_SESSION['ActiveUser']['TransactionToken'] 						= $obj_Member->Encrypt(md5(uniqid(rand(), true)), 'private');
                	$_SESSION['ActiveUser']['TransactionTokenExpiration'] 	= $obj_Member->Encrypt((time() + 240), 'private');                             //Expiration = 4 minutes (240 seconds)
                	$_SESSION['ActiveUser']['TransactionAgentSignature']		= $obj_Member->Encrypt($_SESSION['ActiveUser']['userid'], 'private');
                	// -------------------------------------------------
                ?>
								<input type="hidden" value="<? echo $_SESSION['ActiveUser']['TransactionToken']; ?>" name="form_transaction_new.booking._token" id="form_transaction_new.booking._token" />
    						<input type="hidden" value="<? echo $_SESSION['ActiveUser']['TransactionTokenExpiration']; ?>" name="form_transaction_new.booking._token_expiration" id="form_transaction_new.booking._token_expiration" />
    						<input type="hidden" value="<? echo $_SESSION['ActiveUser']['TransactionAgentSignature']; ?>" name="form_transaction_new.booking._agent_signature" id="form_transaction_new.booking._agent_signature" />
								
								<input type="hidden" value="<? echo ($_SESSION['ActiveUser']['TransactionEdit'] == true ? '1':'0'); ?>" name="form_transaction_new.booking._revision" id="form_transaction_new.booking._revision" />
								<input type="hidden" value="<? echo $_GET['_e']; ?>" name="form_transaction_new.booking._revision_parent_id" id="form_transaction_new.booking._revision_parent_id" />
								
								
								<input type="hidden" value="booking" name="form_transaction_new.booking._table" id="form_transaction_new.booking._table" />

    						<input type="button" id="form_transaction_new.booking.submit" tabindex="34" value="Process" class="formControl_button_submit" onclick="SM_Form_Submit('form_transaction_new');"/>
								
								
             		<script type="text/javascript">
             			//document.getElementById('lead.booking.submit').disabled 	= true;
									//SM_Form_VerifyComplete();
             		</script>

				</div>


			</div>
			<!-- END title -->

		</div>
		<!-- END LEFT 2 -->






	</div>
<!-- END TRANSACTION PANEL -->




</form>
















































