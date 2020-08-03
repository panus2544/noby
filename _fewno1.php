<?php

require '_config.php';
session_start();  
$response = array();
error_reporting(0);

$SQL6 = $odb->prepare("SELECT * FROM settings WHERE id = :id");
$SQL6->execute(array(':id' => "6"));
$column6 = $SQL6->fetch(PDO::FETCH_ASSOC);

function curl($url) {   
    $ch = curl_init();  
    curl_setopt($ch, CURLOPT_URL, $url);    
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);    
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.186 Safari/537.36');    
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 3);     
    curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4 );
    $data = curl_exec($ch);     
    curl_close($ch);    
    return $data; 
}

function recaptcha($captcha,$key) {

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,"https://www.google.com/recaptcha/api/siteverify");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, "secret=".$key."&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $server_output = curl_exec($ch);
    curl_close ($ch);
    $result = json_decode($server_output, true);
    if ($result['success']) {
        return "success";
    }else{
        return "fail";
    }
}


function deletetosaniyom($string) {
    $arrString = explode(',', $string);

	foreach ($arrString as $v) {
		$newString .=  $v;
    }   
    return $newString;
}

function checkusergroup($username,$idgroup,$cookie) {
    $curl56 = curl_init();
    curl_setopt($curl56, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl56, CURLOPT_FOLLOWLOCATION, 1); // allow redirects 
    curl_setopt($curl56, CURLOPT_RETURNTRANSFER,1);
    curl_setopt($curl56, CURLOPT_MAXREDIRS,5); 

    curl_setopt_array($curl56, array(
    CURLOPT_URL => "https://groups.roblox.com/v1/groups/".$idgroup."/users?limit=100",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
        "Accept: */*",
        "Accept-Encoding: gzip, deflate",
        "Cache-Control: no-cache",
        "Connection: keep-alive",
        "User-Agent: PostmanRuntime/7.15.2",
        "cache-control: no-cache",
        "Content-Type: application/json",
        "Cookie: ".$cookie
    ),
    ));

    $response13 = curl_exec($curl56);

    curl_close($curl56);

    $json = json_decode($response13, true);
    foreach($json["data"] as $player){
        if ($player["user"]["username"] == $username){
            $player_status = 1;
            $player_id = $player["user"]["userId"];

            $response["status"] = 'success'; 
            $response["player_id"] = $player_id;
            $response["username"] = $username;

            return json_encode($response);
        }
    }

    $response["status"] = 'error'; 
    $response["player_id"] = "null";
    $response["username"] = "null";

    return json_encode($response);
}

function sendrobux($player_id,$robux,$group,$cookie) {
    $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_URL => "https://groups.roblox.com/v1/groups/".$group."/payouts",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 300,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => "{\r\n  \"PayoutType\": \"FixedAmount\",\r\n  \"Recipients\": [\r\n    {\r\n      \"recipientId\": ".$player_id.",\r\n      \"recipientType\": \"User\",\r\n      \"amount\": ".$robux."\r\n    }\r\n  ]\r\n}",
    CURLOPT_HTTPHEADER => array(
        "Content-Type: application/json",
        "cookie: ".$cookie,
        "x-csrf-token: dfsd"
    ),
    ));
    curl_setopt($curl, CURLOPT_HEADER, 1);
    $response112 = curl_exec($curl);
    $err = curl_error($curl);
    $header_size = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
    $headers = substr($response112, 0, $header_size);
    $body = substr($response112, $header_size);
    curl_close($curl);
    $headers = explode("\r\n", $headers); // The seperator used in the Response Header is CRLF (Aka. \r\n) 

    $headers = array_filter($headers);

    $header = explode(":", $headers[6]);
    $curl5 = curl_init();
    curl_setopt($curl5, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl5, CURLOPT_FOLLOWLOCATION, 1); // allow redirects 
    curl_setopt($curl5, CURLOPT_RETURNTRANSFER,1);
    curl_setopt($curl5, CURLOPT_MAXREDIRS,5); 
    $curl18 = curl_init();

    curl_setopt_array($curl18, array(
    CURLOPT_URL => "https://groups.roblox.com/v1/groups/".$group."/payouts",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 300,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => "{\r\n  \"PayoutType\": \"FixedAmount\",\r\n  \"Recipients\": [\r\n    {\r\n      \"recipientId\": ".$player_id.",\r\n      \"recipientType\": \"User\",\r\n      \"amount\": ".$robux."\r\n    }\r\n  ]\r\n}",
    CURLOPT_HTTPHEADER => array(
        "Content-Type: application/json",
        "cookie: ".$cookie,
        "x-csrf-token: ".$header[1]
    ),
    ));
    $response12 = curl_exec($curl18);
    $err2 = curl_error($curl18);
    curl_close($curl18);

    $response["status"] = 'success'; 
    $response["player_id"] = $player_id;
    $response["amount"] = $robux;

    return json_encode($response);
}

