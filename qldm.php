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
	
	<style>
	.error {color: #FF0000;}
	</style>
	
</head>
<body>

	<?php
	// define variables and set to empty values
	$nameErr = "";
	$pdate = $mack = "";
	
		
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$pdate = test_input($_POST["pdate"]);
			$mack = test_input($_POST["mack"]);
		}
	  
	  function test_input($data) {
		  $data = trim($data);
		  $data = stripslashes($data);
		  $data = htmlspecialchars($data);
		  return $data;
		}
	?>


	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
		<table style="width:30%">
			<tr> 
				<td style="width:30%"><h4> Chon Ngay:</h4></td>
				<td style="width:100px"> <input type="date" name="pdate" value="<?php echo $pdate;?>" class="form-control"></td>
				<td> <span class="error">* <?php echo $nameErr;?></span></td>
			</tr>
			<tr>
				<td  style="width:30%"><h4> Chon Ma CP: </h4></td>
				<td  style="width:100px"> <input type="text" name="mack" class="form-control"></td>
				<td align="center"> <input type="submit" name="submit" value="Submit" class="btn btn-primary"> </td>
			</tr>
			
		</table>	   
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
	
	$conn = connectionDB();
	
	//echo $mack;
	if(empty($mack)){
		$sql = "select t1.ticker, t1.datetime, t1.close, t1.volume, t1.signal, 
			t2.isignal, t4.trade, t2.coppock, t3.candle
			from tbl_intraday as t1
			left join tbl_market_exp as t2 on t2.ticker = t1.ticker and t2.datetime = t1.datetime 
			left join tbl_chart as t3 on t3.ticker = t1.ticker and t3.datetime = t1.datetime
			left join tbl_t3trade t4 on t4.ticker = t1.ticker and STR_TO_DATE(t4.date,'%m/%d/%Y') = STR_TO_DATE(t1.datetime,'%m/%d/%Y')
			where STR_TO_DATE(t1.datetime,'%m/%d/%Y') = STR_TO_DATE('".$pdate."','%m/%d/%Y')
			and t1.volume > 20000
			order by t1.ticker ASC";
	} else{
		$sql = "select t1.ticker, t1.datetime, t1.close, t1.volume, t1.signal,
			t2.isignal, t4.trade, t2.coppock, t3.candle
			from tbl_intraday as t1
			left join tbl_market_exp as t2 on t2.ticker = t1.ticker and t2.datetime = t1.datetime 
			left join tbl_chart as t3 on t3.ticker = t1.ticker and t3.datetime = t1.datetime
			left join tbl_t3trade t4 on t4.ticker = t1.ticker and STR_TO_DATE(t4.date,'%m/%d/%Y') = STR_TO_DATE(t1.datetime,'%m/%d/%Y')
			and t1.volume > 20000
			and t1.ticker = '".$mack."'
			order by t1.ticker ASC";
	}
	
	$result = $conn->query($sql);

	// echo $sql; 
	
	if ($result->num_rows > 0) {
		 echo "<table class=\"table\">
			<tr>
				<th>TICKER</th>
				<th>DATETIME</th>
				<th>CLOSE</th>
				<th>VOLUME</th>
				<th>SIGNAL</th>
				<th>ISIGNAL</th>
				<th>T3SIGNAL</th>
				<th>COPPOCK</th>
				<th>CANDLE</th>
				<th></th>
			</tr>";
		 // output data of each row
		 while($row = $result->fetch_assoc()) {
			 $ticker = $row["ticker"];
			 $datetime = $row["datetime"];
			 $close = $row["close"];
			 $volume = $row["volume"];
			 $signal = $row["signal"];
			 $isignal = $row["isignal"];
			 $trade = $row["trade"];
			 $coppock = $row["coppock"];
			 $candle = $row["candle"];
			 
				 echo "<tr>
				 <td width=\"50px\">" . $row["ticker"]. "</td>
				 <td width=\"100px\">" .convertDate($datetime). "</td>
				 <td width=\"60px\" align=\"right\">" . $row["close"]. "</td>
				 <td width=\"120px\" align=\"right\">" . number_format($volume). "</td>
				 <td width=\"490px\" bgcolor=".fillColor($signal)." width=\"200px\">" . $row["signal"]. "</td>
				 <td bgcolor=".getProperColor($isignal)." width=\"100px\" align=\"center\">" .$isignal. "</td>
				 <td bgcolor=".getProperColor($trade)." width=\"100px\" align=\"center\">" . convertTrade($trade). "</td> 
				 <td bgcolor=".getProperColor($coppock)."  width=\"150px\" align=\"center\">" .$coppock. "</td>
				 <td bgcolor=".getColorCandle($candle)." width=\"150px\"  align=\"center\">" .$candle. "</td>
				 <td></td></tr>";
				 }
				 echo "</table>";
	} else {
		 echo "0 results";
	}

	$conn->close();
	
	
	function getProperColor($var)
	{
		if ($var == "TANG")
			return '#ddffcc';
		else if ($var == "GIAM")
			return '#ffcccc';
		else if ($var == "QUA BAN")
			return '#FFFF00';
		else if ($var == "QUA MUA")
			return '#FF7F50';
		else if ($var == "TICH LUY")
			return '#ffff80';
		else if ($var == "-=MANH=-")
			return '#ebadd6';
		else if ($var == "-=YEU=-")
			return '#ccccff';
		else if ($var == "-=BAN=-")
			return '#ff9999';
		else if ($var == "-=MUA=-")
			return '#9fff80';
		else if ($var == "PHAN PHOI")
			return '#ff8080';
		else if ($var == "UPTREND")
			return '#9fff80';
		else if ($var == "HOI PHUC")
			return '#b3ffcc';
		else if ($var == "PHONG BI")
			return '#ccb3ff';
		else if ($var == "KHONG CUNG")
			return '#ffff66';
		else if ($var == "UpT Sideways")
			return '#ddffcc';
		else if ($var == "DownTrend")
			return '#ff0000';
		else if ($var == "DnT Sideways")
			return '#ffcccc';
		else if ($var == "Buy")
			return '#7FFF00';
		else if ($var == "Sell")
			return '#FF4500';
		else
			return 	'#FFFFFF';
	}
	
	function getColorCandle($var)
	{
		if ($var == "Up Channel")
			return '#00e64d';
		else if ($var == "Symmetrical Triangle")
			return '#ddffcc';
		else if ($var == "Rising Wedge")
			return '#bfff00';
		else if ($var == "Falling Wedge")
			return '#ffff80';
		else if ($var == "Expanding Triangle")
			return '#ccffcc';
		else if ($var == "Decending Triangle")
			return '#ffbf80';
		else if ($var == "Ascending Triangle")
			return '#fff2e6';
		else if ($var == "Engulfing")
			return '#fff2e6';
		else if ($var == "Harami")
			return '#ddffcc';
		else if ($var == "Evening Star")
			return '#0080ff';
		else if ($var == "Down Channel")
			return '#ffcccc';
		else if ($var == "MUA")
			return '#00e64d';
		else if ($var == "BAN")
			return '#ffcccc';
		else if ($var == "Hanging Man")
			return '#ffcccc';
		else if ($var == "Hammer")
			return '#00e64d';
		else if ($var == "Harami Cross")
			return '#e6ffe6';
		else if ($var == "Evening Doji Star")
			return '#0080ff';
		else if ($var == "Spinning Top")
			return '#ffd1b3';
		else if ($var == "Shooting Star")
			return '#ffff99';
		else if ($var == "Inverted Hammer")
			return '#80ff80';
		else if ($var == "Doji Star")
			return '#80ff80';
		else if ($var == "Morning Star")
			return '#00ff00';
		else if ($var == "Morning Doji Star")
			return '#00ff00';
		else if ($var == "TREN NGUONG HO TRO")
			return '#00e64d';
		else if ($var == "DUOI NGUONG HO TRO")
			return '#ffcccc';
		else
			return 	'#FFFFFF';
	}
	
		function fillColor($var)
	{
		if ($var == "NEN UPTHRUST. DAU HIEU SUY YEU." )
			return '#FF9973';
		else if ($var == "KHONG CUNG. A DAU HIEU SUC MANH " )
			return '#ffff80';
		else if ($var == "SUC MANH XUAT HIEN SAU 1 DOWNTREND." || $var == "SUC MANH XUAT HIEN SAU 1 DOWNTREND DAI.")
			return '#ffff80';
		else if ($var == "SUC MANH XUAT HIEN SAU 1 DOWNTREND. KHOI LUONG LON KEM SUC MANH.")
			return '#9900cc';
		else if ($var == "DOWNBAR GIAM SAU 1 SUT GIAM MANH XAC NHAN SUY YEU.")
			return '#ff4d4d';
		else if ($var == "SUT GIAM MANH. DAU HIEU SUY YEU." || $var == "NO LUC GIAM MANH. KENH GIAM GIA")
			return '#ff3333';
		else if ($var == "KIEM TRA CUNG." )
			return '#ffffcc';
		else if ($var == "KET THUC GIAM GIA O GAN DAY ")
			return '#ffff00';
		else if ($var == "UPBAR KET THUC GAN CAO NHAT SAU KIEM TRA XAC NHAN SUC MANH.")
			return '#8cff66';
		else if ($var == "UPBAR KET THUC GAN CAO NHAT. XAC NHAN SUC MANH TRO LAI.")
			return '#8cff66'; 
		else if ($var == "XAC NHAN SUC MANH TRO LAI.")
			return '#b3e6b3'; 
		else if ($var == "XAC NHAN SUC MANH.")
			return '#66cc66'; 
		else if ($var == "NEN GIAM SAU NEN UPTHRUST. XAC NHAN SUY YEU." || $var == "NEN GIAM SAU NEN UPTHRUST. XAC NHAN SUY YEU.")
			return '#ff3333'; 
		else if ($var == "UPBAR KHOI LUONG LON TRONG UPTREND THE HIEN PHAN PHOI.")
			return '#4dff4d';
		else if ($var == "NEN GIAM VOL LON SAU NEN UPTHRUST. XAC NHAN SUY YEU." || $var == "UPTHRUST TAI KHOI LUONG CAO, XAC NHAN SUY YEU")
			return '#ff3333';
		else if ($var == "UPBAR KHOI LUONG LON KET THUC O MUC CAO NHAT. GIA TANG SUC MANH.")
			return '#4dff4d';
		else if ($var == "DOWNBAR KHOI LUONG LON SAU UPBAR KHOI LUONG LON. GIA TANG SUY YEU.")
			return '#ff5c33';
		else if ($var == "KHONG CAU. DAU HIEU SUY YEU.")
			return '#FF9973';
		else if ($var == "NO LUC TANG MANH. KENH TANG GIA ")
			return '#40ff00';
		else
			return 	'#FFFFFF';
	}
	
	function convertDate($dateString){
		$myDateTime = DateTime::createFromFormat('m/d/Y', $dateString);
		$newDateString = $myDateTime->format('d/m/Y');
		
		return $newDateString;
	}
	
	function convertTrade($var)
	{
		if ($var == "Buy")
			return "MUA";
		else if ($var == "Sell")
			return "BAN";
	}

	function formatMoney($number, $fractional=false) { 
		if ($fractional) { 
			$number = sprintf('%.2f', $number); 
		} 
		while (true) { 
			$replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number); 
			if ($replaced != $number) { 
				$number = $replaced; 
			} else { 
				break; 
			} 
		} 
		return $number; 
	} 
	?>  
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>