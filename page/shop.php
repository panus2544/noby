
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

<style>
.btn-noby {
    color: #fff;
    background-color: #254efd;
    border-color: #254efd;
}
</style>
<div class="container my-3 aos-init aos-animate" data-aos="fade-up">
<div class="box-panel">
<div class="py-3 d-flex justify-content-between">
<div class="">
<h1 >NobyBux - เติม Robux</h1>

</div>
</div>
<div class="pb-1 aos-init aos-animate" data-aos="fade">
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="?page=home"><i class="fas fa-home"></i> Home</a></li>
<li class="breadcrumb-item active" aria-current="page">เลือกวิธีซื้อ Robux</li>
</ol>
</nav>
</div>
<div class="row pb-4">
<div class="col-12 col-md-6 my-2 my-md-3 aos-init aos-animate" data-aos="fade-up">
<a class="btn btn-lg btn-noby btn-block py-5 text-white category-content" href="?page=group">
<div><img src="https://cdn.discordapp.com/attachments/702144466080890991/702149799301873674/20200120_192957.gif" alt="Group" style="max-height:100px"></div>
<h1 class="mb-0">Robux Group</h1>
<div>พร้อมจำหน่าย <?php if(empty($robux_balance["robux"])) { echo "0"; } else { echo $robux_balance["robux"]; } ?> Robux</div>
</a>
</div>
<div class="col-12 col-md-6 my-2 my-md-3 aos-init aos-animate" data-aos="fade-up" data-aos-delay="50">
<a class="btn btn-lg btn-noby btn-block py-5 text-white category-content" href="?page=idpass">
<div><img src="https://cdn.discordapp.com/attachments/702144466080890991/702149799301873674/20200120_192957.gif" alt="ID-PASS" style="max-height:100px"></div>
<h1 class="mb-0">ID+PASS</h1>
<div>พร้อมจำหน่าย 24ชั่วโมง</div>
</a>
</div>
</div>
</div>
</div>
        