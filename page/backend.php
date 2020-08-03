<?php

if (empty($_SESSION["username"])) {
    header("Refresh: 0; url=?page=login");
    exit();
}
$SQL = $odb->prepare("SELECT * FROM users WHERE username = :status");
$SQL->execute(array(':status' => $_SESSION["username"]));
$fewtest = $SQL->fetch(PDO::FETCH_ASSOC);

if ($fewtest["rank"] == '0') {
    header("Refresh: 0; url=?page=topup");
    exit();
}


$today = date("Y-m-d", time());
$today = $today . ' 00:00:00';
$exp = explode(" ", $today);
$t = explode(":", $exp[1]);
$d = explode("-", $exp[0]);
$timestamptoday = mktime($t[0], $t[1], $t[2], $d[1], $d[2], $d[0]);

$fewfew = $odb->query("SELECT * FROM `topup` ORDER BY `date` DESC LIMIT 100");
while ($aaaaaa = $fewfew->fetch(PDO::FETCH_ASSOC)) {
    if ($timestamptoday <= $aaaaaa['date']) {
        $TodayIN = $TodayIN + $aaaaaa['amount'];
    }
}

$TodayIN = number_format($TodayIN);

$weekz = strtotime('-7 day', time()); //เพิ่มเวลา


$fewfew = $odb->query("SELECT * FROM `topup` ORDER BY `date` DESC LIMIT 600");
while ($aaaaaa = $fewfew->fetch(PDO::FETCH_ASSOC)) {
    if ($weekz <= $aaaaaa['date']) {
        $WeekIN = $WeekIN + $aaaaaa['amount'];
    }
}

$WeekIN = number_format($WeekIN);

$monthz = date("Y-m", time());
$monthz = $monthz . '-01 00:00:00';
$exp = explode(" ", $monthz);
$t = explode(":", $exp[1]);
$d = explode("-", $exp[0]);
$timestampmonth = mktime($t[0], $t[1], $t[2], $d[1], $d[2], $d[0]);

$fewfew = $odb->query("SELECT * FROM `topup` ORDER BY `date` DESC LIMIT 2000");
while ($aaaaaa = $fewfew->fetch(PDO::FETCH_ASSOC)) {
    if ($timestampmonth <= $aaaaaa['date']) {
        $MonthIN = $MonthIN + $aaaaaa['amount'];
    }
}
$MonthIN = number_format($MonthIN);

$TotalIN = $odb->query("SELECT SUM(amount) FROM `topup`")->fetchColumn(0);
$TotalIN = number_format($TotalIN);


?>

