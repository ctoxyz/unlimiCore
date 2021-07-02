<?php
require_once("dompdf_config.inc.php");




	$html	=	'here is the HTML content';
  $html = stripslashes($html);

  $dompdf = new DOMPDF();
  $dompdf->load_html($html);
  //$dompdf->set_paper($_POST["paper"], $_POST["orientation"]);
  $dompdf->render();

  $dompdf->stream("dompdf_out.pdf");

  exit(0);








die();










$html =
  '<html><body>'.
  '<p>Put your html here, or generate it with your favourite <img src="http://egenhq.com/common/img/logo/freefig-com.jpg"/>'.
  'templating system.</p>'.
  '</body></html>';

//$dompdf->image('var/www/vhosts/sm0002.com/httpdocs/common/img/logo/freefig-com.jpg', 'jpg', 10, 20, 200, 300);
$dompdf = new DOMPDF();

$dompdf->load_html($html);
$dompdf->render();
$dompdf->stream("sample.pdf");

?>
