<?php
    include_once 'db_object.php';

    

    class User extends Db_object
    {
        public $table = 'user';
       
        public $id = 'UID';
        public $email = 'email';
        public $pas = 'pass';
        public $last_name = 'last_name';
        public $first_name = 'first_name';
        public $img_src = 'img_urn';
        public $city = 'city_ID';
        public $address = 'address';
        public $country = 'CID';
        public $PID = 'PID';
        public $vercode = 'vercode';
        public $ad = 'ad';
        public $total_cost = 'total_cost';
        
        public $idV;
        public $emailV;
        public $pasV;
        public $last_nameV;
        public $first_nameV;
        public $img_srcV;
        public $cityV;
        public $addressV;
        public $countryV;
        public $PIDV;
        public $vercodeV;
        public $adV;



        
        public function HasUser()
        {   
            $smt = $this->_mysqli->prepare("SELECT * FROM {$this->table} WHERE  {$this->email} = ? ");
            $smt->bind_param('s',$this->emailV);
            $smt->execute();
            $results = $smt->get_result();
            if($this->_mysqli->errno === 0)
            {  
                if( $results->num_rows > 0)
                {
                    $server_result['status'] = 'error';
                    $server_result['message'] = 'Error Username/email has already been taken, try another one';
                    $server_result['control'] = 'user-name';
                    return true;
                }
                return false;
            }
            else
            {
                return  $this->errorMessage('MySQLi error #: ' .  $this->_mysqli->errno . ': ' . $this->_mysqli->error);
            }
        }

                public function getSigninfo()
                {
                    $server_result['status'] = 'success';
                    $smt = $this->_mysqli->prepare("SELECT * FROM `user` WHERE email = ? LIMIT 1");
                   $smt->bind_param('s',$this->emailV);
                    $smt->execute();
                    $result = $smt->get_result();
                
                if($this->_mysqli->errno === 0)
                {  

                    if($result->num_rows !== 0)
                        {
                            $row = $result->fetch_all(MYSQLI_ASSOC);
                            
                        
                            $this->pasV =  $row[0][$this->pas];
                            $this->first_nameV = $row[0][$this->first_name];
                            $this->last_nameV = $row[0][$this->last_name];
                            $this->idV = $row[0][$this->id];
                            $this->img_srcV = $row[0][$this->img_src];
                            $this->cityV = $row[0][$this->city];
                            $this->countryV = $row[0][$this->country];
                            $this->adV =  $row[0][$this->ad];
                        }
                        else
                        {
                            $server_result = $this->errorMessage('username not associated with any account');
                        }
                }else if($this->_mysqli->errno !== 0) 
                {
                    $server_result =  $this->errorMessage('MySQLi error #: ' .  $this->_mysqli->errno . ': ' . $this->_mysqli->error);
                }
                return $server_result;

            }



    public function checkPass($pass)
    {
        $server_result['status'] = 'success';
        $password = filter_var($pass, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if (!$password) 
        {
            
            $server_result =  $this->errorMessage('Sorry, but the password you used was invalid. Please try again.');
        
        }
        else
        {

            if(!password_verify($password,$this->pasV))
            {
                $server_result =  $this->errorMessage('Sorry,  but the password you used was incorrect. Please try again.');
                
                 
            }
            else
            {
                $server_result['message'] = 'march';
            }
           
        
     }
     return $server_result;

    }



    public function signInUser()
        {
            session_unset();
            $_SESSION['user_name'] = $this->emailV;
            $_SESSION[$this->last_name] = $this->last_nameV;
            $_SESSION[$this->first_name] = $this->first_nameV;
            $_SESSION[$this->img_src] =$this->img_srcV ;
            $_SESSION['user_id'] = $this->idV ;
            $_SESSION['currentCity'] = $this->cityV;
            $_SESSION['country'] = $this->countryV;
            if( $this->adV > -1)
            {
                $_SESSION['ad'] = $this->adV;
            }
           
            
            $server_result['status'] = 'success';
            $server_result['message'] = 'log in successfull';
       
        return $server_result;
        }

        public function registerUser()
        {
            $server_result['status'] = 'success';
            if(strlen($this->pasV) < 8 ) {
               $server_result = $this->errorMessage('Sorry, but the
               password must be at least 8 characters long. Please try
               again.');
               return $server_result;
                } else {
                // If all's well, hash the password
                $this->pasV = password_hash($this->pasV, PASSWORD_DEFAULT);
                }
            
            
            $smt = $this->_mysqli->prepare("INSERT INTO {$this->table} ({$this->email},{$this->last_name},{$this->first_name},{$this->city},{$this->address},{$this->vercode},{$this->country},{$this->PID},{$this->pas}) VALUES(?,?,?,?,?,?,?,?,?)");
            $smt->bind_param('sssissiis',$this->emailV,$this->last_nameV,$this->first_nameV,$this->cityV,$this->addressV,$this->vercodeV,$this->countryV,$this->PIDV,$this->pasV);
            $smt->execute();
           
            if($this->_mysqli->errno !== 0) 
            {
                $server_result =  $this->errorMessage('MySQLi error #: ' .  $this->_mysqli->errno . ': ' . $this->_mysqli->error);
            }
            return $server_result; 
        }



        public function veriFyAccount($root)
        {
                // Create a random, 32-character verification code
                $this->vercodeV = bin2hex(openssl_random_pseudo_bytes(16));
                // Send the verification email
                $send_to =$this->emailV;
                $subject = 'Please verify your account';
                $header = 'From: '.$root.  "\r\n" .'Content-Type: text/plain';
                $body = <<<BODY
               You have a new user account on the shop and delivery service.
               Your username is this address: {$this->emailV}
               Please activate your account by clicking the link below. 
               {$root}/Customers/verify_user.php?vercode={$this->vercodeV}&username={$this->emailV}
               
               
               Thanks!
               
               boxbreakerglobal.com
               BODY;
               $mail_sent = mail($send_to, $subject, $body, $header);
               return $mail_sent;    
        }
        
        public function unverify()
        {
         $server_results['status'] = 'success';
         $sql = "UPDATE employees
         SET verified=1
         WHERE email=?";
         $stmt = $this->_mysqli->prepare($sql);
         $stmt->bind_param("s", $this->emailV);
         $stmt->execute();
         if($this->_mysqli->errno !== 0) {
             $server_results['status'] = 'error';
             $server_results['control'] = 'form';
             $server_results['message'] = 'MySQLi error #: ' .
            $this->_mysqli->errno . ': ' . $this->_mysqli->error;
             }
         return $server_results;
        }




        public function resetPassword()
    {
        $server_results['status'] = 'success';
        if(strlen($this->pasV) < 8 ) {
            $server_results['status'] = 'error';
            $server_results['control'] = 'password';
            $server_results['message'] = 'Sorry, but the
           password must be at least 8 characters long. Please try
           again.';
            } else {
            // If all's well, hash the password
            $this->pasV = password_hash($this->pasV, PASSWORD_DEFAULT);
            }

        if($server_results['status'] === 'success')
        {
            $sql = "UPDATE employees
            SET {$this->pss} = ?
            WHERE email=?";
            $stmt = $this->_mysqli->prepare($sql);
            $stmt->bind_param("ss",$this->pasV,$this->emailV);
            $stmt->execute();
            if($this->_mysqli->errno !== 0) {
                $server_results['status'] = 'error';
                $server_results['control'] = 'form';
                $server_results['message'] = 'MySQLi error #: ' .
            $this->_mysqli->errno . ': ' . $this->_mysqli->error;
            }
            else
            {
                $this->unverify();
            }

        }
    
    
    
    
    
    
        return $server_results;
    }
        public function getId()
        {
            
            $server_result['status'] = 'success';
            
            $smt = $this->_mysqli->prepare("SELECT {$this->id} FROM {$this->table} WHERE {$this->email} = ?");
            $smt->bind_param('i',$this->emailV);
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
        


        public function getAllUsers()
        {
            $server_result['status'] = 'success';
            $smt = $this->_mysqli->prepare($this->selWithUser());
           
            $smt->execute();
            $result = $smt->get_result();
        
            if($this->_mysqli->errno === 0)
            {  

            
                        $row = $result->fetch_all(MYSQLI_ASSOC);
                        
                        $server_result['data'] = $row;
                
            }else if($this->_mysqli->errno !== 0) 
            {
                $server_result =  $this->errorMessage('MySQLi error #: ' .  $this->_mysqli->errno . ': ' . $this->_mysqli->error);
            }
            return $server_result;

        }

        public function getSingleUserByID()
        {
            $server_result['status'] = 'success';
            $smt = $this->_mysqli->prepare($this->selWithUser().' WHERE u.UID = ?');
            $smt->bind_param('i', $this->idV);
            $smt->execute();
            $result = $smt->get_result();
        
            if($this->_mysqli->errno === 0)
            {  

            
                        $row = $result->fetch_all(MYSQLI_ASSOC);
                        
                        $server_result['data'] = $row;
                
            }else if($this->_mysqli->errno !== 0) 
            {
                $server_result =  $this->errorMessage('MySQLi error #: ' .  $this->_mysqli->errno . ': ' . $this->_mysqli->error);
            }
            return $server_result;

        }
        public function updateCost($sum)
        {
            $server_results['status'] = 'success';
            $sql = "UPDATE {$this->table}
            SET {$this->total_cost} = {$this->total_cost} + ?
            WHERE {$this->id}=?";
            $stmt = $this->_mysqli->prepare($sql);
            $stmt->bind_param("ii", $sum,$this->idV,);
            $stmt->execute();
            if($this->_mysqli->errno !== 0) {
                $server_results['status'] = 'error';
                $server_results['control'] = 'form';
                $server_results['message'] = 'MySQLi error #: ' .
               $this->_mysqli->errno . ': ' . $this->_mysqli->error;
                }
            return $server_results;
        }

        public function updateNumdeliveries()
        {
            $server_results['status'] = 'success';
            $sql = "UPDATE {$this->table}
            SET total_deliveries = total_deliveries + 1
            WHERE {$this->id}=?";
            $stmt = $this->_mysqli->prepare($sql);
            $stmt->bind_param("i",$this->idV,);
            $stmt->execute();
            if($this->_mysqli->errno !== 0) {
                $server_results['status'] = 'error';
                $server_results['control'] = 'form';
                $server_results['message'] = 'MySQLi error #: ' .
               $this->_mysqli->errno . ': ' . $this->_mysqli->error;
                }
            return $server_results;
        }


        public function getUsers($sort)
        {
        $server_result['status'] = 'success';
        $sql = "SELECT first_name, last_name img_urn, address, total_cost ,total_deliveries,time_stamp FROM {$this->table} {$sort}";
           
        $smt = $this->_mysqli->prepare($sql);
       
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