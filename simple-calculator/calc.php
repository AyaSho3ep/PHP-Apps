<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/css/bootstrap.min.css">
</head>
<body>
    
<form class=" w-25 m-auto my-5" method="POST">
    <h1 class="text-center fw-bolder mb-3 my-5">Calculator</h1>
    <table>
        <tr>
            <td class="ps-5">

  <div>
    <input type="text" name="n1" placeholder="Enter first number" class="form-control">
  </div>
  <div class="my-3">
    <input type="text" name="n2" placeholder="Enter second number" class="form-control">
  </div>
  </td>

<td>
  <div class="form-check mx-3">
        <input class="form-check-input" type="radio" name="op" value="add" >
        <label class="form-check-label" for="gridRadios1">
          +
        </label>
    </div>
  </div>
  <div class="form-check mx-3">
        <input class="form-check-input" type="radio" name="op" value="sub" >
        <label class="form-check-label" for="gridRadios1">
          _
        </label>
    </div>
  </div>
  <div class="form-check mx-3">
        <input class="form-check-input" type="radio" name="op" value="mul" >
        <label class="form-check-label" for="gridRadios1">
          *
        </label>
    </div>
  </div>
  <div class="form-check mx-3">
        <input class="form-check-input" type="radio" name="op" value="div" >
        <label class="form-check-label" for="gridRadios1">
          /
        </label>
    </div>
  </div>
</td>
</tr>
    </table>
  <div class="text-center mt-3">
  <button type="submit" class="btn btn-warning w-50">=</button>
  </div>
</form>

<?php

if(isset($_POST['n1'], $_POST['n2'], $_POST['op'])){
    $n1 = floatval($_POST['n1']);
    $n2 = floatval($_POST['n2']);
    $operator = ($_POST['op']);


    switch($operator){
        case'add':$symbol='+'; $result = $n1 + $n2;
        break;
        case'sub':$symbol='-'; $result = $n1 - $n2;
        break;
        case'mul':$symbol='*'; $result = $n1 * $n2;
        break;
        case'div':$symbol='/'; $result = $n1 / $n2;
        break;
    }
    
   echo "<div class='alert alert-success alert-dismissible fade show w-25 mx-auto' role='alert'>
    {$n1} {$symbol} {$n2} = {$result}
   <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
   </div>";
}
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/js/bootstrap.min.js"></script>
</body>
</html>