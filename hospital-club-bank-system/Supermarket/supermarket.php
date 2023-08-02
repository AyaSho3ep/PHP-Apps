<?php
$title = "SUPERMARKET";
include "../layout/header.php";
?>
<body class="">
<?php
$path= "../assets/marketlogo.webp";
$text= "Supermarket";
include "../layout/nav.php";

// $data=[];

$cityErorr = "<div class='bg-danger text-center w-50 mx-auto my-2 p-1'>City is required </div>";


if(isset($_POST['crateProduct'])){
    $city= $_POST['city'];
    
    $errors = [];
    if(empty($_POST['user'])){
        $errors['$user'] ="<div class='bg-danger text-center w-50 mx-auto my-2 p-1'>User name is required </div>";
    }
    function city($cityErorr, $city){
    if($city !== "cairo" && $city !== "alex"&& $city !== "other"){
            return $cityErorr;
        }
    }
        if(empty($_POST['varieties'])){
        $errors['$varieties'] ="<div class='bg-danger text-center w-50 mx-auto my-1 p-2'>varieties is required </div>";
    }

}

?>
<form method="post" class="w-50 text-center mx-auto my-5 pt-5 bg-dark text-white rounded">

    <h1 class="p-3">Please fill all fields</h1>
    <input type="text" name="user" class="form-control w-50 mx-auto my-3" placeholder="Enter your user name" value="<?= $_POST['user'] ?? "" ?>">
    <?= $errors['$user'] ?? "" ?>

    <select name="city" class="form-select w-50 mx-auto my-3" aria-label="Default select example">
        <option selected><?= $_POST['city'] ?? "choose your city" ?></option>
        <option value="cairo">Cairo</option>
        <option value="alex">Alex</option>
        <option value="other">Other</option>
    </select>
    <?php
    if(isset($_POST['crateProduct'])){
    echo city($cityErorr,$city);
    }
    ?>
    <input type="number" name="varieties" class="form-control w-50 mx-auto my-3" placeholder="Enter number of varieties needed" value="<?= $_POST['varieties'] ?? "" ?>">
    <?= $errors['$varieties'] ?? "" ?>

    <button class="btn btn-primary my-3" name="crateProduct">Enter Products</button>

<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(empty($errors)){ 
        if(isset($_POST['crateProduct'])){

                echo"
                <form method='post' class= 'w-50 text-center mx-auto my-5 p-3 bg-dark text-white text-center rounded'>
                <h1 class='p-3'>Details</h1>
                <table class='table table-dark table-hover'>
                <tr>
                    <th class='text-white text-center'>Product Name</th>
                    <th class='text-white text-center'>Price</th>
                    <th class='text-white text-center'>Quantity</th>
                </tr>";

                echo str_repeat("
                <tr>
                    <td>
                        <input type='text' name='item[]' class='form-control w-75 mx-auto my-3 text-center' placeholder='product name' value='' required>
                    </td>
                    <td>
                        <input type='number' name='price[]' class='form-control w-75 mx-auto my-3 text-center' placeholder='price' value='' required>
                    </td>
                    <td>
                        <input type='number' name='quantity[]' class='form-control w-75 mx-auto my-3 text-center' placeholder='Quantity' value='' required>
                    </td>
                </tr>
                ", $_POST['varieties']);
                echo"</table>
                <button class='btn btn-primary my-3' name='Reciept'>Reciept</button>
                </form>";
        }
        
        if(isset($_POST['Reciept'])){
            $item= $_POST['item'];
            $price= $_POST['price'];
            $quantity= $_POST['quantity'];
            $city= $_POST['city'];
            $total= 0;
            $discount = 0;
            function fees($city){
                if($city == "cairo"){
                return 0;
                }else if($city == "alex"){
                return 30;
                }else if($city == "other"){
                    return 50;
                }
            };

            $fees = fees($city);

            echo "
            <table class='table table-dark table-hover w-75 text-center mx-auto my-5'>
            <tr>
            <td>Product Name</td>
            <td>Price</td>
            <td>Quantites</td>
            <td>Sub total</td>
            </tr>";
                for($i=0; $i< count($item); $i++){
                    $subTotal = $quantity[$i] * $price[$i];
                    echo "<tr>
                        <td>{$item[$i]}</td>
                        <td>{$price[$i]}</td>
                        <td>{$quantity[$i]}</td>
                        <td>{$subTotal}</td>
                    </tr>";
                    $total += $subTotal;
                }
                if($total <1000){
                    $fTotal = $total +$fees;
                }elseif($total <3000){
                    $discount = 10;
                    $fTotal = $total-( $total * $discount/100)+$fees;
                }elseif($total <4500){
                    $discount = 15;
                    $fTotal = $total-($total * $discount/100)+$fees;
                }else{
                    $discount = 20;
                    $fTotal = $total-( $total * $discount/100)+$fees;
                }
                $discountValue = $total * $discount/100;
                
            echo "</table>
            <table class='table table-dark table-hover w-75  mx-auto my-5'>
                <tr>
                <th>Client Name</th>
                <td>{$_POST['user']}</td>
                </tr>
                <tr>
                <th>City</th>
                <td>{$_POST['city']}</td>
                </tr>
                <tr>
                <th>Total</th>
                <td>{$total} EGP</td>
                </tr>
                <tr>
                <th>Discount Percentage</th>
                <td>{$discount} %</td>
                </tr>
                <tr>
                <th>Discount value</th>
                <td>{$discountValue} </td>
                </tr>
                <tr>
                <th>Delivery Fees</th>
                <td>{$fees}</td>
                </tr>
                <tr>
                <th>Total after discount</th>
                <td>{$fTotal} EGP</td>
                </tr>

            </table>";

        }
        
    }

}

?>

</form>
<?php
include "../layout/scripts.php";
?>