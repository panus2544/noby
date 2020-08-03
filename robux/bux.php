<?php
require '../_config.php';

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $data = json_decode(file_get_contents('php://input'), true);

        # You can parse more variables from Body here
        $phoneNumber = $data['data']['phoneNumber'];
        $smsContent = $data['data']['sms'];
		
		
		if ($phoneNumber == "TrueMoney") {
			$result = explode(" ",$smsContent);
			
			$name = $result[3].' '.$result[4];
			$total = str_replace("บ.", "", $result[6]); 
			$money = str_replace("บ.", "", $result[1]); 
			
			$sql = "INSERT INTO wallet (name,money,total,date) VALUES (?,?,?,?)";
			$odb->prepare($sql)->execute([$name,$money,$total,time()]);

		}
	
    }else{
        $json = array("status" => 0, "msg" => "Request method not accepted");
    }
    /* Output header */
	header('Content-type: application/json');
    echo json_encode($json);
?>
