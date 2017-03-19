<!DOCTYPE html>
<html lang="vi-VN">

<head>
    <meta charset="utf-8">
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="description" content="Trần Mạnh Cường - Chuyên gia phân tích TTCK - 0934 696 594" />
	<meta name="keywords" content="Trần Mạnh Cường - Chuyên gia phân tích TTCK - 0934 696 594" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	
    <title>Trần Mạnh Cường - Chuyên gia phân tích TTCK</title>
    <link rel="stylesheet" href="css/table/bootstrap.min.css">
    <link rel="stylesheet" href="css/table/dataTables.bootstrap.min.css">
    
    <link rel="shortcut icon" href="images/demo/logoTMC.ico" />
    <!-- Bootstrap Core JavaScript -->
    <script src="js/table/jquery-1.12.4.js"></script>
    <script src="js/table/jquery.dataTables.min.js"></script>
    <script src="js/table/dataTables.bootstrap.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/thejsfile.js"></script>
    <script>
	$(document).ready(function() {
		$('#example').DataTable();
	} );
    </script>
	
    <!-- Custom CSS -->
    <link href="css/full.css" rel="stylesheet">
	<link rel="shortcut icon" href="images/demo/logoTMC.ico" />
	<style>
	.error {color: #FF0000;}
    .table{width: 1380px;max-width: 1380px;margin-bottom:20px;}.table
    .navbar-nav{font-size: 14px;}.navbar-nav
	</style>
</head>
<body>
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
                            <li><a target = '_blank' href="https://docs.google.com/forms/d/e/1FAIpQLSfmLX6GM2-wctqkSPVWiU9El2SUyjGC2-u7o-nCUNXrBpnkaA/viewform?c=0&w=1">Check list MUA</a></li>
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
			
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
			  if (empty($_POST["pdate"])) {
				$nameErr = "Yêu cầu chọn ngày.  ";
			  } else {
				$pdate = test_input($_POST["pdate"]);
			  }
		  }
		  
		  function test_input($data) {
			  $data = trim($data);
			  $data = stripslashes($data);
			  $data = htmlspecialchars($data);
			  return $data;
			}
			
			function getProperColor($var)
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
				return '#ffcccc';
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
				return '#ff6600';
			else if ($var == "Spinning Top")
				return '#ffd1b3';
			else if ($var == "Shooting Star")
				return '#ffff99';
			else if ($var == "Inverted Hammer")
				return '#80ff80';
			else if ($var == "Doji Star")
				return '#80ff80';
			else if ($var == "Morning Doji Star")
				return '#66ff66';
			else if ($var == "Morning Doji Star")
				return '#66ff66';
			else if ($var == "Morning Star")
				return '#66ff66';
			else if ($var == "Dark Cloud Cover")
				return '#ff8c1a';
			else if ($var == "TREN NGUONG HO TRO")
				return '#00e64d';
			else if ($var == "DUOI NGUONG HO TRO")
				return '#ffcccc';
			else
				return 	'#FFFFFF';
		}
		

		function convertDate($dateString){
			$myDateTime = DateTime::createFromFormat('m/d/Y', $dateString);
			$newDateString = $myDateTime->format('d/m/Y');
			
			return $newDateString;
		}
		
		function viewchart($ticker){
			if (strpos($ticker, '^') !== FALSE)
			{
			 $newlink = "http://www.cophieu68.vn/snapshot.php?id=" . $ticker;
			}
			else
			{
			 $newlink = "https://banggia.vndirect.com.vn/chart/?symbol=" . $ticker;
			}
			
			return $newlink;
		}
	?>


	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
	  <table style="width:30%">
		<tr> 
		   <td><h4>CHỌN NGÀY:</h4> </td>
		   <td><input type="date" name="pdate" id="theDate" value="<?php echo $pdate;?>" class="form-control"></td>
		   <td>*</td>
		   <td align="center"><input type="submit" name="submit" value="Submit" class="btn btn-primary"> </td>
		</tr>
		</table>
		<table>
			<tr><span class="error"><?php echo $nameErr;?></span> </tr>
		</table>
	</form>

	</br>
	
	
	    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
				<th>MÃ CK</th>
				<th >NGÀY GD</th>
				<th>GIÁ ĐÓNG CỬA</th>
				<th>THAY ĐỔI</th>
				<th>KHỐI LƯỢNG</th>
				<th>TÍN HIỆU</th>
				<th>MUA BÁN</th>
				<th>HỖ TRỢ</th>
				<th>KHÁNG CỰ</th>
				<th>MÔ HÌNH</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
				<th>MÃ CK</th>
				<th >NGÀY GD</th>
				<th>GIÁ ĐÓNG CỬA</th>
				<th>THAY ĐỔI</th>
				<th>KHỐI LƯỢNG</th>
				<th>TÍN HIỆU</th>
				<th>MUA BÁN</th>
				<th>HỖ TRỢ</th>
				<th>KHÁNG CỰ</th>
				<th>MÔ HÌNH</th>
            </tr>
        </tfoot>
		<tbody>
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

		$sql = "SELECT `ticker`, `datetime`, `candle`, `close`, `change`, `volume`, `buysell`, `supportline`, `resistanceline`, `pattern` 
		FROM `tbl_chart`
		WHERE `volume` > 50000
		AND STR_TO_DATE(`datetime`,'%m/%d/%Y') = STR_TO_DATE('".$pdate."','%m/%d/%Y')
		ORDER BY `pattern` DESC, `change` DESC, `buysell` ASC";
		$result = $conn->query($sql);
		
		//echo $sql; 

		if ($result->num_rows > 0) {
			 // output data of each row
			 while($row = $result->fetch_assoc()) {
				 $ticker = $row["ticker"];
				 $datetime = $row["datetime"];
				 $candle = $row["candle"];
				 $close = $row["close"];
				 $change = $row["change"];
				 $volume = $row["volume"];
				 $buysell = $row["buysell"];
				 $supportline = $row["supportline"];
				 $resistanceline = $row["resistanceline"];
				 $pattern = $row["pattern"];
				  
				 if($buysell == "B"){
					 $buysell = "MUA";
				 } else if($buysell == "S"){
					 $buysell = "BAN";
				 }
				 
				 if($resistanceline == "confirmed"){
					 $resistanceline = "XAC NHAN";
				 }
				 if($supportline == "Break"){
					 $supportline = "BREAK";
				 }
				 if($resistanceline == "Break"){
					 $resistanceline = "BREAK";
				 }
					 echo "<tr>
					 <td width=\"100px\"> <a target = '_blank' href=".viewchart($ticker)."> ". $row["ticker"]." </a></td>
					 <td width=\"100px\">" .convertDate($datetime). "</td> 
					 <td align=\"right\">" . $close. "</td>
					 <td align=\"right\">" . $change. "</td>
					 <td align=\"right\">" . number_format($volume). "</td>
					 <td bgcolor=".getProperColor($candle).">" . $candle. "</td>
					 <td bgcolor=".getProperColor($buysell)." >" . $buysell. "</td>
					 <td bgcolor=".getProperColor($buysell)." >" . $supportline. "</td>
					 <td bgcolor=".getProperColor($buysell)." >" . $resistanceline. "</td>
					 <td bgcolor=".getProperColor($pattern)." >" .$pattern. "</td></tr>";
					}
		}
		$conn->close();
	?>  
	</tbody>
    </table>
</body>
</html>