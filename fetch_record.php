<?php

//Connect to the database
$db = mysqli_connect('localhost', 'root', 'P@55w0rd', 'rollforgroup') or die($db);

if($_POST['rowid']) {
    $id = $_POST['rowid']; //escape string
    // Run the Query
    // Fetch Records
    // Echo the data you want to show in modal
 }
?>