<?php

namespace Controller\Employeer;

class Employeer {

    public $name;
    public $age;
    public $job;
    public $salary;
    public $admission_date;
    public $id_employee;
    public $description;
    public $value;
    public $status;
    public $delivery_date;

    public function getEmployeer(){

        return $this->name;

    }
    
    public function setEmployeer($name){

        $this->name = $name;

        return $this->name;

    }

}