function checkrobux($cookie,$group) {
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_COOKIE, $cookie);
    curl_setopt_array($curl, array(
    CURLOPT_URL => "https://economy.roblox.com/v1/groups/".$group."/currency",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
        "Accept: */*",
        "Accept-Encoding: gzip, deflate",
        "Cache-Control: no-cache",
        "Connection: keep-alive",
        "Host: economy.roblox.com",
        "Postman-Token: 30b13207-81fc-4a43-906e-e7ea4a1c30b2,ed87ac89-704a-4026-bc71-806eed9e8892",
        "User-Agent: PostmanRuntime/7.15.2",
        "cache-control: no-cache"
    ),
    ));

    $response = curl_exec($curl);
    $robux_balance = json_decode($response , true);
    return $robux_balance;
}

if (isset($_GET["reversefpoint"])) {
    if (empty($_POST["id"])) {
        $response["status"] = 'error'; 
        $response["message"] = "ท่านกรอกข้อมูลไม่ครบ.";
    }
    else {
        $SQ111L = $odb->prepare("SELECT * FROM users WHERE username = :status");
        $SQ111L -> execute(array(':status' => $_SESSION["username"]));
        $data11 = $SQ111L->fetch(PDO::FETCH_ASSOC);

        if ($data11["rank"] == '1') {

            $rpp = $odb->prepare("SELECT * FROM logfreefire WHERE id = :status");
            $rpp -> execute(array(':status' => $_POST["id"]));
            $rpp1 = $rpp->fetch(PDO::FETCH_ASSOC);

            $stmt = $odb -> prepare("UPDATE users SET point = point + :update WHERE username = :password");
            $stmt->execute([':update' => $rpp1["point"] , ':password' => $rpp1["username"]]);

            $stmt = $odb -> prepare("UPDATE logfreefire SET status = :status WHERE id = :password");
            $stmt->execute([':status' => "2", ':password' => $_POST["id"]]);

            $response["status"] = 'success'; 
            $response["message"] = "คืนพ้อยต์ให้ลูกค้าแล้วเรียบร้อย.";
        }
        else {
            $response["status"] = 'error'; 
            $response["message"] = "ไม่สามารถแก้ไขได้เนื่องจากท่านไม่มียสแอดมิน";
        }
    }
    
    echo json_encode($response);
}

if (isset($_GET["addpostadmin"])) {
    if (empty($_POST["title"])) {
        $response["status"] = 'error'; 
        $response["message"] = "ท่านกรอกข้อมูลไม่ครบ.";
    }
    else {
        $SQ111L = $odb->prepare("SELECT * FROM users WHERE username = :status");
        $SQ111L -> execute(array(':status' => $_SESSION["username"]));
        $data11 = $SQ111L->fetch(PDO::FETCH_ASSOC);

        if ($data11["rank"] == '1') {
            
            $tmpay = $odb -> prepare("INSERT INTO post (title,date) VALUES (:title,:date)");
            $tmpay->execute([':title' => $_POST["title"], ':date' => time()]);

            $response["status"] = 'success'; 
            $response["message"] = "เพิ่มรายการเสร็จสิ้น.";
        }
        else {
            $response["status"] = 'error'; 
            $response["message"] = "ไม่สามารถแก้ไขได้เนื่องจากท่านไม่มียสแอดมิน";
        }
    }
    
    echo json_encode($response);
}

if (isset($_GET["deletepost"])) {
    if (empty($_POST["id"])) {
        $response["status"] = 'error'; 
        $response["message"] = "ท่านกรอกข้อมูลไม่ครบ.";
    }
    else {
        $SQ111L = $odb->prepare("SELECT * FROM users WHERE username = :status");
        $SQ111L -> execute(array(':status' => $_SESSION["username"]));
        $data11 = $SQ111L->fetch(PDO::FETCH_ASSOC);

        if ($data11["rank"] == '1') {
            
            $stmt = $odb->prepare( "DELETE FROM post WHERE id =:id" );
            $stmt->bindParam(':id', $_POST['id']);
            $stmt->execute();

            $response["status"] = 'success'; 
            $response["message"] = "ลบรายการเสร็จสิ้น.";
        }
        else {
            $response["status"] = 'error'; 
            $response["message"] = "ไม่สามารถแก้ไขได้เนื่องจากท่านไม่มียสแอดมิน";
        }
    }
    
    echo json_encode($response);
}

if (isset($_GET["reversepoint"])) {
    if (empty($_POST["id"])) {
        $response["status"] = 'error'; 
        $response["message"] = "ท่านกรอกข้อมูลไม่ครบ.";
    }
    else {
        $SQ111L = $odb->prepare("SELECT * FROM users WHERE username = :status");
        $SQ111L -> execute(array(':status' => $_SESSION["username"]));
        $data11 = $SQ111L->fetch(PDO::FETCH_ASSOC);

        if ($data11["rank"] == '1') {

            $rpp = $odb->prepare("SELECT * FROM logidpass WHERE id = :status");
            $rpp -> execute(array(':status' => $_POST["id"]));
            $rpp1 = $rpp->fetch(PDO::FETCH_ASSOC);

            $stmt = $odb -> prepare("UPDATE users SET point = point + :update WHERE username = :password");
            $stmt->execute([':update' => $rpp1["point"] , ':password' => $rpp1["user"]]);

            $stmt = $odb -> prepare("UPDATE logidpass SET status = :status WHERE id = :password");
            $stmt->execute([':status' => "2", ':password' => $_POST["id"]]);

            $response["status"] = 'success'; 
            $response["message"] = "คืนพ้อยต์ให้ลูกค้าแล้วเรียบร้อย.";
        }
        else {
            $response["status"] = 'error'; 
            $response["message"] = "ไม่สามารถแก้ไขได้เนื่องจากท่านไม่มียสแอดมิน";
        }
    }
    
    echo json_encode($response);
}

