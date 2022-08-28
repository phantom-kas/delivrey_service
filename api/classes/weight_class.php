<?php
    include_once 'db_object.php';

    

    class item_weight_class extends Db_object
    {

        public $table = 'weught_classes';
        public $id = 'WID';
        public $max = 'max';
        public $min = 'min';
        public $cost = 'cost';


        public $idV;
        public $maxV;
        public $minV;
        public $costV;

        public function getWeightClasses()
        {
            
        }
    }