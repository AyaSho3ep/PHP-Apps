<?php
$title = "CLUB";
include "../layout/header.php";
?>
<body >
<?php
$path= "../assets/clublogo.jpg";
$text= "Club";
include "../layout/nav.php";

$_SESSION['arr']=['football'=>300,'swimming'=>250,'volly ball'=>150,'other'=>100];

if($_SESSION['user'] && $_SESSION['members']){
    
    for($i=1; $i <= $_SESSION['members'];$i++){
        
        echo"
        <form method='post' class=' mx-auto my-5 p-3   rounded'>
        <div class= 'my-5'>
        <h2 class='text-center my-4'>Member $i</h2>
        <input type='text' class='form-control w-25 mx-auto my-2' name='member[]' placeholder='Member name' required>";
    
        foreach($_SESSION['arr'] as $key=>$value){
            echo"
            <div class='form-check w-25 mx-auto '>
            <input type='checkbox' class='form-check-input  my-2' id='flexCheckDefault' name='sports[]' value='{$key} {$value}'>";
            echo "<label class='form-check-label' id='flexCheckDefault'>{$key} {$value} LE</label></div>"; 
        }
    }
    echo "</div><div class='text-center'>
    <button class='btn btn-primary my-3 w-25' name='price'>Check Price</button>
    </div></form>";

if(isset($_POST['price'])){
    if(!empty($_SESSION['totalMembers']))
    $_SESSION['totalMembers']=$_POST['member'];
    $_SESSION['sports']=$_POST['sports'];

// $arr = [];
//     foreach($_SESSION['totalMembers'] as $mem){
//         foreach($_SESSION['sports'] as $value){
//             echo "member : ".$mem.'<br/>';
//             echo "value : ".$value.'<br/>';
//         }
//     }
    }

}

?>


<?php
include "../layout/scripts.php";
?>