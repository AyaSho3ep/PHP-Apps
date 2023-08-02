<?php
$title = "CLUB";
include "../layout/header.php";
?>
<body class="">
<?php
$path= "../assets/clublogo.jpg";
$text= "Club";
include "../layout/nav.php";
?>

<div class="my-4 pt-4">&nbsp; </div>
<form method="post" class="w-50 text-center mx-auto my-5 pt-5 bg-dark text-white rounded">
    <h1 class="p-3">Enter your Name</h1>
    <input type="text" name="user" class="form-control w-50 mx-auto my-3" placeholder="full name">
    <div id="emailHelp" class="form-text text-white">Club subscription starts with 10000 LE</div>
    <input type="number" name="members" class="form-control w-50 mx-auto my-3" placeholder="Number of members">
    <div id="emailHelp" class="form-text text-white">Cost of each member is 2500 LE</div>
    <button class="btn btn-primary my-3" name="Subscribe">Subscribe</button>
</form>

<?php
include "../layout/scripts.php";

if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(isset($_POST['Subscribe'])){
        if($_POST['user']){
        $_SESSION['user'] = $_POST['user'];
        if($_POST['members']){
        $_SESSION['members'] = $_POST['members'];
        }
        header('location:games.php');
        }else{
            echo "<div class=' text-center font-weight-bold bg-danger w-25 mx-auto my-2'>All fields are requird</div>";
        }
    }
}

?>