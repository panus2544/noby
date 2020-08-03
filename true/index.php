<?php
header("Content-Type: text/plain");
require_once("truewallet.php");
require '../_config.php';
$response = array();

$SQL2 = $odb->prepare("SELECT * FROM settings WHERE id = :id");
$SQL2 -> execute(array(':id' => "2"));
$column2 = $SQL2->fetch(PDO::FETCH_ASSOC);

$username = $column2["string1"];
$password = $column2["string2"];
$mobile_number = $column2["string1"];
$otp_code = '825891';
$otp_reference = 'XLYN';

$tw = new TrueWallet($username, $password, $column2["string3"]);
$texz = $tw->Login();
$test2 = $tw->access_token; // Access Token

if (isset($_GET["transaction"])) {
	$transactions = $tw->getTransaction(5);
	 foreach ($transactions["data"]["activities"] as $report) {
        $data = $tw->GetTransactionReport($report["report_id"]);

        $code = $data["data"]["service_code"];
        $tran = $data['data']['section4']['column2']['cell1']['value'];
        $money = $data["data"]['section3']['column1']['cell1']['value'];

        if ($tran == $_GET["transaction"])
        {
            $response["status"] = 'success';
            $response["money"] = $money;
            $response["transaction"] = $tran;
            echo json_encode($response);

            break;
        }
    }
}

if (isset($_GET["cardnumber"])) {
	$data = $tw->TopupCashcard($_GET["cardnumber"]);
	
	$cash = $data['cashcardPin'];
	$money = $data['amount'];
	
	if ($cash == $_GET["cardnumber"])
	{
		$response["status"] = 'success';
		$response["money"] = $money;
		$response["cardnumber"] = $cash;
		echo json_encode($response);
	}
	else {
		$response["status"] = 'error';
		$response["money"] = '0.00';
		$response["cardnumber"] = $_GET["cardnumber"];
		echo json_encode($response);
	}
}

?>






