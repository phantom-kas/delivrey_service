<?php
    include_once 'db_object.php';

    

    class city extends Db_object
    {
        public $table = 'cities';
        public $id = 'city_ID';
        public $city = 'city';
        public $CID = 'CID';


        public $tableV;
        public $idV;
        public $cityV;
        public $CIDV;
    }