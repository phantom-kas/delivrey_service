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
        public $cost = 'cost_of_delivery';
        public $flag = 'flag';
        public $WID = 'WID';
        public $PPID = 'PPID';
        public $city = 'city_ID';
        public $CID = 'CID';


        public $IIDV;
        public $DIDV;
        public $time_stampV;
        public $from_UIDV;
        public $to_UIDV;
        public $img_srcV;
        public $costV;
        public $flagV;
        public $WIDV;
        public $PPIDV;

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

        public function approveDelivery()
        {
            $server_result['status'] = 'success';
           
            $sql = "UPDATE {$this->table} SET {$this->flag} = 0, {$this->cost} = ?, {$this->WID} = ?, {$this->PPID} = ? WHERE {$this->IID} = ?";


            
        
            $stmt = $this->_mysqli->prepare($sql);
            $stmt->bind_param("iiii",$this->costV,$this->WIDV, $this->PPIDV, $this->IIDV);
            $stmt->execute();
            if($this->_mysqli->errno !== 0) {
                $server_result =  $this->errorMessage('MySQLi error #: ' .  $this->_mysqli->errno . ': ' . $this->_mysqli->error);

                }
                else
                {
                    $server_result ['message'] = 'Item pending delivery';
                }
            return $server_result;
        }
        public function getCostOfDelivery()
        {
            $server_result['status'] = 'success';
$sql = 'SELECT w.cost FROM weught_classes as w INNER JOIN delivery_items as di on w.WID = di.WID WHERE di.IID = ?';
            $stmt = $this->_mysqli->prepare($sql);
            $stmt->bind_param("i", $this->IIDV);
            $stmt->execute();
            if($this->_mysqli->errno === 0)
            {
                $results = $stmt->get_result();
                $rows = $results->fetch_all(MYSQLI_ASSOC);
            
                $server_result['data'] =  $rows[0]['cost'];
            }
                        else
                        {
                            $server_result['status'] = 'error';
                        $server_result['message'] = 'MySQLi error #: ' .  $this->_mysqli->errno . ': ' . $this->_mysqli->error;
                        }
                        return $server_result;
        }
        


        public function addToDelivery()
        {
            $server_results['status'] = 'success';
         $sql = "UPDATE {$this->table}
         SET {$this->DID} = ?
         WHERE {$this->IID}=?";
        
         $stmt = $this->_mysqli->prepare($sql);
         $stmt->bind_param("ii",$this->DIDV, $this->IIDV);
         $stmt->execute();
         if($this->_mysqli->errno !== 0) {
             $server_results['status'] = 'error';
             $server_results['control'] = 'form';
             $server_results['message'] = 'MySQLi error #: ' .
            $this->_mysqli->errno . ': ' . $this->_mysqli->error;
             }
             else
             {
                $server_results['message'] = 'added to bdelivery';
             }
         return $server_results;
        }
        

        }


    
    ?>