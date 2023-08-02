<?php
$title = "CLUB";
include "../layout/header.php";
?>
<body >
<?php
$path= "../assets/clublogo.jpg";
$text= "Club";
include "../layout/nav.php";

// print_r($_SESSION['totalMembers']);

$clubs = [
    'football' => 0,
    'swimming' => 0,
    'volleyball' => 0,
    'others' => 0,
];
define('CLUB_SUBSCRIPTION',10000);
define('MEMBER_SUBSCRIPTION',2500);

function sportsPrice( $sports){
    return $_SESSION['arr'][$sports] ?? null;
}

function extra( $sports) {
    global $clubs;
    $clubs[$sports] += sportsPrice($sports);
}


$totalSports = 0;


echo "<table class='table table-dark table-hover w-50 mx-auto my-5 text-center'>
<tr>
<th colspan='3' class='text-warning'>Subscriber</th>
<th colspan='3' class='text-warning'>{$_SESSION['user']}</th>
</tr>";

foreach($_SESSION['totalMembers'] AS $key => $member){
    // echo $member['name'];

    echo "<tr><td>{$member['name']}</td>";

    $subTotal = 0;

    if(isset($member['sports'])){
        $number= count($member['sports']);
        foreach($member['sports'] as $sport){
            echo "<td>{$sport}</td>";
            $subTotal+= sportsPrice($sport);
            extra($sport);
        }
        for($i=0; $i < $number; $i++){
            echo "<td></td>";
        }
        }else{
            echo "<td colspan='4'></td>";
        }
        $totalSports += $subTotal;

    echo "<td>$subTotal</td>
    </tr>";
}
    $totalPrice = $totalSports + (MEMBER_SUBSCRIPTION * count($_SESSION['totalMembers'])) + CLUB_SUBSCRIPTION;

    echo "
    <tr>
    <th colspan = '6' class= 'p-3 text-warning'>->Details<-</th>
    </tr>
    <tr>
    <td colspan='3'>Total Games</td>
    <td colspan='3'> {$totalSports} EGP</td>
    </tr>
    <tr>
    <td colspan='3'>Football Club</td>
    <td class='text-right' colspan='3'>{$clubs['football']} EGP</td>
    </tr>
    <tr>
    <td colspan='3'>Swimming Club</td>
    <td class='text-right' colspan='3'>{$clubs['swimming']} EGP</td>
    </tr>
    <tr>
    <td colspan='3'>Volleyball Club</td>
    <td class='text-right' colspan='3'>{$clubs['volleyball']} EGP</td>
    </tr>
    <tr>
    <td colspan='3'>Other Club</td>
    <td class='text-right' colspan='3'>{$clubs['others']} EGP</td>
    </tr>
    <tr>
    <td colspan='3' class='text-warning'>Total Price</td>
    <td class='text-right text-warning' colspan='3'> $totalPrice EGP</td>
    </tr></table>";


?>