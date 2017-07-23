<?php

	session_start();

	$display = "";

	//grab current session username
	$username = $_SESSION['username'];

	//Connect to the database
	$db = mysqli_connect('localhost', 'root', 'P@55w0rd', 'rollforgroup') or die($db);

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

	// ======================================== All the search stuff ====================================

	$searched = 0;

	$display = displayWithoutSearch();

	/* !!!!!!!!!!!!!!!!!!!! DOES NOT WORK YET !!!!!!!!!!!!!!!!!!!!!!

	if(isset($_POST['submitSearch'])) 
	{
    	$searched = 1;

    	$display = displayWithoutSearch();
	}

	if ($searched == 0)
	{
		$display = displayWithoutSearch();
	}

	// displays the stuff after a search
	
	function displayWithSearch($city, $state)
	{
		$out = "";			

		//Connect to the database
	    $db = mysqli_connect('localhost', 'root', 'P@55w0rd', 'rollforgroup') or die($db);

	    $sql = "SELECT Name FROM groups WHERE City = '$city' AND State = '$state'";

	    $name = $db->query($sql);

	    if ($name->num_rows > 0)
		{
	        //output of each db row
	        $out = $out . '<tr>';
	        $count = 0;

	        while ($row = $name->fetch_assoc())
  			{
		        $out = $out . '<td> <a data-toggle="modal" href="viewOtherPlayer.php?user=' . $row['Username'] . '"> 
		            <img src="pictures/Male-Generic-Photo.jpg" alt="IMG" class="playerIcon"/><br/>
		             <h4>' . $row['Username'] . '</h4></a></td>';

    			$count = $count + 1;

    			if ($count == 4)
    			{
        			$count = 0;
        			$out = $out . '</tr> <tr>';
    			}
        	}
	    }

	    return $out;
	}
	*/

	// diplays the default search, right now it is just all users in the DB. Might set up a player default search later
	function displayWithoutSearch()
	{
		$out = "";

		//Connect to the database
		$db = mysqli_connect('localhost', 'root', 'P@55w0rd', 'rollforgroup') or die($db);

		$sql = "SELECT Name FROM groups";

		$name = $db->query($sql);

		if ($name->num_rows > 0)
		{
			//output of each db row
			$out = $out . '<tr>';
			$count = 0;

			while ($row = $name->fetch_assoc())
			{
				$out =  $out . '<td> <a href="viewOtherGroup.php"?groupName=' . $row['Name'] . '"> 
				    <img src="pictures/Group-Generic-Photo.jpg" alt="IMG" class="playerIcon"/><br/>
				     <h4 class="h4Group">' . $row['Name'] . '</h4></a></td>';

				$count = $count + 1;

				if ($count == 4)
				{
				    $count = 0;
				    $out = $out . '</tr> <tr>';
				}
			}
		}

		return $out; 
	}

?>