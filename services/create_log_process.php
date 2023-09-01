<?php

$process_message       = isset($_GET['process_message']) ? htmlspecialchars(trim($_GET['process_message'])) : '';

class CreateLogProcess 
{
    public $date;
    public $start_log;
    public $fileName;
    public $stmt;
    public function create_log_process($process_message) 
    {
        $this->date       = date('ymd');
        $this->start_log  = "Date Create Log ".$this->date;
        $this->fileName   = "log_".$this->date.".txt";
        $this->stmt       = $this->start_log." = ".$process_message;
        // $shell            = shell_exec("echo $this->stmt >> $this->fileName");
        file_put_contents($this->fileName , $this->stmt."\n", FILE_APPEND);
            
    }
    public function reset_log_process() 
    {
        $this->date       = date('ymd');
        $this->fileName   = "log_".$this->date.".txt";
        $this->stmt       = "";
        // $shell            = shell_exec("echo $this->stmt > $this->fileName");
        file_put_contents($this->fileName , $this->stmt);
        echo "Clear Log in filename $this->fileName Success. ";
    }
   
}

$log = new CreateLogProcess;
// $log->create_log_process('test create log');
$log->reset_log_process();
?>