if (isset($_GET["addfcategory"])) {
    if (empty($_POST["name"]) || empty($_POST["point"]) || empty($_POST["picture"])) {
        $response["status"] = 'error'; 
        $response["message"] = "ท่านกรอกข้อมูลไม่ครบ.";
    }
    else {
        $SQ111L = $odb->prepare("SELECT * FROM users WHERE username = :status");
        $SQ111L -> execute(array(':status' => $_SESSION["username"]));
        $data11 = $SQ111L->fetch(PDO::FETCH_ASSOC);

        if ($data11["rank"] == '1') {

            $tmpay = $odb -> prepare("INSERT INTO categorynew (point,name,img,method) VALUES (:point,:name,:link,:method)");
            $tmpay->execute([':point' => $_POST["point"], ':name' => $_POST["name"], ':link' => $_POST["picture"], ':method' => $_POST["method"]]);

            $response["status"] = 'success'; 
            $response["message"] = "ท่านได้ทำการอัพเดทรายการเรียบร้อยแล้ว.";
        }
        else {
            $response["status"] = 'error'; 
            $response["message"] = "ไม่สามารถแก้ไขได้เนื่องจากท่านไม่มียสแอดมิน";
        }
    }
    
    echo json_encode($response);
}

if (isset($_GET["updatefcolumn"])) {
    if (empty($_POST["id"])) {
        $response["status"] = 'error'; 
        $response["message"] = "ท่านกรอกข้อมูลไม่ครบ.";
    }
    else {
        $SQ111L = $odb->prepare("SELECT * FROM users WHERE username = :status");
        $SQ111L -> execute(array(':status' => $_SESSION["username"]));
        $data11 = $SQ111L->fetch(PDO::FETCH_ASSOC);

        if ($data11["rank"] == '1') {

            $stmt = $odb -> prepare("UPDATE logfreefire SET status = :status WHERE id = :password");
            $stmt->execute([':status' => "1", ':password' => $_POST["id"]]);

            $response["status"] = 'success'; 
            $response["message"] = "ท่านได้ทำการอัพเดทรายการเรียบร้อยแล้ว.";
        }
        else {
            $response["status"] = 'error'; 
            $response["message"] = "ไม่สามารถแก้ไขได้เนื่องจากท่านไม่มียสแอดมิน";
        }
    }
    
    echo json_encode($response);
}

if (isset($_GET["updatecolumn"])) {
    if (empty($_POST["id"])) {
        $response["status"] = 'error'; 
        $response["message"] = "คุณกรอกข้อมูลไม่ครบ.";
    }
    else {
        $SQ111L = $odb->prepare("SELECT * FROM users WHERE username = :status");
        $SQ111L -> execute(array(':status' => $_SESSION["username"]));
        $data11 = $SQ111L->fetch(PDO::FETCH_ASSOC);

        if ($data11["rank"] == '1') {

            $stmt = $odb -> prepare("UPDATE logidpass SET status = :status WHERE id = :password");
            $stmt->execute([':status' => "1", ':password' => $_POST["id"]]);

            $response["status"] = 'success'; 
            $response["message"] = "คุณได้ทำการอัพเดทรายการเรียบร้อยแล้ว.";
        }
        else {
            $response["status"] = 'error'; 
            $response["message"] = "ไม่สามารถแก้ไขได้เนื่องจากคุณไม่มียศแอดมิน";
        }
    }
    
    echo json_encode($response);
}

if (isset($_GET["deletefcategory"])) {
    if (empty($_POST["id"])) {
        $response["status"] = 'error'; 
        $response["message"] = "ท่านกรอกข้อมูลไม่ครบ.";
    }
    else {
        $SQ111L = $odb->prepare("SELECT * FROM users WHERE username = :status");
        $SQ111L -> execute(array(':status' => $_SESSION["username"]));
        $data11 = $SQ111L->fetch(PDO::FETCH_ASSOC);

        if ($data11["rank"] == '1') {
            
            $stmt = $odb->prepare( "DELETE FROM fcategory WHERE id = :id" );
            $stmt->bindParam(':id', $_POST['id']);
            $stmt->execute();

            $response["status"] = 'success'; 
            $response["message"] = "ลบรายการเสร็จสิ้น.";
        }
        else {
            $response["status"] = 'error'; 
            $response["message"] = "ไม่สามารถแก้ไขได้เนื่องจากท่านไม่มียศแอดมิน";
        }
    }
    
    echo json_encode($response);
}

