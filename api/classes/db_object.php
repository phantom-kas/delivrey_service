<?php
include_once '../../private/session/session.php';


     class Db_object
    {
        private $_mysqli;
        public $table;
        public $lim = 30;
        
        public function decs($last)
        {
            return "t1.{$this->ID} < $last ORDER BY t1.{$this->ID} DESC limit {$this->lim}";
        }

        public function __construct($mysqli = NULL)
        {
            $this->_mysqli = $mysqli;
        }

        public function selectAll()
        {
        $server_results['status'] = 'success';
        $server_results['has'] = false;
        $smt = $this->_mysqli->prepare("SELECT * FROM {$this->table}");
        $smt->execute();  

                    if($this->_mysqli->errno !== 0)
                    {
                        $server_results['status'] = 'error';
                    $server_results['message'] = 'MySQLi error #: ' .  $this->_mysqli->errno . ': ' . $this->_mysqli->error;
                    }
                    return $server_results;
                
        }
        public function selecJoinUeser()
        {

        }
        public function errorMessage($msg = 'unkown error')
        {
            $server_result['status'] = 'error';
            $server_result['message'] = $msg;
            return $server_result;
        }
        public function pg_Email($em='email',$pg = 'post',$msg = 'on email is set')
        {
            $var = $pg === 'get' ? $_GET[$em] : $_POST[$em];

            if(isset($var))
            { 
                echo json_encode($this->errorMessage($msg),JSON_HEX_APOS | JSON_HEX_QUOT);  
                exit();
            }
            if(empty($var))
            {
                echo json_encode($this->errorMessage($msg),JSON_HEX_APOS | JSON_HEX_QUOT);  
                exit();
            }
            return $var;
        }

        public function pg_var($em,$pg = 'post',$msg = 'all fileds must be filed')
        {
            $var = $pg === 'get' ? $_GET[$em] : $_POST[$em];

            if(isset($var))
            { 
                echo json_encode($this->errorMessage($msg),JSON_HEX_APOS | JSON_HEX_QUOT);  
                exit();
            }
            if(empty($var))
            {
                echo json_encode($this->errorMessage($msg),JSON_HEX_APOS | JSON_HEX_QUOT);  
                exit();
            }
            return $var;
        }

        
    }
    ?>