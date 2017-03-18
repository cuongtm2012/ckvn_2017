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
    <link rel="stylesheet" href="css/bootstrap-datetimepicker.css">
    
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/moment.min.js"></script>
    <script src="js/bootstrap-datetimepicker.min.js"></script>

    <!-- Custom CSS -->
    <link href="css/full.css" rel="stylesheet">
	<link rel="shortcut icon" href="images/demo/logoTMC.ico" />
	<style>
	.error {color: #FF0000;}
    .table{width: 1380px;max-width: 1380px;margin-bottom:20px;}.table
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
	$weeklyDatePicker = $mack = "";
    $fdate = $pdate = "";
	
		
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$weeklyDatePicker = test_input($_POST["weeklyDatePicker"]);
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
			</tr>
			<tr>
				<td></td>
				<td><h4> CHỌN MÃ CK: </h4></td>
				<td> <input type="text" name="mack" class="form-control"></td>
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

	$sql = "SELECT `ticker`, `datetime`, `candle`, `close`, `change`, `volume`, `buysell`, `supportline`, `resistanceline`, `pattern` 
	FROM `tbl_chart_w`
	WHERE `volume` > 50000
	AND STR_TO_DATE(`datetime`,'%m/%d/%Y') = (SELECT MAX(STR_TO_DATE(`datetime`,'%m/%d/%Y')) FROM `tbl_chart_w`
	WHERE STR_TO_DATE(`datetime`,'%m/%d/%Y') BETWEEN STR_TO_DATE('".$fdate."','%m/%d/%Y') AND STR_TO_DATE('".$tdate."','%m/%d/%Y'))
	ORDER BY `pattern` DESC, `change` DESC, `buysell` ASC";
	$result = $conn->query($sql);
	
	//echo $sql; 

	if ($result->num_rows > 0) {
		 echo "<table class=\"table\">
			<tr>
				<th align=\"center\">MÃ CK</th>
				<th align=\"center\" >NGÀY GD</th>
				<th align=\"center\">GIÁ ĐÓNG CỬA</th>
				<th align=\"center\">THAY ĐỔI</th>
				<th align=\"center\">KHỐI LƯỢNG</th>
				<th align=\"center\">TÍN HIỆU</th>
				<th align=\"center\">MUA BÁN</th>
				<th align=\"center\">HỖ TRỢ</th>
				<th align=\"center\">KHÁNG CỰ</th>
				<th align=\"center\">MÔ HÌNH</th>
			</tr>";
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
				 <td width=\"100px\">" . $ticker. "</td>
				 <td width=\"100px\">" .convertDate($datetime). "</td> 
				 <td align=\"right\">" . $close. "</td>
				 <td align=\"right\">" . $change. "</td>
				 <td align=\"right\">" . number_format($volume). "</td>
				 <td bgcolor=".getProperColor($candle)." align=\"center\">" . $candle. "</td>
				 <td bgcolor=".getProperColor($buysell)."  align=\"center\">" . $buysell. "</td>
				 <td bgcolor=".getProperColor($buysell)."  align=\"center\">" . $supportline. "</td>
				 <td bgcolor=".getProperColor($buysell)."  align=\"center\">" . $resistanceline. "</td>
				 <td bgcolor=".getProperColor($pattern)."  align=\"center\">" .$pattern. "</td></tr>";
				 }
				 echo "</table>";
	} else {
		 echo "0 results";
	}

	$conn->close();
	
	
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
	?>  
</body>
</html>