if (isset($_GET["deletecategory"])) {
    if (empty($_POST["id"])) {
        $response["status"] = 'error'; 
        $response["message"] = "คุณกรอกข้อมูลไม่ครบ.";
    }
    else {
        $SQ111L = $odb->prepare("SELECT * FROM users WHERE username = :status");
        $SQ111L -> execute(array(':status' => $_SESSION["username"]));
        $data11 = $SQ111L->fetch(PDO::FETCH_ASSOC);

        if ($data11["rank"] == '1') {
            
            $stmt = $odb->prepare( "DELETE FROM category WHERE id =:id" );
            $stmt->bindParam(':id', $_POST['id']);
            $stmt->execute();

            $response["status"] = 'success'; 
            $response["message"] = "ลบรายการเสร็จสิ้น.";
        }
        else {
            $response["status"] = 'error'; 
            $response["message"] = "ไม่สามารถแก้ไขได้เนื่องจากคุณไม่มียศแอดมิน";
        }
    }
    
    echo json_encode($response);
}

if (isset($_GET["deletefcolumn"])) {
    if (empty($_POST["id"])) {
        $response["status"] = 'error'; 
        $response["message"] = "คุณกรอกข้อมูลไม่ครบ.";
    }
    else {
        $SQ111L = $odb->prepare("SELECT * FROM users WHERE username = :status");
        $SQ111L -> execute(array(':status' => $_SESSION["username"]));
        $data11 = $SQ111L->fetch(PDO::FETCH_ASSOC);

        if ($data11["rank"] == '1') {
            
            $stmt = $odb->prepare( "DELETE FROM logfreefire WHERE id =:id" );
            $stmt->bindParam(':id', $_POST['id']);
            $stmt->execute();

            $response["status"] = 'success'; 
            $response["message"] = "ลบรายการเสร็จสิ้น.";
        }
        else {
            $response["status"] = 'error'; 
            $response["message"] = "ไม่สามารถแก้ไขได้เนื่องจากคุณไม่มียศแอดมิน";
        }
    }
    
    echo json_encode($response);
}

if (isset($_GET["deletecolumn"])) {
    if (empty($_POST["id"])) {
        $response["status"] = 'error'; 
        $response["message"] = "คุณกรอกข้อมูลไม่ครบ.";
    }
    else {
        $SQ111L = $odb->prepare("SELECT * FROM users WHERE username = :status");
        $SQ111L -> execute(array(':status' => $_SESSION["username"]));
        $data11 = $SQ111L->fetch(PDO::FETCH_ASSOC);

        if ($data11["rank"] == '1') {
            
            $stmt = $odb->prepare( "DELETE FROM logidpass WHERE id =:id" );
            $stmt->bindParam(':id', $_POST['id']);
            $stmt->execute();

            $response["status"] = 'success'; 
            $response["message"] = "ลบรายการเสร็จสิ้น.";
        }
        else {
            $response["status"] = 'error'; 
            $response["message"] = "ไม่สามารถแก้ไขได้เนื่องจากท่านไม่มียสแอดมิน";
        }
    }
    
    echo json_encode($response);
}

if (isset($_GET["changefcategory"])) {
    if (empty($_POST["name"]) || empty($_POST["point"]) || empty($_POST["id"]) || empty($_POST["picture"])) {
        $response["status"] = 'error'; 
        $response["message"] = "คุณกรอกข้อมูลไม่ครบ.";
    }
    else {
        $SQ111L = $odb->prepare("SELECT * FROM users WHERE username = :status");
        $SQ111L -> execute(array(':status' => $_SESSION["username"]));
        $data11 = $SQ111L->fetch(PDO::FETCH_ASSOC);

        if ($data11["rank"] == '1') {
            $stmt = $odb -> prepare("UPDATE fcategory SET link = :robux, point = :point, name = :name WHERE id = :password");
            $stmt->execute([':robux' => $_POST["picture"] , ':point' => $_POST["point"] , ':name' => $_POST["name"] , ':password' => $_POST["id"]]);

            $response["status"] = 'success'; 
            $response["message"] = "แก้ไขสินค้าเรียบร้อย.";
        }
        else {
            $response["status"] = 'error'; 
            $response["message"] = "ไม่สามารถแก้ไขได้เนื่องจากท่านไม่มียสแอดมิน";
        }
    }
    
    echo json_encode($response);
}

if (isset($_GET["changecategory"])) {
    if (empty($_POST["robux"]) || empty($_POST["point"]) || empty($_POST["id"])) {
        $response["status"] = 'error'; 
        $response["message"] = "คุณกรอกข้อมูลไม่ครบ.";
    }
    else {
        $SQ111L = $odb->prepare("SELECT * FROM users WHERE username = :status");
        $SQ111L -> execute(array(':status' => $_SESSION["username"]));
        $data11 = $SQ111L->fetch(PDO::FETCH_ASSOC);

        if ($data11["rank"] == '1') {
            $stmt = $odb -> prepare("UPDATE category SET robux = :robux, point = :point WHERE id = :password");
            $stmt->execute([':robux' => $_POST["robux"] , ':point' => $_POST["point"] , ':password' => $_POST["id"]]);

            $response["status"] = 'success'; 
            $response["message"] = "แก้ไขสินค้าเรียบร้อย.";
        }
        else {
            $response["status"] = 'error'; 
            $response["message"] = "ไม่สามารถแก้ไขได้เนื่องจากคุณไม่มียศแอดมิน";
        }
    }
    
    echo json_encode($response);
}

