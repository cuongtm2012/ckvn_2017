<!DOCTYPE html>
<html lang="vi-VN">

<head>
	<!-- // ket hop cach danh T3 + Nivara -->
    <meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min - module.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/full.css" rel="stylesheet">
    <link rel="shortcut icon" href="images/demo/logoTMC.ico" />
	
	<style>
	.error {color: #FF0000;}
	</style>
</head>
<body  id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
     <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="index.html">TRANG CHỦ</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li class="hidden">
                        <a class="page-scroll" href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="intraday.php">Phân tích tín hiệu</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="marketexp.php">Phân tích thị trường</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="chart.php">Phân tích mô hình</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="t3trade.php">Phân tích tín hiệu mua/bán</a>
                    </li>
                    <li role="presentation" class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                          Phân tích Wekkly <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
							<li><a href="intradaywl.php">Phân tích tín hiệu</a></li>
							<li><a href="marketexpwl.php">Phân tích thị trường</a></li>
							<li><a href="chartwl.php">Phân tích mô hình</a></li>
							<li><a href="t3tradewl.php">Phân tích tín hiệu mua/bán</a></li>
                        </ul>
                    </li>
					<li role="presentation" class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                          Danh mục theo dõi <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
							<li><a href="danhmuc.php">Danh mục theo dõi</a></li>
							<li><a href="tinhieutot.php">Danh mục tín hiệu tốt</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
	</br>

	<?php
	
	// define variables and set to empty values
	$nameErr = "";
	$pdate = "";
	$tdateErr = "";
	$tdate = "";
		
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
		  if (empty($_POST["pdate"])) {
			$nameErr = "Yêu cầu chọn ngày bắt đầu.  ";
		  } else {
			$pdate = test_input($_POST["pdate"]);
		  }
		  if (empty($_POST["tdate"])) {
			$tdateErr = "Yêu cầu chọn ngày kết thúc.  ";
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
		<table style="width:55%">
			<tr>
				<td style="width:180px"><h4>TỪ NGÀY: </h4></td>
				<td style="width:100px"><input type="date" name="pdate" value="<?php echo $pdate;?>" class="form-control"> </td>
				<td>* </td>
				<td style="width:180px"><h4>ĐẾN NGÀY: </h4></td>
				<td style="width:100px"><input type="date" name="tdate" value="<?php echo $tdate;?>" class="form-control"> </td>
				<td>* </td>
				<td><input type="submit" name="submit" value="Submit"  class="btn btn-primary">   </td>
			</tr>
		</table>
		<table>
			<tr>
				<td><span class="error"><?php echo $nameErr;?>    <?php echo $tdateErr;?></span></td>
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
	if($tdate != NULL){
		$myDateTime = DateTime::createFromFormat('Y-m-d', $tdate);
		$tdate = $myDateTime->format('m/d/Y');
	} else {
		$tdate = new DateTime();
		$tdate = $tdate->format('m/d/Y');
	}
	
	$conn = connectionDB();
	
	$sql = "SELECT `tbl_market_exp_w`.`ticker`, `tbl_market_exp_w`.`datetime`, `tbl_market_exp_w`.`pclose` , `tbl_market_exp_w`.`volume`, `tbl_market_exp_w`.`coppock`
    , `tbl_nivara_w`.`trade` AS nivaratrade, `tbl_t3trade_w`.`trade` AS t3trade, `tbl_harmonic_w`.`trade` AS harmonic 
    , `tbl_guppy_w`.`trade` AS guppytrade, `tbl_rainbow_w`.`trade` AS rainbowtrade
FROM `tbl_market_exp_w` 
LEFT JOIN `tbl_t3trade_w` ON `tbl_market_exp_w`.`ticker` = `tbl_t3trade_w`.`ticker` AND `tbl_market_exp_w`.`datetime` = `tbl_t3trade_w`.`date` 
LEFT JOIN `tbl_nivara_w` ON  `tbl_market_exp_w`.`ticker` = `tbl_nivara_w`.`ticker` AND  `tbl_market_exp_w`.`datetime` = `tbl_nivara_w`.`date` 
LEFT JOIN `tbl_harmonic_w` ON `tbl_market_exp_w`.`ticker` = `tbl_harmonic_w`.`ticker` AND  `tbl_market_exp_w`.`datetime` = `tbl_harmonic_w`.`date`
LEFT JOIN `tbl_guppy_w` ON `tbl_market_exp_w`.`ticker` = `tbl_guppy_w`.`ticker` AND  `tbl_market_exp_w`.`datetime` = `tbl_guppy_w`.`date`
LEFT JOIN `tbl_rainbow_w` ON `tbl_market_exp_w`.`ticker` = `tbl_rainbow_w`.`ticker` AND  `tbl_market_exp_w`.`datetime` = `tbl_rainbow_w`.`date`
 
WHERE `tbl_market_exp_w`.`volume` > 20000 AND STR_TO_DATE(`tbl_t3trade_w`.`date`,'%m/%d/%Y') = (SELECT MAX(STR_TO_DATE(`datetime`,'%m/%d/%Y')) FROM `tbl_market_exp_w`)
ORDER BY `tbl_market_exp_w`.`datetime` ASC, `tbl_market_exp_w`.`coppock`, `tbl_market_exp_w`.`ticker` ASC";
	$result = $conn->query($sql);

	 //echo $sql; 
	
	if ($result->num_rows > 0) {
		 echo "<table class=\"table\">
			<tr>
				<th align=\"center\">MÃ CK</th>
				<th>NGÀY GD</th>
				<th>ĐIỂM MUA BÁN</th>
				<th>KHỐI LƯỢNG</th>
				<th>MUA/BÁN - T3</th>
				<th>MUA/BÁN (Nivara)</th>
                <th>MUA/BÁN (Harmonic)</th>
                <th>MUA/BÁN (G)</th>
                <th>MUA/BÁN (R)</th>
				<th>XU HƯỚNG</th>
			</tr>";
		 // output data of each row
		 while($row = $result->fetch_assoc()) {
			 $ticker = $row["ticker"];
			 $datetime = $row["datetime"];
			 $volume = $row["volume"];
			 $t3trade = $row["t3trade"];
			 $nivaratrade = $row["nivaratrade"];
             $guppytrade = $row["guppytrade"];
             $rainbowtrade = $row["rainbowtrade"];
			 $close = $row["pclose"];
			 $coppock = $row["coppock"];
             $harmonic = $row["harmonic"];
			 
			 if($t3trade == "Buy" || $t3trade == "Sell" || $nivaratrade == "Buy" || $nivaratrade == "Sell"
                     || $harmonic == "Buy" || $harmonic == "Sell"){
				 echo "<tr>
				 <td width=\"100px\"> <a target = '_blank' href=".viewchart($ticker)."> ". $row["ticker"]." </a></td>
				 <td width=\"100px\" align=\"center\">" .convertDate($datetime). "</td>
				 <td width=\"150px\" align=\"center\">" . $row["pclose"]. "</td>
				 <td width=\"100px\" align=\"right\">" .number_format($volume). "</td>
				 <td bgcolor=".getProperColor($t3trade)." width=\"150px\" align=\"center\">" . convertTrade($t3trade). "</td>
				 <td bgcolor=".getProperColor($nivaratrade)." width=\"150px\" align=\"center\">" . convertTrade($nivaratrade). "</td>
                 <td bgcolor=".getProperColor($harmonic)." width=\"150px\" align=\"center\">" . convertTrade($harmonic). "</td>
                 <td bgcolor=".getProperColor($guppytrade)." width=\"150px\" align=\"center\">" . convertTrade($guppytrade). "</td>
                 <td bgcolor=".getProperColor($rainbowtrade)." width=\"150px\" align=\"center\">" . convertTrade($rainbowtrade). "</td>
				 <td bgcolor=".fillColor($coppock)." width=\"200px\" align=\"center\">" . $row["coppock"]. "</td></tr>";
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
		else
			return 	'#FFFFFF';
	}
	function fillColor($var){
		if ($var == "UPTREND")
			return '#9fff80';
		else if ($var == "UpT Sideways")
			return '#ddffcc';
		else if ($var == "DownTrend")
			return '#ff0000';
		else if ($var == "DnT Sideways")
			return '#ffcccc';
		else
			return 	'#FFFFFF';
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
    function viewchart($ticker){
        $newlink = "https://banggia.vndirect.com.vn/chart/?symbol=" . $ticker;
        
        return $newlink;
    }
	?>  
	
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>