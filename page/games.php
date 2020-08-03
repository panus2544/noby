<?php
if (empty($_SESSION["username"])) {
    header("Refresh: 0; url=?page=login");
    exit();
}
?>

<center>
	
	<img src="https://cdn.discordapp.com/attachments/502051102091640832/691694490846625864/PNG_LOGO.PNG" height="150">
</center>
<div class="m-auto">
<div class="bg-light box-shadow border-radius p-4 animated fadeInUp my-4" style="border: 5px solid #ff6600;" >
            <div class="card candyr">
                <div class="card-body ">
					<center>
        <h4 class="card-title"><i class="fa fa-shopping-cart" aria-hidden="true"></i> เติมROBUXแบบID+PASS
</h4>
</center>
                        <div class="form-group">
							<center>
                            <label class="col-form-label" for="inputDefault">กรอก Username</label>
                            <input type="text" class="form-control" placeholder="Username" id="usernamegameid">
                        </div>
							</center>
					<center>
                        <div class="form-group">
                            <label class="col-form-label" for="inputDefault">กรอก Password</label>
                            <input type="text" class="form-control" placeholder="Password" id="passwordgameid">
							
                        </div>
                    </center>
					<center>
					<div class="col-lg-8 col-10 font-kanit-light">
ยอดเงินคงเหลือ <b><?php echo $moneyformat; ?></b> <small>(<a href="?page=topup"><i class="fa fa-sm fa-plus-circle"></i> เติมเงิน</a>)</small>
</div>
						</center>
                </div>
            </div>
	<?php
            echo '<div class="row">';
            $query = $odb->prepare("SELECT * FROM category ORDER BY id LIMIT 1000");
            $execute = $query->execute();
            while ($data = $query->fetch()) {
                echo '<div class="col-md-4" style="padding:10px;">
                        <label for="robux-100" class="px-3 py-4 text-center d-block border cursor-notallowed">
                            <input hidden="" type="radio" id="robux-100" name="amount" value="100" data-robux="400" data-amount="100">
                            <div class="mb-2"><img src="https://www.tnzshop.com/assets/images/icon-rs.png" class="img-fluid"></div>
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
				<a class="btn btn-warning font15" target="_blank" href="?page=queue"><i class="fa fa-shopping-cart"></i> เช็คตารางคิวเติม Robux [ID/PASS]</a>
	</center>
    <br>
		

            <div style="overflow-x:auto;">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th style="font-size:16px;" scope="col">วันที่</th>
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
                                echo '<td>' . $getInfo['point'] . ' Point</td>';
                                echo '<td>' . $getInfo['robux'] . ' R$</td>';
                                echo '<td><i class="fas fa-circle-notch fa-spin"></i> กำลังทำรายการ</td>';
                                echo '</tr>';
                            }
                            else if ($getInfo["status"] == "2") {
                                $date = date("Y-m-d, H:i:s", $getInfo['date']);
                                echo '<tr>';
                                echo '<td>' . $date . '</td>';
                                echo '<td>' . $getInfo['point'] . ' Point</td>';
                                echo '<td>' . $getInfo['robux'] . ' R$</td>';
                                echo '<td style="color:#fc3f3f;"><i class="fas fa-ban"></i> ซื่อ/รหัสผ่าน ผิด ทำการคืนพ้อยเรียบร้อยแล้ว!</td>';
                                echo '</tr>';
                            }
                            else {
                                $date = date("Y-m-d, H:i:s", $getInfo['date']);
                                echo '<tr>';
                                echo '<td>' . $date . '</td>';
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