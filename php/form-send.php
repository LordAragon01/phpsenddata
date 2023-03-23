<?php

$data_form = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if($data_form !== null){

    $get_clean_data = array_map("strip_tags", $data_form);

    $data_send_db = new stdClass;
    $data_send_db->name = strval($get_clean_data["employeer_name"]);
    $data_send_db->age = intval($get_clean_data["employeer_age"]);
    $data_send_db->job = strval($get_clean_data["employeer_job"]);
    $data_send_db->salary = floatval(number_format($get_clean_data["employeer_salary"], 2, ',', '.'));
    $data_send_db->admission = date('Y/m/d',strtotime($get_clean_data["employeer_admission_date"]));
    $data_send_db->description = strval($get_clean_data["employeer_description"]);
    $data_send_db->value = intval($get_clean_data["employeer_value"]);
    $data_send_db->delivery = date('Y/m/d',strtotime($get_clean_data["employeer_delivery_date"]));

    var_dump($data_send_db);

}

die;