if (isset($_GET["openoffwebsite"])) {
    if (empty($_POST["open"]) || empty($_POST["off"])) {
        $response["status"] = 'error'; 
        $response["message"] = "คุณกรอกข้อมูลไม่ครบ.";
    }
    else {
        $SQ111L = $odb->prepare("SELECT * FROM users WHERE username = :status");
        $SQ111L -> execute(array(':status' => $_SESSION["username"]));
        $data11 = $SQ111L->fetch(PDO::FETCH_ASSOC);

        if ($data11["rank"] == '1') {

            $stmt = $odb -> prepare("UPDATE settings SET string1 = :update, string2 = :update1 WHERE id = :password");
            $stmt->execute([':update' => $_POST["open"] , ':update1' => $_POST["off"] , ':password' => '9']);

            $response["status"] = 'success'; 
            $response["message"] = "เปลี่ยนการตั้งค่าสำเร็จ.";
        }
        else {
            $response["status"] = 'error'; 
            $response["message"] = "ไม่สามารถแก้ไขได้เนื่องจากท่านไม่มียสแอดมิน";
        }
    }
    
    echo json_encode($response);
}

if (isset($_GET["addcategory"])) {
    if (empty($_POST["robux"]) || empty($_POST["point"])) {
        $response["status"] = 'error'; 
        $response["message"] = "คุณกรอกข้อมูลไม่ครบ.";
    }
    else {
        $SQ111L = $odb->prepare("SELECT * FROM users WHERE username = :status");
        $SQ111L -> execute(array(':status' => $_SESSION["username"]));
        $data11 = $SQ111L->fetch(PDO::FETCH_ASSOC);

        if ($data11["rank"] == '1') {
            $tmpay = $odb -> prepare("INSERT INTO category (robux,point) VALUES (:robux,:point)");
            $tmpay->execute([':robux' => $_POST["robux"], ':point' => $_POST["point"],]);

            $response["status"] = 'success'; 
            $response["message"] = "เพิ่มสินค้าสำเร็จ";
        }
        else {
            $response["status"] = 'error'; 
            $response["message"] = "ไม่สามารถแก้ไขได้เนื่องจากท่านไม่มียศแอดมิน";
        }
    }
    
    echo json_encode($response);
}

if (isset($_GET["sellfreefire"])) {
    if (empty($_POST["uid"]) || empty($_POST["id"])) {
        $response["status"] = 'error'; 
        $response["message"] = 'คุณกรอกข้อมูลไม่ครบ.';
    }
    else {
            $SQ111L = $odb->prepare("SELECT * FROM users WHERE username = :status");
            $SQ111L -> execute(array(':status' => $_SESSION["username"]));
            $data11 = $SQ111L->fetch(PDO::FETCH_ASSOC);

            $SQ122L = $odb->prepare("SELECT * FROM fcategory WHERE id = :status");
            $SQ122L -> execute(array(':status' => $_POST["id"]));
            $datafew = $SQ122L->fetch(PDO::FETCH_ASSOC);
            
            if ($data11["point"] >= $datafew["point"]) {

                $stmt = $odb -> prepare("UPDATE users SET point = point - :update WHERE username = :password");
                $stmt->execute([':update' => $datafew["point"] , ':password' => $_SESSION["username"]]);

                $thegod = $odb -> prepare("INSERT INTO logfreefire (uid,username,point,date,categoryid) VALUES (:uid,:username,:point,:date,:categoryid)");
                $thegod->execute([':uid' => $_POST["uid"], ':username' => $_SESSION["username"], ':point' => $datafew["point"] , ':date' => time() , ':categoryid' => $_POST["id"]]);

                $response["status"] = 'success'; 
                $response["message"] = 'คุณได้ทำการซื้อเพชรแล้ว กรุณารอสักครู่.';
                
            }
            else {
                $response["status"] = 'error'; 
                $response["message"] = 'พ้อยต์ ของคุณมีไม่เพียงพอ.';    
            }
    }
    echo json_encode($response);
}

if (isset($_GET["sellrobuxidpass"])) {
    if (empty($_POST["username"]) || empty($_POST["password"]) || empty($_POST["id"])) {
        $response["status"] = 'error'; 
        $response["message"] = 'คุณกรอกข้อมูลไม่ครบ.';
    }
    else {

            $SQ111L = $odb->prepare("SELECT * FROM users WHERE username = :status");
            $SQ111L -> execute(array(':status' => $_SESSION["username"]));
            $data11 = $SQ111L->fetch(PDO::FETCH_ASSOC);

            $SQ122L = $odb->prepare("SELECT * FROM category WHERE id = :status");
            $SQ122L -> execute(array(':status' => $_POST["id"]));
            $datafew = $SQ122L->fetch(PDO::FETCH_ASSOC);
            
            if ($data11["point"] >= $datafew["point"]) {
                $tmpay = $odb -> prepare("INSERT INTO robux (username,robux,point,date) VALUES (:username,:robux,:point,:date)");
                $tmpay->execute([':username' => $_SESSION["username"], ':robux' => $datafew["robux"] , ':point' => $datafew["point"] , ':date' => time()]);

                $stmt = $odb -> prepare("UPDATE users SET point = point - :update WHERE username = :password");
                $stmt->execute([':update' => $datafew["point"] , ':password' => $_SESSION["username"]]);

                $thegod = $odb -> prepare("INSERT INTO logidpass (user,username,robux,point,password,date) VALUES (:user,:username,:robux,:point,:password,:date)");
                $thegod->execute([':username' => $_POST["username"], ':user' => $_SESSION["username"], ':date' => time() , ':robux' => $datafew["robux"] , ':point' => $datafew["point"] , ':password' => $_POST["password"]]);

                $response["status"] = 'success'; 
                $response["message"] = 'คุณได้ทำการซื้อ Robux แล้ว กรุณารอสักครู่.';
                
            }
            else {
                $response["status"] = 'error'; 
                $response["message"] = 'พ้อยต์ ของคุณมีไม่เพียงพอ.';    
            }
    }
    echo json_encode($response);
}

