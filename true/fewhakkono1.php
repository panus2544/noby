<?php
	error_reporting(0);
    header('Content-Type:text/plain');
    
    require '../_config.php';

    function hashPassword($username, $password, $time) {
        $a = hash('sha256', $username . $password);
        $b = hash('sha256', (strlen($time) > 4) ? substr($time, 4) : $time);
        return hash('sha256', $b . $a);
    }

    class Truewallet {
        private $phoneNumber;
        private $password;
        private $deviceID;
        private $mobileTracking;
        private $accessToken;

        public function __construct($phoneNumber, $password, $accessToken) {
            $this->phoneNumber = $phoneNumber;
            $this->password = $password;
            $this->deviceID = strtoupper('e7x55f17-b9fe-4fe5-a075-a560ab96e6e6');
            $this->mobileTracking = base64_encode($this->deviceID);
			
			if (!empty($accessToken)) {
				$this->accessToken = $accessToken;
			}
        }

        public function requestOTP() {
            $timestamp = round(microtime(true) * 1000);
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'https://mobile-api-gateway.truemoney.com/mobile-api-gateway/mobile-auth-service/v1/password/login/otp');
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Content-Type: application/json',
                'User-Agent: Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Mobile Safari/537.36',
                'timestamp: ' . $timestamp,
                'type: mobile',
                'username: ' . $this->phoneNumber,
                'password: ' . hashPassword($this->phoneNumber, $this->password, $timestamp)
            ]);
            $result = curl_exec($ch);
            curl_close($ch);
            return json_decode($result, true);
        }

        function verifyOTP($otpRef, $otpCode) {
            $timestamp = round(microtime(true) * 1000);
            $password = hashPassword($this->phoneNumber, $this->password, $timestamp);
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'https://mobile-api-gateway.truemoney.com/mobile-api-gateway/mobile-auth-service/v1/password/login/otp');
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Content-Type: application/json',
                'User-Agent: Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Mobile Safari/537.36',
                'timestamp: ' . $timestamp,
                'X-Device: ' . $this->deviceID
            ]);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode([
                'brand' => 'apple',
                'device_os' => 'ios',
                'device_name' => 'chick4nnn’s iPhone',
                'device_id' => $this->deviceID,
                'model_number' => 'iPhone 11 Pro',
                'model_identifier' => 'iPhone 11 Pro',
                'app_version' => '5.5.1',
                'type' => 'mobile',
                'username' => $this->phoneNumber,
                'password' => $password,
                'mobile_tracking' => $this->mobileTracking,
                'otp_code' => $otpCode,
                'otp_reference' => $otpRef,
                'timestamp' => $timestamp,
                'mobile_number' => $this->phoneNumber
            ]));
            $result = curl_exec($ch);
            curl_close($ch);
            return json_decode($result, true);
        }

        function getTransactions($limit = 50) {
            $ch = curl_init();
			if (is_null($start_date) && is_null($end_date)) $start_date = date("Y-m-d", strtotime("-30 days") - date("Z") + 25200);
			if (is_null($end_date)) $end_date = date("Y-m-d", strtotime("+1 day") - date("Z") + 25200);
			if (is_null($start_date) || is_null($end_date)) return false;
		
            curl_setopt($ch, CURLOPT_URL, 'https://mobile-api-gateway.truemoney.com/mobile-api-gateway/user-profile-composite/v1/users/transactions/history/?start_date=' . $start_date . '&end_date=' . $end_date . '&limit='.$limit.'&page=1');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);    
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Content-Type: application/json',
                'User-Agent: V1/5.5.1 (com.tdcm.truemoneywallet; build:674; iOS 13.3.1) Alamofire/4.8.2',
                'X-Device: ' . $this->deviceID,
                'Authorization: ' . $this->accessToken
            ]);
            $result = curl_exec($ch);
            curl_close($ch);
            return json_decode($result,true);
        }
		
		public function GetTransactionReport ($report_id) {
			$ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'https://mobile-api-gateway.truemoney.com/mobile-api-gateway/user-profile-composite/v1/users/transactions/history/detail/'.$report_id);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);    
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Content-Type: application/json',
                'User-Agent: V1/5.5.1 (com.tdcm.truemoneywallet; build:674; iOS 13.3.1) Alamofire/4.8.2',
                'X-Device: ' . $this->deviceID,
                'Authorization: ' . $this->accessToken
            ]);
            $result = curl_exec($ch);
            curl_close($ch);
            return json_decode($result,true);
	
		}
    }

		$wallet = new Truewallet('0838541319', '123456789za', '312f957b-f508-4405-ab60-34b60a1866b6');

		//print_r($wallet->requestOTP());
		//print_r($wallet->verifyOTP("LQTR","310557"));

		$transactions = $wallet->getTransactions(20);
		foreach ($transactions["data"]["activities"] as $report) {
			$fewqqw = $wallet->GetTransactionReport($report["report_id"]);

			$code = $fewqqw["data"]["service_code"];
			$tran = $fewqqw['data']['section4']['column2']['cell1']['value'];
			$money = $fewqqw["data"]['section3']['column1']['cell1']['value'];

			$SQL6 = $odb->prepare("SELECT * FROM wallet WHERE transactions = :id");
			$SQL6->execute(array(':id' => $tran));
			$column6 = $SQL6->fetch(PDO::FETCH_ASSOC);

			if (empty($column6["transactions"])) {
				$tmpay = $odb -> prepare("INSERT INTO wallet (transactions,money) VALUES (:title,:date)");
				$tmpay->execute([':title' => $tran, ':date' => $money]); 
				echo $money."|".$tran."\n";
			}

		}
?>