<?php
$dbcon=mysqli_connect("localhost","root","","project");
if(!$dbcon) 
{
    echo"Connection failed!";
}
session_start();
// include "connection.php";

if(isset($_POST['confirm']))

{
    $apid=0;
    $appdt=$_POST['appointmentdate'];
    $apptm=$_POST['appointmenttime'];
    $place=$_POST['place'];
    $msg=$_POST['additionalmessage'];
    $appstatus="taken";
    $clid=$_SESSION['User_id'];
    $select="select*from tbl_client where tbl_client.login_id=$clid";
    $client=mysqli_query($dbcon,$select);
    if($client)
    {
        $row=mysqli_fetch_array($client);
        $clientid=$row['client_id'];

    }
           
           $sql="Insert into appointment values('$appdt','$apptm','$place','$msg','$appstatus',$apid,$clientid)";
           
           $data=mysqli_query($dbcon,$sql);
           
           if($data)
           {
            echo "<b>Appointment details  are submitted </b>";
            header("refresh:1;url=yourappointments.php");
           } 
        else
        {
            echo "<b>sorry try again</b>";
            header("refresh:1;url=appointment.php");
        }
          
        }

?>
