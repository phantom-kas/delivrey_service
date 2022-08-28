<?php
    include_once 'db_object.php';

    

    class delivery_item extends Db_object
    {
        public $table = 'delivery_items';
       
       
        public $IID = 'IID';
        public $DID = 'DID';
        public $time_stamp = 'time_stamp';
        public $from_UID = 'from_UID';
        public $to_UID	 = 'to_UID';
        public $img_src = 'img_src';



        public $IIDV;
        public $DIDV;
        public $time_stampV;
        public $from_UIDV;
        public $to_UIDV;
        public $img_srcV;

        public function addItemToBeDelivered()
        {
            $server_result['status'] = 'success';
            $sql = "INSERT INTO delivery_items ( {$this->from_UID}, {$this->to_UID}, {$this->img_src},{$this->time_stamp}) VALUES (?,?,?,?)";

            $smt = $this->_mysqli->prepare($sql);
            $smt->bind_param('iiss',$this->from_UIDV,$this->to_UIDV,$this->img_srcV,$this->time_stampV);
            $smt->execute();
           
            if($this->_mysqli->errno !== 0) 
            {
                $server_result =  $this->errorMessage('MySQLi error #: ' .  $this->_mysqli->errno . ': ' . $this->_mysqli->error);
            }
            return $server_result; 
        }


        public function selectDItems()
        {
             
            $server_result['status'] = 'success';
            //echo "{$this->selu()}, {$this->selu1()} {$this->selu_end()}";
            $smt = $this->_mysqli->prepare("{$this->selu()}, {$this->selu1()} {$this->selu_end()} ");
            //$smt->bind_param('i',$this->emailV);
            $smt->execute();  

            if($this->_mysqli->errno === 0)
            {
                $results = $smt->get_result();
                $rows = $results->fetch_all(MYSQLI_ASSOC);
            
                $server_result['data'] =  $rows;
            }
                        else
                        {
                            $server_result['status'] = 'error';
                        $server_result['message'] = 'MySQLi error #: ' .  $this->_mysqli->errno . ': ' . $this->_mysqli->error;
                        }
                        return $server_result;
        }


        public function selectSingleDItems()
        {
             
            $server_result['status'] = 'success';
           // echo "{$this->selu()}, {$this->selu1()} {$this->selu_end()}";
            $smt = $this->_mysqli->prepare("{$this->selu()}, {$this->selu1()} {$this->selu_end()} WHERE i1.{$this->IID} = ?");
            $smt->bind_param('i',$this->IIDV);
            $smt->execute();  

            if($this->_mysqli->errno === 0)
            {
                $results = $smt->get_result();
                $rows = $results->fetch_all(MYSQLI_ASSOC);
            
                $server_result['data'] =  $rows;
            }
                        else
                        {
                            $server_result['status'] = 'error';
                        $server_result['message'] = 'MySQLi error #: ' .  $this->_mysqli->errno . ': ' . $this->_mysqli->error;
                        }
                        return $server_result;
        }

        }


    
    ?>