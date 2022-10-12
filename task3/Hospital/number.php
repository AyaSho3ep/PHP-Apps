<?php
$title = "FEEDBACK";
include "../layout/header.php";
?>
<body class="bg-hospital">
<?php
$path= "../assets/logo.jpg";
$text= "Hospital";
include "../layout/nav.php";
?>

<form method="post" class="w-50 text-center mx-auto my-5 pt-5 bg-dark opacity-75 text-white rounded">
    <h1 class="p-3">Enter your phone number</h1>
    <input type="number" name="number" class="form-control w-50 mx-auto my-3" placeholder="Mobile number">
    <button class="btn btn-success my-3" name="Continue">Continue</button>
</form>

<?php
include "../layout/footer.php";
include "../layout/scripts.php";

if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(isset($_POST['Continue'])){
        if($_POST['number']){
        $_SESSION['number'] = $_POST['number'];
        header('location:review.php');
        }else{
            echo "<div class='text-danger text-center font-weight-bold bg-dark w-25 mx-auto'>Please enter your phonr number</div>";
        }
    }
}

?>