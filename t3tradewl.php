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
    .table{width: 1500px;max-width: 1500px;margin-bottom:20px;}.table
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
		$nameErr = "";
		$pdate = "";
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
				<th>ĐIỂM MUA BÁN</th>
				<th>KHỐI LƯỢNG</th>
				<th>MUA/BÁN - T3</th>
				<th>MUA/BÁN (Nivara)</th>
                <th>MUA/BÁN (Harmonic)</th>
                <th>MUA/BÁN (G)</th>
                <th>MUA/BÁN (R)</th>
				<th>XU HƯỚNG</th>
		</tr>
	</thead>
	<tfoot>
		<tr>
				<th>MÃ CK</th>
				<th>NGÀY GD</th>
				<th>ĐIỂM MUA BÁN</th>
				<th>KHỐI LƯỢNG</th>
				<th>MUA/BÁN - T3</th>
				<th>MUA/BÁN (Nivara)</th>
                <th>MUA/BÁN (Harmonic)</th>
                <th>MUA/BÁN (G)</th>
                <th>MUA/BÁN (R)</th>
				<th>XU HƯỚNG</th>
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
		
		$sql = "SELECT `tbl_market_exp_w`.`ticker`, `tbl_market_exp_w`.`datetime`, `tbl_market_exp_w`.`pclose` , `tbl_market_exp_w`.`volume`, `tbl_market_exp_w`.`coppock`
		, `tbl_nivara_w`.`trade` AS nivaratrade, `tbl_t3trade_w`.`trade` AS t3trade, `tbl_harmonic_w`.`trade` AS harmonic 
		, `tbl_guppy_w`.`trade` AS guppytrade, `tbl_rainbow_w`.`trade` AS rainbowtrade
		FROM `tbl_market_exp_w` 
		LEFT JOIN `tbl_t3trade_w` ON `tbl_market_exp_w`.`ticker` = `tbl_t3trade_w`.`ticker` AND `tbl_market_exp_w`.`datetime` = `tbl_t3trade_w`.`date` 
		LEFT JOIN `tbl_nivara_w` ON  `tbl_market_exp_w`.`ticker` = `tbl_nivara_w`.`ticker` AND  `tbl_market_exp_w`.`datetime` = `tbl_nivara_w`.`date` 
		LEFT JOIN `tbl_harmonic_w` ON `tbl_market_exp_w`.`ticker` = `tbl_harmonic_w`.`ticker` AND  `tbl_market_exp_w`.`datetime` = `tbl_harmonic_w`.`date`
		LEFT JOIN `tbl_guppy_w` ON `tbl_market_exp_w`.`ticker` = `tbl_guppy_w`.`ticker` AND  `tbl_market_exp_w`.`datetime` = `tbl_guppy_w`.`date`
		LEFT JOIN `tbl_rainbow_w` ON `tbl_market_exp_w`.`ticker` = `tbl_rainbow_w`.`ticker` AND  `tbl_market_exp_w`.`datetime` = `tbl_rainbow_w`.`date`
		 
		WHERE `tbl_market_exp_w`.`volume` > 20000 
		AND (STR_TO_DATE(`tbl_t3trade_w`.`date`,'%m/%d/%Y') = (SELECT MAX(STR_TO_DATE(`datetime`,'%m/%d/%Y')) FROM `tbl_market_exp_w`)
		AND STR_TO_DATE(`datetime`,'%m/%d/%Y') BETWEEN STR_TO_DATE('".$fdate."','%m/%d/%Y') AND STR_TO_DATE('".$tdate."','%m/%d/%Y'))
		ORDER BY `tbl_market_exp_w`.`datetime` ASC, `tbl_market_exp_w`.`coppock`, `tbl_market_exp_w`.`ticker` ASC";
		$result = $conn->query($sql);

		// echo $sql; 
		
		if ($result->num_rows > 0) {
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
				 };
		}

		$conn->close();

	?>  
	</tbody>
    </table>
</body>
</html>