<div class="card">
    <div class="card-body">
    <center>
        <h4 class="card-title"><i class="fas fa-user-cog" aria-hidden="true"></i> ระบบแอดมิน</h4>
        </center>
        
        <div class="container">

            


            <?php
            if (isset($_GET["category"])) {
                echo '<div class="text-center font16" style="margin-top:15px;">เลือกสินค้าที่ต้องการ</div><hr>';

                if (isset($_GET["addcategory"])) {
                    echo '<div class="card">
                    <div class="card-body">
                      <h4 class="card-title">เพิ่มสินค้า</h4>
                      <hr>
                      <div class="form-group">
                        <label class="col-form-label" for="inputDefault">กรอกจำนวน โรบัค</label>
                        <input type="text" class="form-control" placeholder="กรุณากรอกจำนวนโรบัค" id="robuxzaza">
                      </div>
                      <div class="form-group">
                        <label class="col-form-label" for="inputDefault">กรอกจำนวน พ้อยต์</label>
                        <input type="text" class="form-control" placeholder="กรุณากรอกจำนวนพ้อยต์" id="pointzaza">
                      </div>
                    </div>
                    <button type="button" class="btn btn-success font15"  id="fewhakko2few" onclick="javascript:addcategory();" >เพิ่มรายการสินค้า</button>
                    </div><hr>';
                }
                if (isset($_GET["changecategory"])) {
                    $SQLfew = $odb->prepare("SELECT * FROM category WHERE id = :status");
                    $SQLfew->execute(array(':status' => $_GET["changecategory"]));
                    $datafew = $SQLfew->fetch(PDO::FETCH_ASSOC);
                    if ($datafew["id"] == "") {
                    } else {
                        echo '<div class="card">
                    <div class="card-body">
                      <h4 class="card-title">แก้ไขสินค้า</h4>
                      <hr>
                      <div class="form-group">
                        <label class="col-form-label" for="inputDefault">กรอกจำนวน โรบัค</label>
                        <input type="text" class="form-control" placeholder="กรุณากรอกจำนวนโรบัค" value="' . $datafew["robux"] . '" id="robuxzaza">
                      </div>
                      <div class="form-group">
                        <label class="col-form-label" for="inputDefault">กรอกจำนวน พ้อยต์</label>
                        <input type="text" class="form-control" placeholder="กรุณากรอกจำนวนพ้อยต์" value="' . $datafew["point"] . '" id="pointzaza">
                      </div>
                    </div>
                    <button type="button" class="btn btn-success font15" id="fewhakko1few" onclick="javascript:changecategory(' . $_GET["changecategory"] . ');" >แก้ไขรายการสินค้า</button>
                    <button type="button" class="btn btn-danger font15" id="fewhakko1321few" onclick="javascript:deletecategory(' . $_GET["changecategory"] . ');" >ลบสินค้า</button>
                    </div><hr>';
                    }
                }

                echo '<div class="row">';
                $query = $odb->prepare("SELECT * FROM category ORDER BY id LIMIT 1000");
                $execute = $query->execute();
                while ($data = $query->fetch()) {
                    echo '<div class="col-md-4" style="padding:10px;">
                        <label for="robux-100" class="px-3 py-4 text-center d-block border cursor-notallowed">
                            <input hidden="" type="radio" id="robux-100" name="amount" value="100" data-robux="400" data-amount="100">
                            <div class="mb-2"><img src="https://www.tnzshop.com/assets/images/icon-rs.png" class="img-fluid"></div>
                            <div class="font-weight-bold font120per">' . $data["robux"] . ' Robux</div>
                            <div class="font-weight-light">' . $data["point"] . ' พ้อยต์</div>
                            <a class="btn btn-danger font15" style="margin-top: 10px" href="?page=backend&category&changecategory=' . $data["id"] . '">แก้ไขสินค้า</a>
                        </label>
                    </div>';
                }
                echo '<div class="col-md-4" style="padding:10px;">
                <label for="robux-100" class="px-3 py-4 text-center d-block border cursor-notallowed">
                <center><img src="https://www.colourbox.com/preview/5697410-icon-plus-black.jpg" style="width: 30%">
                <h3>เพิ่มสินค้า</h3></center>
                <a class="btn btn-info font15" style="margin-top:13px" href="?page=backend&category&addcategory"><i class="fa fa-shopping-cart"></i>&nbsp;เพิ่มสินค้า</a>
                        </label>
            </div>';
                echo '</div><br>
                <center><a class="btn btn-danger font15"href="?page=backend">กลับไปหน้าแรก</a></center>
                </div></div></div>';
                include("page/footer.php");
                exit();
            } else if (isset($_GET["logidpass"])) {
                echo '<div class="text-center font16" style="margin-top:15px;">ยูสเซอร์ที่ได้ทำการซื้อโรบัค</div><hr>';

                if (isset($_GET["id"])) {
                    include("page/logidpass.php");
                } else {
                    echo '<div class="content" id="messages">
                <table class="js-table-checkable table table-hover table-vcenter">
                    <tbody>';
                    $queryfew = $odb->prepare("SELECT * FROM logidpass ORDER BY id DESC");
                    $execute = $queryfew->execute();
                    while ($datafewza = $queryfew->fetch()) {
                        $status;
                        if ($datafewza["status"] == '0') {
                            $status = array("", "ยังไม่ได้ทำการเพิ่ม robux ให้ยูสเซอร์");
                        } else if ($datafewza["status"] == '2') {
                            $status = array("success", "ได้ทำการคืน point ให้ยูสเซอร์แล้ว");
                        } else {
                            $status = array("success", "ได้ทำการเพิ่ม robux ให้ยูสเซอร์แล้ว");
                        }
                        $date = date("Y-m-d, H:i:s", $datafewza['date']);
                        echo '<tr class="table-' . $status[0] . '">
                            <td>
                                <a class="font-w600" href="?page=backend&logidpass&id=' . $datafewza["id"] . '">USER : [' . $datafewza["user"] . '] || จ่ายมา : ' . $datafewza["point"] . ' Point</a>
                                <div class="text-muted push-5-t">ต้องเพิ่ม Robux : ' . $datafewza["robux"] . ' R$</div>
                            </td>
                            <td class="text-muted">' . $status[1] . '</td>
                            <td class="visible-lg text-muted" >
                                <em>' . $date . '</em>
                            </td>
                        </tr>';
                    }

                    echo '</tbody>
                </table>
                </div>';
                }


                echo '<center><a class="btn btn-danger font15"href="?page=backend">กลับไปหน้าแรก</a></center></div></div></div>';
                include("page/footer.php");
                exit();
            } else if (isset($_GET["logfreefire"])) {
                echo '<div class="text-center font16" style="margin-top:15px;">ยูสเซอร์ที่ได้ทำการซื้อโรบัค</div><hr>';

                if (isset($_GET["idfree"])) {
                    include("page/logidfreefire.php");
                } else {
                    echo '<div class="content" id="messages">
                <table class="js-table-checkable table table-hover table-vcenter">
                    <tbody>';
                    $queryfew = $odb->prepare("SELECT * FROM logfreefire ORDER BY id DESC");
                    $execute = $queryfew->execute();
                    while ($datafewza = $queryfew->fetch()) {
                        $status;
                        if ($datafewza["status"] == '0') {
                            $status = array("", "ยังไม่ได้ฟามให้ ลูกค้า");
                        } else if ($datafewza["status"] == '2') {
                            $status = array("success", "ได้ทำการคืน point ให้ยูสเซอร์แล้ว");
                        } else {
                            $status = array("success", "ฟามสำเร็จแล้ว");
                        }
                        $date = date("Y-m-d, H:i:s", $datafewza['date']);
                        echo '<tr class="table-' . $status[0] . '">
                            <td>
                                <a class="font-w600" href="?page=backend&logfreefire&idfree=' . $datafewza["id"] . '">USER : [' . $datafewza["username"] . '] || จ่ายมา : ' . $datafewza["point"] . ' Point</a>
                                <div class="text-muted push-5-t">ซื่อ/พาส => ' . $datafewza["uid"] . '</div>
                            </td>
                            <td class="text-muted">' . $status[1] . '</td>
                            <td class="visible-lg text-muted" >
                                <em>' . $date . '</em>
                            </td>
                        </tr>';
                    }

                    echo '</tbody>
                </table>
                </div>';
                }


                echo '<center><a class="btn btn-danger font15"href="?page=backend">กลับไปหน้าแรก</a></center></div></div></div>';
                include("page/footer.php");
                exit();
            } else if (isset($_GET["freefire"])) {
                echo '<div class="text-center font16" style="margin-top:15px;">เลือกสินค้าที่ต้องการ</div><hr>';

                if (isset($_GET["addfcategory"])) {
            ?>
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">เพิ่มสินค้า</h4>
                            <hr>
                            <div class="form-group">
                                <label class="col-form-label" for="inputDefault">กรอกชื่อหัวเรื่อง</label>
                                <input type="text" class="form-control" placeholder="กรุณากรอกจำนวนโรบัค" id="namezazafew">
                            </div>
                            <div class="form-group">
                                <label class="col-form-label" for="inputDefault">กรอกจำนวน พ้อยต์</label>
                                <input type="text" class="form-control" placeholder="กรุณากรอกจำนวนพ้อยต์" id="pointzazafew">
                            </div>
                            <div class="form-group">
                                <label class="col-form-label" for="inputDefault">กรอกรูปภาพ</label>
                                <input type="text" class="form-control" placeholder="กรุณากรอกรูปภาพ" id="picturefewza">
                            </div>

                            <div class="form-group">
                                <label class="col-form-label" for="inputDefault">กรอกระบบที่จะเลือก</label>
                                <select id="selectjumbotonfewfewfewfew" class="custom-select" style="color: #55595C;">
                                    <option value="1">Freefire</option>
                                    <option value="2">Rov</option>
                                    <option value="3">Pubg</option>
            
                                </select>
                            </div>

                        </div>
                        <button type="button" class="btn btn-success font15" id="fewhakko2few" onclick="javascript:addfcategory();">เพิ่มรายการสินค้า</button>
                    </div>
                    <hr>
            <?php
                }
                if (isset($_GET["changefcategory"])) {
                    $SQLfew = $odb->prepare("SELECT * FROM categorynew WHERE id = :status");
                    $SQLfew->execute(array(':status' => $_GET["changefcategory"]));
                    $datafew = $SQLfew->fetch(PDO::FETCH_ASSOC);
                    if ($datafew["id"] == "") {
                    } else {
                        echo '<div class="card">
                    <div class="card-body">
                      <h4 class="card-title">แก้ไขสินค้า</h4>
                      <hr>
    
                      <div class="form-group">
                        <label class="col-form-label" for="inputDefault">กรอกชื่อหัวเรื่อง</label>
                        <input type="text" class="form-control" placeholder="กรุณากรอกจำนวนโรบัค" value="' . $datafew["name"] . '" id="namezazafew">
                      </div>
                      <div class="form-group">
                        <label class="col-form-label" for="inputDefault">กรอกจำนวน พ้อยต์</label>
                        <input type="text" class="form-control" placeholder="กรุณากรอกจำนวนพ้อยต์" value="' . $datafew["point"] . '" id="pointzazafew">
                      </div>
                      <div class="form-group">
                        <label class="col-form-label" for="inputDefault">กรอกรูปภาพ</label>
                        <input type="text" class="form-control" placeholder="กรุณากรอกรูปภาพ" value="' . $datafew["link"] . '" id="picturefewza">
                      </div>

                      
                    </div>
                    <button type="button" class="btn btn-success font15" id="fewhakko1few" onclick="javascript:changefcategory(' . $_GET["changefcategory"] . ');" >แก้ไขรายการสินค้า</button>
                    <button type="button" class="btn btn-danger font15" id="fewhakko1321few" onclick="javascript:deletefcategory(' . $_GET["changefcategory"] . ');" >ลบสินค้า</button>
                    </div><hr>';
                    }
                }

                echo '<div class="row">';
                $query = $odb->prepare("SELECT * FROM categorynew ORDER BY id LIMIT 1000");
                $execute = $query->execute();
                while ($data = $query->fetch()) {
                    echo '<div class="col-md-4" style="padding:10px;">
                        <label for="robux-100" class="px-3 py-4 text-center d-block border cursor-notallowed">
                            <input hidden="" type="radio" id="robux-100" name="amount" value="100" data-robux="400" data-amount="100">
                            <div class="mb-2"><img src="' . $data["img"] . '" class="img-fluid"></div>
                            <div class="font-weight-bold font120per">' . $data["name"] . '</div>
                            <div class="font-weight-light">' . $data["point"] . ' พ้อยต์</div>
                            <a class="btn btn-danger font15" style="margin-top: 10px" href="?page=backend&freefire&changefcategory=' . $data["id"] . '">แก้ไขสินค้า</a>
                        </label>
                    </div>';
                }
                echo '<div class="col-md-4" style="padding:10px;">
                <label for="robux-100" class="px-3 py-4 text-center d-block border cursor-notallowed">
                <center><img src="https://www.colourbox.com/preview/5697410-icon-plus-black.jpg" style="width: 30%">
                <h3>เพิ่มสินค้า</h3></center>
                <a class="btn btn-info font15" style="margin-top:13px" href="?page=backend&freefire&addfcategory"><i class="fa fa-shopping-cart"></i>&nbsp;เพิ่มสินค้า</a>
                        </label>
            </div>';
                echo '</div><br>
                <center>
				<a class="btn btn-danger font15"href="?page=backend">กลับไปหน้าแรก</a>
				<a class="btn btn-primary font15"href="?page=owo"><i class="fas fa-history"></i>&nbsp;เช๊คคนเติมเงินล่าสุด</a>
				<a class="btn btn-danger font15"href="?page=uwu"><i class="fas fa-history"></i>&nbsp;เชีคคนซื้อ Robux ล่าสุด</a>
				</center>
                </div></div></div>';
                include("page/footer.php");
                exit();
            } else {

                echo '<center><a class="btn btn-primary  font15"href="?page=backend&category"><i class="fa fa-shopping-cart"></i>&nbsp;เพิ่มสินค้า ID+PASS</a>';
                echo '<a class="btn btn-danger font15"href="?page=backend&logidpass"><i class="fas fa-history"></i>&nbsp;เช๊คคนซื้อ ID+PASS</a>';
                echo '<hr>';
                
               
                echo '<a class="btn btn-primary font15"href="?page=owo"><i class="fas fa-history"></i>&nbsp;เช๊คคนเติมเงินล่าสุด</a>';
                echo '<a class="btn btn-danger font15"href="?page=uwu"><i class="fas fa-history"></i>&nbsp;เช๊คคนซื้อ Robux ล่าสุด</a></center>';
            }
            ?>

            <div class="row">

                <div class="col-md-12" style="padding:10px;">
                    <div class="card">
                        <div class="card-body">
                        <center>
                            <h5 class="card-title"><i class="fas fa-user" aria-hidden="true"></i> จัดการ User</h5>
                            </center>
                            <hr>

                            <center>
                                <input type="text" class="form-control" placeholder="กรุณากรอกชื่อผู้ใช้ที่ท่านต้องการ" style="width: 50%;" id="setusernameaddpoint">
                                <button type="button" class="btn btn-success font15" id="fewhakko1" style="margin-top: 10px;" onclick="javascript:searchuser();"><i class="fas fa-search"></i> ค้นหาชื่อยูสเซอร์</button>

                                <?php
                                $fewgczgdf = $odb->prepare("SELECT * FROM users WHERE username = :status");
                                $fewgczgdf->execute(array(':status' => $_GET["username"]));
                                $checkusername = $fewgczgdf->fetch(PDO::FETCH_ASSOC);
                                ?>

                                <div class="card " style="margin-top: 15px;">
                                    <h5 class="card-header">Manager | User</h5>
                                    <div class="card-body">

                                        <div class="input-group mb-3" style="width: 50%;">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">ชื่อผู้ใช้</span>
                                            </div>
                                            <input type="text" class="form-control" disabled value="<?php echo $checkusername["username"]; ?>" placeholder="กรุณาค้นหาชื่อก่อนทำรายการ" id="setusernameaddpoint11">
                                        </div>

                                        <div class="input-group mb-3" style="width: 50%;">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">อีเมล</span>
                                            </div>
                                            <input type="text" class="form-control" <?php if (empty($checkusername["email"])) {
                                                                                        echo "disabled";
                                                                                    } ?> value="<?php echo $checkusername["email"]; ?>" placeholder="กรุณาค้นหาชื่อก่อนทำรายการ" id="setemailusers">
                                        </div>

                                        <div class="input-group mb-3" style="width: 50%;">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">พ้อยต์</span>
                                            </div>
                                            <input type="text" class="form-control" <?php if (empty($checkusername["email"])) {
                                                                                        echo "disabled";
                                                                                    } ?> value="<?php echo $checkusername["point"]; ?>" placeholder="กรุณาค้นหาชื่อก่อนทำรายการ" id="setidpoint">
                                        </div>

                                        <button type="button" class="btn btn-primary font15" <?php if (empty($checkusername["email"])) {
                                                                                                    echo "disabled";
                                                                                                } ?> id="fewhakko1" style="" onclick="javascript:addpointusers();"><i class="fa fa-check"></i> แก้ไขรายละเอียด</button>
                                        <?php
                                        if (empty($checkusername["email"])) {
                                        } else {
                                        ?>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <hr>
                                                    <div class="" style="overflow-x:auto; margin-top:20px">
                                                        <h4 class="badge badge-success" style="font-size: 16px">ประวัติการเติมเงินทั้งหมด</h4>
                                                        <table class="table table-hover" style="color:#523d5d;">
                                                            <thead>
                                                                <tr>
                                                                    <th style="font-size:16px;" scope="col">วันที่</th>
                                                                    <th style="font-size:16px;" scope="col">ราคา</th>
                                                                    <th style="font-size:16px;" scope="col">เลขอ้างอิง / บัตรทรู</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                $SQLGetLogs = $odb->query("SELECT * FROM `topup` WHERE `username`='{$checkusername['username']}' ORDER BY `date` DESC ");
                                                                while ($getInfo = $SQLGetLogs->fetch(PDO::FETCH_ASSOC)) {
                                                                    $date = date("Y-m-d, H:i:s", $getInfo['date']);
                                                                    echo '<tr style="color:#523d5d;">';
                                                                    echo '<td style="color:#523d5d;">' . $date . '</td>';
                                                                    echo '<td style="color:#523d5d;">' . $getInfo['amount'] . ' บาท</td>';
                                                                    echo '<td style="color:#523d5d;">' . $getInfo['password'] . '</td>';
                                                                    echo '</tr>';
                                                                }
                                                                ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <hr>
                                                    <div class="" style="overflow-x:auto; margin-top:20px">
                                                        <h4 class="badge badge-success" style="font-size: 16px">ประวัติการซื้อ robux ทั้งหมด</h4>
                                                        <table class="table table-hover" style="color:#523d5d;">
                                                            <thead>
                                                                <tr>
                                                                    <th style="font-size:16px;" scope="col">วันที่</th>
                                                                    <th style="font-size:16px;" scope="col">ราคา</th>
                                                                    <th style="font-size:16px;" scope="col">โรบัค</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                $SQLGetLogs = $odb->query("SELECT * FROM `robux` WHERE `username`='{$checkusername['username']}' ORDER BY `date` DESC ");
                                                                while ($getInfo = $SQLGetLogs->fetch(PDO::FETCH_ASSOC)) {
                                                                    $date = date("Y-m-d, H:i:s", $getInfo['date']);
                                                                    echo '<tr style="color:#523d5d;">';
                                                                    echo '<td style="color:#523d5d;">' . $date . '</td>';
                                                                    echo '<td style="color:#523d5d;">' . $getInfo['point'] . ' Point</td>';
                                                                    echo '<td style="color:#523d5d;">' . $getInfo['robux'] . ' R$</td>';
                                                                    echo '</tr>';
                                                                }
                                                                ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <hr>
                                                    <div class="" style="overflow-x:auto; margin-top:20px">
                                                        <h4 class="badge badge-success" style="font-size: 16px">ประวัติการซื้อ freefire ทั้งหมด</h4>
                                                        <table class="table table-hover" style="color:#523d5d;">
                                                            <thead>
                                                                <tr>
                                                                    <th style="font-size:16px;" scope="col">วันที่</th>
                                                                    <th style="font-size:16px;" scope="col">uid</th>
                                                                    <th style="font-size:16px;" scope="col">ราคา</th>
                                                                    <th style="font-size:16px;" scope="col">สถานะ</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                $SQLGetLogs = $odb->query("SELECT * FROM `logfreefire` WHERE `username`='{$checkusername['username']}' ORDER BY `date` DESC ");
                                                                while ($getInfo = $SQLGetLogs->fetch(PDO::FETCH_ASSOC)) {
                                                                    $date = date("Y-m-d, H:i:s", $getInfo['date']);
                                                                    $status;
                                                                    if ($getInfo["status"] == '0') {
                                                                        $status = array("", "ยังไม่ได้เพชร");
                                                                    } else if ($getInfo["status"] == '2') {
                                                                        $status = array("success", "คืนพ้อยต์");
                                                                    } else {
                                                                        $status = array("success", "เพิ่มเพชรแล้ว");
                                                                    }
                                                                    echo '<tr style="color:#523d5d;">';
                                                                    echo '<td style="color:#523d5d;">' . $date . '</td>';
                                                                    echo '<td style="color:#523d5d;">' . $getInfo['uid'] . '</td>';
                                                                    echo '<td style="color:#523d5d;">' . $getInfo['point'] . ' พ้อยต์</td>';
                                                                    echo '<td style="color:#523d5d;">' . $status[1] . ' </td>';
                                                                    echo '</tr>';
                                                                }
                                                                ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>

                                            </div>



                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </center>

                        </div>
                    </div>
                </div>
                <div class="col-md-12" style="padding:10px;">
                    <div class="card">
                    <center>
                        <h5 class="card-header">จัดการรูปภาพ</h5>
                        </center>
                        <div class="card-body">
                            <div class="row">
                                <div class="input-group mb-3 col-md-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">รูปที่ 1</span>
                                    </div>
                                    <input type="text" class="form-control" value="<?php echo $column8["string1"]; ?>" id="8string1">
                                </div>
                                <div class="input-group mb-3 col-md-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">รูปที่ 2</span>
                                    </div>
                                    <input type="text" class="form-control" value="<?php echo $column8["string2"]; ?>" id="8string2">
                                </div>
                                <div class="input-group mb-3 col-md-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">รูปที่ 3</span>
                                    </div>
                                    <input type="text" class="form-control" value="<?php echo $column8["string3"]; ?>" id="8string3">
                                </div>
                            </div>

                            <center><button type="button" class="btn btn-success font15" id="fewhakko8" onclick="javascript:bsettings(8);"><i class="fas fa-save"></i> เปลี่ยนการตั้งค่า</button></center>
                        </div>
                    </div>
                </div>

                <div class="col-md-12" style="padding:10px;">
                    <div class="card">
                    <center>
                        <h5 class="card-header">จัดการ ข้อความประกาศหน้าเว็ป</h5>
                        </center>
                        <div class="card-body">

                            <div class="rewrwe" style="overflow: auto;">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th style="font-size: 13px;">Title</th>
                                            <th style="font-size: 13px;">Date</th>
                                            <th class="text-center" style="font-size: 13px;">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $queryfew1 = $odb->prepare("SELECT * FROM post ORDER BY id DESC");
                                        $execute = $queryfew1->execute();
                                        while ($datezaza = $queryfew1->fetch()) {
                                            $date = date("Y-m-d, H:i:s", $datezaza['date']);
                                            echo
                                                '
                                                <tr>
                                                    <td style="font-size: 13px;">' . $datezaza["title"] . '</td>
                                                    <td style="font-size: 13px;">' . $date . '</td>
                                                    <td class="text-center"><button name="deletenews" value="47" class="btn btn-danger btn-sm" onclick="javascript:deletepost(' . $datezaza["id"] . ');"><i class="fa fa-times" aria-hidden="true"></i></button></td>
                                                </tr>
                                                ';
                                        }
                                        ?>


                                    </tbody>
                                </table>
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">ข้อความ</span>
                                </div>
                                <input type="text" class="form-control" value="" id="newpostadmin">
                            </div>

                            <center><button type="button" class="btn btn-success font15" id="fewhakko9" onclick="javascript:addpostadmin();"><i class="fas fa-save"></i> เพิ่มรายการ</button></center>
                        </div>
                    </div>
                </div>

                

                <div class="col-md-6" style="padding:10px;">
                    <div class="card">
                    <center>
                        <h5 class="card-header">จัดการหน้าเว็บ</h5>
                        </center>
                        <div class="card-body">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">TitleWebsite</span>
                                </div>
                                <input type="text" class="form-control" value="<?php echo $column1["string1"]; ?>" id="1string1">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">IconWebsite</span>
                                </div>
                                <input type="text" class="form-control" value="<?php echo $column1["string2"]; ?>" id="1string2">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">FontWebsite</span>
                                </div>
                                <input type="text" class="form-control" value="<?php echo $column1["string3"]; ?>" id="1string3">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">BackGroundWebsite</span>
                                </div>
                                <input type="text" class="form-control" value="<?php echo $column1["string4"]; ?>" id="1string4">
                            </div>
                            <center><button type="button" class="btn btn-success font15" id="fewhakko1" onclick="javascript:bsettings(1);"><i class="fas fa-save"></i> เปลี่ยนการตั้งค่า</button></center>
                        </div>
                    </div>
                </div>
                <div class="col-md-6" style="padding:10px;">
                    <div class="card">
                    <center>
                        <h5 class="card-header">จัดการเติมเงิน</h5>
                        </center>
                        <div class="card-body">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">เบอร์วอเลท</span>
                                </div>
                                <input type="text" class="form-control" value="<?php echo $column2["string1"]; ?>" id="2string1">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">รหัสผ่านหรือพิน</span>
                                </div>
                                <input type="text" class="form-control" value="<?php echo $column2["string2"]; ?>" id="2string2">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Auth_Token</span>
                                </div>
                                <input type="text" class="form-control" value="<?php echo $column2["string3"]; ?>" id="2string3">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">ชื่อนามสกุล</span>
                                </div>
                                <input type="text" class="form-control" value="<?php echo $column2["string4"]; ?>" id="2string4">
                            </div>
                            <center>
                            <button type="button" class="btn btn-success font15 float-center" id="fewhakko2" onclick="javascript:bsettings(2);"><i class="fas fa-save"></i> เปลี่ยนการตั้งค่า</button>
                            </center>
                        </div>
                    </div>
                </div>

                


                <div class="col-md-6" style="padding:10px;">
                    <div class="card">
                    <center>
                        <h5 class="card-header">จัดการ Cookies</h5>
                        </center>
                        <div class="card-body">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">เรทราคา</span>
                                </div>
                                <input type="text" class="form-control" value="<?php echo $column3["string1"]; ?>" id="3string1">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">คุ้กกี้</span>
                                </div>
                                <input type="text" class="form-control" value="<?php echo $column3["string2"]; ?>" id="3string2">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">ไอดีกลุ่ม</span>
                                </div>
                                <input type="text" class="form-control" value="<?php echo $column3["string3"]; ?>" id="3string3">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">ลิ้งกลุ่ม</span>
                                </div>
                                <input type="text" class="form-control" value="<?php echo $column3["string4"]; ?>" id="3string4">
                            </div>
                            
                            <center><button type="button" class="btn btn-success font15" id="fewhakko3" onclick="javascript:bsettings(3);"><i class="fas fa-save"></i> เปลี่ยนการตั้งค่า</button></center><br>
                            <center><a class="btn btn-danger font15 text-white" herf="">วิธีเอา Cookies ในกลุ่ม! </a></center>
                        </div>
                    </div>
                </div>
                

                

                <div class="col-md-6 " style="padding:10px;">
                    <div class="card">
                    <center>
                        <h5 class="card-header">จัดการหน้าแรก</h5>
                        </center>
                        <div class="card-body">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">ชื่อเว็บ</span>
                                </div>
                                <input type="text" class="form-control" value="<?php echo $column5["string3"]; ?>" id="5string3">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">ดิสคอด</span>
                                </div>
                                <input type="text" class="form-control" value="<?php echo htmlspecialchars($column5["string2"]); ?>" id="5string2">
                            </div>

                            <center><button type="button" class="btn btn-success font15" id="fewhakko5" onclick="javascript:bsettings(5);"><i class="fas fa-save"></i> เปลี่ยนการตั้งค่า</button></center>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 " style="padding:10px;">
                    <div class="card">
                    <center>
                        <h5 class="card-header">จัดการ Recaptcha</h5>
                        </center>
                        <div class="card-body">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">PublicKey</span>
                                </div>
                                <input type="text" class="form-control" value="<?php echo $column6["string1"]; ?>" id="6string1">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">PrivateKey</span>
                                </div>
                                <input type="text" class="form-control" value="<?php echo $column6["string2"]; ?>" id="6string2">
                            </div>

                            <center><button type="button" class="btn btn-success font15" id="fewhakko6" onclick="javascript:bsettings(6);"><i class="fas fa-save"></i> เปลี่ยนการตั้งค่า</button></center>
                        </div>
                    </div>
                </div>

                

                <div class="modal fade" id="walletmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">รับโทเคนวอเลท</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="col-form-label" for="inputDefault">เบอร์โทรศัพท์</label>
                                    <input type="text" class="form-control" placeholder="กรอกเบอร์โทรศัพท์" id="phonemodal">
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label" for="inputDefault">พินหรือรหัสผ่าน</label>
                                    <input type="text" class="form-control" placeholder="กรอกพินหรือรหัสผ่าน" id="passmodal">
                                </div>

                                <div class="form-group" id="otprefzaza" style="display: none;">
                                    <label class="col-form-label" for="inputDefault">otpref ไม่ต้องกรอกอะไร</label>
                                    <input type="text" class="form-control" placeholder="ไม่ต้องกรอกไม่เข้าใจหรอว่ะ" id="otprefmodal">
                                </div>

                                <div class="form-group" id="otpmobilezaza" style="display: none;">
                                    <label class="col-form-label" for="inputDefault">otpmobile</label>
                                    <input type="text" class="form-control" placeholder="กรอกรหัสยืนยันที่ส่งไปในโทรศัพท์" id="otpmobilemodal">
                                </div>


                                <center><button type="button" class="btn btn-success" id="fewhakkoget1" name="fewhakkoget1" onclick="javascript:gettokenwallet(1);">รับ OTP</button></center>
                                <center><button type="button" class="btn btn-success" id="fewhakkoget2" name="fewhakkoget2" onclick="javascript:gettokenwallet(2);" style="display: none;">รับโทเคน</button></center>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>