<?php 


class BaseProfessorController 
{
    public function __construct($demand)
    {
		$this->demand = $demand;
		
	}
	public function index()
	{
		$view = new View();
		$class = Classes::get_my_class();
		$view->data['class'] = $class;
		$students = Classes::get_diary_of_my_class();
		$view->data['students'] = $students;
		$view->load_view('professor', 'pages', 'home');

	}

	public function logout()
	{
		$access_destroy = BaseAccessController::logout($_COOKIE['id'], $_COOKIE['loginhash']);
		header('Location: '.URLROOT.'/');
		die();
	}

	public function diary()
	{
		$view = new View();
		$all_classes = Classes::class_info();
		$view->data['classes'] = $all_classes;
		$class = Classes::get_my_class();
		$view->data['class'] = $class;
		$view->load_view('professor', 'pages', 'diary');

	}
	
	public function diaryof(){
		$view = new View();
		$class_id = $this->demand->parts_of_url[5];
		$students=Grades::get_diary($class_id);
		$class = Classes::get_my_class();
		$view->data['class'] = $class;
		$view->data['diaries'] = $students;
		$view->data['subject_id']=Subjects::get_subject_id();
		$subject_id=$view->data['subject_id'];
		$view->data['final']=Grades::final_grades_show($subject_id,$class_id);
		$view->load_view('professor', 'pages', 'diaryof');
	}

	public function delete(){
		$id = $this->demand->parts_of_url[5];
		$deleted=Grades::delete($id);
		if (isset($_SERVER["HTTP_REFERER"])) {
			header("Location: " . $_SERVER["HTTP_REFERER"]);
		}
		return $deleted;
	}

	public function edit(){
		$id = $this->demand->parts_of_url[5];
		$new_grade = $this->demand->parts_of_url[7];
		$subject_id=$this->demand->parts_of_url[6];
		$edited=Grades::edit($id,$subject_id,$new_grade);
		if (isset($_SERVER["HTTP_REFERER"])) {
			header("Location: " . $_SERVER["HTTP_REFERER"]);
		}
		return $edited;
	}

	public function new_grade(){
		$id = $this->demand->parts_of_url[5];
		$new_grade = $this->demand->parts_of_url[7];
		$subject_id=$this->demand->parts_of_url[6];
		$grade=Grades::new_grade($id,$subject_id,$new_grade);
		if (isset($_SERVER["HTTP_REFERER"])) {
			header("Location: " . $_SERVER["HTTP_REFERER"]);
		}
		return $grade;
	}

	public function final_grade(){
		$id = $this->demand->parts_of_url[5];
		$final_grade = $this->demand->parts_of_url[7];
		$subject_id=$this->demand->parts_of_url[6];
		$grade=Grades::final_grade($id,$subject_id,$final_grade);
		if (isset($_SERVER["HTTP_REFERER"])) {
			header("Location: " . $_SERVER["HTTP_REFERER"]);
		}
		
		return $grade;
	}

	public function open(){
		$view = new View();
		$open_doors=OpenDoor::open();
		$view->data['open'] = $open_doors;
		$view->load_view('professor', 'pages', 'open');

	}

	public function open_yes(){
		$id = $this->demand->parts_of_url[5];
		$open_doors=OpenDoor::open_yes($id);
		if (isset($_SERVER["HTTP_REFERER"])) {
			header("Location: " . $_SERVER["HTTP_REFERER"]);
		}

	}

	public function open_no(){
		$id = $this->demand->parts_of_url[5];
		$open_doors=OpenDoor::open_no($id);
		if (isset($_SERVER["HTTP_REFERER"])) {
			header("Location: " . $_SERVER["HTTP_REFERER"]);
		}
	}

		public function open_create(){
			$time = str_replace('T',' ',$_GET['date']);
			$time.=":00";
			
			$open_create=OpenDoor::open_create($time);
			if (isset($_SERVER["HTTP_REFERER"])) {
				header("Location: " . $_SERVER["HTTP_REFERER"]);
			}
		
		

	}
	public function schedule(){
		$view = new View();
		$schedule=Schedule::get_schedule_for_professor();
		$view->data['schedule'] = $schedule;
		$view->load_view('professor', 'pages', 'schedule');
		

	}

