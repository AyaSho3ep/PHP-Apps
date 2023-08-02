<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grades</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/css/bootstrap.min.css">
</head>
<body>

<form class=" w-25 m-auto my-5" method="POST">
    <h1 class="text-center fw-bolder mb-3">Grades Calculation</h1>
  <div class="mb-3">
    <input type="text" name="physics" placeholder="Enter Physics Grade" class="form-control">
  </div>
  <div class="mb-3">
    <input type="text" name="chemistry" placeholder="Enter Chemistry Grade" class="form-control">
  </div>
  <div class="mb-3">
    <input type="text" name="biology" placeholder="Enter biology Grade" class="form-control">
  </div>
  <div class="mb-3">
    <input type="text" name="mathematics" placeholder="Enter Mathematics Grade" class="form-control">
  </div>
  <div class="mb-3">
    <input type="text" name="computer" placeholder="Enter Computer Grade" class="form-control">
  </div>
  <div class="text-center">
  <button type="submit" class="btn btn-warning w-50">Display</button>
  </div>
</form>

<?php

$maxGrade = 100;
$totalGrades = 500;

if($_SERVER['REQUEST_METHOD']=='POST'){
    $physics = floatval($_POST['physics']);
    $chemistry = floatval($_POST['chemistry']);
    $biology = floatval($_POST['biology']);
    $math = floatval($_POST['mathematics']);
    $computer = floatval($_POST['computer']);

    $total = $physics + $chemistry + $biology + $math +  $computer;
    $percentage = $total / $totalGrades * 100;
    
    if($physics >= 0 && $physics <= $maxGrade && $chemistry >= 0 && $chemistry <= $maxGrade && $biology >= 0 && $biology <= $maxGrade && $math >= 0 && $math <= $maxGrade && $computer >= 0 && $computer <= $maxGrade){

        if($total > $totalGrades){
            echo "please enter valid grades";
        } elseif($percentage <= 100 && $percentage >= 90){
            echo "<div class='alert alert-success alert-dismissible fade show w-25 mx-auto' role='alert'>
            Your total grades per year = {$total} / {$totalGrades} <br>
            your percentage = {$percentage} % <br>
            Your grade is A
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
        } elseif($percentage < 90 && $percentage >= 80){
            echo "<div class='alert alert-success alert-dismissible fade show w-25 mx-auto' role='alert'>
            Your total grades per year = {$total} / {$totalGrades} <br>
            your percentage = {$percentage} % <br>
            Your grade is B
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
        } elseif($percentage < 80 && $percentage >= 70){
            echo "<div class='alert alert-success alert-dismissible fade show w-25 mx-auto' role='alert'>
            Your total grades per year = {$total} / {$totalGrades}<br>
            your percentage = {$percentage} % <br>
            Your grade is C
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
        } elseif($percentage < 70 && $percentage >= 60){
            echo "<div class='alert alert-success alert-dismissible fade show w-25 mx-auto' role='alert'>
            Your total grades per year = {$total} / {$totalGrades} <br>
            your percentage = {$percentage} % <br>
            Your grade is D
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>            
            </div>";
        } elseif($percentage < 60 && $percentage >= 40){
            echo "<div class='alert alert-success alert-dismissible fade show w-25 mx-auto' role='alert'>
            Your total grades per year = {$total} / {$totalGrades} <br>
            your percentage = {$percentage} % <br>
            Your grade is E
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
        } else{
            echo "<div class='alert alert-danger alert-dismissible fade show w-25 mx-auto' role='alert'>
            Your total grades per year = {$total} / {$totalGrades} <br>
            your percentage = {$percentage} % <br>
            Your grade is F
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
        }
    } else{
    echo "<div class='alert alert-danger alert-dismissible fade show w-25 mx-auto' role='alert'>
    Please enter a valid grades!
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
    }
}
?>


<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/js/bootstrap.min.js"></script>
</body>
</html>