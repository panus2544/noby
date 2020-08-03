<?php
if (isset($_SESSION["username"])) {
    header("Refresh: 0; url=?page=topup");
    exit();
}
?>
<link href="https://bunnybux.xyz/assets/css/fuckshit.css" rel="stylesheet">

<div class="row justify-content-md-center">
          <div class="col-sm-6">
            <div class="card" style="border-radius: 10px;">
              <h3 class="text-center" style="color : #888; margin-top: 15px;margin-bottom: 5px;">
<div class="text-center">

</div>
                   <i class="fa fa-user" aria-hidden="true"></i> ระบบสมาชิก
              </h3>
              <hr>
              

<div class="card-body">

            <div class="form-group">
                <label for="exampleInputEmail1">Username</label>
                <input type="text" class="form-control" id="usernamefew" placeholder="ซื่อผู้ใช้">
                <br>
                <label for="exampleInputEmail1">Password</label>
                <input type="password" class="form-control" id="password1few" placeholder="รหัสผ่าน">
                <br>
              <label for="exampleInputEmail1">Re-Password</label>
                <input type="password" class="form-control" id="password2few" placeholder="ยืนยันรหัสผ่าน">
                <br>
              <label for="exampleInputEmail1">Gmail / Email</label>
                <input type="email" class="form-control" id="emailfew" placeholder="อีเมล์">
                <br>
                <br>
                <button type="button" class="btn btn-success btn-block" style="font-size: 14.5px;" name="fewhakko" id="fewhakko" onclick="javascript:register();"><i class="fas fa-user-plus" aria-hidden="true"></i> สมัครสมาชิก</button>
                <a class="btn btn-danger btn-block font15" target="_blank" href="?page=login"><i class="fas fa-sign-in-alt"></i> เข้าสู่ระบบ</a>
                <a class="btn btn-info btn-block font15" target="_blank" href="http://beta.luxyz.cc/discord/login.php"><i class="fab fa-discord fa-fw mr-1"></i> Register With Discord</a>
            </div>
        </div>
      
</div>
</div>
</div>
</div>




