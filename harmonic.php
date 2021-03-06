<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min - intraday.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/full.css" rel="stylesheet">
    <link rel="shortcut icon" href="images/demo/logoTMC.ico" />
	
	<style>
	.error {color: #FF0000;}
	</style>
</head>
<body>

	<?php
	// define variables and set to empty values
	$nameErr = "";
	$pdate = "";
	$tdateErr = "";
	$tdate = "";
		
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
		  if (empty($_POST["pdate"])) {
			$nameErr = "Name is required";
		  } else {
			$pdate = test_input($_POST["pdate"]);
		  }
		  if (empty($_POST["tdate"])) {
			$tdateErr = "Name is required";
		  } else {
			$tdate = test_input($_POST["tdate"]);
		  }
	  }
	  
	  function test_input($data) {
		  $data = trim($data);
		  $data = stripslashes($data);
		  $data = htmlspecialchars($data);
		  return $data;
		}
	?>


	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
	  Tu Ngay: <input type="date" name="pdate" value="<?php echo $pdate;?>">
	  <span class="error">* <?php echo $nameErr;?></span>
	  Den Ngay: <input type="date" name="tdate" value="<?php echo $tdate;?>">
	  <span class="error">* <?php echo $tdateErr;?></span>
	  
	  <br><br>
	  <input type="submit" name="submit" value="Submit">  
	</form>

	</br>
	
	<?php
	require_once('conf.php');
	
	if($pdate != NULL){
		$myDateTime = DateTime::createFromFormat('Y-m-d', $pdate);
		$pdate = $myDateTime->format('m/d/Y');
	} else {
		$pdate = new DateTime();
		$pdate = $pdate->format('m/d/Y');
	}
	if($tdate != NULL){
		$myDateTime = DateTime::createFromFormat('Y-m-d', $tdate);
		$tdate = $myDateTime->format('m/d/Y');
	} else {
		$tdate = new DateTime();
		$tdate = $tdate->format('m/d/Y');
	}
	
	$conn = connectionDB();
	
	$sql = "SELECT `tbl_harmonic`.`ticker`, `tbl_harmonic`.`trade`, `tbl_harmonic`.`date`, `tbl_harmonic`.`close` ,
	`tbl_market_exp`.`volume`
	FROM `tbl_harmonic` LEFT JOIN `tbl_market_exp` ON `tbl_harmonic`.`ticker` = `tbl_market_exp`.`ticker` 
	WHERe `tbl_market_exp`.`volume` > 50000 
	AND STR_TO_DATE(`tbl_harmonic`.`date`,'%m/%d/%Y') between STR_TO_DATE('".$pdate."','%m/%d/%Y') and STR_TO_DATE('".$tdate."','%m/%d/%Y')
	ORDER BY `tbl_harmonic`.`trade` ASC, `tbl_harmonic`.`date` ASC, `tbl_harmonic`.`ticker` ASC";
	$result = $conn->query($sql);

	 echo $sql; 
	
	if ($result->num_rows > 0) {
		 echo "<table class=\"table\">
			<tr>
				<th align=\"center\">Ticker</th>
				<th>NGAY GD</th>
				<th>Volume</th>
				<th>MUA/BAN</th>
				<th>DIEM MUA/BAN</th>
			</tr>";
		 // output data of each row
		 while($row = $result->fetch_assoc()) {
			 $ticker = $row["ticker"];
			 $date = $row["date"];
			 $volume = $row["volume"];
			 $trade = $row["trade"];
			 $close = $row["close"];
			 
			 if($trade == "Buy" || $trade == "Sell"){
				 echo "<tr>
				 <td width=\"100px\" align=\"center\">" . $row["ticker"]. "</td>
				 <td width=\"100px\" align=\"center\">" .convertDate($date). "</td>
				 <td width=\"100px\" align=\"right\">" .$volume. "</td>
				 <td bgcolor=".getProperColor($trade)." width=\"250px\" align=\"center\">" . convertTrade($trade). "</td>
				 <td width=\"300px\" align=\"center\">" . $row["close"]. "</td></tr>";
				 }
				 
			 }
				 
				 echo "</table>";
	} else {
		 echo "0 results";
	}

	$conn->close();
	
	
	function getProperColor($var)
	{
		if ($var == "Buy")
			return '#7FFF00';
		else if ($var == "Sell")
			return '#FF4500';
	}
	function convertTrade($var)
	{
		if ($var == "Buy")
			return "MUA";
		else if ($var == "Sell")
			return "BAN";
	}
	
	function convertDate($dateString){
		$myDateTime = DateTime::createFromFormat('m/d/Y', $dateString);
		$newDateString = $myDateTime->format('d/m/Y');
		
		return $newDateString;
	}

	?>  
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>