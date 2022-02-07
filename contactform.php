<?php
/*
This file contains database configuration assuming you are running mysql using user "root" and password ""
*/

// CREATE TABLE contact (

//   name varchar(255),
//   email varchar(255),
//   descr varchar(255)
//   );

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
$roll=$name=$year=$branch=$sport=$email="";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
$name = $_POST["name"];

$email = $_POST["email"];
$descr = $_POST["descr"];
}
// | name | Email | descr
$sql = "INSERT INTO contact  (name, email,descr)
VALUES ('$name','$email','$descr')";

if ($conn->query($sql) === TRUE)
{
header("Location: https://hiddenmath.ga/");
echo "New record created successfully\n";
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