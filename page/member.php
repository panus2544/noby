<div class="col-md-4" style="padding:10px;">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"> รายซื่อ ทั่งหมดในเว็ป</h4>
                <hr>
                <table class="table table-hover"  style="overflow-x:auto;">
                    <thead>
                        <tr>
                            <th class="font15" scope="col"><i class="fas fa-user" aria-hidden="true"></i> ผู้ใช้</th>
                            <th class="font15" scope="col">฿ พ้อย R$</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $SQLGetLogs = $odb -> query("SELECT * FROM `users` ORDER BY `date` DESC LIMIT 5");
                            while($getInfo = $SQLGetLogs -> fetch(PDO::FETCH_ASSOC)) {
                                echo 
                                '<tr>
                                    <td style="font-size:14px">'.$getInfo["username"].'</th>
                                    <td style="font-size:14px">'.number_format($getInfo["point"]).'พ้อย</th>
                                </tr>
                                ';
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


</div>