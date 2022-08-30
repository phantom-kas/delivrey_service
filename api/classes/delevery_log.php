<?php
    include_once 'db_object.php';

    

    class delivery_log extends Db_object
    {

        public $table = 'delivery_log';
        public $id = 'delivery_logs_ID';
        public $time_stamp = 'time_stamp';
        public $UID = 'UID';
        public $DFID = 'DFID';
        public $DID = 'DID';
        public $IID = 'IID';
        public $report = 'report';



        public $idV;
        public $time_stampV;
        public $UIDV;
        public $DFIDV;
        public $DIDV;
        public $IIDV;
        public $reportV;

        public function enterLog()
        {
            $server_result['status'] = 'success';
            $sql = "INSERT INTO {$this->table} ( {$this->UID}, {$this->DID}, {$this->IID},{$this->report},{$this->DFID}) VALUES (?,?,?,?,?)";
              
            $smt = $this->_mysqli->prepare($sql);
            $smt->bind_param('iiisi',$this->UIDV,$this->DIDV,$this->IIDV,$this->reportV,$this->DFIDV);
            $smt->execute();
           
            if($this->_mysqli->errno !== 0) 
            {
                $server_result =  $this->errorMessage('MySQLi error #: ' .  $this->_mysqli->errno . ': ' . $this->_mysqli->error);
            }
            return $server_result; 
        }
   
        public function getDeliverylogs($where)
        {
            $server_result['status'] = 'success';
            $sql = "SELECT dl.{$this->time_stamp}, dl.{$this->id}, dl.{$this->report}, dl.{$this->IID}, dt.flag as dtflag,df.DFID,df.discription FROM  {$this->table} as dl INNER JOIN delivery_details as dt on dl.DID = dt.DID INNER JOIN delivry_flag as df on dl.DFID = df.DFID  {$where} ";
            
                        $stmt = $this->_mysqli->prepare($sql);
                       
                        $stmt->execute();
                        if($this->_mysqli->errno === 0)
                        {
                            $results = $stmt->get_result();
                            if( $results->num_rows > 0)
                            {
                               
                                $rows = $results->fetch_all(MYSQLI_ASSOC);
                            
                                $server_result['data'] =  $rows;
                            }
                            else
                            {  return  $this->errorMessage('No logs made yet');
                            }
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
