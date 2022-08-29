<?php
    include_once 'db_object.php';

    

    class packages extends Db_object
    {

        public $table = 'packages';
       public $id = 'PPID';
       public $package = 'package';
       public $rv = 'relative_volume';



       public $idV;
       public $packageV;
       public $rvV;

        public function getPackageVolume()
        {

            $server_result['status'] = 'success';
            $sql = "SELECT {$this->rv} From {$this->table} WHERE {$this->idV} = ?";

                        $stmt = $this->_mysqli->prepare($sql);
                        $stmt->bind_param("i", $this->idV);
                        $stmt->execute();
                        if($this->_mysqli->errno === 0)
                        {
                            $results = $stmt->get_result();
                            $rows = $results->fetch_all(MYSQLI_ASSOC);
                        
                            $server_result['data'] =  $rows[0][$this->rv];
                        }
                                    else
                                    {
                                        $server_result['status'] = 'error';
                                    $server_result['message'] = 'MySQLi error #: ' .  $this->_mysqli->errno . ': ' . $this->_mysqli->error;
                                    }
                                    return $server_result;
        }
    }