<?
class Class_SendMail{
	
	public $from;
	public $to;
	public $subject;
	public $name_from;
	public $message;
	
	function __construct(){
	
	}

	public function send(){		
		$header  = "MIME-Version: 1.0\r\n";
		$header .= "Content-type: text/html; charset=utf-8\r\n";
		$header .= "From: ". $this->name_from ."<". $this->from .">\r\n";
		
		$this->message = str_replace("\n", "<br>", $this->message);
		return @mail($this->to, $this->subject, $this->message, $header);
	}

}

?>