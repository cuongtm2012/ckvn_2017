<!DOCTYPE html>
<html lang="vi-VN">

<head>
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
    .table{width: 1500px;max-width: 1500px;margin-bottom:20px;}.table
	.navbar-nav{font-size: 14px;}.navbar-nav
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
	$pdateErr = "";
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
		<table style="width:40%">
			<tr> 
				<td width="10%"></td>
				<td style="width:32%"><h4> CHỌN NGÀY:</h4></td>
				<td style="width:100px"> <input type="date" name="pdate" value="<?php echo $pdate;?>" class="form-control"></td>
				<td>*</td>
			</tr>
			<tr>
				<td width="10%"></td>
				<td  style="width:32%"><h4> CHỌN MÃ CK: </h4></td>
				<td  style="width:100px"> <input type="text" name="mack" class="form-control"></td>
				<td align="center"> <input type="submit" name="submit" value="Submit" class="btn btn-primary"> </td>
			</tr>
		</table>	  
		<table>
			<tr> 
				<td> <span class="error"><?php echo $pdateErr;?></span></td>
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
		$sql = "SELECT `ticker`, `datetime`, `signal`, `condition`, `close`, `volume`, `bband`, `medma`, `longma`, `medmalongma`, `macd`, `macdsignal`, `aroon`, `stochastic`, `rsi14`, `mfi`, `score` FROM `tbl_intraday_w` 
			WHERE `volume` > 20000
			AND `ticker` not in ('^VNINDEX2') 
			AND STR_TO_DATE(`datetime`,'%m/%d/%Y') = (SELECT MAX(STR_TO_DATE(`datetime`,'%m/%d/%Y')) FROM `tbl_intraday_w` WHERE `ticker` = '^VNINDEX')
			ORDER BY `signal` DESC, `condition` DESC, `ticker` ASC, `medma` ASC";
	} else{
		$sql = "SELECT `ticker`, `datetime`, `signal`, `condition`, `close`, `volume`, `bband`, `medma`, `longma`, `medmalongma`, `macd`, `macdsignal`, `aroon`, `stochastic`, `rsi14`, `mfi`, `score` FROM `tbl_intraday_w` 
			WHERE `volume` > 20000
			AND `ticker` not in ('^VNINDEX2') 
			AND STR_TO_DATE(`datetime`,'%m/%d/%Y') = (SELECT MAX(STR_TO_DATE(`datetime`,'%m/%d/%Y')) FROM `tbl_intraday_w` WHERE `ticker` = '^VNINDEX')
			AND `ticker` = '".$mack."'
			ORDER BY `signal` DESC, `condition` DESC, `ticker` ASC, `medma` ASC";
	}
	
	$result = $conn->query($sql);

	// echo $sql; 
	
	if ($result->num_rows > 0) {
		 echo "<table class=\"table\">
			<tr>
				<th>MÃ CK</th>
				<th>NGÀY GD</th>
				<th>TÍN HIỆU </th>
				<th>GIÁ ĐÓNG CỬA</th>
				<th>KHỐI LƯỢNG</th>
				<th>TRUNG HẠN</th>
				<th>DÀI HẠN</th>
				<th>MACD</th>
				<th>AROON</th>
				<th>STOCHASTIC</th>
				<th>MFI</th>
				<th>ĐIỂM SỐ</th>
			</tr>";
		 // output data of each row
		 while($row = $result->fetch_assoc()) {
			 $ticker = $row["ticker"];
			 $datetime = $row["datetime"];
			 $signal = $row["signal"];
			 $condition = $row["condition"];
			 $close = $row["close"];
			 $volume = $row["volume"];
			 $medma = $row["medma"];
			 $longma = $row["longma"];
			 $medmalongma = $row["medmalongma"];
			 $macd = $row["macd"];
			 $macdsignal = $row["macdsignal"];
			 $aroon = $row["aroon"];
			 $stochastic = $row["stochastic"];
			 $rsi14 = $row["rsi14"];
			 $mfi = $row["mfi"];
			 $score = $row["score"];
			 
				 echo "<tr>
				 <td width=\"100px\">" . $row["ticker"]. "</td>
				 <td width=\"100px\">" .convertDate($datetime). "</td>
				 <td width=\"320px\" bgcolor=".fillColor($signal)." width=\"300px\">" . $row["signal"]. "</td>

				 <td align=\"right\">" . $row["close"]. "</td>
				 <td align=\"right\">" . number_format($row["volume"]). "</td>
				 <td bgcolor=".getProperColor($medma)." align=\"center\">" . $row["medma"]. "</td>
				 <td bgcolor=".getProperColor($longma)."  align=\"center\">" . $row["longma"]. "</td>

				 <td bgcolor=".getProperColor($macd)."  align=\"center\">" . $row["macd"]. "</td>

				 <td bgcolor=".getProperColor($aroon)."  align=\"center\">" . $row["aroon"]. "</td>
				 <td bgcolor=".getProperColor($stochastic)."  align=\"center\">" . $row["stochastic"]. "</td>
				 <td width=\"80px\" bgcolor=".getProperColor($mfi)."   align=\"center\">" . $row["mfi"]. "</td>
				 <td align=\"center\">" . $row["score"]. "</td></tr>";
				 }
				 echo "</table>";
	} else {
		 echo "0 results";
	}

	$conn->close();
	
	
	function getProperColor($var)
	{
		if ($var == "TANG")
			return '#7FFF00';
		else if ($var == "GIAM")
			return '#FF4500';
		else if ($var == "QUA BAN")
			return '#FFFF00';
		else if ($var == "QUA MUA")
			return '#FF7F50';
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

	?>  
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>