if (isset($_GET["fewofgod"])) {
    if (empty($_POST["username"]) || empty($_POST["amount"]) || empty($_POST["captcha"])) {
        $response["status"] = 'error'; 
        $response["message"] = 'ท่านกรอกข้อมูลไม่ครบ.';
    }
    else {
        if ($_SESSION["captcha"] == $_POST["captcha"]) {
            $_SESSION["captcha"] = "";
            $SQL3 = $odb->prepare("SELECT * FROM settings WHERE id = :id");
            $SQL3 -> execute(array(':id' => "3"));
            $column3 = $SQL3->fetch(PDO::FETCH_ASSOC);
    
            $few = $_POST["amount"] * $column3["string1"];
            $result = round($few);
    
            $checkrobux = checkrobux($column3["string2"],$column3["string3"]);
            sleep(rand(2, 10));
    
            if ($checkrobux["robux"] <= $result) {
                $response["status"] = 'error'; 
                $response["message"] = 'ตอนนี่ Robux ในกลุ่มหมดเรียบร้อยโปรดรอแอดมินเพิ่ม Robux';
            }
            else {
                $SQ111L = $odb->prepare("SELECT * FROM users WHERE username = :status");
                $SQ111L -> execute(array(':status' => $_SESSION["username"]));
                $data11 = $SQ111L->fetch(PDO::FETCH_ASSOC);
                
                if ($data11["point"] >= $_POST["amount"]) {
                    $getuser = checkusergroup($_POST["username"],$column3["string3"],$column3["string2"]);
                    $getuserz = json_decode($getuser , true);
    
                    if ($getuserz["status"] == "success") {
                        $sendza = sendrobux($getuserz["player_id"],$result,$column3["string3"],$column3["string2"]);
    
                        $tmpay = $odb -> prepare("INSERT INTO robux (username,robux,point,date) VALUES (:username,:robux,:point,:date)");
                        $tmpay->execute([':username' => $_SESSION["username"], ':robux' => $result , ':point' => $_POST["amount"] , ':date' => time()]);
    
                        $stmt = $odb -> prepare("UPDATE users SET point = point - :update WHERE username = :password");
                        $stmt->execute([':update' => $_POST["amount"] , ':password' => $_SESSION["username"]]);
    
                        $response["status"] = 'success'; 
                        $response["message"] = 'คุณได้ทำการซื้อ Robux เป็นจำนวน '.$result.' R$ แล้ว';
                    }
                    else {
                        $response["status"] = 'error'; 
                        $response["message"] = 'คุณไม่ได้อยู่ในกลุ่ม Roblox.';
                    }
                }
                else {
                    $response["status"] = 'error'; 
                    $response["message"] = 'พ้อยต์ ของคุณมีไม่เพียงพอ.';
                }
            }
        }
        else {
            $response["status"] = 'error'; 
            $response["message"] = 'คุณกรอกรหัสยืนยัน 4 หลักไม่ถูกต้อง.';
        }
    }
    echo json_encode($response);
}

if (isset($_GET["bsettings4"])) {
    $SQ111L = $odb->prepare("SELECT * FROM users WHERE username = :status");
    $SQ111L -> execute(array(':status' => $_SESSION["username"]));
    $data11 = $SQ111L->fetch(PDO::FETCH_ASSOC);

    if ($data11["rank"] == '1') {
        $stmt = $odb -> prepare("UPDATE settings SET string1 = :string1 , string2 = :string2 , string3 = :string3 , string4 = :string4 WHERE id = :id");
        $stmt->execute([':id' => '4' , ':string1' => $_POST["string1"] , ':string2' => $_POST["string2"] , ':string3' => $_POST["string3"] , ':string4' => $_POST["string4"]]);
        $response["status"] = 'success'; 
        $response["message"] = "เปลี่ยนการตั้งค่าสำเร็จ.";
    }
    else {
        $response["status"] = 'error'; 
        $response["message"] = "ไม่สามารถแก้ไขได้เนื่องจากท่านไม่มียสแอดมิน";
    }
    
    echo json_encode($response);
}

