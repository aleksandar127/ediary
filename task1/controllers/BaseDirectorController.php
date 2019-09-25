<?php 

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

		$class = str_replace('/', '-', $_GET['class']);

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


		// Export average school grades to .xls file..
	public function exportSchoolGrades()
	{
		 $grades = Grades::exportSchool();
		 $output = '';

		if(isset($_POST['export'])) {
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
		header("Content-Disposition: attachment; filename=grades.xls");
		echo $output;
		}
	}


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