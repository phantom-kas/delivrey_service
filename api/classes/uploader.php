<?php
      class Uploader
      {
        public $location;
        public $name;
        public $tmp;
        public $key;
        public function __construct($key)
        {
            $this->key = $key;
          $this->name = $_FILES[$this->key]['name'];
        }
        public function uploadProfileImage($location = '../../../assets/imgs/')
        {
           
            $this->location = $location;

            if(move_uploaded_file( $_FILES[$this->key]['tmp_name'],$location.$this->name))
                {
                   
                    return true;
                }
                else
                {
                    
                    return false;
                }
                
        }

      }
?>