if (isset($_GET["addpointusers"])) {
    if (empty($_POST["username"]) || empty($_POST["point"]) || empty($_POST["email"])) {
        $response["status"] = 'error'; 
        $response["message"] = "ท่านกรอกข้อมูลไม่ครบ.";
    }
    else {
        $SQ111L = $odb->prepare("SELECT * FROM users WHERE username = :status");
        $SQ111L -> execute(array(':status' => $_SESSION["username"]));
        $data11 = $SQ111L->fetch(PDO::FETCH_ASSOC);

        if ($data11["rank"] == '1') {
            
            $stmt = $odb -> prepare("UPDATE users SET point = :update , email = :fewthesun WHERE username = :password");
            $stmt->execute([':update' => $_POST["point"] , ':fewthesun' => $_POST["email"] , ':password' => $_POST["username"]]);

            $response["status"] = 'success'; 
            $response["message"] = "ท่านได้ทำการแก้ไขรายละเอียดเรียบร้อย.";
        }
        else {
            $response["status"] = 'error'; 
            $response["message"] = "ไม่สามารถแก้ไขได้เนื่องจากท่านไม่มียศแอดมิน";
        }
    }
    
    echo json_encode($response);
}

if (isset($_GET['topupmoney'])) {
    if (empty($_POST["truemoney"])) {
        $response["status"] = 'error'; 
        $response["message"] = "ท่านกรอกข้อมูลไม่ครบ";
    }
    else {
        $SsQL = $odb->prepare("SELECT * FROM topup WHERE password = :password");
        $SsQL -> execute(array(':password' => $_POST["truemoney"]));
        $feweiei = $SsQL->rowcount(PDO::FETCH_ASSOC);

        if ($feweiei == "0") {
            $web = curl("https://www.reaperxshop.com/true/index.php?cardnumber=".$_POST["truemoney"]);
            $json = json_decode($web, true);

            $json["money"] = deletetosaniyom($json["money"]);
            $percent = $json["money"] * 20 / 100;
            $moneyzz = $json["money"] - $percent;

            if ($json["status"] == "success") {
                $stmt = $odb -> prepare("UPDATE users SET point = point + '{$moneyzz}', totalpoint = totalpoint + '{$json["money"]}' WHERE username = :username");
                $stmt->execute([':username' => $_SESSION["username"]]);

                $tmpay = $odb -> prepare("INSERT INTO topup (username,password,amount,date) VALUES (:username,:password,:amount,:date)");
                $tmpay->execute([':username' => $_SESSION["username"], ':password' => $_POST["truemoney"] , ':amount' => $json["money"] ,':date' => time()]);

                $response["status"] = 'success'; 
                $response["message"] = 'ท่านได้เติมเงินมา : '.$json["money"].' บาท';
            }
            else {
                $response["status"] = 'error'; 
                $response["message"] = 'รหัสบัตรทรูมันนี่ของท่านไม่ถูกต้อง';
            }
        }
        else {
            $response["status"] = 'error'; 
            $response["message"] = 'รหัสบัตรทรูมันนี่ของท่านมีคนใช้ไปแล้ว.';
        }
    }
    echo json_encode($response); 
}

if (isset($_GET["bsettings"])) {
    $SQ111L = $odb->prepare("SELECT * FROM users WHERE username = :status");
    $SQ111L -> execute(array(':status' => $_SESSION["username"]));
    $data11 = $SQ111L->fetch(PDO::FETCH_ASSOC);

    if ($data11["rank"] == "1") {
        $stmt = $odb -> prepare("UPDATE settings SET string1 = :string1, string2 = :string2, string3 = :string3, string4 = :string4 WHERE id = :id");
        $stmt->execute([':string1' => $_POST["string1"] , ':string2' => $_POST["string2"] , ':string3' => $_POST["string3"] , ':string4' => $_POST["string4"] , ':id' => $_POST["id"]]);
        
        $response["status"] = 'success'; 
        $response["message"] = "เปลี่ยนการตั้งค่าสำเร็จ";
    }
    else {
        $response["status"] = 'error'; 
        $response["message"] = "ท่านไม่มียศแอดมิน";
    }
    
    echo json_encode($response); 
}

if (isset($_GET["changepassword"])) {
    if (empty($_POST["passwordold"]) || empty($_POST["passwordnew1"]) || empty($_POST["passwordnew2"])) {
        $response["status"] = 'error'; 
        $response["message"] = "คุณกรอกข้อมูลไม่ครบ";
    }
    else {
        $SQL = $odb->prepare("SELECT * FROM users WHERE username = :status");
        $SQL -> execute(array(':status' => $_SESSION["username"]));
        $data = $SQL->fetch(PDO::FETCH_ASSOC);
        $passold = md5(md5(md5($_POST["passwordold"])));

        if ($data["password"] == $passold) {
            if ($_POST["passwordnew1"] == $_POST["passwordnew2"]) {

                if (recaptcha($_POST["recaptcha"],$column6["string2"]) == "success") {
                    
                    $pass = md5(md5(md5($_POST["passwordnew1"])));
                    $stmt = $odb -> prepare("UPDATE users SET password = :update WHERE username = :username");
                    $stmt->execute([':update' => $pass , ':username' => $_SESSION["username"]]);
                    
                    $response["status"] = 'success'; 
                    $response["message"] = "เปลี่ยนรหัสเสร็จสิ้น.";
                }
                else {
                    $response["status"] = 'error'; 
                    $response["message"] = "กรุณากดยืนยันตัวตนก่อน.";
                }
    
            }
            else {
                $response["status"] = 'error'; 
                $response["message"] = "รหัสผ่านใหม่ของคุณไม่ตรงกัน.";
            }
        }
        else {
            $response["status"] = 'error'; 
            $response["message"] = "คุณกรอกรหัสผ่านเก่าผิด.";
        }
    }
    echo json_encode($response); 
}

