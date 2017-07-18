<?php

	session_start();
	
	//grab current session username
	$username = $_SESSION['username'];

	//Connect to the database
	$db = mysqli_connect('localhost', 'root', 'P@55w0rd', 'rollforgroup') or die($db);

	$groupName = $_GET['groupName'];

	$sql = "SELECT Location, GameID, Day1, Day1Time, Day2, Day2Time, Day3, Day3Time, Description FROM groups WHERE Name='$groupName'";

	$groupQuery = $db->query($sql);

	if ($groupQuery->num_rows > 0)
	{
		while ($row = $gameQuery->fetch_assoc())
		{
			$loc = $row['Location'];
			$gam = $row['GameID'];

			//Gets the name of the game that they are playing
			$sql2 = "SELECT Game FROM game WHERE GameID='$gam'";

			$gameQuery = $db->query($sql2);

			$game = $gameQuery->fetch_assoc()['Game'];
			$day1 = $row['Day1'];
			$time1 = $row['Day1Time'];
			$day2 = $row['Day2'];
			$time2 = $row['Day2Time'];
			$day3 = $row['Day3'];
			$time3 = $row['Day3Time'];
			$desc = $row['Description'];
		}

		/*

			================================== WHAT THE BODY IS SUPPOSED TO LOOK LIKE =====================================================

			<div class="panel-profile-body">
          <div class="row">
            <div class="col-md-3 col-lg-3 " align="center"> 
              <img alt="Group Pic" src="pictures/Group-Generic-Photo.jpg" style="height: 75%; width: 75%"><br/>
              <h3>Other People's Group</h3>
            </div>
            
            <div class= "col-md-9 col-lg-9">
              <table class="table table-user-information">
                <tbody>
                  <tr>
                    <td>
                      <img src="pictures/Male-Generic-Photo.jpg" alt="IMG" class="playerIcon"/><br/>
                      <h4>Name 1</h4>
                    </td>
                    <td>
                      <img src="pictures/Male-Generic-Photo.jpg" alt="IMG" class="playerIcon"/><br/>
                      <h4>Name 2</h4>
                    </td>
                    <td>
                      <img src="pictures/Male-Generic-Photo.jpg" alt="IMG" class="playerIcon"/><br/>
                      <h4>Name 3</h4>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <img src="pictures/Male-Generic-Photo.jpg" alt="IMG" class="playerIcon"/><br/>
                      <h4>Name 4</h4>
                    </td>
                    <td>
                      <img src="pictures/Male-Generic-Photo.jpg" alt="IMG" class="playerIcon"/><br/>
                      <h4>Name 5</h4>
                    </td>
                    <td>
                      <img src="pictures/Male-Generic-Photo.jpg" alt="IMG" class="playerIcon"/><br/>
                      <h4>Name 6</h4>
                    </td>
                  </tr>
                  <tr>
                    <td>Group Name:</td>
                    <td>Blank</td>
                  </tr>
                  <tr>
                    <td>Group Games:</td>
                    <td>DnD, Dungeon World, Pathfinder</td>
                  </tr>
                  <tr>
                    <td>Group Meets:</td>
                    <td>(At Home, Roll20, etc)</td>
                  </tr>
                  <tr>
                    <td>Meeting Times:</td>
                    <td>Monday at 5:00 PM, Friday at 7:00 PM</td>
                  </tr>
                  <tr>
                    <td>Description:</td>
                    <td>Blank</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>

		*/	
	}
?>