
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
  CURLOPT_ENCODING => "gzip",
  CURLOPT_MAXREDIRS => 1,
  CURLOPT_TIMEOUT => 1,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "Accept: */*",
    "Accept-Encoding: gzip",
    "Cache-Control: no-cache",
    "Connection: keep-alive",
    "Host: economy.roblox.com",
    "User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.86 Safari/537.36",
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


<!-- <hr> -->
<div style="background:#254efd 
;"  class="card" style="padding: 10px;">
        <marquee style="color:#ffffff;">Welcome To NobyBux Cafe | บริการเติมเกม Robux ราคาสุดคุ้ม! </marquee>
    </div>
<br>




<div class="row">
    <div class="col-md-8">
        <div class="card mb-5 candyr" style="background-color:#fff9f9;">
            <div class="card-body candyr" style="background-color:#fff9f9;">
                <h4 class="card-title"><i class="far fa-newspaper" aria-hidden="true"></i> ข่าวสารและข้อมูลอัพเดทล่าสุด</h4>
                <hr>
                <?php
                $queryfew1 = $odb->prepare("SELECT * FROM post ORDER BY id DESC");
                $execute = $queryfew1->execute();
                while ($datezaza = $queryfew1->fetch()) {
                    $date = date("Y-m-d, H:i:s", $datezaza['date']);
                ?>
                    <div class="scrollbar" id="style-4" style="width: auto; height: 220px; overflow-y: scroll; scrollbar-arrow-color:blue; scrollbar-face-color: #e7e7e7; scrollbar-3dlight-color: #a0a0a0; scrollbar-darkshadow-color:#FFF">
                        <div class="d-flex flex-row my-3 p-3 bg-light rounded" style="border:0px solid #FFF; background-color:#fff9f9 !important;">
                            <div class=""><img src="https://cdn.discordapp.com/attachments/702144466080890991/702149799301873674/20200120_192957.gif" class="border rounded-circle" style="width:60px;height:60px;"></div>
                            <div class="pl-2 d-flex align-items-start flex-column">
                                <div class="font-weight-bold font-kanit">RyuJinZ#9988 | NobyBux</div>
                                <span class="font-weight-light font10"><?php echo $date; ?></span>
                                <span class="text-warning"><i class="fa fa-xs fa-circle" aria-hidden="true"></i> ประกาศ</span>
                                <div class="mt-3 w-100">
                                    <div class="font-weight-bold text-break">ข้อมูลข่าวสาร</div>
                                    <div class="text-break">
                                        <p><?php echo $datezaza["title"]; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>

            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="rounded-xl px-4 py-3 mb-3 aos-init aos-animate" style="background-color:#254efd;" data-aos="fade-up" data-aos-delay="50">
            <a class="row" style="color:#fff !important;">
                <div class="col-3 px-3 align-self-center text-center"><img style="width:50px" src="https://media.discordapp.net/attachments/657872369486135318/695558143488557066/w0hdwopf8qe41.png" alt=""></div>
                <div class="col-9">
                    <h3><?php if(empty($robux_balance["robux"])) { echo "0"; } else { echo $robux_balance["robux"]; } ?> R$</h3>
                    <div>ROBUX พร้อมจำหน่าย</div>
                </div>
            </a>
        </div>
        <div class="rounded-xl px-4 py-3 mb-3 aos-init aos-animate" style="background-color:#FFF;" data-aos="fade-up" data-aos-delay="50">
            <span class="row" style="color:#181818 !important;" href="https://www.arcshop.in.th/robux">
                <div class="col-3 px-3 align-self-center text-center"><i style="color:#181818;" class="fas fa-hand-holding-heart fa-2x" aria-hidden="true"></i></div>
                <div class="col-9">
                    <h3><?php echo $robuxzaza; ?> R$</h3>
                    <div>จำนวนที่ขาย ROBUX</div>
                </div>
            </span>
        </div>
        <div class=" rounded-xl px-4 py-3 mb-3 aos-init aos-animate bg-white" data-aos="fade-up" data-aos-delay="50">
            <span class="row" style="color:#181818;" href="https://www.arcshop.in.th/robux">
                <div class="col-3 px-3 align-self-center text-center"><i style="color:#181818;" class="fa-2x fas fa-users" aria-hidden="true"></i></div>
                <div class="col-9">
                    <h3><?php echo $usersall; ?></h3>
                    <div>จำนวนสมาชิกทั้งหมด</div>
                </div>
            </span>
        </div>
    </div>

<section class="home-slider">
<div class="container">
<div class="slider-show aos-init aos-animate" data-aos="fade-up">
<div class="bd-example">
<div id="carouselCaptions" class="carousel slide carousel-fade" data-ride="carousel">
<ol class="carousel-indicators">
<li data-target="#carouselCaptions" data-slide-to="0" class="">
</li><li data-target="#carouselCaptions" data-slide-to="1" class="active">
</li><li data-target="#carouselCaptions" data-slide-to="2">
</li></ol>
<div class="carousel-inner">
<a class="carousel-item">
<img src="<?php echo $column8["string1"]; ?>"  class="d-block w-100 rounded-xl">
<div class="carousel-caption text-left d-none d-md-block" style="left:7%;right:7%;padding:5px;">
<h5 style="color:#254efd;">Welcome to NobyBux Cafe</h5>
<p style="color:#254efd;">ยินดีต้อนรับสู่ NobyBux Cafe บริการเติมเกม Robux ราคาสุดคุ้มและประหยัดที่สุด</p>
</div>
 </a>
<a class="carousel-item active">
<img src="<?php echo $column8["string2"]; ?>"  class="d-block w-100 rounded-xl" >
<div class="carousel-caption text-left d-none d-md-block" style="left:7%;right:7%;padding:5px;">
<h5 style="color:#254efd;">NobyBux Cafe มีระบบเติมเกมออโต้</h5>
<p style="color:#254efd;">สามารถซื้อและใช้บริการผ่านทางเว็ปไซต์ได้ตลอด 24ชั่วโมง</p>
</div>
</a>
<a class="carousel-item">
<img src="<?php echo $column8["string3"]; ?>"  class="d-block w-100 rounded-xl" >
<div class="carousel-caption text-left d-none d-md-block" style="left:7%;right:7%;padding:5px;">
<h5 style="color:#254efd;">หากมีปัญหาสามารถติดต่อแอดมินได้ตลอดเวลา 24ชั่วโมง</h5>
<p style="color:#254efd;">ช่องทางการติดต่อ Discord : https://discord.gg/RxhzPDq </p>
</div>
</a>
</div>
<a class="carousel-control-prev" href="#carouselCaptions" role="button" data-slide="prev" style="width:5%">
<span class="carousel-control-prev-icon" aria-hidden="true"></span>
<span class="sr-only">Previous</span>
</a>
<a class="carousel-control-next" href="#carouselCaptions" role="button" data-slide="next" style="width:5%">
<span class="carousel-control-next-icon" aria-hidden="true"></span>
<span class="sr-only">Next</span>
</a>
</div>
</div>
</div>
</div>
</section>




 



