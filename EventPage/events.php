<?php

define('DB_SERVER', 'sql205.epizy.com');
define('DB_USERNAME', 'epiz_30578289');
define('DB_PASSWORD', 'zCezzSEJdfp');
define('DB_NAME', 'epiz_30578289_user_contact');

// define('DB_SERVER', 'localhost');
// define('DB_USERNAME', 'root');
// define('DB_PASSWORD', '1234');
// define('DB_NAME', 'maths');

// Try connecting to the Database
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

//Check the connection
if($conn == false){
dir('Error: Cannot connect');
}
else
{
  $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
  $lastChar = substr($actual_link, -1);
//   echo "lastChar" ;
//     echo $lastChar ;




$sql = "select * from events where id =$lastChar";
$re = $conn->query($sql);

// echo $re;
$etime="";
$edate="";
$ename="";
$desc="";
foreach($re as $row) {
    $etime =  $row['start_time'];
    $desc =  $row['Description'];
    $edate =  $row['date'];
    $ename =  $row['name'];

}
// echo $etime;

$conn->close();

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css?rnd=1">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>EventPage</title>
</head>
<body>
    <nav class="navbar">
        <a href="../index.html">
            <div class="logo-and-name">
                <!-- <img class="nmims-logo" src="assets/MPSTME_Logo_2.png" alt="maths club logo" /> -->
                <img class="logo" src="assets/logo.png" alt="maths club logo" />
                <div class="nav-name">
                    <p class="logo-name-college">MPSTME</p>
                    <h1 class="logo-name">Club Mathematica</h1>
                </div>
            </div>
        </a>
        <span id="toggle" class="material-icons">
            menu
        </span>
        <ul class="nav-links">
            <a href="../index.html"><li class="link">
                Home
            </li></a>
            <a href="../sponsors.html">
                <li class="link">Sponsors</li>
            </a>
            <a href="../aboutus.html">
                <li class="link">About Us</li>
            </a>
            <a href="../contactus.html">
                <li class="link">Contact Us</li>
            </a>
        </ul>
    </nav>
    <div class="event-container">
        

        <div class="event-child-1">
            <!-- Only enable timer for upcoming events -->
            <!-- <div class="event-child-1-2">
            <div class="circle"></div>
            <div class="circle"></div>
            <div class="circle"></div>
            <div class="circle"></div>
            </div> -->
            <p class="event_name"> <?php echo $ename ?></p>
            <p class="join_us">Join us for the event @  <?php echo $etime ?> on <?php echo $date ?> </p>
            <form action="#register">
            <a href="#register" class="register_rounded">REGISTER</a>
            </form>
        </div>
        

        <div class="event-child-2">
            <p class="event_desc">
            <?php echo $desc ?> 
            </p>
        </div>

        <div class="event-child-3" id="register">

            <p class="register_for_event">REGISTER FOR THE EVENT</p>
            <form action="../eventform.php" method="post">
            <input type="text" name="name" class="text_field" placeholder="Name">
            <div class="event-child-3-by-2">
                <select name="pronoun" class="pronoun">
                    <option value="" disabled selected hidden>Preferred Pronoun</option>
                    <option value="He/Him">He/Him</option>
                    <option value="She/Her">She/Her</option>
                    <option value="They/Them">They/Them</option>
                </select>
                
                <input type="text" name="sapid" class="sap_field" placeholder="SAP-ID">
            </div>
            <div class="event-child-3-by-2">
                <input type="text" name="program" class="program_field" placeholder="Program">
                <div class="event-child-3-by-2-by-2">
                    <input type="text"  name="branch" class="branch_field" placeholder="Branch">
                    <select name="year" class="year_field">
                        <option value="" disabled selected hidden>Year</option>
                        <option value="1">1st Year</option>
                        <option value="2">2nd Year</option>
                        <option value="3">3rd Year</option>
                        <option value="4">4th Year</option>
                        <option value="5">5th Year</option>
                    </select>
                </div>
            </div>

            <div class="event-child-3-by-2">
                <input type="text"  name="phone_number" class="phone_number" placeholder="Phone number" maxlength="10">
                <input type="email" name="email" class="email_field" placeholder="Email">
                <input type="text" name="eventid" class="id" placeholder="id" value="<?php echo $lastChar ?>" hidden>
                       
            </div>
            <div class="event-child-4">
                <button class="button" type="submit">Submit</button>
            </div>
        </form>
        </div>
    </div>
    <footer>
        <div class="footer-college">
                <h1 class="footer-name">Club Mathematica</h1>
                <img class="nmims-logo" src="assets/MPSTME_Logo_2_white2.png" alt="maths club logo" />
                <div class="h-item college">
                    <span id="location" class="material-icons">
                        place
                    </span>
                    <div>
                        Mukesh Patel School Of Technology Management & Engineering <br> Sahar Rd near Cooper Hospital,
                        JVPD Scheme, Vile Parle West,<br> Mumbai, Maharashtra 400056
                    </div>
                </div>
        </div>
        <div class="footer-events">
            <span class="quick-links">Events</span>
            <ul>
                <li>Numerate Minds</li>
                <li>PI Day Webinar</li>
            </ul>
        </div>

        <div class="footer-events">
            <span class="quick-links">Links</span>
            <ul>
                <li><a href="events.html">Events</a></li>
                <li><a href="../aboutus.html">About Us</a></li>
                <li><a href="../contactus.html">Contact Us</a></li>
            </ul>
        </div>
    </footer>
</body>
</html>