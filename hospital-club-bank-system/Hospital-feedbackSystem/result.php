<?php
$title = "FEEDBACK";
include "../layout/header.php";
?>
<body class="bg-hospital">
<?php
$path= "../assets/logo.jpg";
$text= "Hospital";
include "../layout/nav.php";

$questions=[
"Are you satisfied with the level of hygiene?"=>$_SESSION['hygiene'],
"Are you satisfied with the price of services?"=>$_SESSION['services'], 
"Are you satisfied with the nursing service?"=>$_SESSION['nursing'], 
"Are you satisfied with the level of the doctors?"=>$_SESSION['doctors'], 
"Are you satisfied with the calmness in the hospital?"=>$_SESSION['calmness']
];

$values= ['bad'=>0, 'good'=>3, 'vgood'=>5, 'excellent'=>10];

?>
<table class="table table-dark table-hover mt-5 w-75 mx-auto">
    <tr>
        <th>Questions</th>
        <th>Feedback</th>
    </tr>
        <?php
        foreach($questions as $key=>$value){
            echo "<tr><td>{$key}</td>
            <td>{$value}</td></tr>";
        }
        ?>
    <tr>
        <td>Total</td>
        <td>
            <?php
                $sum =0;
                foreach($questions as $key=>$value){
                    foreach($values as $k=>$v){
                        if($value == $k){
                    $sum+= $v;
                }}}

                if($sum > 25){
                    echo "good";
                }else{
                    echo "bad";
                }
            ?>
        </td>
    </tr>
    <tr>
        <?php
        if($sum > 25){
            echo "<td colspan='2' class='text-center text-warning'>Thanks for your feedback :)</td>";
        }else{
            if($_SESSION['number']){
            echo "<td colspan='2' class='text-center text-warning'>We'll call you as soon as possible on phone number: {$_SESSION['number']}</td>";
            }else{
                echo "<td colspan='2' class='text-center text-warning'>your phone number is needed to be contact, please try again with a valid phoe number!</td>";
            }
        }
        ?>
    </tr>
</table>
<?php
include "../layout/footer.php";
include "../layout/scripts.php";
?>