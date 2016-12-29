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
	<style>
	.error {color: #FF0000;}
    .table{width: 1370px;max-width: 1370px;margin-bottom:20px;}.table
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
$macker = $giamuaer = $muabaner = $ngaymuaer = "";
$mack = $giamua = $muaban = $ngaymua ="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["muaban"])) {
    $muabaner = "Yêu cầu chọn MUA/BAN";
  } else {
    $muaban = test_input($_POST["muaban"]);
  }
  if (empty($_POST["mack"])) {
    $macker = "Yêu cầu nhập mã CK";
  } else {
    $mack = test_input($_POST["mack"]);
  }
  
  
  if (empty($_POST["ngaymua"])) {
    $ngaymuaer = "Yêu cầu chọn ngày mua";
  } else {
    $ngaymua = test_input($_POST["ngaymua"]);
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
	<table width="500px">
		<tr>
			<td width="10%"></td>
			<td><h2>QUẢN LÝ DANH MỤC</h2></td>
		</tr>
	</table>
    <table width="500px">
		<tr>
			<td width="10%"></td>
			<td><p><span class="error">* yêu cầu nhập.</span></p></td>
		</tr>
        <tr>
			<td width="10%"></td>
            <td>MUA/ BÁN: </td>
            <td><input type="radio" name="muaban" <?php if (isset($muaban) && $muaban=="mua") echo "checked";?> value="mua">MUA
            <input type="radio" name="muaban" <?php if (isset($muaban) && $muaban=="ban") echo "checked";?> value="ban">BAN</td>
            <td><span class="error">* <?php echo $muabaner;?></span></td>
        </tr>
        <tr>
			<td width="10%"></td>
            <td>MÃ CK : </td>
            <td><input type="text" name="mack" value="<?php echo $mack;?>" class="form-control"></td>
            <td></td>
            <td><span class="error">* <?php echo $macker;?></span></td>
        </tr>
        <tr>
			<td width="10%"></td>
            <td>GIÁ MUA :</td>
            <td><input type="text" name="giamua" value="<?php echo $giamua;?>" class="form-control"></td>
            <td></td>
            <td><span class="error">* <?php echo $giamuaer;?></span></td>
        </tr>
        <tr>
			<td width="10%"></td>
            <td>NGÀY MUA :</td>
            <td><input type="date" name="ngaymua" value="<?php echo $ngaymua;?>" class="form-control"></td>
            <td></td>
            <td><span class="error">* <?php echo $ngaymuaer;?></span></td>
        </tr>
        <tr>
			<td width="10%"></td>
            <td><input type="submit" name="submit" value="Submit" class="btn btn-primary"></td>
            <td></td>
        </tr>
    </table>
</form>
</br>

<?php
	require_once('conf.php');
	$pdate = new DateTime();
	$pdate = $pdate->format('m/d/Y');
	if($ngaymua != NULL){
		$myDateTime = DateTime::createFromFormat('Y-m-d', $ngaymua);
		$ngaymua = $myDateTime->format('m/d/Y');
	} else {
		$ngaymua = new DateTime();
		$ngaymua = $ngaymua->format('m/d/Y');
	}

    $conn = connectionDB();
    if($muaban == "mua" && $mack != NULL && $ngaymua != NULL)
    {
  		$insertsql = "INSERT tbl_danhmuc(status, mack, giamua, ngaymua) VALUES ('".$muaban."','".$mack."','".$giamua."','".$ngaymua."')";
        $result = $conn->query($insertsql);
        //echo $insertsql;
    } else if($muaban == "ban" && $mack != NULL && $ngaymua != NULL){
        $dltsql = "DELETE FROM `tbl_danhmuc` as t1 WHERE t1.mack = '".$mack."'";
        $result = $conn->query($dltsql);
    }
	
	$sql = "select t5.mack as ticker, t1.datetime, t1.close, t1.volume, t1.signal, t2.isignal, t4.trade, t2.coppock, t3.candle 
	from tbl_intraday as t1 
	inner join tbl_danhmuc as t5 on t5.mack = t1.ticker 
	left join tbl_market_exp as t2 on t2.ticker = t1.ticker and t2.datetime = t1.datetime 
	left join tbl_chart as t3 on t3.ticker = t1.ticker and t3.datetime = t1.datetime 
	left join tbl_t3trade as t4 on t4.ticker = t1.ticker and STR_TO_DATE(t4.date,'%m/%d/%Y') = STR_TO_DATE(t1.datetime,'%m/%d/%Y') 
	where STR_TO_DATE(t1.datetime,'%m/%d/%Y') = (select MAX(STR_TO_DATE(datetime,'%m/%d/%Y')) from tbl_intraday) 
	and t1.volume > 20000 
	order by t1.ticker ASC";

    //echo $sql;
    
	   $result = $conn->query($sql);
	
		if ($result->num_rows > 0) {
		 echo "<table class=\"table\">
			<tr>
				<th>MÃ CK</th>
				<th>NGÀY</th>
				<th>GIÁ</th>
				<th>KHỐI LƯỢNG</th>
				<th>TÍN HIỆU</th>
				<th>SỨC MẠNH</th>
				<th>TÍN HIỆU T+3</th>
				<th>XU HƯỚNG</th>
				<th></th>
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
				 <td width=\"70px\">" .strtoupper($row["ticker"]). "</td>
				 <td width=\"100px\">" .convertDate($datetime). "</td>
				 <td width=\"60px\" align=\"right\">" . $row["close"]. "</td>
				 <td width=\"120px\" align=\"right\">" . number_format($volume). "</td>
				 <td width=\"490px\" bgcolor=".fillColor($signal)." width=\"200px\">" . $row["signal"]. "</td>
				 <td bgcolor=".getProperColor($isignal)." width=\"100px\" align=\"center\">" .$isignal. "</td>
				 <td bgcolor=".getProperColor($trade)." width=\"100px\" align=\"center\">" . convertTrade($trade). "</td> 
				 <td bgcolor=".getProperColor($coppock)."  width=\"150px\" align=\"center\">" .$coppock. "</td>
				 <td bgcolor=".getColorCandle($candle)." width=\"150px\"  align=\"center\">" .$candle. "</td>
				 <td><a href=\"delete.php?id=" . $row["ticker"] . "\">Delete</a></td>
                 </tr>";
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
	
	    function viewchart($ticker){
	        $newlink = "https://banggia.vndirect.com.vn/chart/?symbol=" . $ticker;
        
	        return $newlink;
	    }
	?>  
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    
    <script>
    
    </script>

</body>
</html>