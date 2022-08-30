<?php
    include_once '../../../private/session/session.php';
    include_once '../../../private/db/db.php';


     class Db_object
    {
        
        protected $_mysqli;
        public $table;
        public $lim = 30;
        
        public function __construct($mysqli = NULL)
        {
            $this->_mysqli = $mysqli;
        }

        public function decs($last)
        {
            return "t1.{$this->ID} < $last ORDER BY t1.{$this->ID} DESC limit {$this->lim}";
        }

        

        public function selectAll()
        {
        $server_result['status'] = 'success';
        $smt = $this->_mysqli->prepare("SELECT * FROM {$this->table}");
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


        public function selectSingle()
        {
            $server_result['status'] = 'success';
          
            $smt = $this->_mysqli->prepare("SELECT * FROM {$this->table} WHERE {$this->id} = ?");
            $smt->bind_param('i',$this->idV);
            $smt->execute();  
    
                        if($this->_mysqli->errno !== 0)
                        {
                            $server_result['status'] = 'error';
                        $server_result['message'] = 'MySQLi error #: ' .  $this->_mysqli->errno . ': ' . $this->_mysqli->error;
                        }
                        return $server_result;
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
            
            if($pg === 'get')
            {
                if(!isset($_GET[$em]))
                { 
                    echo json_encode($this->errorMessage($msg),JSON_HEX_APOS | JSON_HEX_QUOT);  
                    exit();
                }
                if(empty($_GET[$em]))
                {
                    echo json_encode($this->errorMessage($msg),JSON_HEX_APOS | JSON_HEX_QUOT);  
                    exit();
                }
                return $_GET[$em];
            }
            if($pg === 'post')
            {
                if(!isset($_POST[$em]))
                { 
                    echo json_encode($this->errorMessage($msg),JSON_HEX_APOS | JSON_HEX_QUOT);  
                    exit();
                }
                if(empty($_POST[$em]))
                {
                    echo json_encode($this->errorMessage($msg),JSON_HEX_APOS | JSON_HEX_QUOT);  
                    exit();
                }
                return $_POST[$em];
            }
            
        }

        public function pg_var($em,$pg = 'post',$msg = 'all fileds must be filed')
        {
            

            if($pg === 'get')
            {
                if(!isset($_GET[$em]))
                { 
                    echo json_encode($this->errorMessage($msg),JSON_HEX_APOS | JSON_HEX_QUOT);  
                    exit();
                }
                if(empty($_GET[$em]))
                {
                    echo json_encode($this->errorMessage($msg),JSON_HEX_APOS | JSON_HEX_QUOT);  
                    exit();
                }
                return $_GET[$em];
            }
            if($pg === 'post')
            {
                if(!isset($_POST[$em]))
                { 
                    echo json_encode($this->errorMessage($msg),JSON_HEX_APOS | JSON_HEX_QUOT);  
                    exit();
                }
                if(empty($_POST[$em]))
                {
                    echo json_encode($this->errorMessage($msg),JSON_HEX_APOS | JSON_HEX_QUOT);  
                    exit();
                }
                return $_POST[$em];
            }
        }
        public function selWithUser()
        {
            return "SELECT  c.city,CC.country,u.first_name,u.UID,  u.last_name, u.pass, u.img_urn, u.time_stamp, u.UID, u.email, u.address FROM user as u  INNER JOIN country_capital as CC  ON u.CID = CC.CID INNER JOIN cities as c on c.city_ID = u.city_ID";
        }


        public function selu()
        {
            return "SELECT i1.{$this->img_src} as itemImg,i1.{$this->time_stamp} as reqtime,i1.{$this->PPID},i1.DID,i1.{$this->IID},u1.{$this->CID},u1.{$this->city}, i1.flag,df.discription, u.first_name,u.UID,  u.last_name, u.img_urn, u.time_stamp, u.email, u.address";
        }


        public function selu_end()
        {
            return "INNER JOIN user as  u  ON i1.{$this->from_UID} = u.UID ";
        }

        public function selu1()
        {
            return "
            c.city,CC.country,
            u1.first_name as u1first_name,
            u1.UID as uiUID,
            u1.last_name as u1last_name, 
            u1.img_urn as u1img_urn,
            u1.time_stamp as u1time_stamp,  
            u1.email as u1email, 
            u1.address as u1address
            FROM user as u1  INNER JOIN {$this->table} as i1  ON i1.{$this->to_UID} = u1.UID
            INNER JOIN country_capital as CC  ON u1.CID = CC.CID INNER JOIN cities as c on c.city_ID = u1.city_ID
            INNER JOIN delivry_flag as df on df.DFID = i1.flag
            "; 
        }



        public function updateIMG_URN()
        {
            


            $server_result['status'] = 'success';
            
            $smt = $this->_mysqli->prepare("UPDATE user SET img_urn = ? WHERE user.UID = ?");
            $smt->bind_param('si',$this->img_srcV, $this->idV);
            $smt->execute();  

            if($this->_mysqli->errno !== 0)
            {
                $server_result['status'] = 'error';
                $server_result['message'] = 'MySQLi error #: ' .  $this->_mysqli->errno . ': ' . $this->_mysqli->error;
               
            }
                        
            return $server_result;
        }

        
    }
    ?>