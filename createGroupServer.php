<?php
	session_start();

	$Name = "";
	//$UserID =0;
	$GameID = "";
	$Location = "";
	$Day1 = "";
	$Day1Time = "";
	$Day2 = "";
	$Day2Time = "";
	$Day3 = "";
	$Day3Time = "";
	
	$errors = array();
	
	//Connect to the database
	$db = mysqli_connect('localhost', 'root', 'P@55w0rd', 'rollforgroup') or die($db);

	//grab current session username
	$username = $_SESSION['username'];

	//Get the UserID based off the current session
	$userIDSql = "SELECT UserID FROM User WHERE Username ='$username'";
	$userIDQuery = mysqli_query($db, $userIDSql);

	//check to see if the query is valid with the given username
        if (mysqli_num_rows($userIDQuery) !=1){
        	die ("that username could not be found!");
        }
    //populate UserID from the query results
        while($row = mysqli_fetch_array($userIDQuery, MYSQLI_ASSOC)){
        	$UserID = $row['UserID'];
        }

    //Drop down list for Games
	$GameQuery = "SELECT * FROM `Game`";

	$GameResult = mysqli_query($db, $GameQuery);

	$options = "";

	while($row = mysqli_fetch_array($GameResult))
	{
		$id=$row["GameID"];
    	$game=$row["Game"];
    	$options = $options."<option value = ".$id.">".$game."</option>";
	}

	//if the submit button is fired
	if(isset($_POST['submitGroup'])) {
		$Name = mysqli_real_escape_string($db, $_POST['Name']);
		$GameID = mysqli_real_escape_string($db, $_POST['GameID']);
		$Location = mysqli_real_escape_string($db, $_POST['Location']);
		$Day1 = mysqli_real_escape_string($db, $_POST['Day1']);
		$Day1Time = mysqli_real_escape_string($db, $_POST['Day1Time']);
		$Day2 = mysqli_real_escape_string($db, $_POST['Day2']);
		$Day2Time = mysqli_real_escape_string($db, $_POST['Day2Time']);
		$Day3 = mysqli_real_escape_string($db, $_POST['Day3']);
		$Day3Time = mysqli_real_escape_string($db, $_POST['Day3Time']);
		
		//validate all fields
		if (empty($Name)) {
			array_push($errors, "A group name is required");
		}

		if (count($errors) == 0) {
			$grpSql = "INSERT INTO groups (Name, UserID, GameID, Location, Day1, Day1Time, Day2, Day2Time, Day3, Day3Time) VALUES ('$Name', '$UserID', '$GameID', '$Location', '$Day1', '$Day1Time', '$Day2', '$Day2Time', '$Day3', '$Day3Time')";
			$res = mysqli_query($db, $grpSql);
			if (!$res) {
				echo mysqli_error($db);
			}
			//header('location: viewOwnGroups.php'); //Take to mygroups after creation
		}
	}

?>