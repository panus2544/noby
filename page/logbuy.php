

               
<center>
<div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 mb-4">
                            <div class="card">
                                <div class="card-body">
            <div class="card-body">
                <h4 class="card-title"> การเติม Robux ล่าสุด</h4>
				<a class="btn btn-primary font15"href="?page=owo"><i class="fas fa-history"></i>&nbsp;เช๊คคนเติมเงินล่าสุด</a>
                <hr>
                <table class="table table-hover"  style="overflow-x:auto;">
                    <thead>
                        <tr>
                            <th class="font15" scope="col"><i class="fas fa-user" aria-hidden="true"></i> ผู้ใช้</th>
                            <th class="font15" scope="col">฿ จำนวนR$</th>
							<th class="font15" scope="col">฿ จำนวน Point</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $SQLGetLogs = $odb -> query("SELECT * FROM `robux` ORDER BY `date` DESC LIMIT 1000000");
							$date = date("Y-m-d, H:i:s", $getInfo['date']);
                            while($getInfo = $SQLGetLogs -> fetch(PDO::FETCH_ASSOC)) {
                                echo 
                                '<tr>
                                    <td style="font-size:14px">'.$getInfo["username"].'</th>
                                    <td style="font-size:14px">'.number_format($getInfo["robux"]).' R$</th>
									<td style="font-size:14px">'.number_format($getInfo["point"]).' R$</th>
					
                       
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
    </div>
	</center>


