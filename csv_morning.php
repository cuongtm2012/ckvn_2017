<?php
require_once ('conf.php');

$conn = connectionDB ();

// path where your CSV file is located
define ( 'CSV_PATH', 'C:/Users/ManhCuong/Desktop/money/money/' );

// Name of your CSV file
$csv_file_intraday = CSV_PATH . "1.intraday.csv";
$csv_file_marketexp = CSV_PATH . "2.market_exp.csv";
$csv_file_nivara = CSV_PATH . "4.nivara.csv";
$csv_file_harmonic = CSV_PATH . "5.harmonic.csv";
$csv_file_t3trade = CSV_PATH . "6.t3trade.csv";
$csv_file_chart1 = CSV_PATH . "8.chart1.csv";
$csv_file_chart2 = CSV_PATH . "8.chart2.csv";

if (($handle = fopen ( $csv_file_intraday, "r" )) !== FALSE) {
	fgetcsv ( $handle );
	while ( ($data = fgetcsv ( $handle, 1000, "," )) !== FALSE ) {
		$num = count ( $data );
		for($c = 0; $c < $num; $c ++) {
			$col [$c] = $data [$c];
		}
		
		$col1 = $col [0];
		$col2 = $col [1];
		$col3 = $col [2];
		$col4 = $col [3];
		$col5 = $col [4];
		$col6 = $col [5];
		$col7 = $col [6];
		$col8 = $col [7];
		$col9 = $col [8];
		$col10 = $col [9];
		$col11 = $col [10];
		$col12 = $col [11];
		$col13 = $col [12];
		$col14 = $col [13];
		$col15 = $col [14];
		$col16 = $col [15];
		
		// SQL Query to insert data into DataBase
		$query = "INSERT INTO `tbl_intraday`(`ticker`, `datetime`, `signal`, `close`, `volume`, `bband`, `medma`, `longma`, `medmalongma`, `macd`, `macdsignal`, `aroon`, `stochastic`, `rsi14`, `mfi`, `score`)
	 VALUES('" . $col1 . "','" . $col2 . "','" . $col3 . "','" . $col4 . "','" . $col5 . "','" . $col6 . "','" . $col7 . "','" . $col8 . "','" . $col9 . "','" . $col10 . "','" . $col11 . "','" . $col12 . "','" . $col13 . "','" . $col14 . "','" . $col15 . "','" . $col16 . "')";
		// echo $query;
		$result = $conn->query ( $query );
		//echo "aaaa"+$result;
		if ($result == 0) {
			$query = "UPDATE `tbl_intraday` 
			SET `signal`='" . $col3 . "',`close`='" . $col4 . "',
			`volume`='" . $col5 . "',`bband`='" . $col6 . "',`medma`='" . $col7 . "',`longma`='" . $col8 . "',`medmalongma`='" . $col9 . "',
			`macd`='" . $col10 . "',`macdsignal`='" . $col11 . "',`aroon`='" . $col12 . "',`stochastic`='" . $col13 . "',`rsi14`='" . $col14 . "',
			`mfi`='" . $col15 . "',`score`='" . $col16 . "' WHERE `ticker`='" . $col1 . "' AND `datetime`='" . $col2 . "'";
			// echo $query;
			$result = $conn->query ( $query );
			//echo "cccc"+$result;
		}
	}
	fclose ( $handle );
	echo "1. Intraday data successfully imported to database!! \n";
}

if (($handle = fopen ( $csv_file_marketexp, "r" )) !== FALSE) {
	fgetcsv ( $handle );
	while ( ($data = fgetcsv ( $handle, 1000, "," )) !== FALSE ) {
		$num = count ( $data );
		for($c = 0; $c < $num; $c ++) {
			$col [$c] = $data [$c];
		}
		
		$col1 = $col [0];
		$col2 = $col [1];
		$col3 = $col [2];
		$col4 = $col [3];
		$col5 = $col [4];
		$col6 = $col [5];
		$col7 = $col [6];
		$col8 = $col [7];
		$col9 = $col [8];
		$col10 = $col [9];
		$col11 = $col [10];
		$col12 = $col [11];
		$col13 = $col [12];
		$col14 = $col [13];
		$col15 = $col [14];
		$col16 = $col [15];
		$col17 = $col [16];
		$col18 = $col [17];
		$col19 = $col [18];
		$col20 = $col [19];
		$col21 = $col [20];
		$col22 = $col [21];
		
		// SQL Query to insert data into DataBase
		$query = "INSERT INTO `tbl_market_exp`(`ticker`, `datetime`, `pclose`, `volume`, `vpazone`, `vpastatus`, `emashort`, `emamid`, `emalong`, `ematrend`, `isignal`, `t3signal`, `bolband`, `macd`, `macdrsi`, `coppock`, `stochastic`, `arsi`, `mfi`, `dmx`, `pl`, `rank`) 
	 VALUES('" . $col1 . "','" . $col2 . "','" . $col3 . "','" . $col4 . "','" . $col5 . "','" . $col6 . "','" . $col7 . "','" . $col8 . "','" . $col9 . "','" . $col10 . "','" . $col11 . "','" . $col12 . "','" . $col13 . "','" . $col14 . "','" . $col15 . "','" . $col16 . "','" . $col17 . "','" . $col18 . "','" . $col19 . "','" . $col20 . "','" . $col21 . "','" . $col22 . "')";
		// echo $query;
		$result = $conn->query ( $query );
		
		if ($result == 0) {
			$query = "UPDATE `tbl_market_exp` SET `pclose`='" . $col3 . "',`volume`='" . $col4 . "',`vpazone`='" . $col5 . "',
			`vpastatus`='" . $col6 . "',`emashort`='" . $col7 . "',`emamid`='" . $col8 . "',`emalong`='" . $col9 . "',
			`ematrend`='" . $col10 . "',`isignal`='" . $col11 . "',`t3signal`='" . $col12 . "',`bolband`='" . $col13 . "',
			`macd`='" . $col14 . "',`macdrsi`='" . $col15 . "',`coppock`='" . $col16 . "',`stochastic`='" . $col17 . "',
			`arsi`='" . $col18 . "',`mfi`='" . $col19 . "',`dmx`='" . $col20 . "',`pl`='" . $col21 . "',`rank`='" . $col22 . "' 
			WHERE `ticker`='" . $col1 . "' AND `datetime`='" . $col2 . "'";
			// echo $query;
			$result = $conn->query ( $query );
			//echo "cccc"+$result;
		}
	}
	fclose ( $handle );
	echo "2. Marketexp data successfully imported to database!! \n";
}

$conn->close ();
?>