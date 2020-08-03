 <center>
 <div class="col-md-4" style="padding:5px;">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"> Topup Logger</h4>
                <hr>
                <table class="table table-hover"  style="overflow-x:auto;">
                    <thead>
                        <tr>
                            <th class="font15" scope="col"><i class="fas fa-user" aria-hidden="true"></i> ผู้ใช้</th>
                            <th class="font15" scope="col">฿ จำนวนเงิน</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $SQLGetLogs = $odb -> query("SELECT * FROM `topup` ORDER BY `date` DESC LIMIT 900");
                            while($getInfo = $SQLGetLogs -> fetch(PDO::FETCH_ASSOC)) {
                                echo 
                                '<tr>
                                    <td style="font-size:14px">'.$getInfo["username"].'</th>
                                    <td style="font-size:14px">'.number_format($getInfo["amount"]).' บาท</th>
                                </tr>
                                ';
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </center>