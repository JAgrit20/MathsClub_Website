<?php
/*
This file contains database configuration assuming you are running mysql using user "root" and password ""
*/


define('DB_SERVER', 'sql205.epizy.com');
define('DB_USERNAME', 'epiz_30578289');
define('DB_PASSWORD', 'zCezzSEJdfp');
define('DB_NAME', 'epiz_30578289_user_contact');

// Try connecting to the Database
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

//Check the connection
if($conn == false){
dir('Error: Cannot connect');
}
else
{
echo "yes it is Connected " ;

}


if ($_SERVER["REQUEST_METHOD"] == "POST")
{
$name = $_POST["name"];

$pronoun = $_POST["pronoun"];
$sapid = $_POST["sapid"];
$program = $_POST["program"];
$phone_number = $_POST["phone_number"];
$email = $_POST["email"];
$year = $_POST["year"];
$branch = $_POST["branch"];
$eventid = $_POST["eventid"];


}
// | name | Email | descr
$sql = "INSERT INTO event  (name,pronoun,phone_number,sapid,program,email,branch,year,eventid)
VALUES ('$name','$pronoun','$phone_number','$sapid','$program','$email','$branch','$year','$eventid')";

if ($conn->query($sql) === TRUE)
{
echo "New record  successfully\n";
header("Location: https://hiddenmath.ga/");

}
else
{
  header("Location: https://hiddenmath.ga/");
echo "Error: " . $sql . "<br>" . $conn->error;

}

$q="select * from contact where name ='$name'";
$res=$conn->query($q);
//echo $res;
if(mysqli_num_rows($res)>0)
{
while($data=mysqli_fetch_assoc($res))
{
echo $data['email']."<br>".
$data['Name']."<br>";
}
}

$conn->close();

?>
