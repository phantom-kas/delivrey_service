<?php
    include_once 'db_object.php';

    

    class country extends Db_object
    {
        public $id = 'CID';
        public $adress = 'country';
        public $address = 'address';
        public $table = 'country_capital';



        public $idV;
        public $adressV;
        public $addressV;
        public $tableV;
    }