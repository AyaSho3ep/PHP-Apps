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
    $user= $_POST['user'];
    $city= $_POST['city'];
    $varieties= $_POST['varieties'];

    if($city == "cairo"){
        $Fees = 0;
    }
    if($city == "alex"){
        $Fees = 30;
    }
    if($city == "cairo"){
        $Fees = 50;
    }
    
    $errors = [];
    if(empty($user)){
        $errors['$user'] ="<div class='bg-danger text-center w-50 mx-auto my-2 p-1'>User name is required </div>";
    }
    function city($cityErorr, $city){
    if($city !== "cairo" && $city !== "alex"&& $city !== "other"){
            return $cityErorr;
        }
    }
        if(empty($varieties)){
        $errors['$varieties'] ="<div class='bg-danger text-center w-50 mx-auto my-1 p-2'>varieties is required </div>";
    }

    // if(empty($errors1)){
        // }
    }

?>
<form method="post" class="w-50 text-center mx-auto my-5 pt-5 bg-dark text-white rounded">

    <h1 class="p-3">Please fill all required items</h1>
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
</form>

<?php
include "../layout/scripts.php";

    if(empty($errors)){ 
        if(isset($_POST['crateProduct'])){

            if(isset($varieties)){
                echo"
                <form method='post' class= 'w-50 text-center mx-auto my-5 p-3 bg-dark text-white text-center rounded'>
                <h1 class='p-3'>Details</h1>
                <table class'table table-dark table-hover'>
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
                ", $varieties);
                echo"</table>";
                // echo $errors1['$item'] ?? "";
                // echo $errors1['$price'] ?? "";
                // echo $errors1['$quantity'] ?? "";

                echo"<button class='btn btn-primary my-3' name='Reciept'>Reciept</button>
                </form>";
            }

        }
        
        if(isset($_POST['Reciept'])){
            $item= $_POST['item'];
            $price= $_POST['price'];
            $quantity= $_POST['quantity'];
            $total= 0;
            
            // $errors1 = [];
            //     if($item < $varieties && $item = ""){
            //         $errors1['item'] = "<div class='bg-danger text-center w-50 mx-auto my-1 p-2'>please fill all item inputs or edit number of varieties in pervious form </div>";
            //     }
            //     if($price < $varieties && $price = ""){
            //         $errors1['price'] = "<div class='bg-danger text-center w-50 mx-auto my-1 p-2'>please fill all price inputs or edit number of varieties in pervious form </div>";
            //     }
            //     if($quantity < $varieties && $quantity = ""){
            //         $errors1['quantity'] = "<div class='bg-danger text-center w-50 mx-auto my-1 p-2'>please fill all quantity inputs or edit number of varieties in pervious form </div>";
            //     }
                
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
                    $discount = 0;
                    $fTotal = $total +$fees;
                }elseif($total <3000){
                    $discount = 10;
                    $fTotal = $total-($total * $discount/100)+$fees;
                }elseif($total <4500){
                    $discount = 15;
                    $fTotal = $total-($total * $discount/100)+$fees;
                }else{
                    $discount = 20;
                    $fTotal = $total-($total * $discount/100)+$fees;
                }
            echo "</table>
            <table class='table table-dark table-hover w-50 text-center mx-auto my-5'>
                <tr>
                <th>Client Name</th>
                <td>{$user}</td>
                </tr>
                <tr>
                <th>City</th>
                <td>{$city}</td>
                </tr>
                <tr>
                <th>Total</th>
                <td>{$total} EGP</td>
                </tr>
                <tr>
                <th>Discount</th>
                <td>{$discount} %</td>
                </tr>
                <tr>
                <th>Fees</th>
                <td>{$fees}</td>
                </tr>
                <tr>
                <th>Total after discount</th>
                <td>{$fTotal} EGP</td>
                </tr>

            </table>";

        }
        
    }

    
// }

?>