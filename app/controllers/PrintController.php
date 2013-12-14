<?php 
class PrintController extends BaseController {
	public function getIndex() {
		$htmlContent = View::make('print.test');
		 // convert in PDF
		//$path = app_path() . '/libs/html2pdf.class.php';
		$path = app_path() . 'fuckyououuuuuu';

		$path = 'aoeu';

		//return var_dump(file_exists($path));
		echo $path . '<br>';
		echo var_dump(file_exists($path));
		require_once($path);
		//return 'aoeuaoeu';
// 		try
// 		{
// 			$pdf = new HTML2PDF('P', 'A4', 'fr');
// //      $html2pdf->setModeDebug();
// 			$pdf->setDefaultFont('Arial');
// 			$pdf->writeHTML($content, isset($_GET['vuehtml']));
// 			$pdf->Output('exemple00.pdf');
// 			return 'finish';
// 		}
// 		catch(HTML2PDF_exception $e) {
// 			return $e;
// 		}
		//return $htmlContent;
	}
}