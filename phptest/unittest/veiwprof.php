<?php
function veiwprofile($userid,$fname,$lname,$phone,$address)
{
    require ('dbcon.php');
   
    $veiwquery="SELECT * FROM userinfo WHERE userid='$userid'";
    $queryrun=mysqli_prepare($con,$veiwquery);
    $mysqli_queryrun_bind_param($queryrun,$userid,$fname,$lname,$phone,$address);

    $mysqli_veiwquery_execute($veiwquery);
    $result=$mysqli_stmt_get_result($veiwquery);


    
    if($mysqli_num_rows( $result)==0){
        echo "no users found";    //test cases query runs
    
    }else{

        while($row = mysqli_fetch_assoc($result)){
            echo "User ID: " . $row["userid"] . "<br>";
            echo "First Name: " . $row["fname"] . "<br>";
            echo "Last Name: " . $row["lname"] . "<br>";
            echo "Phone Number: " . $row["phone"] . "<br>";
            echo "Address: " . $row["address"] . "<br>";
        }
    
    }
    
}



?>