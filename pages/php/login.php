<?php

// check session 

if(session_id() == "")
{
session_start();
$session = session_id();
echo " session start $session<br />";
}
else
{
$session = session_id();
echo "session already exist $session<br />";
} 


//
$conn=mysqli_connect("localhost","root","","aps");
// check connection 
if (mysqli_connect_errno())
{
 echo "Failed to connect to Mysql: " . mysqli_connect_error();
}
//$result = mysqli_query($conn,"SELECT * FROM login");
$user_id = $_POST["user_id"];
echo $user_id . "<br /> ";
$userpwd = $_POST["userpwd"] ;
echo $userpwd;
$result = mysqli_query($conn,"SELECT * FROM login WHERE user_id = '". $user_id."' AND userpwd ='". $userpwd."'");
// If no record found
if  ( $result == NULL )
   {
echo "<br />Invalid user";
}

while ($row = mysqli_fetch_array($result))
{

 echo $row['user_id'] . " ".$row['userpwd'];
 echo "<br />";
}
mysqli_close($conn);

?>
