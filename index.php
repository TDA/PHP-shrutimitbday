<?php
/**
 * Created by PhpStorm.
 * User: schandramouli
 * Date: 12/9/15
 * Time: 8:35 PM
 */
include "dbconn.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Mock Login</title>
    <meta name="author" content="Sai Pc.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="normalize.css">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="main.css">

</head>
<body>

    <!--[if lt IE 8]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a
        href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

<?php
// grab the names and the messages
$dbconn= new mysqli("$server","$uname","","$dbname") or die('Invalid Password');
$query = "Select * from messages";
$res=$dbconn->query($query);
?>

<div class="imageContainer">

<?php
while($row=$res->fetch_assoc())
{
    echo '<div class="message">';

        echo "<div class='senderName'>";
        echo $row['name'];
        echo "</div>";

        echo "<div class='imageHolder'>";
        echo "<img src='".$row['name'].".jpg'>";
        echo "</div>";

        echo "<div class='messageHeader'>";
        echo $row['message'];
        echo "</div>";


    echo '</div>';
}

?>
</div>

    <script src="jquery.js"></script>
    <script src="main.js"></script>
</body>
</html>

