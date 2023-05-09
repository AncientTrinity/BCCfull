<?php

function bookinghistory($userid,$ticketid,$fname, $seattype,$location,$location1,$busarrival)

{
    require ('dbcon.php');

    $seltrip="SELECT T.ticketid, UI.fname,S.seattype,LS.location,L.location,BS.busarrival
    From ticket T 
    JOIN busschedule as BS 
    ON BS.busscheid = T.busscheid 
    JOIN locationofstop AS LS 
    ON BS.begin_locationid = LS.stoplocid 
    JOIN locationofstop AS L
    ON BS.end_locationid = L.stoplocid 
    JOIN seat AS S ON T.seatid = S.seatid 
    JOIN userinfo as UI 
    ON T.userid = UI.userid 
    WHERE UI.fname = $userid";
    $queryrun=mysqli_prepare($con,$seltrip);
    $mysqli_queryrun_bind_param($queryrun,$userid,$ticketid,$fname, $seattype,$location,$location1,$busarrival);

    $mysqli_seltrip_execute($seltrip);
    $result=$mysqli_stmt_get_result($seltrip);


    if($mysqli_num_rows( $result)==0){
        echo "No Trips Found";    //test cases query runs
    
    }else{

        while($row = mysqli_fetch_assoc($result)){
            echo "Ticket ID: " . $row["ticketid"] . "<br>";
            echo "First Name : " . $row["fname"] . "<br>";
            echo "Seat Type: " . $row["seattype"] . "<br>";
            echo "Begin Location " . $row["location"] . "<br>";
            echo "End Location " . $row["location"] . "<br>";
            echo "Bus Arrived At:  " . $row["busarrival"] . "<br>";
        }
    
    }
    
}
echo bookinghistory();

?>