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
		$view->load_view('professor', 'pages', 'home');

	}

	public function logout()
	{
		$access_destroy = BaseAccessController::logout($_COOKIE['id'], $_COOKIE['loginhash']);
		header('Location: http://localhost/eDiary/task1/');
		die();
		
	}

	public function diary()
	{
		$view = new View();
		$all_classes = Professor::class();
		$view->data['classes'] = $all_classes;
		$view->load_view('professor', 'pages', 'diary');

	}
	
	public function diaryof(){
		$view = new View();
		$class_id = $this->demand->parts_of_url[5];
		$students=Professor::get_diary($class_id);
		$view->data['diaries'] = $students;
		$view->data['subject_id']=Professor::get_subject_id();
		$subject_id=$view->data['subject_id'];
		$view->data['final']=Professor::final_grades_show($subject_id,$class_id);
		$view->load_view('professor', 'pages', 'diaryof');
	}

	public function delete(){
		$id = $this->demand->parts_of_url[5];
		$deleted=Professor::delete($id);
		if (isset($_SERVER["HTTP_REFERER"])) {
			header("Location: " . $_SERVER["HTTP_REFERER"]);
		}
		return $deleted;
	}

	public function edit(){
		$id = $this->demand->parts_of_url[5];
		$new_grade = $this->demand->parts_of_url[7];
		$subject_id=$this->demand->parts_of_url[6];
		$edited=Professor::edit($id,$subject_id,$new_grade);
		if (isset($_SERVER["HTTP_REFERER"])) {
			header("Location: " . $_SERVER["HTTP_REFERER"]);
		}
		return $edited;
	}

	public function new_grade(){
		$id = $this->demand->parts_of_url[5];
		$new_grade = $this->demand->parts_of_url[7];
		$subject_id=$this->demand->parts_of_url[6];
		$grade=Professor::new_grade($id,$subject_id,$new_grade);
		if (isset($_SERVER["HTTP_REFERER"])) {
			header("Location: " . $_SERVER["HTTP_REFERER"]);
		}
		return $grade;
	}

	public function final_grade(){
		$id = $this->demand->parts_of_url[5];
		$final_grade = $this->demand->parts_of_url[7];
		$subject_id=$this->demand->parts_of_url[6];
		$grade=Professor::final_grade($id,$subject_id,$final_grade);
		if (isset($_SERVER["HTTP_REFERER"])) {
			header("Location: " . $_SERVER["HTTP_REFERER"]);
		}
		
		return $grade;
	}

	public function open(){
		$view = new View();
		$open_parents=Professor::open_parents();
		$open_doors=Professor::open();
		$view->data['open'] = $open_doors;
		$view->data['open_parents'] = $open_parents;
		$view->load_view('professor', 'pages', 'open');

	}

	public function open_yes(){
		$id = $this->demand->parts_of_url[5];
		$open_doors=Professor::open_yes($id);
		if (isset($_SERVER["HTTP_REFERER"])) {
			header("Location: " . $_SERVER["HTTP_REFERER"]);
		}

	}

	public function open_no(){
		$id = $this->demand->parts_of_url[5];
		$open_doors=Professor::open_no($id);
		if (isset($_SERVER["HTTP_REFERER"])) {
			header("Location: " . $_SERVER["HTTP_REFERER"]);
		}
		

	}
	public function schedule(){
		$view = new View();
		$schedule=Professor::schedule();
		$view->data['schedule'] = $schedule;
		$view->load_view('professor', 'pages', 'schedule');
		

	}

	public function messages(){
		$view = new View();
		$messages=Professor::get_new_messages();
		$parents=Professor::parents_chat();
		$view->data['all_messages'] = $messages;
		$view->data['parents'] = $parents;
		$view->load_view('professor', 'pages', 'messages');
		
		

	}
	public function ajax(){
		$messages=Professor::get_new_messages();
		echo JSON_encode($messages);
		

	}

	public function ajax_is_read(){
		
		$id=$_GET['id'];
		$messages=Professor::ajax_is_read($id);
		if($messages)
		$response=['response'=>true];
		else
		$response=['response'=>false];
		echo JSON_encode($response);
		

	}

	public function ajax_chat(){
		
		$id=$_GET['id'];
		$messages=Professor::ajax_chat($id);
		echo JSON_encode($messages);

	}


	public function ajax_send_message(){
		$message=$_GET['message'];
		$id=$_GET['id'];
		Professor::ajax_send_message($message,$id);
		$response=['response'=>'da'];
		echo JSON_encode($response);
		
	}

	public function success(){
		$id= $this->demand->parts_of_url[5];
		$view = new View();
		$grades=Professor::success($id);
		if($grades==null){
			if (isset($_SERVER["HTTP_REFERER"])) {
				header("Location: " . $_SERVER["HTTP_REFERER"]);
			}
			exit();
		}
	
		
        $pdf = new Cezpdf();
        $pdf->selectFont('Helvetica');
		
		$pdf->ezText('      Srednja medicinska skola',35);
		$pdf->ezSetDy(-10);
		$pdf->ezText('           Smer: Fizioterapeutski tehnicar',25);
		$pdf->ezSetDy(-10);
		$pdf->ezText('   SVEDOCANSTVO',50);
		$pdf->ezSetDy(-20);
		$pdf->ezText('         Ucenik: '.ucfirst($grades[0]['first_name']).' '.ucfirst($grades[0]['last_name']).'',25);
		$pdf->ezSetDy(-15);
		$sum=0;
		$count=0;

		
		foreach($grades as $subject){
			$grade;
			$sum+=$subject['grades'];
			$count++;
			switch($subject['grades']){
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
	
		$pdf->setColor (1,0,0,[0]);
		$pdf->ezText('         - '.$subject['name'].' '.$grade.' ('.$subject['grades'].')',25);
		$pdf->ezSetDy(-15);
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
		$pdf->setColor (0,0,1,[0]);
		$pdf->ezText('         - Uspeh: '.$grade.' ('.$sum/$count.')',25);
		$pdf->ezSetDy(-15);
		
		
		//$pdf->ezText('<c:alink:'. $_SERVER["HTTP_REFERER"].'>Vrati se</c:alink>');

		$pdf->ezStream();
		
			
			//$view->data['pdf'] = ;
			//$view->load_view('professor', 'pages', 'success');
		
	}

}