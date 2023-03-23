<?php

namespace Controller\Employeer;

include_once __DIR__ . '/../Bd/Connect.php';

use PDOException;
use Source\Bd\Connect;

class Employeer extends Connect{

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

    public $employeer_data = [];

    public function __construct(array $employeer_data){

        $this->employeer_data = $employeer_data;

    }

    public function getEmployeer(){

        return $this->name;

    }
    
    public function setEmployeer($name){

        $this->name = $name;

        return $this->name;

    }

    public function insertEmployeerTable(){


        try{

            $confirm = $this->query("INSERT INTO employees (name, age, job, salary, admission_date) VALUES (:name, :age, :job, :salary, :admission_date)", $this->employeer_data);

            return $confirm;

        }catch(PDOException $exception){

            var_dump($exception);

        }

    }

}
