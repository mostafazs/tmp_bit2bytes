<?php 
/*
	Output JSON result for calculation of units mainly used for Firefox 
	Bit2Bytes Addon, This script also is in http://bit2bytes.herokuapp.com
	@Copyright Bit2Bytes
	@Author: Mostafa Ziasistani(http://github.com/mostafazs)
	@Edited: 17 Sept 2015
*/
//Before any header we must send this header for allow ajax CORS request
header("Access-Control-Allow-Origin: *");
//$arr=array("1024","22");
/*
foreach($arr as $index=>$value){
	echo $index.'->'.$value;
}
echo $arr;
*/

$BITS_IN_A_BYTE = 8;
$KILO = 1024;
$output = array();
//var_dump($output);
if( !isset($_POST['amountField']) || !isset($_POST['unit'])){
	goto LabelMain;
}
$amt = $_POST['amountField'];//amount
$unit = $_POST['unit'];//unit
//check for numeric entry
if( !is_numeric($amt) ){
	LabelMain:
	goto Label1;
}
//$amt = 1024;
//$unit = "b";

// convert between all the units
function convert($amt, $unit) {
	//I copy this two variable because
   //Variable access dont allow out of function
$BITS_IN_A_BYTE = 8;
$KILO = 1024;
	switch ($unit) {
		case 'b':
			$output[0] = $amt;	
return $output[0];
			break;
		case 'B':
			$output[0] = $amt * $BITS_IN_A_BYTE;	
return $output[0];
var_dump($BITS_IN_A_BYTE);
echo "<br/>";
var_dump($amt);
echo '<br/>';
var_dump($output[0]);
			break;
		case 'kb':
			$output[0] = $amt * $KILO;	
return $output[0];
			break;
		case 'kB':
			$output[0] = $amt * $BITS_IN_A_BYTE * $KILO;	
return $output[0];
			break;
		case 'mb':
			$output[0] = $amt * $KILO * $KILO;	
return $output[0];
			break;
		case 'mB':
			$output[0] = $amt * $KILO * $KILO * $BITS_IN_A_BYTE;	
return $output[0];
			break;
		case 'gb':
			$output[0] = $amt * $KILO * $KILO * $KILO;	
return $output[0];
			break;
		case 'gB':
			$output[0] = $amt * $KILO * $KILO * $KILO * $BITS_IN_A_BYTE;	
return $output[0];
			break;
		case 'tb':
			$output[0] = $amt * $KILO * $KILO * $KILO * $KILO;	
return $output[0];
			break;
		case 'tB':
			$output[0] = $amt * $KILO * $KILO * $KILO * $KILO * $BITS_IN_A_BYTE;	
return $output[0];
			break;
		case 'pb':
			$output[0] = $amt * $KILO * $KILO * $KILO * $KILO * $KILO;	
return $output[0];
			break;
		case 'pB':
			$output[0] = $amt * $KILO * $KILO * $KILO * $KILO * $KILO * $BITS_IN_A_BYTE;	
return $output[0];
			break;
		default:
			break;
return false;
	}
}
	$output[0] = convert($amt,$unit);
	
	$output[1] = $output[0] / $BITS_IN_A_BYTE;	
//var_dump($output[1]);
	$output[2] = $output[0] / $KILO;	
//var_dump($output[2]);
	$output[3] = $output[2] / $BITS_IN_A_BYTE;	
//var_dump($output[3]);
	$output[4] = $output[2] / $KILO;	
//var_dump($output[4]);
	$output[5] = $output[4] / $BITS_IN_A_BYTE;	
//var_dump($output[5]);
	$output[6] = $output[4] / $KILO;	
//var_dump($output[6]);
	$output[7] = $output[6] / $BITS_IN_A_BYTE;	
//var_dump($output[7]);
	$output[8] = $output[6] / $KILO;	
//var_dump($output[8]);
	$output[9] = $output[8] / $BITS_IN_A_BYTE;	
//var_dump($output[9]);
	$output[10] = $output[8] / $KILO;	
//var_dump($output[10]);
	$output[11] = $output[10] / $BITS_IN_A_BYTE;	
//var_dump($output[11]);
	
	//now output to json
	if($output[0] == false){
		Label1:
		$json = '
		{
	"ok":false,
	"result":{
	"error":"EMPTY_INPUT_OR_UNIT_ERROR_OR_NOT_NUMERIC_VALUE"
	}
		}
		';
	}else{
		$json = '
		{
	"ok":true,
	"result":{
	"A":"'.$output[0].'",
	"B":"'.$output[1].'",
	"C":"'.$output[2].'",
	"D":"'.$output[3].'",
	"E":"'.$output[4].'",
	"F":"'.$output[5].'",
	"G":"'.$output[6].'",
	"H":"'.$output[7].'",
	"I":"'.$output[8].'",
	"J":"'.$output[9].'",
	"K":"'.$output[10].'",
	"L":"'.$output[11].'"
	}
		}
		';
	}
	header("content-type:application/json");
	echo $json;
