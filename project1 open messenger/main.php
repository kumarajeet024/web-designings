
<?php
include 'connection.php';
?>

<!DOCTYPE html>
<html>

<head>
	<title>Chat app</title>
<link rel="stylesheet" type="text/css" href="style.css">
	
<link href="https://fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
	 
</head>


<body class="start">
    
    
    <h1> WELCOME TO OPEN MESSENGER</h1>
    
    
    <?php
if(isset($_POST["submit"])){
    $fname=$_POST["txtname"];
    $lname=$_POST["txtmsg"];
    $sql = "INSERT INTO chat(sendadd, messages)
VALUES ('$fname','$lname')";
echo "<meta http-equiv='refresh' content='0'>";
    if (mysqli_query($connect, $sql)) {
    echo "msg sent";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($connect);
}


}

    if(isset($_POST["refresh"])){
        echo "<meta http-equiv='refresh' content='0'>";
    }
    
    echo "<meta http-equiv='refresh' content='8'>";
    ?>
    
    
    
    
    
    
    
<div id="container" align="center">
		<div id="chatbox">
		
		<div id="chat"></div>

		<form method="post" action="main.php">
				<input id="txtname" placeholder="enter name" type="text" name="txtname">
				<textarea id="txtmsg"placeholder="enter message" name="txtmsg"></textarea>
				<input id="submit" type="submit" name="submit" value="Send">
            <input id="refresh" type="submit" name="refresh" value="Refresh">
			</form>
			
		</div>
	</div>	
	


  
    
    <?php 

		$query = "SELECT * FROM chat ORDER BY ID DESC";
		
		$result = $connect->query($query);
		
		while($r =mysqli_fetch_assoc($result)):
		
	
		
		?>
		
	<div id="chatdata">
			<span style="color:#1e3799; font-size:20px;"><?php 
                
                
                echo $r['sendadd']."  ".":=> "."  ";
                
                ?>
                
                
                </span>
			<span style="float:right; color:black; padding-right:1400px; font-size:20px">
                
                <?php 
                echo $r['messages'];
                
                ?>
                
                </span>
			</div>
			<br>

			<?php  endwhile;

?>
    


</body>

</html>

