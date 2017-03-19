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
	
    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="css/table/bootstrap.min.css">
    <link rel="stylesheet" href="css/table/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-datetimepicker.css">
    
    <!-- Bootstrap Core JavaScript -->
    <script src="js/table/jquery-1.12.4.js"></script>
    <script src="js/table/jquery.dataTables.min.js"></script>
    <script src="js/table/dataTables.bootstrap.min.js"></script>
    <script src="js/moment.min.js"></script>
    <script src="js/bootstrap-datetimepicker.min.js"></script>
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
    .table{width: 1700px;max-width: 1700px;margin-bottom:20px;}.table
	.navbar-nav{font-size: 14px;}.navbar-nav
    .bootstrap-datetimepicker-widget tr:hover {
        background-color: #808080;
    }
	</style>
	
    <script>
        $(document).ready(function(){

          //Initialize the datePicker(I have taken format as mm-dd-yyyy, you can     //have your owh)
          $("#weeklyDatePicker").datetimepicker({
              format: 'MM-DD-YYYY'
          });
        
           //Get the value of Start and End of Week
          $('#weeklyDatePicker').on('dp.change', function (e) {
              var value = $("#weeklyDatePicker").val();
              var firstDate = moment(value, "MM-DD-YYYY").day(0).format("MM-DD-YYYY");
              var lastDate =  moment(value, "MM-DD-YYYY").day(6).format("MM-DD-YYYY");
              $("#weeklyDatePicker").val(firstDate + " - " + lastDate);
          });
        });
    </script>
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
		$weeklyDatePickerErr = "";
		$weeklyDatePicker = "";
		$fdate = $pdate = "";
		
			
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$weeklyDatePicker = test_input($_POST["weeklyDatePicker"]);
		}
		  
		function test_input($data) {
			  $data = trim($data);
			  $data = stripslashes($data);
			  $data = htmlspecialchars($data);
			  return $data;
			}
			
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
			else
				return 	'#FFFFFF';
		}

		function convertDate($dateString){
			$myDateTime = DateTime::createFromFormat('m/d/Y', $dateString);
			$newDateString = $myDateTime->format('d/m/Y');
			
			return $newDateString;
		}
		function findTicker($vpazone, $vpastatus, $isignal, $t3signal, $emashort, $emamid, $coppock, $arsi, $stochastic, $mfi, $ematrend){
			if($vpazone == "TICH LUY" && $vpastatus == "-=MANH=-" &&( $isignal == "-=MUA=-" || $t3signal == "-=MUA=-" || $emashort == "-=MUA=-") && ($coppock == "UPTREND" || $coppock == "UpT Sideways"))
				return '#b3ff99';
			else if($vpazone == "TICH LUY" && $vpastatus == "-=MANH=-" &&( $isignal == "-=MUA=-" || $t3signal == "-=MUA=-" || $emashort == "-=MUA=-"))
				return '#ff9900';
			else if($vpazone == "TICH LUY" && $vpastatus == "-=MANH=-" &&( $isignal == "TANG"))
				return '#f2ffcc';
			else if ($vpazone == "TICH LUY" && $emashort == "TANG" && ($coppock == "UPTREND" || $coppock == "UpT Sideways") && ($stochastic != "GIAM") )
				return '#ddffcc';
			else if ($emashort == "TANG" && $emamid == "TANG" && $arsi == "QUA BAN")
				return '#ffffb3';
			else if ($vpazone == "PHAN PHOI" && ($isignal == "GIAM" || $isignal == "-=BAN=-") && ($t3signal == "-=BAN=-") && ($stochastic == "GIAM") && ($arsi == "QUA MUA" || $mfi == "QUA MUA"))
				return '#ffcccc';
			else if ($vpazone == "PHAN PHOI" && ($isignal == "GIAM" || $isignal == "-=BAN=-"))
				return '#ffcccc';
			else if ($vpazone == "TICH LUY" && ($isignal == "-=MUA=-" || $t3signal == "-=MUA=-") && $ematrend == "PHONG BI")
				return '#e0e0d1';
			else if ($isignal == "-=MUA=-" && $t3signal == "-=MUA=-" && $ematrend != "GIAM")
				return '#ff9900';
			else if ($emashort == "-=MUA=-" && $emamid == "TANG" && $ematrend == "TANG" && $isignal == "TANG" && $vpazone != "PHAN PHOI")
				return '#ff9900';
			else if ((($emashort == "-=MUA=-" || $emashort == "TANG" || $vpastatus == "-=MANH=-") && $isignal == "-=MUA=-") && $vpazone != "PHAN PHOI" )
				return '#ff9900';
			else
				return '#FFFFFF';
		}
	?>


	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  

	</div>
    	<table>
			<tr> 
				<td></td>
				<td><h4> CHỌN NGÀY:</h4></td>
				<td> 
                    <div class="row">
                        <div class="col-sm-6 form-group" style="width:230px">
                            <div class="input-group" id="DateDemo">
                              <input type='text' id='weeklyDatePicker'  name="weeklyDatePicker" value="<?php echo weeklyDatePicker;?>"  placeholder="Select Week" class="form-control"/>
                          </div>
                    </div>
                </td>
				<td>*</td>
				<td align="center"> <input type="submit" name="submit" value="Submit" class="btn btn-primary"> </td>
			</tr>
		</table>	  
		<table>
			<tr> 
				<td> <span class="error"><?php echo $weeklyDatePickerErr;?></span></td>
			</tr>
		</table>
	</form>

	</br>
	
	<table id="example" class="table table-striped table-bordered" cellspacing="0">
	<thead>
		<tr>
				<th>MÃ CK</th>
				<th>NGÀY GD</th>
				<th>GIÁ CHỐT</th>
				<th>KHỐI LƯỢNG</th>
				<th>KÊNH</th>
				<th>TRẠNG THÁI</th>
				<th>NGẮN HẠN</th>
				<th>TRUNG HẠN</th>
				<th>DÀI HẠN</th>
				<th>KÊNH EMA</th>
				<th>SỨC MẠNH</th>
				<th>ĐIỂM MUA T3</th> 
				<th>XU HƯỚNG</th>
				<th>STOCHASTIC</th>
				<th>ARSI</th>
				<th>MFI</th>
				<th>DMX</th>
				<th>THAY ĐỔI</th>
				<th>XẾP HẠNG</th>
		</tr>
	</thead>
	<tfoot>
		<tr>
				<th>MÃ CK</th>
				<th>NGÀY GD</th>
				<th>GIÁ CHỐT</th>
				<th>KHỐI LƯỢNG</th>
				<th>KÊNH</th>
				<th>TRẠNG THÁI</th>
				<th>NGẮN HẠN</th>
				<th>TRUNG HẠN</th>
				<th>DÀI HẠN</th>
				<th>KÊNH EMA</th>
				<th>SỨC MẠNH</th>
				<th>ĐIỂM MUA T3</th> 
				<th>XU HƯỚNG</th>
				<th>STOCHASTIC</th>
				<th>ARSI</th>
				<th>MFI</th>
				<th>DMX</th>
				<th>THAY ĐỔI</th>
				<th>XẾP HẠNG</th>
		</tr>
	</tfoot>
	<tbody>
	
	<?php
		require_once('conf.php');
		
		if($weeklyDatePicker != NULL){
		   
		   $fdate = substr($weeklyDatePicker, 0, 10);
		   $tdate = substr($weeklyDatePicker, 12);

		   $myDateTime = DateTime::createFromFormat('m-d-Y', $fdate); 
		   $fdate = $myDateTime->format('m/d/Y');
			
		   $myDateTime = DateTime::createFromFormat('m-d-Y', trim($tdate));
		   $tdate = $myDateTime->format('m/d/Y');
		} else {
			$tdate = new DateTime();
			$tdate = $tdate->format('m/d/Y');
			
			$myfdate = new DateTime();
			$myfdate = $myfdate->format('m/d/Y');
		}
		
		$conn = connectionDB();

		$sql = "SELECT `ticker`, `datetime`, `pclose`, `volume`, `vpazone`, `vpastatus`, `emashort`, `emamid`, `emalong`, `ematrend`, `isignal`, `t3signal`, `bolband`, `macd`, `macdrsi`, `coppock`, `stochastic`, `arsi`, `mfi`, `dmx`, `pl`, CAST(`rank` AS UNSIGNED) AS rank
		FROM `tbl_market_exp_w` WHERE `volume` > 50000 AND `pclose` > 1
		AND STR_TO_DATE(`datetime`,'%m/%d/%Y') = (SELECT MAX(STR_TO_DATE(`datetime`,'%m/%d/%Y')) FROM `tbl_market_exp_w` WHERE `ticker` = '^VNINDEX'
		AND (STR_TO_DATE(`datetime`,'%m/%d/%Y') BETWEEN STR_TO_DATE('".$fdate."','%m/%d/%Y') AND STR_TO_DATE('".$tdate."','%m/%d/%Y')))";

		$result = $conn->query($sql);

		//echo $sql; 
		if ($result->num_rows > 0) {
			 // output data of each row
			 while($row = $result->fetch_assoc()) {
				 $ticker = $row["ticker"];
				 $datetime = $row["datetime"];
				 $pclose = $row["pclose"];
				 $volume = $row["volume"];
				 $vpazone = $row["vpazone"];
				 $vpastatus = $row["vpastatus"];
				 $emashort = $row["emashort"];
				 $emamid = $row["emamid"];
				 $emalong = $row["emalong"];
				 $ematrend = $row["ematrend"];
				 $isignal = $row["isignal"];
				 $t3signal = $row["t3signal"];
				 $bolband = $row["bolband"];
				 $macd = $row["macd"];
				 $macdrsi = $row["macdrsi"];
				 $coppock = $row["coppock"];
				 $stochastic = $row["stochastic"];
				 $arsi = $row["arsi"];
				 $mfi = $row["mfi"];
				 $dmx = $row["dmx"];
				 $pl = $row["pl"];
				 $rank = $row["rank"];
				  
				 if($vpazone == "Flat"){
					 $vpazone = "";
				 }
				 if($vpastatus == "TRUNG LAP"){
					 $vpastatus = "";
				 }
				 if($t3signal == "TRUNG LAP"){
					 $t3signal = "";
				 }
				 if($bolband == "TRUNG LAP"){
					 $bolband = "";
				 }
				 if($emashort == "TRUNG LAP"){
					 $emashort = "";
				 }
				 if($stochastic == "TRUNG LAP"){
					 $stochastic = "";
				 }
				 if($arsi == "TRUNG LAP"){
					 $arsi = "";
				 }
				 if($mfi == "TRUNG LAP"){
					 $mfi = "";
				 }
				 if($macd == "TRUNG LAP"){
					 $macd = "";
				 }
				 if($macdrsi == "TRUNG LAP"){
					 $macdrsi = "";
				 }
				 if($dmx == "TRUNG LAP"){
					 $dmx = "";
				 }
				 
				 echo "<tr>
				 <td bgcolor=".findTicker($vpazone, $vpastatus, $isignal, $t3signal, $emashort, $emamid, $coppock, $arsi, $stochastic, $mfi, $ematrend)." width=\"100px\">" . $ticker. "</td>
				 <td width=\"100px\">" .convertDate($datetime). "</td> 
				 <td align=\"right\">" . $pclose. "</td>
				 <td align=\"right\">" . number_format($volume). "</td>
				 <td width=\"80px\" bgcolor=".getProperColor($vpazone)." align=\"center\">" . $vpazone. "</td>
				 <td bgcolor=".getProperColor($vpastatus)."  align=\"center\">" . $vpastatus. "</td>
				 <td bgcolor=".getProperColor($emashort)."  align=\"center\">" . $emashort. "</td>
				 <td bgcolor=".getProperColor($emamid)."  align=\"center\">" . $emamid. "</td>
				 <td bgcolor=".getProperColor($emalong)."  align=\"center\">" .$emalong. "</td>
				 <td bgcolor=".getProperColor($ematrend)."  align=\"center\">" .$ematrend. "</td>
				 <td bgcolor=".getProperColor($isignal)."  align=\"center\">" .$isignal. "</td>
				 <td bgcolor=".getProperColor($t3signal)."  align=\"center\">" .$t3signal. "</td> 
				 <td bgcolor=".getProperColor($coppock)."   align=\"center\">" .$coppock. "</td>
				 <td bgcolor=".getProperColor($stochastic)."   align=\"center\">" .$stochastic. "</td>
				 <td bgcolor=".getProperColor($arsi)."   align=\"center\">" .$arsi. "</td>
				 <td bgcolor=".getProperColor($mfi)."   align=\"center\">" .$mfi. "</td>
				 <td bgcolor=".getProperColor($dmx)."   align=\"center\">" .$dmx. "</td>
				 <td bgcolor=".getProperColor($pl)."   align=\"center\">" .$pl. "</td>
				 <td bgcolor=".getProperColor($rank)."   align=\"center\">" .$rank. "</td></tr>";
				 };
		}
		$conn->close();
	?>  
	</tbody>
    </table>
</body>
</html>