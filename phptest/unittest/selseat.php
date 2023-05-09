<?php

function selectseat($seatid,$seatname, $seattype)

{
    require ('dbcon.php');

    $selseat="SELECT * FROM seat WHERE seatid='1'";
    $queryrun=mysqli_prepare($con,$selseat);
    $mysqli_queryrun_bind_param($seatid,$seatname, $seattype);

    $mysqli_selseat_execute($selseat);
    $result=$mysqli_stmt_get_result($selseat);


    if($mysqli_num_rows( $result)==0){
        echo "No Trips Found";    //test cases query runs
    
    }else{

        while($row = mysqli_fetch_assoc($result)){
            echo "Seat ID: " . $row["seatid"] . "<br>";
            echo "Seat Name: " . $row["seatname"] . "<br>";
            echo "Seat Type : " . $row["seattype"] . "<br>";
        }
    
    }
    
}
echo selectseat();


?>