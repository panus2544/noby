<?php
if (empty($_SESSION["username"])) {
    header("Refresh: 0; url=?page=login");
    exit();
}
?>

<div class="col-12 col-md-6 m-auto aos-init aos-animate" data-aos="fade-up">
<div class="box-panel mt-3 text-center">
<div class="py-1">
<h3>Robux ID+Pass</h3>
<div class="row justify-content-center">
<div class="col-lg-10 col-12 py-3">
<div class="form-group">
<input type="text" class="form-control form-control-lg" placeholder="ชื่อผู้ใช้งานในเกม Roblox" id="usernamegameid">
</div>
<div class="form-group">
<input type="text" class="form-control form-control-lg" placeholder="รหัสผ่านในเกม Roblox" id="passwordgameid">
</div>
</div>
<div class="col-lg-10 col-12 font-kanit">
ยอดเงินคงเหลือ <b><?php echo $moneyformat; ?> ฿</b> <small>(<a href="?page=topup"><i class="fa fa-sm fa-plus-circle"></i> เติมเงิน</a>)</small>
</div>
</div>
</div>
</div>
</div>
<div class="m-auto">
<div class="bg-light box-shadow border-radius p-4 animated fadeInUp my-4" style="border: 5px solid #254efd;" >
            
	<?php
            echo '<div class="row">';
            $query = $odb->prepare("SELECT * FROM category ORDER BY id LIMIT 1000");
            $execute = $query->execute();
            while ($data = $query->fetch()) {
                echo '<div class="col-6 col-md-4 col-lg-4 col-xl-3 mb-4">
                <label for="robux-310" class="px-3 py-4 text-center d-block border cursor-notallowed">
                <input hidden="" type="radio" id="robux-310" name="amount" value="310" data-robux="800" data-amount="310">
                <div class="mb-2"><img src="https://www.tnzshop.com/assets/images/icon-rs.png" class="img-fluid"></div>
                           <hr>
                            <div class="font-weight-bold font120per">' .number_format($data["robux"]) . ' Robux</div>
                            <div class="font-weight-light">' .number_format($data["point"]) . ' พ้อยต์</div>
                            <a class="btn btn-success font15" style="margin-top: 10px" href="javascript:sellrobuxidpass(' . $data["id"] . ');">ซื้อสินค้า</a>
							<br>
                        </label>
                    </div>';
            }
            echo '</div>';
            ?>
            <br>
            <center>
				<a class="btn btn-primary font15" target="_blank" href="?page=queue"><i class="fa fa-shopping-cart"></i> เช็คตารางคิว [ID/PASS]</a>
	</center>
    <br>
		

            <div style="overflow-x:auto;">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th style="font-size:16px;" scope="col">วันที่</th>
                            <th style="font-size:16px;" scope="col">ซื่อในเกม</th>
                            <th style="font-size:16px;" scope="col">ราคา</th>
                            <th style="font-size:16px;" scope="col">โรบัค</th>
                            <th style="font-size:16px;" scope="col">สถานะ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $SQLGetLogs = $odb->query("SELECT * FROM `logidpass` WHERE `user`='{$_SESSION['username']}' ORDER BY `date` DESC LIMIT 0, 5");
                        while ($getInfo = $SQLGetLogs->fetch(PDO::FETCH_ASSOC)) {

                            if ($getInfo["status"] == "0") {
                                $date = date("Y-m-d, H:i:s", $getInfo['date']);
                                echo '<tr>';
                                echo '<td>' . $date . '</td>';
                                echo '<td>' . $getInfo['username'] . ' </td>';
                                echo '<td>' . $getInfo['point'] . ' Point</td>';
                                echo '<td>' . $getInfo['robux'] . ' R$</td>';
                                echo '<td><i class="fas fa-circle-notch fa-spin"></i> กำลังทำรายการ</td>';
                                echo '</tr>';
                            }
                            else if ($getInfo["status"] == "2") {
                                $date = date("Y-m-d, H:i:s", $getInfo['date']);
                                echo '<tr>';
                                echo '<td>' . $date . '</td>';
                                echo '<td>' . $getInfo['username'] . ' </td>';
                                echo '<td>' . $getInfo['point'] . ' Point</td>';
                                echo '<td>' . $getInfo['robux'] . ' R$</td>';
                                echo '<td style="color:#fc3f3f;"><i class="fas fa-ban"></i> ซื่อ/รหัสผ่าน ผิด ทำการคืนพ้อยเรียบร้อยแล้ว!</td>';
                                echo '</tr>';
                            }
                            else {
                                $date = date("Y-m-d, H:i:s", $getInfo['date']);
                                echo '<tr>';
                                echo '<td>' . $date . '</td>';
                                echo '<td>' . $getInfo['username'] . ' </td>';
                                echo '<td>' . $getInfo['point'] . ' Point</td>';
                                echo '<td>' . number_format($getInfo['robux']) . ' R$</td>';
                                echo '<td style="color: green;"><i class="fa fa-check"></i> เพิ่มโรบัคเรียบร้อย</td>';
                                echo '</tr>';
                            }
                            
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>