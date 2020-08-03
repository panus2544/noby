<link href="assets/css/fuckshit.css" rel="stylesheet">

<div class="row justify-content-md-center">
          <div class="col-sm-6">
            <div class="card" style="border-radius: 10px;">
              <h3 class="text-center" style="color : #888; margin-top: 15px;margin-bottom: 5px;">
<div class="text-center">

</div>
                   <i class="fa fa-user" aria-hidden="true"></i> เข้าสู่ระบบ
              </h3>
              <hr>

        
        <div class="card-body">

        
        <div class="card-body">
            <label for="exampleInputEmail1" style="color: black;">Username</label>
            <input   type="text" class="form-control" id="usernamefew" placeholder="ซื่อผู้ใช้งาน">
            <br>
           <label for="exampleInputEmail1" style="color: black;">Password</label>
            <input   type="password" class="form-control" id="passwordfew" placeholder="รหัสผ่าน">
            <br>
            
              
		

            <button type="button" class="btn btn-success btn-block font15"   name="fewhakko" id="fewhakko" onclick="javascript:login();"><i class="fas fa-sign-in-alt" aria-hidden="true"></i> เข้าสู่ระบบ</button>
            <a class="btn btn-danger btn-block font15" target="_blank" href="?page=register"><i class="fas fa-user-plus"></i> สมัครสมาชิก</a>
            <a class="btn btn-info btn-block font15" target="_blank" href="http://beta.luxyz.cc/discord/login.php"><i class="fab fa-discord fa-fw mr-1"></i> Login With Discord</a>
        </div>
       
</div>
</div>
</div>
</div>



<script type="text/javascript">
  $(function(){
    var getData=$.ajax({
      url:"partials/_status.php",
      data:"rev=1",
      async:false,
      success:function(getData){
        $("div#div_Status").html(getData);
      }
    }).responseText;

    setInterval(function(){
      var getData=$.ajax({
        url:"partials/_status.php",
        data:"rev=1",
        async:false,
        success:function(getData){
          $("div#div_Status").html(getData);
        }
      }).responseText;
    },10000);
  });

  // To disable right click
  document.addEventListener('contextmenu', event => event.preventDefault());

  // To disable F12 options
  document.onkeypress = function (event) {
    event = (event || window.event);
    if (event.keyCode == 123) {
      return false;
    } else if (event.ctrlKey && event.shiftKey && event.keyCode == 73) {
      return false;
    }
  }

  document.onmousedown = function (event) {
    event = (event || window.event);
    if (event.keyCode == 123) {
      return false;
    } else if (event.ctrlKey && event.shiftKey && event.keyCode == 73) {
      return false;
    }
  }

  document.onkeydown = function (event) {
    event = (event || window.event);
    if (event.keyCode == 123) {
      return false;
    } else if (event.ctrlKey && event.shiftKey && event.keyCode == 73) {
      return false;
    }
  }

  // To To Disable ctrl+c, ctrl+u
  jQuery(document).ready(function($)
  {
    $(document).keydown(function(event)
    {
      var pressedKey = String.fromCharCode(event.keyCode).toLowerCase();
      if (event.ctrlKey && (pressedKey == "u")) {
        return false;
      }
    });
  });
</script>