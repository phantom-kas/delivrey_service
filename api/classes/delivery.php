<?php
    include_once 'db_object.php';

    

    class delivery extends Db_object
    {

        public $table = 'delivery_details';
    public $from_UID = 'from_UID';
       public $to_UID = 'to_UID';
       public $id = 'DID';
       public $deliverer_UID = 'deliverer_UID';
       public $time_stamp= 'time_stamp';
       public $VID = 'VID';
       public $month = 'month';
       public $year = 'year';
       public $num_i = 'number_of_items';
       public $rv = 'relative_volume_taken';
       public $tocity = '';
       public $city_ID = 'city_ID';
       public $CID = 'CID';
       public $from_city_ID = 'from_city_ID';



       public $from_UIDV;
       public $to_UIDV;
       public $idV;
       public $deliverer_UIDV;
       public $time_stamV;
       public $VIDV;
       public $monthV;
       public $yearV;
       public $num_iV;
       public $rvV;
       public $city_IDV;
       public $CIDV;
       public $from_city_IDV;
        public function getAvailableVansInCity($extraV,$class)
        {

            $server_result['status'] = 'success';
            $sql = "SELECT t1.{$this->id}, t1.{$this->VID},t1.{$this->rv} From delivery_details  as t1 INNER JOIN delivery_vehicle as dv on t1.{$this->VID} = dv.{$this->VID} WHERE t1.{$this->rv} + ? <= dv.capacity && dv.class = ? LIMIT 1";

                        $stmt = $this->_mysqli->prepare($sql);
                        $stmt->bind_param("di", $extraV,$class);
                        $stmt->execute();
                        if($this->_mysqli->errno === 0)
                        {
                            $results = $stmt->get_result();
                            if( $results->num_rows > 0)
                            {
                               
                                $rows = $results->fetch_all(MYSQLI_ASSOC);
                            
                                $server_result['data'] =  $rows[0];
                            }
                            else
                            {  return  $this->errorMessage('No vehicles currently available to deliver to the location please try again later');
                            }
                        }
                                    else
                                    {
                                        $server_result['status'] = 'error';
                                    $server_result['message'] = 'MySQLi error #: ' .  $this->_mysqli->errno . ': ' . $this->_mysqli->error;
                                    }
                                    return $server_result;
        }
        public function updateDelevryWeight($extraV)
        {
            $server_results['status'] = 'success';
            $sql = "UPDATE {$this->table}
            SET {$this->rv} = {$this->rv} + ?
            WHERE {$this->id}=?";
            
            $stmt = $this->_mysqli->prepare($sql);
            $stmt->bind_param("di",$extraV, $this->idV);
            $stmt->execute();
            if($this->_mysqli->errno !== 0) {
                $server_results['status'] = 'error';
                $server_results['control'] = 'form';
                $server_results['message'] = 'MySQLi error #: ' .
               $this->_mysqli->errno . ': ' . $this->_mysqli->error;
                }
                else
                {
                   $server_results['message'] = 'added to delivery';
                }
            return $server_results;
        }
        public function updateNumItemsAdd()
        {
            $server_results['status'] = 'success';
            $sql = "UPDATE {$this->table}
            SET {$this->num_i} = {$this->num_i} + 1
            WHERE {$this->id}=?";
            
            $stmt = $this->_mysqli->prepare($sql);
            $stmt->bind_param("i", $this->idV);
            $stmt->execute();
            if($this->_mysqli->errno !== 0) {
                $server_results['status'] = 'error';
                $server_results['control'] = 'form';
                $server_results['message'] = 'MySQLi error #: ' .
               $this->_mysqli->errno . ': ' . $this->_mysqli->error;
                }
                else
                {
                   $server_results['message'] = 'added to delivery';
                }
            return $server_results;
        }

        public function removeit()
        {
            $server_results['status'] = 'success';
            $sql = "UPDATE {$this->table}
            SET {$this->num_i} = {$this->num_i} - 1
            WHERE {$this->id}=?";
            
            $stmt = $this->_mysqli->prepare($sql);
            $stmt->bind_param("i", $this->idV);
            $stmt->execute();
            if($this->_mysqli->errno !== 0) {
                $server_results['status'] = 'error';
                $server_results['control'] = 'form';
                $server_results['message'] = 'MySQLi error #: ' .
               $this->_mysqli->errno . ': ' . $this->_mysqli->error;
                }
                else
                {
                   $server_results['message'] = 'added to delivery';
                }
            return $server_results;
        }
    }