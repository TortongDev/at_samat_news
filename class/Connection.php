<?php
    require_once dirname(dirname(__FILE__))."\config\db\config.php";

    class Connection 
    {
        public $HOSTNAME = HOSTNAME;
        public $USERNAME = USERNAME;
        public $PASSWORD = PASSWORD;
        public $DBNAME   = DBNAME;
        public $pdo;
        public function __construct($status = false) 
        {
            if($status === true):
                $this->open_connection();
            endif;
           
        }
        public function __destruct()
        {
            $this->pdo = null;
        }
        public function open_connection()
        {
            try {
                $this->pdo = new PDO("mysql:host=$this->HOSTNAME;dbname=$this->DBNAME;", $this->USERNAME,$this->PASSWORD);
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                if(DB_TYPE === 'MYSQL'):
                    return $this->pdo;
                else:

                endif;
                
            } catch (PDOException $err) {
                
                echo $err->getMessage();
                header("Location: http://localhost/atsamat/at_samat_news/webpage/page_500.php");
            } finally {
            }
        }
        
        public function close_connection()
        {
            $this->pdo = null;
        }
        
        public function db_insert($sql,$value = [])
        {
            $stmt_insert  = $this->pdo->prepare($sql);
            $stmt_insert->execute($value);
            return json_encode(array('status' => 'insert success'));
        }
        
        public function db_update($sql,$value = [])
        {
            $stmt_insert  = $this->pdo->prepare($sql);
            $stmt_insert->execute($value);
            return json_encode(array('status' => 'update success'));
        }
        
        public function db_query($sql,$key_search = [])
        {
            $stmt_query  = $this->pdo->prepare($sql);
            $stmt_query->execute($key_search);
            $stmt_query = $stmt_query->fetchAll();
            return $stmt_query;
        }

    }
// new Connection(true);
?>