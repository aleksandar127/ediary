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
        $grades = Parents::index();
		$view->data['grades'] = $grades;	
		$view->load_view('parent', 'pages', 'home');

	}


    public function logout()
	{
		$access_destroy = BaseAccessController::logout($_COOKIE['id'], $_COOKIE['loginhash']);
		header('Location: http://localhost/eDiary/task1/');
		die();
		
	}

	public function messages(){
		$view = new View();
		$messages=Parents::get_new_messages();
		$parents=Parents::parents_chat();
		$view->data['all_messages'] = $messages;
		$view->data['parents'] = $parents;
		$view->load_view('parent', 'pages', 'messages');
		
		

	}
	public function ajax(){
		$messages=Parents::get_new_messages();
		echo JSON_encode($messages);
		

	}

	public function ajax_is_read(){
		
		$id=$_GET['id'];
		$messages=Parents::ajax_is_read($id);
		if($messages)
		$response=['response'=>true];
		else
		$response=['response'=>false];
		echo JSON_encode($response);
		

	}

	public function ajax_chat(){
		
		$id=$_GET['id'];
		$messages=Parents::ajax_chat($id);
		echo JSON_encode($messages);

	}


	public function ajax_send_message(){
		$message=htmlspecialchars(strip_tags($_GET['message']));
		$id=$_GET['id'];
		Parents::ajax_send_message($message,$id);
		$response=['response'=>'da'];
		echo JSON_encode($response);
		
	}
	public function notifications(){
		$view = new View();
		$news=Parents::notifications();
		$view->data['news'] = $news;
		$view->load_view('parent', 'pages', 'notifications');
		
		
	}

	public function open(){
		$view = new View();
		$professors=Parents::open_professors();
		$open_sent=Parents::open_response();
		$view->data['open_sent'] = $open_sent;
		$view->data['professors'] = $professors;
		$view->load_view('parent', 'pages', 'open');
		
		
	}

	public function open_send_request(){

		$open_id = $this->demand->parts_of_url[5];
		$open_sent=Parents::open_request($open_id);
		if (isset($_SERVER["HTTP_REFERER"])) {
			header("Location: " . $_SERVER["HTTP_REFERER"]);
		}
		return;
		
		
		
	}






	
}