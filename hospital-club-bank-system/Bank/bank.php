<?php
$title = "Bank System";
include "../layout/header.php"
?>
<body class="bg-bank">
<?php
$path= "../assets/banklogo.png";
$text= "Bank";
include "../layout/nav.php";

if(isset($_POST['Continue'])){

    $errors = [];
    if(empty($_POST['user'])){
        $errors['user'] = "<div class='text-danger text-center font-weight-bold'> user name is required </div>";
    }
    if(empty($_POST['loan'])){
        $errors['loan'] = "<div class='text-danger text-center font-weight-bold'> loan is required </div>";
    }
    if(empty($_POST['years'])){
        $errors['years'] = "<div class='text-danger text-center font-weight-bold'> number of years is required </div>";
    }

    if(empty($errors)){ 
        $user= $_POST['user'];
        $years = $_POST['years'];
        $loan = $_POST['loan'];
    
        if($years <= 3){
            $rate = 10;
            $interest = ($loan * $rate/100) * $years;
        }else{
            $rate = 15;
            $interest = ($loan * $rate/100) * $years;
        }
    
        $totalLoan = $loan + $interest;
        $monthly = $totalLoan / ($years * 12);
    
        $arr= ['User Name'=>$user,
               'Interest'=>$interest." EGP",
               'Loan after interest'=>$totalLoan." EGP",
               'Number of years'=>$years,
               'Rate of interest per year'=>$rate." %",
               'The monthly installement'=>$monthly." EGP"
                ];
        echo"<table class='table table-dark table-hover mt-5 w-50 mx-auto'>
            <tr>
                <th>#</th>
                <th>Information</th>
            </tr>";
            foreach($arr as $key=>$value){
                echo "<tr><td>{$key}</td>
                      <td>{$value}</td></tr>";
            }
            echo "</table>";
    }

    // else{
    //     echo "<div class='bg-danger text-center w-25 mx-auto my-2 p-2'>Please fill all require inputs</div>";
    // }
}
?>

<form method="post" class="w-50 text-center mx-auto my-5 pt-5 bg-dark opacity-75 text-white rounded">
    <h1 class="p-3">Please fill all required items</h1>
    <input type="text" name="user" class="form-control w-50 mx-auto my-3" placeholder="Enter your full name" value="<?= $_POST['user'] ?? "" ?>">
    <?= $errors['user'] ?? "" ?>
    <input type="number" name="loan" class="form-control w-50 mx-auto my-3" placeholder="Enter your total loan" value="<?= $_POST['loan'] ?? "" ?>">
    <?= $errors['loan'] ?? "" ?>
    <input type="number" name="years" class="form-control w-50 mx-auto my-3" placeholder="Enter number of years needed for repayment" value="<?= $_POST['years'] ?? "" ?>">
    <?= $errors['years'] ?? "" ?>
    <button class="btn btn-success my-3" name="Continue">Continue</button>
</form>

<?php
    

?>