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

        }


    
    ?>