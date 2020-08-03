<center>
<div class="row justify-content-center">
                <div class="col-lg-90">
                    <div class="row">
                        <div class="col-lg-200 col-md-12 mb-90">
                            <div class="card">
                                <div class="card-body">
            <div class="card-body">
                <h4 class="card-title"> ตารางคิว</h4>
<div style="overflow-x:auto;">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th style="font-size:16px;" scope="col">วันที่</th>
							<th style="font-size:16px;" scope="col">ซื่อลูกค้า</th>
							<th style="font-size:16px;" scope="col">ซื่อใน Roblox</th>
                            <th style="font-size:16px;" scope="col">ราคา</th>
                            <th style="font-size:16px;" scope="col">โรบัค</th>
                            <th style="font-size:16px;" scope="col">สถานะ</th>
							
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $SQLGetLogs = $odb->query("SELECT * FROM `logidpass`  ORDER BY `date` DESC LIMIT 0, 90000");
                        while ($getInfo = $SQLGetLogs->fetch(PDO::FETCH_ASSOC)) {

                            if ($getInfo["status"] == "0") {
                                $date = date("Y-m-d, H:i:s", $getInfo['date']);
                                echo '<tr>';
                                echo '<td>' . $date . '</td>';
								echo '<td>' . $getInfo['user'] . '</td>';
								echo '<td>' . $getInfo['username'] . '</td>';
                                echo '<td>' .  number_format($getInfo['point']) . ' </td>';
                                echo '<td>' . number_format($getInfo['robux']) . ' </td>';
                                echo '<td><i class="fas fa-circle-notch fa-spin"></i> กำลังทำรายการ</td>';
                                echo '</tr>';
                            }
                            else if ($getInfo["status"] == "2") {
                                $date = date("Y-m-d, H:i:s", $getInfo['date']);
                                echo '<tr>';
                                echo '<td>' . $date . '</td>';
								echo '<td>' . $getInfo['user'] . '</td>';
								echo '<td>' . $getInfo['username'] . '</td>';
                                echo '<td>' . number_format($getInfo['point']). ' </td>';
                                echo '<td>' . number_format($getInfo['robux']) . ' </td>';
                                echo '<td style="color:#fc8e49;"><i class="fas fa-infinity"></i> รหัสผิดคืนพ้อยแล้ว</td>';
                                echo '</tr>';
                            }
                            else {
                                $date = date("Y-m-d, H:i:s", $getInfo['date']);
                                echo '<tr>';
                                echo '<td>' . $date . '</td>';
								echo '<td>' . $getInfo['user'] . '</td>';
								echo '<td>' . $getInfo['username'] . '</td>';
                                echo '<td>' . number_format($getInfo['point']) . ' </td>';
                                echo '<td>' . number_format($getInfo['robux']) . ' </td>';
                                echo '<td style="color: green;"><i class="fa fa-check"></i> เพิ่มโรบัคเรียบร้อย</td>';
                                echo '</tr>';
                            }
                            
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>