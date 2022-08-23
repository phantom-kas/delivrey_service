<?php
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

        
    }
    ?>