//{"status":"success","money":"250.00","transaction":"50003222006227"}


if (isset($_GET['topupwallet'])) {
    if (empty($_POST["truewallet"])) {
        $response["status"] = 'error'; 
        $response["message"] = "คุณกรอกข้อมูลไม่ครบ";
    }
    else {
    
        $SQL = $odb->prepare("SELECT * FROM wallet WHERE transactions = :n AND status = 0");
        $SQL -> execute(array(':n' => $_POST["truewallet"]));
        $feweiei = $SQL->fetch(PDO::FETCH_ASSOC);

        if (empty($feweiei["transactions"])) {
            $response["status"] = 'error'; 
            $response["message"] = 'ไม่พบเลขอ้างอิงในระบบหรือเลขอ้างอิงถูกใช้ไปแล้ว.';
        }
        else {
            $money = deletetosaniyom($feweiei["money"]);
            $stmt = $odb -> prepare("UPDATE wallet SET status = 1 WHERE id = :username");
            $stmt->execute([':username' => $feweiei["id"]]);

            $tmpay = $odb -> prepare("INSERT INTO topup (username,password,amount,date) VALUES (:username,:password,:amount,:date)");
            $tmpay->execute([':username' => $_SESSION["username"], ':password' => "fewza" , ':amount' => $money ,':date' => time()]);

            $stmt = $odb -> prepare("UPDATE users SET point = point + '{$money}', totalpoint = totalpoint + '{$money}' WHERE username = :username");
            $stmt->execute([':username' => $_SESSION["username"]]);
        
            $response["status"] = 'success'; 
            $response["message"] = 'คุณได้เติมเงินมา : '.$feweiei["money"].' บาท';
        }
    }
    echo json_encode($response); 
}

if (isset($_GET['logout'])) {
    if (isset($_SESSION["username"]))  {
        session_destroy();
        $response["status"] = 'success';
        $response["message"] = 'ออกจากระบบสำเร็จ';
    }
    else {
        $response["status"] = 'error';
        $response["message"] = 'คุณไม่ได้อยู่ในระบบ.';
    }
    echo json_encode($response);
}

if (isset($_GET['login'])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if (empty($username) || empty($password)) {
        $response["status"] = 'error'; 
        $response["message"] = "ท่านกรอกข้อมูลไม่ครบ";
    }
    else {
        $pass = md5(md5(md5($password)));

        $query = "SELECT * FROM users WHERE username = :username AND password = :password";
        $statement = $odb->prepare($query);
        $statement->execute(
                array(
                'username'   =>   $username,
                'password'   =>   $pass
                )
        );

        $count = $statement->rowCount();

        if($count > 0)
        {
            $_SESSION["username"] = $username;
            $response["status"] = 'success';
            $response["message"] = 'ล็อคอินสำเร็จ !';
        }
        else 
        {
            $response["status"] = 'error';
            $response["message"] = 'ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง.';
        }
    }
    echo json_encode($response);
}

if (isset($_GET['register'])) {
    $username = $_POST["username"];
    $password1 = $_POST["password1"];
    $password2 = $_POST["password2"];
    $email = $_POST["email"];

    $SsQL = $odb->prepare("SELECT * FROM users WHERE username = :id");
    $SsQL -> execute(array(':id' => $username));
    $feweiei = $SsQL->rowcount(PDO::FETCH_ASSOC);

    if ($feweiei == "0") {
        if (empty($username) || empty($password1) || empty($password2) || empty($email)) {
            $response["status"] = 'error'; 
            $response["message"] = "คุณกรอกข้อมูลไม่ครบ";
        }
        else {
            if($password1 == $password2)  {
                $pass = md5(md5(md5($password1)));
                if ( strstr( $email, '@' ) ) {

                    
                        $tmpay = $odb -> prepare("INSERT INTO users (username,password,email) VALUES (:username,:password,:email)");
                        $tmpay->execute([':username' => $username, ':password' => $pass, ':email' => $email]);
                        $response["status"] = 'success'; 
                        $response["message"] = "สมัครเสร็จสิ้น.";
                    
                    
                } 
                else {
                    $response["status"] = 'error'; 
                    $response["message"] = "รูปแบบของคุณไม่ใช่อีเมล";
                }
            }
            else {
                $response["status"] = 'error';
                $response["message"] = 'รหัสผ่านไม่ตรงกัน';
            }
        }
    }
    else {
        $response["status"] = 'error';
        $response["message"] = 'ชื่อผู้ใช้นี้มีคนสมัครไปแล้ว.';
    }
    echo json_encode($response);
}

?>