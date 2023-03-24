<?php

use Controller\Employeer\Employeer;

require_once __DIR__ . DIRECTORY_SEPARATOR . '..'. DIRECTORY_SEPARATOR .'controller'. DIRECTORY_SEPARATOR .'Employeer.php';


$data_form = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if($data_form !== null){

    $get_clean_data = array_map("strip_tags", $data_form);

    //Verify type of values in array
    $first_verify_list = [$get_clean_data["employeer_name"], $get_clean_data["employeer_job"], $get_clean_data["employeer_description"], $get_clean_data["employeer_status"]];
    $verify_value_isnumber = array_filter($first_verify_list, "ctype_digit");
    //$verify_value_iscontainnumber = array_filter($first_verify_list, "ctype_alnum");
    //$verify_empty_value = array_filter($first_verify_list, "empty");

    if(count($verify_value_isnumber) == 0){

        $data_send_db = new stdClass;
        $data_send_db->name = strval($get_clean_data["employeer_name"]);
        $data_send_db->age = intval($get_clean_data["employeer_age"]);
        $data_send_db->job = strval($get_clean_data["employeer_job"]);
        $data_send_db->salary = intval($get_clean_data["employeer_salary"]);
        $data_send_db->admission = date('Y/m/d',strtotime($get_clean_data["employeer_admission_date"]));
        $data_send_db->description = trim(strval($get_clean_data["employeer_description"]));
        $data_send_db->value = intval($get_clean_data["employeer_value"]);
        $data_send_db->status = trim(strval(strtolower($get_clean_data["employeer_status"])));
        $data_send_db->delivery = date('Y/m/d',strtotime($get_clean_data["employeer_delivery_date"]));

        //Primary Data for Employee and prevent Sql Injection
        $employee_data = [
            ':name' =>  preg_replace('/[^[:alpha:]_]/', '', $data_send_db->name),
            ':age' => preg_replace('/[^[:alnum:]_]/', '', $data_send_db->age),
            ':job' =>  preg_replace('/[^[:alpha:]_]/', '', $data_send_db->job), 
            ':salary' => preg_replace('/[^[:alnum:]_]/', '', $data_send_db->salary),
            ':admission_date' => preg_replace("/[^a-zA-Z0-9\.]/", '', $data_send_db->admission)
        ];

        //Class Employeer
        $employee = new Employeer();

        //First Insert
        $confirm_firstinsert = $employee->insertEmployeerTable($employee_data);

        //Verify insert employees Table
        if($confirm_firstinsert){

            //Get Last Insert Id in Employees Table
            $id_employee = $employee->getLastIdEmployeerTable($confirm_firstinsert);

            //Secondary Data for Projects and prevent Sql Injection
            $projects_data = [
                ':id_employee' => preg_replace('/[^[:alnum:]_]/', '', intval($id_employee)), 
                ':description' => preg_replace('/[^[:alpha:]_]/', '', $data_send_db->description), 
                ':value' => preg_replace('/[^[:alnum:]_]/', '', $data_send_db->value), 
                ':status' => preg_replace('/[^[:alpha:]_]/', '', $data_send_db->status), 
                ':delivery_date' => preg_replace("/[^a-zA-Z0-9\.]/", '', $data_send_db->delivery),
            ];

            $confirm_secondinsert = $employee->insertProjectsTable($projects_data);

            if($confirm_secondinsert){

                echo json_encode(["Success" => "Empregado registado com Sucesso"]);

            }

            exit;

        }

        exit; 

    }else{

        echo json_encode(["Error" => "Favor Informar Dados Válidos"]);

        exit;

    }


}

echo json_encode(["Error" => "Favor Preencher o Formulário"]);

die;
