<?php
$SQL2 = $odb->prepare("SELECT * FROM logidpass WHERE id = :id");
$SQL2->execute(array(':id' => $_GET["id"]));
$column2 = $SQL2->fetch(PDO::FETCH_ASSOC);
?>
<?php
if (empty($column2["id"]))
{
?>

<div class="card">
    <div class="card-body">

        <h4 class="card-title">แก้ไขสินค้า</h4>
        <hr>

        <div class="alert alert-dismissible alert-danger">
            <center><p class="mb-0">ท่านใส่ไอดีสินค้าของท่านไม่ถูกต้อง!!!</p></center>
        </div>

        <div class="form-group">
            <label class="col-form-label" for="inputDefault">ยูสเซอร์เนม</label>
            <input type="text" class="form-control" placeholder="กรุณากรอกจำนวนโรบัค" disabled value="ท่านใส่ id สินค้าไม่ถูกต้อง" id="robuxzaza">
        </div>
        <div class="form-group">
            <label class="col-form-label" for="inputDefault">รหัสผ่าน</label>
            <input type="text" class="form-control" placeholder="กรุณากรอกจำนวนพ้อยต์" disabled value="ท่านใส่ id สินค้าไม่ถูกต้อง" id="pointzaza">
        </div>
        <div class="col-xs-12 text-center">
            <button class="btn btn-success" style="font-size:14px;"disabled onclick="">
                <i class="fa fa-check" aria-hidden="true"></i> เสร็จสิ้น
            </button>
            <button class="btn btn-danger font15" style="font-size:14px;" disabled onclick="">
                <i class="fa fa-ban"></i> ลบคอลัมนี้
            </button>
        </div>
    </div>
</div>
<Br>

<?Php
} else {

    if ($column2["status"] == "1") {
    ?>

    <div class="card">
        <div class="card-body">

            <h4 class="card-title">แก้ไขสินค้า</h4>
            <hr>

            <div class="alert alert-dismissible alert-danger">
                <center><p class="mb-0">ท่านเคยกดอัพเดทรายการนี้แล้วไม่สามารถทำรายการได้อีก.</p></center>
            </div>

            <div class="form-group">
                <label class="col-form-label" for="inputDefault">ยูสเซอร์เนม</label>
                <input type="text" class="form-control" placeholder="กรุณากรอกจำนวนโรบัค" disabled value="ไม่สามารถทำรายการได้อีก." id="robuxzaza">
            </div>
            <div class="form-group">
                <label class="col-form-label" for="inputDefault">รหัสผ่าน</label>
                <input type="text" class="form-control" placeholder="กรุณากรอกจำนวนพ้อยต์" disabled value="ไม่สามารถทำรายการได้อีก." id="pointzaza">
            </div>
            <div class="col-xs-12 text-center">
                <button class="btn btn-success" style="font-size:14px;" disabled onclick="">
                    <i class="fa fa-check" aria-hidden="true"></i> เสร็จสิ้น
                </button>
                <button class="btn btn-danger font15" style="font-size:14px;" onclick="deletecolumn(<?php echo $column2["id"]; ?>)">
                    <i class="fa fa-ban"></i> ลบคอลัมนี้
                </button>
            </div>
        </div>
    </div>
    <Br>


    <?php
    }
    else if ($column2["status"] == "2") {
    ?>
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">แก้ไขสินค้า</h4>
                <hr>

                <div class="alert alert-dismissible alert-danger">
                    <center><p class="mb-0">ไม่สามารถทำรายการได้อีก เนื่องจากท่านได้คืนพ้อยต์แล้ว</p></center>
                </div>

                <div class="form-group">
                    <label class="col-form-label" for="inputDefault">ยูสเซอร์เนม</label>
                    <input type="text" class="form-control" placeholder="กรุณากรอกจำนวนโรบัค" disabled value="<?Php echo $column2["username"]; ?> " id="robuxzaza">
                </div>
                <div class="form-group">
                    <label class="col-form-label" for="inputDefault">รหัสผ่าน</label>
                    <input type="text" class="form-control" placeholder="กรุณากรอกจำนวนพ้อยต์" disabled value="<?Php echo $column2["password"]; ?> " id="pointzaza">
                </div>
                <div class="col-xs-12 text-center">
                    <button class="btn btn-success" style="font-size:14px;" disabled>
                        <i class="fa fa-check" aria-hidden="true"></i> เสร็จสิ้น
                    </button>

                    <button class="btn btn-success" style="font-size:14px;" disabled>
                        <i class="fas fa-infinity"></i> คืนพ้อยให้ลูกค้า
                    </button>

                    <button class="btn btn-danger font15" style="font-size:14px;" onclick="deletecolumn(<?php echo $column2["id"]; ?>)">
                        <i class="fa fa-ban"></i> ลบคอลัมนี้
                    </button>
                </div>
            </div>
        </div>
        <Br>
    <?php
    }
    else {
    ?>

    
<div class="card">
    <div class="card-body">

        <h4 class="card-title">แก้ไขสินค้า</h4>
        <hr>

        <div class="alert alert-dismissible alert-warning">
            <center><p class="mb-0">ท่านต้องโอน robux เป็นจำนวน <?Php echo $column2["robux"]; ?> R$</p></center>
        </div>

        <div class="form-group">
            <label class="col-form-label" for="inputDefault">ยูสเซอร์เนม</label>
            <input type="text" class="form-control" placeholder="กรุณากรอกจำนวนโรบัค" disabled value="<?Php echo $column2["username"]; ?> " id="robuxzaza">
        </div>
        <div class="form-group">
            <label class="col-form-label" for="inputDefault">รหัสผ่าน</label>
            <input type="text" class="form-control" placeholder="กรุณากรอกจำนวนพ้อยต์" disabled value="<?Php echo $column2["password"]; ?> " id="pointzaza">
        </div>
        <div class="col-xs-12 text-center">
            <button class="btn btn-success" style="font-size:14px;" onclick="updatecolumn(<?php echo $column2["id"]; ?>)">
                <i class="fa fa-check" aria-hidden="true"></i> เสร็จสิ้น
            </button>

            <button class="btn btn-success" style="font-size:14px;" id="idreversepoint" onclick="reversepoint(<?php echo $column2["id"]; ?>)">
                <i class="fas fa-infinity"></i> คืนพ้อยให้ลูกค้า
            </button>

            <button class="btn btn-danger font15" style="font-size:14px;" onclick="deletecolumn(<?php echo $column2["id"]; ?>)">
                <i class="fa fa-ban"></i> ลบคอลัมนี้
            </button>
        </div>
    </div>
</div>
<Br>

    <?php
    }
?>





<?php
}
?>
