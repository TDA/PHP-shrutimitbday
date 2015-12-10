<?php
include "dbconn.php";
/**
 * Created by PhpStorm.
 * User: schandramouli
 * Date: 12/9/15
 * Time: 8:35 PM
 */

// grab the names and the messages
$dbconn= new mysqli("$server","$uname","","$dbname") or die('Invalid Password');
$query = "Select * from messages";
$res=$dbconn->query($query);
while($row=$res->fetch_assoc())
{
    echo '<div class="message">';
    echo $row['name'];
    echo $row['message'];
    echo "<img src='".$row['name']."jpg'";
    echo '</div>';
}

?>