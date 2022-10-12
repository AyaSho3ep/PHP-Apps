<?php
$title = "FEEDBACK";
include "../layout/header.php";
?>
<body class="bg-hospital">
<?php
$path= "../assets/logo.jpg";
$text= "Hospital";
include "../layout/nav.php";

if($_SERVER['REQUEST_METHOD'] == "POST"){

    $_SESSION['hygiene'] = $_POST['hygiene'] ?? null;
    $_SESSION['services'] = $_POST['services'] ?? null;
    $_SESSION['nursing'] = $_POST['nursing'] ?? null;
    $_SESSION['doctors'] = $_POST['doctors'] ?? null;
    $_SESSION['calmness'] = $_POST['calmness'] ?? null;

    $errors = [];
    if(empty($_SESSION['hygiene'])){
        $errors['hygiene'] = "<td colspan='5' class='text-danger text-center font-weight-bold'> hygiene rate is required </td>";
    }
    if(empty($_SESSION['services'])){
        $errors['services'] = "<td colspan='5' class='text-danger text-center font-weight-bold'> services rate is required </td>";
    }
    if(empty($_SESSION['nursing'])){
        $errors['nursing'] = "<td colspan='5' class='text-danger text-center font-weight-bold'> nursing rate is required </td>";
    }
    if(empty($_SESSION['doctors'])){
        $errors['doctors'] = "<td colspan='5' class='text-danger text-center font-weight-bold'> doctors rate is required </td>";
    }
    if(empty($_SESSION['calmness'])){
        $errors['calmness'] = "<td colspan='5' class='text-danger text-center font-weight-bold'> calmness rate is required </td>";
    }

    if(empty($errors)){ 
        header('location:result.php');
        
    }else{
        echo "<div class='bg-danger text-center w-25 mx-auto my-2 p-2'>Please answer all questions</div>";
    }

}

?>
<form method="post">
<table class="table table-dark table-hover mt-5 w-75 mx-auto">
<tr>
    <th>Question</th>
    <th>Bad</th>
    <th>Good</th>
    <th>V.Good</th>
    <th>Excellent</th>
</tr>
<tr>
    <td>Are you satisfied with the level of hygiene?</td>
    <td><input type="radio" name="hygiene" value="bad"></td>
    <td><input type="radio" name="hygiene" value="good"></td>
    <td><input type="radio" name="hygiene" value="vgood"></td>
    <td><input type="radio" name="hygiene" value="excellent"></td>
</tr>
<tr>
<?= $errors['hygiene'] ?? "" ?>
</tr>
<tr>
    <td>Are you satisfied with the price of services?</td>
    <td><input type="radio" name="services" value="bad"></td>
    <td><input type="radio" name="services" value="good"></td>
    <td><input type="radio" name="services" value="vgood"></td>
    <td><input type="radio" name="services" value="excellent"></td>
</tr>
<tr>
<?= $errors['services'] ?? "" ?>
</tr>
<tr>
    <td>Are you satisfied with the nursing service?</td>
    <td><input type="radio" name="nursing" value="bad"></td>
    <td><input type="radio" name="nursing" value="good"></td>
    <td><input type="radio" name="nursing" value="vgood"></td>
    <td><input type="radio" name="nursing" value="excellent"></td>
</tr>
<tr>
<?= $errors['nursing'] ?? "" ?>
</tr>
<tr>
    <td>Are you satisfied with the level of the doctors?</td>
    <td><input type="radio" name="doctors" value="bad"></td>
    <td><input type="radio" name="doctors" value="good"></td>
    <td><input type="radio" name="doctors" value="vgood"></td>
    <td><input type="radio" name="doctors" value="excellent"></td>
</tr>
<tr>
<?= $errors['doctors'] ?? "" ?>
</tr>
<tr>
    <td>Are you satisfied with the calmness in the hospital?</td>
    <td><input type="radio" name="calmness" value="bad"></td>
    <td><input type="radio" name="calmness" value="good"></td>
    <td><input type="radio" name="calmness" value="vgood"></td>
    <td><input type="radio" name="calmness" value="excellent"></td>
</tr>
<tr>
<?= $errors['calmness'] ?? "" ?>
</tr>
<tr>
    <td colspan="5" class="text-center">
        <button type="submit" name="submit" class="btn btn-warning">Submit</button>
    </td>
</tr>
</table>
</form>

<?php
include "../layout/scripts.php";
?>