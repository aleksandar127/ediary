<?php 

class BaseParentController 
{

    public function __construct($demand)
    {
		$this->demand = $demand;
		
	}

	
	public function index()
	{
		$view = new View();
		//get student and all grades 
        $grades = Student::get_student();
		$view->data['grades'] = $grades;	
		$view->load_view('parent', 'pages', 'home');

	}


    public function logout()
	{
		$access_destroy = BaseAccessController::logout($_COOKIE['id'], $_COOKIE['loginhash']);
		header('Location: '.URLROOT.'/');
		die();

	}

	//display messages view
	public function messages(){
		$view = new View();
		//get new messages
		$messages=Messages::get_new_messages();
		//get all professors for chat
		$parents=Messages::professor_chat();
		$view->data['all_messages'] = $messages;
		$view->data['parents'] = $parents;
		$view->load_view('parent', 'pages', 'messages');
		
		

	}
	
	public function ajax(){
		$messages=Messages::get_new_messages();
		echo JSON_encode($messages);	
	}

	//change message status
	public function ajax_is_read(){
		$id=$_GET['id'];
		$messages=Messages::ajax_is_read($id);
		if($messages)
		$response=['response'=>true];
		else
		$response=['response'=>false];
		echo JSON_encode($response);

	}

	//show all messages from one professor
	public function ajax_chat(){
		$id=$_GET['id'];
		$messages=Messages::ajax_chat($id);
		echo JSON_encode($messages);
	}

    //send message
	public function ajax_send_message(){
		$message=htmlspecialchars(strip_tags($_GET['message']));
		$id=$_GET['id'];
		Messages::ajax_send_message($message,$id);
		$response=['response'=>'da'];
		echo JSON_encode($response);
		
	}

	//display all notifications for parents
	public function notifications(){
		$view = new View();
		$news=News::notifications();
		$view->data['news'] = $news;
		$view->load_view('parent', 'pages', 'notifications');		
	}

	//display open door page
	public function open(){
		$view = new View();
		//show all posibile appointments
		$professors=OpenDoor::open_professors();
		//show status of appointment requests
		$open_sent=OpenDoor::open_response();
		$view->data['open_sent'] = $open_sent;
		$view->data['professors'] = $professors;
		$view->load_view('parent', 'pages', 'open');	
	}

    //send request for appointment 
	public function open_send_request(){
		$open_id = $this->demand->parts_of_url[5];
		$open_sent=OpenDoor::open_request($open_id);
		if (isset($_SERVER["HTTP_REFERER"])) {
			header("Location: " . $_SERVER["HTTP_REFERER"]);
		}
		
	}






	
}