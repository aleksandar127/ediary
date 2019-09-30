<?php
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory; 

class BaseDirectorController
{

    public function __construct($demand)
    {
		$this->demand = $demand;
		
	}
	
	public function index()
	{
		$view = new View();
		$view->load_view('director', 'pages', 'home');
	}
	

		// Prosek ocena na nivou skole..
	public function avgschool() 
	{
		$view = new View();

		$cacheFile = sprintf("views/director/pages/cache/avgschool_cache%s.php", date("Ymd"));
	//	echo $cacheFile."<br><hr>";

		// Izbrisi stare cache fajlove iz foldera..
		 foreach (glob('views/director/pages/cache/avgschool*') as $cache) {
	//	 	 echo $cache . "<br>";
			if($cache != $cacheFile) {
				unlink($cache);
			}
		}

		if(file_exists($cacheFile)) {

		$timeDiff = time() - filemtime($cacheFile);
		// echo $timeDiff;
			// Izbrisi fajl ako je stariji od 12 sati..
			if($timeDiff > (60 * 60 * 12)) {
				unlink($cacheFile);
				}
				else {
					// Ucitaj validan cache fajl ako postoji..
					$file = "cache/avgschool_cache".date("Ymd");
					$view->load_view('director', 'pages', $file);
					exit;
				}
		}
			// Ako nema validnog cache fajla, posalji upit u bazu i napravi cache fajl..
			$grades = Grades::average_school_grades();
			$view->data['grades'] = $grades;
			$view->load_view('director', 'pages', 'avgschool');
	}



		// Prosek ocena za predmete na nivou odeljenja..
	public function avgclass()
	{
		$view = new View();

		// Converting class name (e.g. 7/1 to 7-1) for file creation..
		$pattern = "/\//";
		$replacement = "-";
		$class = preg_replace($pattern, $replacement, $_GET['class']);

		// The path for cache file..
		$cacheFile = sprintf("views/director/pages/cache/avgclass_cache%s-%s.php", 
			$class, date("Ymd"));

		// Izbrisi stare cache fajlove iz foldera za odeljenje..
		 foreach (glob("views/director/pages/cache/avgclass_cache".$class."*") as $cache) {
			if($cache != $cacheFile) {
				unlink($cache);
			}
		}

		if(file_exists($cacheFile)) {

		$timeDiff = time() - filemtime($cacheFile);
		// echo $timeDiff;
			// Izbrisi fajl ako je stariji od 12 sati..
			if($timeDiff > (60 * 60 * 12)) {
				unlink($cacheFile);
				}
				else {
					// Ucitaj validan cache fajl ako postoji..
					$file = "cache/avgclass_cache".$class."-".date("Ymd");
					$view->load_view('director', 'pages', $file);
					exit;
				}
		}
		// Ako nema validnog cache fajla, posalji upit u bazu i napravi cache fajl..
		$grades = Grades::average_class_grades($_GET['class'], $_GET['high_low']);
		$view->data['grades'] = $grades;
		$view->data['class'] = $_GET['class'];
		$view->load_view('director', 'pages', 'avgclass');
	}


		// Export average school grades to .xlsx file..
		public function exportSchoolGrades()
	{

		// include 'Spreadsheet.php';
		// include 'Writer\Xlsx.php';
		// include 'IOFactory.php'; 
		
	//	if(isset($_POST['export'])) {

			$grades = Grades::exportSchool();
			// var_dump($grades);

			$spreadsheet = new Spreadsheet();
			$sheet = $spreadsheet->getActiveSheet();
			
			$sheet->setCellValue('A1', 'Predmet');
			$sheet->setCellValue('B1', 'Ocena');
				
			$row = 2;

		// foreach($grades as $grade){
			
		// 	$sheet->setCellValue('A'.$row, $grade['predmet']);
        // 	$sheet->setCellValue('B'.$row, $grade['ocena']);
		// 	$row++;
		// }

		$filename = 'grades-'.time().'.xlsx';

		// Redirect output to client..
		header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
		header('Content-Disposition: attachment; filename="'.$filename.'"');
		header('Cache-Control: max-age=0');
		// If user IE 9
		header('Cache-Control: max-age=1');
		
		
		$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
		$writer->save('php://output');
		
	//	}
	}



// 	public function exportSchoolGrades()
// 	{
// 		 $grades = Grades::exportSchool();
// 		 $output = '';

// 		if(isset($_POST['export'])) {
// 		$output .= '<table table-bordered>
// 			<thead>
// 				<th>Ocena</th>
// 				<th>Predmet</th>
// 			</thead>
// 			<tbody>';

// 		foreach($grades as $grade){
// 			$output .= <<<DELIMETER
// 			<tr>
// 			<td>{$grade['predmet']}</td>
// 			<td>{$grade['ocena']}</td>
// 			<tr>
// DELIMETER;

// 		}
// 			$output .= "</tbody></table>";
// 			header("Content-Type: application/xls");
// 			header("Content-Disposition: attachment; filename=grades.xls");
// 			echo $output;
// 		}
// 	}


		// Export class grades to .xls file..
	public function exportClassGrades()
	{
		$class = $_GET['class'];
		$high_low = $_GET['high_low'];
		$grades = Grades::exportClass($class, $high_low);
		 $output = '';

		if(isset($_POST['exportClass'])) {
		$output .= '<table table-bordered>
			<thead>
				<th>Ocena</th>
				<th>Predmet</th>
			</thead>
			<tbody>';

		foreach($grades as $grade){
			$output .= <<<DELIMETER
			<tr>
			<td>{$grade['predmet']}</td>
			<td>{$grade['ocena']}</td>
			<tr>
DELIMETER;

		}
		$output .= "</tbody></table>";
		header("Content-Type: application/xls");
		header("Content-Disposition: attachment; filename=grades{$_GET['class']}.xls");
		echo $output;
		}
	}



	public function logout()
	{
		$access_destroy = BaseAccessController::logout($_COOKIE['id'], $_COOKIE['loginhash']);
		header('Location: '.URLROOT.'/');
		die();
		
	}





}