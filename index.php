<?php

use Controller\Employeer\Employeer;

include_once __DIR__ . '/controller/Employeer.php';

$employeer = new Employeer();

$employeer->setEmployeer('Joene Gonçalves Galdeano');
$employeer->getEmployeer();

echo $employeer->getEmployeer();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Optigest - Exercise</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body>

    <section class="container mx-3 my-3">

        <div class="row">

            <div class="d-flex justify-content-center align-items-center w-100">
             
            <form method="post" action="" enctype="multipart/form-data" role="form" style="width:75%;height:auto;">

                <fieldset class="my-2">

                    <legend>Employeer Data</legend>

                    <div class="form-group">
                        <label for="employeer_name">Nome</label>
                        <input name="employeer_name" type="text" class="form-control" id="employeer_name" placeholder="Informe o Nome">
                    </div>

                    <div class="form-group">
                        <label for="employeer_age">Idade</label>
                        <input name="employeer_age" type="number" min="18" max="80" class="form-control" id="employeer_age" placeholder="Informe a Idade">
                    </div>

                    <div class="form-group">
                        <label for="employeer_job">Ocupação</label>
                        <input name="employeer_job" type="text" class="form-control" id="employeer_job" placeholder="Informe o Trabalho">
                    </div>

                    <div class="form-group">
                        <label for="employeer_salary">Remuneração</label>
                        <input name="employeer_salary" type="number" min="500" max="10000" class="form-control" id="employeer_salary" placeholder="Informe o Salário">
                    </div>

                    <div class="form-group">
                        <label for="employeer_admission_date">Data de Admissão</label>
                        <input name="employeer_admission_date" type="date" class="form-control" id="employeer_admission_date" placeholder="Informe a Data de Admissão">
                    </div>

                </fieldset>

                <fieldset class="my-2">

                    <legend>Employeer Projects</legend>

                    <div class="form-group">
                        <label for="employeer_description">Descrição</label>
                        <textarea minlength="50" maxlength="150" class="form-control" name="employeer_description" id="employeer_description" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="employeer_value">Valor</label>
                        <input type="number" min="1" max="20" class="form-control" name="employeer_value" id="employeer_value" placeholder="Informe o Valor">
                    </div>

                    <div class="form-group">
                        <label for="employeer_status">Status</label>
                        <input name="employeer_status" type="text" class="form-control" id="employeer_status" placeholder="Informe o Status">
                    </div>

                    <div class="form-group">
                        <label for="employeer_delivery_date">Data de Entrega</label>
                        <input name="employeer_delivery_date" type="date" class="form-control" id="employeer_delivery_date" placeholder="Informe a Data de Entrega">
                    </div>

                </fieldset>
         
                <button type="submit" class="btn btn-primary float-right" style="width:7.5rem;height:3rem;padding:.75rem;">Send</button>

            </form>

            </div>

        </div>

    </section>    

<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<script src="./assets/js/script.js"></script>
</body>
</html>