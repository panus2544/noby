<?php
header("Content-Type: text/plain");
require_once("truewallet.php");
$response = array();
error_reporting(0);

if ($_GET["id"] == '1') {
    if (empty($_POST["phone"]) || empty($_POST["password"])) {
        $response["status"] = 'error';
        $response["message"] = 'ท่านกรอกข้อมูลไม่ครบ';
    }
    else {
        $file_pointer = "truewallet.identity";  
        unlink($file_pointer);

        $tw = new TrueWallet($_POST["phone"], $_POST["password"]);
        $res = $tw->RequestLoginOTP();

        if ($res["data"]["mobile_number"] == $_POST["phone"]) {
            $response["status"] = 'success';
            $response["message"] = $res["data"]["otp_reference"];
        }
        else {
            $response["status"] = 'error';
            $response["message"] = 'ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง';
        }
    }
    echo json_encode($response);
}
else {
    if (empty($_POST["phone"]) || empty($_POST["password"]) || empty($_POST["otpref"]) || empty($_POST["otpmobile"])) {
        $response["status"] = 'error';
        $response["message"] = 'ท่านกรอกข้อมูลไม่ครบ';
    }
    else {
        $file_pointer = "truewallet.identity";  
        unlink($file_pointer);

        $tw = new TrueWallet($_POST["phone"], $_POST["password"]);
        $res = $tw->SubmitLoginOTP($_POST["otpmobile"], $_POST["phone"], $_POST["otpref"]);

        if ($res["data"]["mobile_number"] == $_POST["phone"]) {
            $response["status"] = 'success';
            $response["message"] = $res["data"]["reference_token"];
        }
        else {
            $response["status"] = 'error';
            $response["message"] = 'ท่านกรอก otp ที่ส่งไปไม่ถูกต้อง';
        }
    }
    echo json_encode($response);
}

?>