	public function messages(){
		$view = new View();
		$messages=Messages::get_new_messages();
		$parents=Messages::parents_chat();
		$view->data['all_messages'] = $messages;
		$view->data['parents'] = $parents;
		$view->load_view('professor', 'pages', 'messages');
		
		

	}
	public function ajax(){
		$messages=Messages::get_new_messages();
		echo JSON_encode($messages);
		

	}

	public function ajax_is_read(){
		
		$id=$_GET['id'];
		$messages=Messages::ajax_is_read($id);
		if($messages)
		$response=['response'=>true];
		else
		$response=['response'=>false];
		echo JSON_encode($response);
		

	}

	public function ajax_chat(){
		
		$id=$_GET['id'];
		$messages=Messages::ajax_chat($id);
		echo JSON_encode($messages);

	}


	public function ajax_send_message(){
		$message=htmlspecialchars(strip_tags($_GET['message']));
		$id=$_GET['id'];
		Messages::ajax_send_message($message,$id);
		$response=['response'=>'da'];
		echo JSON_encode($response);
		
	}

	public function success(){
		$id= $this->demand->parts_of_url[5];
		$view = new View();
		$grades=Student::success($id);
		if($grades==null){
			if (isset($_SERVER["HTTP_REFERER"])) {
				header("Location: " . $_SERVER["HTTP_REFERER"]);
				$_SESSION['success']="Ucenik nije ocenjen";
			}
			exit();
		}
	
		$_SESSION['success']='';
        $pdf = new Cezpdf();
		$pdf->selectFont('Helvetica');
		
		$pdf->ezSetMargins(40,40,40,40);
		
		$pdf->setLineStyle(1,'round');
		$pdf->line(72,778,522,778);
		$pdf->line(72,780,522,780);
		$pdf->line(72,750,522,750);
		$pdf->line(144,630,450,630);
		$pdf->line(144,600,450,600);
	//	$pdf->line(70,542,350,542);
	//	$pdf->line(70,570,350,570);
		
		$pdf->ezText('                                                       Republika Srbija',13);
		$pdf->ezSetDy(-10);
		$pdf->ezText('                              Srednja medicinska skola "Beograd"',16);
		$pdf->ezSetDy(-10);
		
		$pdf->ezText('        <b>SVEDOCANSTVO</b>',40);
		$pdf->ezSetDy(-46);
		$pdf->ezText('                                       '.ucfirst($grades[0]['first_name']).' '.ucfirst($grades[0]['last_name']).'',16);
		$pdf->ezSetDy(-15);
		$pdf->ezText('                              Smer: Fizioterapeutski tehnicar',15);
		$pdf->ezSetDy(-35);
		$sum=0;
		$count=0;
		$fall=false;
		$x=550;
		foreach($grades as $subject){
			$grade;
			$sum+=$subject['grades'];
			$count++;
			switch($subject['grades']){
				case 1:
				$grade='nedovoljan';
				$fall=true;
				break;
				case 2:
				$grade='dovoljan';
				break;
				case 3:
				$grade='dobar';
				break;
				case 4:
				$grade='vrlo dobar';
				break;
				case 5:
				$grade='odlican';
				break;
				default:
				return;
			}
	
		//$pdf->setColor (1,0,0,[0]);
		$pdf->ezText('         - '.ucfirst($subject['name']).' <i> '.$grade.' ('.$subject['grades'].')</i>',13);
		$pdf->line(70,$x,350,$x);
		$pdf->ezSetDy(-15);
		$x-=28;
		}
		
		$grade=round($sum/$count);
		switch($grade){
			case 1:
			$grade='nedovoljan';
			break;
			case 2:
			$grade='dovoljan';
			break;
			case 3:
			$grade='dobar';
			break;
			case 4:
			$grade='vrlo dobar';
			break;
			case 5:
			$grade='odlican';
			break;
			default:
			return;
		}
		if($fall){
			$grade='Nedovoljan';
		$pdf->ezText('   <b>      - Uspeh: '.$grade.'(1)</b>',13);
		$pdf->line(70,$x,350,$x);
		}
		else
		$pdf->ezText('     <b>    - Uspeh:       '.$grade.' ('.$sum/$count.')</b>',13);
		$pdf->ezSetDy(-15);
		$pdf->ezStream();
		
		
		
	}

 

}