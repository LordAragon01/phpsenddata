<?php

namespace Controller\Employeer;

include_once __DIR__ . '/../Bd/Connect.php';

use Exception;
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

    /**
     * Get Employee Name
     *
     * @return null|string
     */
    public function getName():?string
    {

        return $this->name;

    }

    /**
     * Set Employee Name
     *
     * @param string|null $name
     * @return void
     */
    public function setName(string $name = null){

        $this->name = $name;

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

    /**
     * Insert data in Project Table
     *
     * @param array $projects_data
     * @return boolean
     */
    public function insertProjectsTable(array $projects_data):bool
    {


        try{

            $this->query("INSERT INTO projects (id_employee, description, value, status, delivery_date) VALUES (:id_employee, :description, :value, :status, :delivery_date)", $projects_data);

            return true;


        }catch(PDOException $exception){

           if($exception){

                return false;
                //return $exception->getMessage();

           }

        }

    }

    /**
     * Get Data from Employee
     *
     * @param string $name
     * @return array
     */
    public function getEmployeer(?string $name):array|string
    {

        if(!is_null($name)){

            $result = $this->selectOnly("SELECT name, age, job, salary, admission_date, description, value,  status, delivery_date FROM `employees` AS e INNER JOIN `projects` AS p ON e.id = p.id_employee WHERE `name` = '". trim(strval($name)) ."' ORDER BY e.id DESC LIMIT 1");

            return $result;

        }else{

            $exception = new Exception("Não existe dados na Tabela");

            return $exception->getMessage();

        }


    }

    /**
     * Get All Data from Employees Table
     *
     * @return array
     */
    public function getAllEmployees():array
    {

        $result = $this->select("SELECT name, age, job, salary, admission_date, description, value,  status, delivery_date FROM `employees` AS e INNER JOIN `projects` AS p ON e.id = p.id_employee ORDER BY e.id ASC");

        return $result;

    }

    /**
     * Get the number of total Employees
     *
     * @return integer|null
     */
    public function totalEmployees():?int
    {

        $result = $this->select("SELECT COUNT('id') AS 'total_employees' FROM `employees`");

        return $result[0]->total_employees;

    }

    /**
     * Get Average Age from Employee
     *
     * @return integer|null
     */
    public function mediaAge():?int
    {

        $total_insert = $this->totalEmployees();

        $result = $this->select("SELECT SUM(age) AS 'total_age' FROM `employees`");
       
        $total_age = $result[0]->total_age;

        $media = $total_age / $total_insert;

        return ceil($media);

    }

    /**
     * Undocumented function
     *
     * @param float $salary
     * @param integer $porcent
     * @return float|int
     */
    public function salaryIncrement(int $salary, int $porcent):float|int
    {


        $increment_salary = ($salary * $porcent) / 100;

        $total_of_salary = $salary + $increment_salary;

        return $total_of_salary;

    }

    /**
     * Get Project if status is concluido ou entregues
     *
     * @return array
     */
    public function getProjectDone():array
    {

        $current_year = date('Y');

        $result = $this->select("SELECT description, value,  status, delivery_date FROM `projects` WHERE `delivery_date` BETWEEN   '".$current_year."-01-01' AND '".$current_year."-12-31' AND `status` = 'concluido' OR `status` = 'entregues' ORDER BY id DESC");

        return $result;

    }

    /**
     * Get Project if status is not conclued
     *
     * @return array
     */
    public function projectNotDone():array
    {


        $result = $this->select("SELECT e.name AS 'nome', p.description, p.value, p.status, p.delivery_date FROM `employees` AS e INNER JOIN `projects` AS p ON e.id = p.id_employee WHERE p.delivery_date BETWEEN '2023-01-01' AND '2023-12-31' AND p.status != 'concluido' ORDER BY p.delivery_date ASC");

        return $result;

    }

}
