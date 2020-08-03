
<?php
$money = 35000;
$money1 = 18523;
$users = number_format($money);
$view = number_format($column5["string1"]);

$curl = curl_init();
curl_setopt($curl, CURLOPT_COOKIE, $column3["string2"]);
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://economy.roblox.com/v1/groups/".$column3["string3"]."/currency",
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

$robuxzaza = "0";

$query = $odb->prepare("SELECT * FROM robux ORDER BY id DESC");
$execute = $query->execute();
while($data = $query->fetch()) {
    $robuxzaza = $robuxzaza + $data["robux"];
}


?>

<?php
if (empty($_SESSION["username"])) {
    header("Refresh: 0; url=?page=login");
    exit();
}
?>



<div class="m-auto">
<div class="bg-light box-shadow border-radius p-4 animated fadeInUp my-4" style="border: 5px solid #254efd;" >
            <div class="card candyr">
                <div class="card-body ">
					<center>
        <h4 class="card-title"><i class="fa fa-shopping-cart" aria-hidden="true"></i> เติมแบบเข้ากลุ่ม
</h4>
</center>
						<hr>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="alert alert-dismissible alert-warning text-center">
                        <center>
                            <p class="mb-0"><i class="fas fa-exclamation-triangle" aria-hidden="true"></i> หากยังไม่ได้เข้ากลุ่มโปรดกดปุ่มด้านล่าง</p>
							
                        </center>
                    </div>
					
					
                    <div class="card border mb-3">
                        <div class="card-header font15">รายละเอียดของกลุ่ม</div>
                        <div class="card-body">
							<center>
					<a class="btn btn-danger font15" target="_blank" href="<?php echo $column3["string4"]; ?>"><i class="fas fa-users"></i> เข้ากลุ่ม</a>
					</center>
							<div class="mt-3 mb-0 mx-3"> ขณะนี้ในกลุ่มมี Robux อยู่ <b><span data-text="rbx_group_stock"><?php if(empty($robux_balance["robux"])) { echo "0"; } else { echo $robux_balance["robux"]; } ?> </span> R$</b><br> จำหน่ายในเรท <b><span data-text="rbx_group_rate"><?php echo $column3["string1"]; ?></span> R$ / 1 ฿</b> </div>
							<p class="text-success mt-2">( ถ้าเข้ากลุ่มไม่ได้ แปลว่า Robux หมด / Stock ยังไม่เข้า )</p>
							
                        </div>
                    </div>
                </div>
				
				
				
				
				

                <div class="col-md-6">
                    <div class="alert alert-dismissible alert-warning text-center">
                        <center>
                            <p class="mb-0"><i class="fas fa-exclamation-triangle" aria-hidden="true"></i> กรุณาเข้ากลุ่มก่อนซื้อ Robux!</p>
                        </center>
                    </div>
                    <div class="card border mb-3">
                        <div class="card-header font15">เติมแบบเข้าแบบกลุ่ม</div>
                        <div class="card-body">
                            <label for="exampleInputEmail1">1. กรอกซื่อในเกม</label><br>
                            <input type="text" id="usernamegame" class="form-control" placeholder="ชื่อในเกม" required="" name="name">
						    <label for="exampleInputEmail1">2. กรอกจำนวนเงิน</label><br>
                            <input type="text" id="amount" class="form-control mt-2" placeholder="จำนวนเงิน" required="" onkeyup="javascript:c_rb(this.value);" name="num">
					<label for="exampleInputEmail1">3. กรอกตัวเลข 4 ตัวที่เห็น</label>
                <?php
                function generateRandomString($length = 10)
                {
                    $characters = '0123456789';
                    $charactersLength = strlen($characters);
                    $randomString = '';
                    for ($i = 0; $i < $length; $i++) {
                        $randomString .= $characters[rand(0, $charactersLength - 1)];
                    }
                    return $randomString;
                }

                $_SESSION["captcha"] = generateRandomString(4);
                ?>
                <div class="input-group mt-2">
                    <div class="input-group-prepend">
                        <span  class="input-group-text" class="color-hue" ><?php echo $_SESSION["captcha"]; ?></span>
                    </div>
                    <input type="text" id="captcha" class="form-control" placeholder="ใส่ตัวเลข 4 ตัวที่เห็น">
                </div>
	<input type="text" id="fewtest" style="display: none;" value="<?php echo $column3["string1"]; ?>" name="num">
                <input type="hidden" name="payment" value="1">
                <p style="color: #818182;" class="mt-1 text-center" id="fewfewzz2">คุณจะได้รับ Robux จำนวน <span class="badge badge-success" id="s111mn" style="font-size: 13px;" name="s111mn">0</span> Robux</p>
					
                            <br>
                            <button type="button" class="btn btn-success btn-block" style="font-size: 17px; border-radius : 100px;" id="fewhakko" name="fewhakko" onclick="javascript:sellrobux();"><i class="fas fa-credit-card"></i> ชำระเงิน</button>
							
							
                        </div>
                    </div>
                </div>
            </div>
            

    