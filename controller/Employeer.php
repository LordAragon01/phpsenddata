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

    //public $employeer_data = [];

/*     public function __construct(array $employeer_data){

        $this->employeer_data = $employeer_data;

    } */

    public function getEmployeer(){

        return $this->name;

    }
    
    public function setEmployeer($name){

        $this->name = $name;

        return $this->name;

    }

    /**
     * Insert data in Employeer Table
     *
     * @param array $employeer_data
     * @return bool
     */
    public function insertEmployeerTable(array $employeer_data):bool
    {


        try{

            $this->query("INSERT INTO employees (name, age, job, salary, admission_date) VALUES (:name, :age, :job, :salary, :admission_date)", $employeer_data);

            return true;


        }catch(PDOException $exception){

           if($exception){

                return false;
                //return $exception->getMessage();

           }

        }

    }

    /**
     * Get the Last Insert Id in the Employees Table
     *
     * @param boolean $confirm
     * @return integer
     */
    public function getLastIdEmployeerTable(bool $confirm):int
    {

        if($confirm === true){

            $id = $this->selectOnly("SELECT MAX(id) AS 'id_employees' FROM `employees`");

            return $id ["id_employees"];

        }
        

    }

    public function insertProjectsTable(array $employeer_data):bool
    {


        try{

            $this->query("INSERT INTO projects (id_employee, description, value, status, delivery_date) VALUES (:id_employee, :description, :value, :status, :delivery_date)", $employeer_data);

            return true;


        }catch(PDOException $exception){

           if($exception){

                return false;
                //return $exception->getMessage();

           }

        }

    }

}
