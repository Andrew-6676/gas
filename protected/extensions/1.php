<?php

require_once "config/config.php" ;
require_once "{$config->APP_PATH}/controllers/ccreateedit.php" ;

session_start();


$html = file_get_contents("http://$site_adr/dogovor.gaz/printnar.php?p=124418");  //* страница для печати*/
//$html = "<html><body><div style='width:100%;text-align:center;font-size:18pt;font-weight:bold'>На данную страницу не были переданы параметры!</div></body></html>";
}

include("MPDF56/mpdf.php");

$mpdf = new mPDF('utf-8', 'A4', '8', '', 10, 10, 7, 7, 10, 10); /*задаем формат, отступы и.т.д.*/
$mpdf->AddPage('L'); // Lanscape Portpait(def)

$mpdf->charset_in = 'utf-8'; /*не забываем про русский, стандарт похоже utf8*/

$stylesheet = file_get_contents('reports.css'); /*подключаем css если надо*/
$mpdf->WriteHTML($stylesheet, 1);

$mpdf->list_indent_first_level = 0;
$mpdf->WriteHTML($html); /*формируем pdf*/

$mpdf->Output('mpdf.pdf', 'I');  //
if($save_file==true){
$mpdf->Output('reports/rep-'.$_GET['year']."-".$_GET['month'].'-'.$_GET['views'].'-'.$_GET['wv'].'-'.$_SESSION['user'].'.pdf', 'F');


?>
