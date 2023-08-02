<?php
// dynamic table => 3 levels only
// dynamic rows //4 
// dynamic columns // 4
// check if gender of user == m ==> male // 1
// check if gender of user == f ==> female // 1

$users = [
    (object)[
        'id' => 1,
        'name' => 'ahmed',
        "gender" => (object)[
            'gender' => 'm'
        ],
        'hobbies' => [
            'football', 'swimming', 'running',
        ],
        'activities' => [
            "school" => 'drawing',
            'home' => 'painting'
        ],
        'phones'=>"0123123",
    ],
    (object)[
        'id' => 2,
        'name' => 'mohamed',
        "gender" => (object)[
            'gender' => 'm'
        ],
        'hobbies' => [
            'swimming', 'running',
        ],
        'activities' => [
            "school" => 'painting',
            'home' => 'drawing'
        ],
        'phones'=>"2345",
    ],
    (object)[
        'id' => 3,
        'name' => 'menna',
        "gender" => (object)[
            'gender' => 'f'
        ],
        'hobbies' => [
            'running',
        ],
        'activities' => [
            "school" => 'painting',
            'home' => 'drawing'
        ],
        'phones'=>"",
    ]
];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Table</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/css/bootstrap.min.css">
</head>
<body>
    
<table class="table table-dark table-hover w-75 text-center mx-auto my-5">
    <thead>
        <tr>
            <?php 
                if(!empty($users)){
                        foreach($users[0] as $key => $value){
                            echo "<th>".$key."</th>";
                        }
                }else{
                    echo "<th> No data found";
                }
            ?>
        </tr>
    </thead>
    <tbody>
    <?php
        foreach($users as $user){
            echo "<tr>";
            foreach($user as $key => $value){
                echo "<td>";
                if(gettype($value) == 'object' || gettype($value) == 'array'){
                    foreach($value as $vk => $vv){
                        if($key == 'gender' && $vk == 'gender'){
                            $vv == 'm' ? $vv = 'Male' : $vv = 'Female';
                        }
                        echo "{$vv}<br>";
                    }
                    echo "</td>";
                }else{
                    echo "{$value}";
                }
                echo "</td>";
            }
            echo "</tr>";
        }
    ?>
    </tbody>
</table>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/js/bootstrap.min.js"></script>
</body>
</html>