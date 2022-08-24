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



        
        public $idV;
        public $emailV;
        public $pasV;
        public $last_nameV;
        public $first_nameV;
        public $img_srcV;



        
        public function HasUser()
        {   
            $smt = $this->_mysqli->prepare("SELECT * FROM {$this->table} WHERE  {$this->email} = ? || {$this->id} = ?");
            $smt->bind_param('ss',$this->emailV,$this->idV);
            $smt->execute();
            $results = $smt->get_result();
            if( $results->num_rows > 0)
            {
                $server_result['status'] = 'error';
                $server_result['message'] = 'Error Username/email has already been taken, try another one';
                $server_result['control'] = 'user-name';
                return true;
            }
            return false;
        }

                public function getSigninfo()
                {
                    $server_result['status'] = 'success';
                    $smt = $this->_mysqli->prepare("SELECT * FROM  {$this->table} WHERE  {$this->email} = ? LIMIT  1");
                    $smt->bind_param('s',$this->nameV);
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
           
            
            $server_result['status'] = 'success';
            $server_result['message'] = 'log in successfull';
       
        return $server_result;
        }

    }
?>