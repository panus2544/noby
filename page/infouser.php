<?php
if (empty($_SESSION["username"])) {
    header("Refresh: 0; url=?page=login");
    exit();
}
?>

<div class="card">
    <div class="card-body">
        <h4 class="card-title"><i class="fas fa-address-card" aria-hidden="true"></i> ข้อมูลส่วนตัว</h4>
        <hr>
        <div class="container">
            <center>
                <div class="form-group">
                    <label class="col-form-label" for="inputDefault">รหัสผ่านเก่า</label>
                    <input type="password" class="form-control" maxlength="32" placeholder="กรอกรหัสผ่านเก่า" id="passwordold">
                </div>
                <div class="form-group">
                    <label class="col-form-label" for="inputDefault">รหัสผ่านใหม่</label>
                    <input type="password" class="form-control" maxlength="32" placeholder="กรอกรหัสผ่านใหม่" id="passwordnew1">
                </div>
                <div class="form-group">
                    <label class="col-form-label" for="inputDefault">รหัสผ่านใหม่อีกครั้ง</label>
                    <input type="password" class="form-control" maxlength="32" placeholder="กรอกรหัสผ่านใหม่อีกครั้ง" id="passwordnew2">
                </div>
                <button type="submit" class="btn btn-warning btn-rounded btn-block z-depth-0 my-4 waves-effect font15" id="fewhakko1" name="fewhakko1" onclick="javascript:changepassword();">เปลี่ยนรหัสผ่าน</button>
            </center>
        </div>
    </div>
</div>