<?php
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
<div id="container" class="container">
    <!--[if lt IE 8]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a
        href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <div class="contentbody row">
        <div class="main col-md-12 text-center">

<?php
/**
 * Created by PhpStorm.
 * User: schandramouli
 * Date: 12/9/15
 * Time: 8:03 PM
 */
// Create a form that can store messages in a db
if (!isset($_REQUEST['submit'])) {
    ?>
                <form>
                    <div class="input-group input-group-lg col-md-4 col-centered">
                        <label for="name" class="input-group-addon">
                            Name:
                        </label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Name">
                    </div>

                    <div class="input-group input-group-lg col-md-4 col-centered">
                        <label for="message" class="input-group-addon">
                            Message:
                        </label>
                <textarea name="message" id="message" cols="80" rows="12" placeholder="Enter your bday wishes">

                </textarea>
                    </div>
                    <br>
                    <input type="submit" name="submit" class="btn btn-lg btn-default" value="Upload Wishes!">
                </form>
    <?php
} else {

    $name = $_REQUEST['name'];
    $message = $_REQUEST['message'];
    $dbconn= new mysqli("$server","$uname","","$dbname") or die('Invalid Password');

    $query = "Select * from messages where name='$name'";

    $res=$dbconn->query($query);
    if (count($res->fetch_all()) != 0) {
        // we need to update
        $query = "update messages set message = '$message'";
    } else {
        // we need to insert
        $query = "insert into messages values('', '$name', '$message', 3)";
    }

    $res=$dbconn->query($query);

    echo "Thank You ".$name."!";

}
    ?>
        </div>
    </div>
</body>
</html>

