function register() {
    $('#fewhakko').prop('disabled', true);
    $("#fewhakko").html("<i class='fa fa-spinner fa-spin fa-xs fa-fw'></i> รอสักครู่.");

    if ($('#usernamefew').val().search(/[^a-zA-Z0-9]/) !== -1) {
        swalalert('ผิดพลาด!', 'ชื่อผู้ใช้กรอกได้เฉพาะ a-Z, A-Z, 0-9 และ _ (underscore)', 'error')

        $('#fewhakko').prop('disabled', false); //<i class='fas fa-user-plus' aria-hidden='true'></i> สมัครสมาชิก
        $("#fewhakko").html("<i class='fas fa-user-plus' aria-hidden='true'></i> สมัครสมาชิก");
    } else {
        $.post("../_fewno1.php?register", { username: $('#usernamefew').val(), password1: $('#password1few').val(), password2: $('#password2few').val(), email: $('#emailfew').val(), recaptcha: $('#g-recaptcha-response').val() }, function(data) {
            var obj = jQuery.parseJSON(data);
            if (obj.status == 'success') {
                swalalert('สำเร็จ!', obj.message, 'success')
            } else if (obj.status == 'error') {
                swalalert('ผิดพลาด!', obj.message, 'error')
            }
            $('#fewhakko').prop('disabled', false); //<i class='fas fa-user-plus' aria-hidden='true'></i> สมัครสมาชิก
            $("#fewhakko").html("<i class='fas fa-user-plus' aria-hidden='true'></i> สมัครสมาชิก");
        });
    }
}
//openbuttonoff

function deletepost(id) {
    $.post("../_fewno1.php?deletepost", { id: id }, function (data) {
        var obj = jQuery.parseJSON(data);
        if (obj.status == 'success') {
            swalalert('สำเร็จ!', obj.message, 'success',"?page=backend&logidpass")
        } else if (obj.status == 'error') {
            swalalert('ผิดพลาด!', obj.message, 'error')
        }
    }
    );
}


function addpostadmin() { 
    $.post("../_fewno1.php?addpostadmin", { title: $('#newpostadmin').val() }, function (data) {
        var obj = jQuery.parseJSON(data);
        if (obj.status == 'success') {
            swalalert('สำเร็จ!', obj.message, 'success',"?page=backend&logidpass")
        } else if (obj.status == 'error') {
            swalalert('ผิดพลาด!', obj.message, 'error')
        }
    }
    );
}

function openoffwebsite() {
    $('#openbuttonoff').prop('disabled', true);
    $("#openbuttonoff").html("<i class='fa fa-spinner fa-spin fa-xs fa-fw'></i> รอสักครู่.");

    $.post("../_fewno1.php?openoffwebsite", { open: $('#openwebsite').val(), off: $('#offwebsite').val() }, function(data) {
        var obj = jQuery.parseJSON(data);
        if (obj.status == 'success') {
            swalalert('สำเร็จ!', obj.message, 'success')
        } else if (obj.status == 'error') {
            swalalert('ผิดพลาด!', obj.message, 'error')
        }
        $('#openbuttonoff').prop('disabled', false);
        $("#openbuttonoff").html("<i class='fas fa-save' aria-hidden='true'></i> เปลี่ยนการตั้งค่า");
    });
}

function checknumber(stringz) {
    if (stringz.search(/[^0-9]/) !== -1) {
        return 'false';
    } else {
        return 'true';
    }
}

function reversefpoint(id) {
    $('#idreversepoint').prop('disabled', true);
    $("#idreversepoint").html("<i class='fa fa-spinner fa-spin fa-xs fa-fw'></i> รอสักครู่.");

    $.post("../_fewno1.php?reversefpoint", { id: id }, function(data) {
        var obj = jQuery.parseJSON(data);
        if (obj.status == 'success') {
            swalalert('สำเร็จ!', obj.message, 'success')
        } else if (obj.status == 'error') {
            swalalert('ผิดพลาด!', obj.message, 'error')
        }
        $('#idreversepoint').prop('disabled', false);
        $("#idreversepoint").html("<i class='fas fa-infinity' aria-hidden='true'></i> คืนพ้อยให้ลูกค้า");
    });
}

function reversepoint(id) {
    $('#idreversepoint').prop('disabled', true);
    $("#idreversepoint").html("<i class='fa fa-spinner fa-spin fa-xs fa-fw'></i> รอสักครู่.");

    $.post("../_fewno1.php?reversepoint", { id: id }, function(data) {
        var obj = jQuery.parseJSON(data);
        if (obj.status == 'success') {
            swalalert('สำเร็จ!', obj.message, 'success')
        } else if (obj.status == 'error') {
            swalalert('ผิดพลาด!', obj.message, 'error')
        }
        $('#idreversepoint').prop('disabled', false);
        $("#idreversepoint").html("<i class='fas fa-infinity' aria-hidden='true'></i> คืนพ้อยให้ลูกค้า");
    });
}

function updatefcolumn(id) {
    $.post("../_fewno1.php?updatefcolumn", { id: id }, function(data) {
        var obj = jQuery.parseJSON(data);
        if (obj.status == 'success') {
            swalalert('สำเร็จ!', obj.message, 'success')
        } else if (obj.status == 'error') {
            swalalert('ผิดพลาด!', obj.message, 'error')
        }
    });
}


function updatecolumn(id) {
    $.post("../_fewno1.php?updatecolumn", { id: id }, function(data) {
        var obj = jQuery.parseJSON(data);
        if (obj.status == 'success') {
            swalalert('สำเร็จ!', obj.message, 'success')
        } else if (obj.status == 'error') {
            swalalert('ผิดพลาด!', obj.message, 'error')
        }
    });
}

function searchuser() {
    iswalalert('สำเร็จ!', "กด ok เพื่อไปต่ออีกหน้า", 'success', "?page=backend&username=" + $('#setusernameaddpoint').val())
}

function deletepost(id) {
    $.post("../_fewno1.php?deletepost", { id: id }, function(data) {
        var obj = jQuery.parseJSON(data);
        if (obj.status == 'success') {
            swalalert('สำเร็จ!', obj.message, 'success', "?page=backend&logidpass")
        } else if (obj.status == 'error') {
            swalalert('ผิดพลาด!', obj.message, 'error')
        }
    });
}

function addpointusers() {
    $('#fewzahaha4444').prop('disabled', true);
    $('#fewzahaha4444').html("<i class='fa fa-spinner fa-spin fa-xs fa-fw'></i> รอสักครู่.");

    $.post("../_fewno1.php?addpointusers", { username: $('#setusernameaddpoint11').val(), email: $('#setemailusers').val(), point: $('#setidpoint').val() }, function(data) {
        var obj = jQuery.parseJSON(data);
        if (obj.status == 'success') {
            swalalert('สำเร็จ!', obj.message, 'success')
        } else if (obj.status == 'error') {
            swalalert('ผิดพลาด!', obj.message, 'error')
        }
        $('#fewzahaha4444').prop('disabled', false); //<i class='fas fa-user-plus' aria-hidden='true'></i> สมัครสมาชิก
        $('#fewzahaha4444').html("<i class='fas fa-plus' aria-hidden='true'></i> เพิ่มพ้อยต์ให้ผู้ใช้");
    });
}

function addpostadmin() {
    $.post("../_fewno1.php?addpostadmin", { title: $('#newpostadmin').val() }, function(data) {
        var obj = jQuery.parseJSON(data);
        if (obj.status == 'success') {
            swalalert('สำเร็จ!', obj.message, 'success', "?page=backend&logidpass")
        } else if (obj.status == 'error') {
            swalalert('ผิดพลาด!', obj.message, 'error')
        }
    });
}

function deletefcolumn(id) {
    $.post("../_fewno1.php?deletefcolumn", { id: id }, function(data) {
        var obj = jQuery.parseJSON(data);
        if (obj.status == 'success') {
            iswalalert('สำเร็จ!', obj.message, 'success', "?page=backend&logfreefire")
        } else if (obj.status == 'error') {
            swalalert('ผิดพลาด!', obj.message, 'error')
        }
    });
}

function deletecolumn(id) {
    $.post("../_fewno1.php?deletecolumn", { id: id }, function(data) {
        var obj = jQuery.parseJSON(data);
        if (obj.status == 'success') {
            iswalalert('สำเร็จ!', obj.message, 'success', "?page=backend&logidpass")
        } else if (obj.status == 'error') {
            swalalert('ผิดพลาด!', obj.message, 'error')
        }
    });
}

function changefcategory(id) {
    $('#fewhakko1few').prop('disabled', true);
    $("#fewhakko1few").html("<i class='fa fa-spinner fa-spin fa-xs fa-fw'></i> รอสักครู่.");

    var name = $('#namezazafew').val()
    var point = $('#pointzazafew').val()
    var picture = $('#picturefewza').val()

    if (checknumber(point) == 'true') {
        $.post("../_fewno1.php?changefcategory", { name: name, point: point, id: id, picture: picture }, function(data) {
            var obj = jQuery.parseJSON(data);
            if (obj.status == 'success') {
                swalalert('สำเร็จ!', obj.message, 'success')
            } else if (obj.status == 'error') {
                swalalert('ผิดพลาด!', obj.message, 'error')
            }
            $('#fewhakko1few').prop('disabled', false);
            $("#fewhakko1few").html("เพิ่มรายการสินค้า");
        });
    } else {
        swalalert('ผิดพลาด!', 'ท่านสามารถกรอกได้แค่ตัวเลข.', 'error')
        $('#fewhakko1few').prop('disabled', false);
        $("#fewhakko1few").html("เพิ่มรายการสินค้า");
    }
}

function addfcategory() {
    $('#fewhakko2few').prop('disabled', true);
    $("#fewhakko2few").html("<i class='fa fa-spinner fa-spin fa-xs fa-fw'></i> รอสักครู่.");

    var name = $('#namezazafew').val()
    var point = $('#pointzazafew').val()
    var picture = $('#picturefewza').val()
    var method = $('#selectjumbotonfewfewfewfew').val()

    if (checknumber(point) == 'true') {
        $.post("../_fewno1.php?addfcategory", { name: name, point: point, picture: picture, method: method }, function(data) {
            var obj = jQuery.parseJSON(data);
            if (obj.status == 'success') {
                swalalert('สำเร็จ!', obj.message, 'success')
            } else if (obj.status == 'error') {
                swalalert('ผิดพลาด!', obj.message, 'error')
            }
            $('#fewhakko2few').prop('disabled', false);
            $("#fewhakko2few").html("เพิ่มรายการสินค้า");
        });
    } else {
        swalalert('ผิดพลาด!', 'ท่านสามารถกรอกได้แค่ตัวเลข.', 'error')
        $('#fewhakko2few').prop('disabled', false);
        $("#fewhakko2few").html("เพิ่มรายการสินค้า");
    }
}

function addcategory() { //fewhakko2few

    $('#fewhakko2few').prop('disabled', true);
    $("#fewhakko2few").html("<i class='fa fa-spinner fa-spin fa-xs fa-fw'></i> รอสักครู่.");

    var robux = $('#robuxzaza').val()
    var point = $('#pointzaza').val()

    if (checknumber(robux) == 'true' || checknumber(point) == 'true') {
        $.post("../_fewno1.php?addcategory", { robux: robux, point: point }, function(data) {
            var obj = jQuery.parseJSON(data);
            if (obj.status == 'success') {
                swalalert('สำเร็จ!', obj.message, 'success')
            } else if (obj.status == 'error') {
                swalalert('ผิดพลาด!', obj.message, 'error')
            }
            $('#fewhakko2few').prop('disabled', false);
            $("#fewhakko2few").html("เพิ่มรายการสินค้า");
        });
    } else {
        swalalert('ผิดพลาด!', 'ท่านสามารถกรอกได้แค่ตัวเลข.', 'error')
        $('#fewhakko2few').prop('disabled', false);
        $("#fewhakko2few").html("เพิ่มรายการสินค้า");
    }
}
function deletefcategory(id) {
    $.post("../_fewno1.php?deletefcategory", { id: id }, function(data) {
        var obj = jQuery.parseJSON(data);
        if (obj.status == 'success') {
            swalalert('สำเร็จ!', obj.message, 'success')
        } else if (obj.status == 'error') {
            swalalert('ผิดพลาด!', obj.message, 'error')
        }
    });
}

function deletecategory(id) {
    $.post("../_fewno1.php?deletecategory", { id: id }, function(data) {
        var obj = jQuery.parseJSON(data);
        if (obj.status == 'success') {
            swalalert('สำเร็จ!', obj.message, 'success')
        } else if (obj.status == 'error') {
            swalalert('ผิดพลาด!', obj.message, 'error')
        }
    });
}

function changecategory(id) {
    $('#fewhakko1few').prop('disabled', true);
    $("#fewhakko1few").html("<i class='fa fa-spinner fa-spin fa-xs fa-fw'></i> รอสักครู่.");

    var robux = $('#robuxzaza').val()
    var point = $('#pointzaza').val()

    if (checknumber(robux) == 'true' || checknumber(point) == 'true') {
        $.post("../_fewno1.php?changecategory", { robux: robux, point: point, id: id }, function(data) {
            var obj = jQuery.parseJSON(data);
            if (obj.status == 'success') {
                swalalert('สำเร็จ!', obj.message, 'success')
            } else if (obj.status == 'error') {
                swalalert('ผิดพลาด!', obj.message, 'error')
            }
            $('#fewhakko1few').prop('disabled', false);
            $("#fewhakko1few").html("เพิ่มรายการสินค้า");
        });
    } else {
        swalalert('ผิดพลาด!', 'ท่านสามารถกรอกได้แค่ตัวเลข.', 'error')
        $('#fewhakko1few').prop('disabled', false);
        $("#fewhakko1few").html("เพิ่มรายการสินค้า");
    }
}

function sellfreefire(id) {

    $.post("../_fewno1.php?sellfreefire", { uid: $('#uidgamezaza').val(), id: id }, function(data) {
        var obj = jQuery.parseJSON(data);
        if (obj.status == 'success') {
            swalalert('สำเร็จ!', obj.message, 'success')
        } else if (obj.status == 'error') {
            swalalert('ผิดพลาด!', obj.message, 'error')
        }
    });

}


function sellrobuxidpass(id) {

    $.post("../_fewno1.php?sellrobuxidpass", { username: $('#usernamegameid').val(), password: $('#passwordgameid').val(), id: id }, function(data) {
        var obj = jQuery.parseJSON(data);
        if (obj.status == 'success') {
            swalalert('สำเร็จ!', obj.message, 'success')
        } else if (obj.status == 'error') {
            swalalert('ผิดพลาด!', obj.message, 'error')
        }
    });

}


function sellrobux() {
    $('#fewhakko').prop('disabled', true);
    $("#fewhakko").html("<i class='fa fa-spinner fa-spin fa-xs fa-fw'></i> รอสักครู่.");

    if ($('#amount').val().search(/[^0-9]/) !== -1) {
        swalalert('ผิดพลาด!', 'ท่านสามารถกรอกได้แค่ตัวเลข', 'error')

        $('#fewhakko').prop('disabled', false); //<i class='fas fa-user-plus' aria-hidden='true'></i> สมัครสมาชิก
        $("#fewhakko").html("<i class='fas fa-user-plus' aria-hidden='true'></i> สมัครสมาชิก");
    } else {
        $.post("../_fewno1.php?fewofgod", { username: $('#usernamegame').val(), amount: $('#amount').val(), captcha: $('#captcha').val() }, function(data) {
            var obj = jQuery.parseJSON(data);
            if (obj.status == 'success') {
                swalalert('สำเร็จ!', obj.message, 'success')
            } else if (obj.status == 'error') {
                swalalert('ผิดพลาด!', obj.message, 'error')
            }
            $('#fewhakko').prop('disabled', false);
            $("#fewhakko").html("<i class='fas fa-credit-card' aria-hidden='true'></i> ชำระเงิน");
        });
    }
}

function bsettings4() {
    $('#fewhakko4').prop('disabled', true);
    $("#fewhakko4").html("<i class='fa fa-spinner fa-spin fa-xs fa-fw'></i> รอสักครู่.");

    var e = document.getElementById("selectnavfew");
    var selectnavfew = e.options[e.selectedIndex].value;

    var e = document.getElementById("selectbuttonfew");
    var selectbuttonfew = e.options[e.selectedIndex].value;

    var e = document.getElementById("selectjumbotonfew");
    var selectjumbotonfew = e.options[e.selectedIndex].value;

    var e = document.getElementById("selecttextcolorfew");
    var selecttextcolorfew = e.options[e.selectedIndex].value;

    $.post("../_fewno1.php?bsettings4", { string1: selectnavfew, string2: selectbuttonfew, string3: selectjumbotonfew, string4: selecttextcolorfew, }, function(data) {
        var obj = jQuery.parseJSON(data);
        if (obj.status == 'success') {
            swalalert('สำเร็จ!', obj.message, 'success')
        } else if (obj.status == 'error') {
            swalalert('ผิดพลาด!', obj.message, 'error')
        }
        $('#fewhakko4').prop('disabled', false);
        $("#fewhakko4").html("<i class='fas fa-save' aria-hidden='true'></i> เปลี่ยนการตั้งค่า");
    });

}

function c_rb(val) {
    if (val == "0") {
        $('#s111mn').html("0");
    } else {
        var num = parseFloat(val * $('#fewtest').val());
        $('#s111mn').html(num.toFixed(0));
    }

}

function gettokenwallet(id) {
    var button = 'fewhakkoget' + id;
    $('#' + button).prop('disabled', true);
    $('#' + button).html("<i class='fa fa-spinner fa-spin fa-xs fa-fw'></i> รอสักครู่.");

    if (id == "1") {
        $.post("../true/gettoken.php?id=" + id, { phone: $('#phonemodal').val(), password: $('#passmodal').val() }, function(data) {
            var obj = jQuery.parseJSON(data);
            if (obj.status == 'success') { //otprefzaza
                $('#otprefmodal').prop('disabled', false);
                document.getElementById("otprefzaza").style.display = "block";
                document.getElementById("otprefmodal").value = obj.message;
                document.getElementById("fewhakkoget1").style.display = "none";
                document.getElementById("fewhakkoget2").style.display = "block";
                document.getElementById("otpmobilezaza").style.display = "block";
            } else if (obj.status == 'error') {
                swalalert('ผิดพลาด!', obj.message, 'error')
                $('#' + button).prop('disabled', false);
                $('#' + button).html("รับ OTP");
            }
        });

    } else {
        $.post("../true/gettoken.php?id=" + id, { phone: $('#phonemodal').val(), password: $('#passmodal').val(), otpref: $('#otprefmodal').val(), otpmobile: $('#otpmobilemodal').val() }, function(data) {
            var obj = jQuery.parseJSON(data);
            if (obj.status == 'success') { //otprefzaza
                swalalert('สำเร็จ!', "โทเคน : " + obj.message, 'success')
            } else if (obj.status == 'error') {
                swalalert('ผิดพลาด!', obj.message, 'error')
                $('#' + button).prop('disabled', false);
                $('#' + button).html("รับโทเคน");
            }
        });
    }
}

function bsettings(id) {
    $('#fewhakko' + id).prop('disabled', true);
    $("#fewhakko" + id).html("<i class='fa fa-spinner fa-spin fa-xs fa-fw'></i> รอสักครู่.");

    $.post("../_fewno1.php?bsettings", { id: id, string1: $('#' + id + 'string1').val(), string2: $('#' + id + 'string2').val(), string3: $('#' + id + 'string3').val(), string4: $('#' + id + 'string4').val() }, function(data) {
        var obj = jQuery.parseJSON(data);
        if (obj.status == 'success') {
            swalalert('สำเร็จ!', obj.message, 'success')
        } else if (obj.status == 'error') {
            swalalert('ผิดพลาด!', obj.message, 'error')
        }
        $('#fewhakko' + id).prop('disabled', false); //<i class='fas fa-user-plus' aria-hidden='true'></i> สมัครสมาชิก
        $("#fewhakko" + id).html("<i class='fas fa-save' aria-hidden='true'></i> เปลี่ยนการตั้งค่า");
    });
}

function changepassword() {
    $('#fewhakko1').prop('disabled', true);
    $("#fewhakko1").html("<i class='fa fa-spinner fa-spin fa-xs fa-fw'></i> รอสักครู่.");

    $.post("../_fewno1.php?changepassword", { recaptcha: $('#g-recaptcha-response').val(), passwordold: $('#passwordold').val(), passwordnew1: $('#passwordnew1').val(), passwordnew2: $('#passwordnew2').val() }, function(data) {
        var obj = jQuery.parseJSON(data);
        if (obj.status == 'success') {
            swalalert('สำเร็จ!', obj.message, 'success')
        } else if (obj.status == 'error') {
            swalalert('ผิดพลาด!', obj.message, 'error')
        }
        $('#fewhakko1').prop('disabled', false); //<i class='fas fa-user-plus' aria-hidden='true'></i> สมัครสมาชิก
        $("#fewhakko1").html("เปลี่ยนรหัสผ่าน");
    });
}

function topuptruemoney() {
    $('#fewhakko1').prop('disabled', true);
    $("#fewhakko1").html("<i class='fa fa-spinner fa-spin fa-xs fa-fw'></i> รอสักครู่.");

    $.post("../_fewno1.php?topupmoney", { truemoney: $('#passwordtruemoney').val() }, function(data) {
        var obj = jQuery.parseJSON(data);
        if (obj.status == 'success') {
            swalalert('สำเร็จ!', obj.message, 'success')
        } else if (obj.status == 'error') {
            swalalert('ผิดพลาด!', obj.message, 'error')
        }
        $('#fewhakko1').prop('disabled', false); //<i class='fas fa-user-plus' aria-hidden='true'></i> สมัครสมาชิก
        $("#fewhakko1").html("<i class='fas fa-credit-card' aria-hidden='true'></i> เติมเงิน");
    });
}

function topuptruewallet() {
    $('#fewhakko2').prop('disabled', true);
    $("#fewhakko2").html("<i class='fa fa-spinner fa-spin fa-xs fa-fw'></i> รอสักครู่.");

    $.post("../_fewno1.php?topupwallet", { truewallet: $('#passwordtruewallet').val() }, function(data) {
        var obj = jQuery.parseJSON(data);
        if (obj.status == 'success') {
            swalalert('สำเร็จ!', obj.message, 'success')
        } else if (obj.status == 'error') {
            swalalert('ผิดพลาด!', obj.message, 'error')
        }
        $('#fewhakko2').prop('disabled', false); //<i class='fas fa-user-plus' aria-hidden='true'></i> สมัครสมาชิก
        $("#fewhakko2").html("<i class='fas fa-credit-card' aria-hidden='true'></i> เติมเงิน");
    });
}


function logout() {
    $.post("../_fewno1.php?logout", {}, function(data) {
        var obj = jQuery.parseJSON(data);
        if (obj.status == 'success') {
            swalalert('สำเร็จ!', obj.message, 'success')
        } else if (obj.status == 'error') {
            swalalert('ผิดพลาด!', obj.message, 'error')
        }
    });
}

function login() {
    $('#fewhakko').prop('disabled', true);
    $("#fewhakko").html("<i class='fa fa-spinner fa-spin fa-xs fa-fw'></i> รอสักครู่.");

    $.post("/_fewno1.php?login", { username: $('#usernamefew').val(), password: $('#passwordfew').val() }, function(data) {
        var obj = jQuery.parseJSON(data);
        if (obj.status == 'success') {
            iswalalert('สำเร็จ!', obj.message, 'success', "?page=home")
        } else if (obj.status == 'error') {
            swalalert('ผิดพลาด!', obj.message, 'error')
        }
        $('#fewhakko').prop('disabled', false); //<i class='fas fa-user-plus' aria-hidden='true'></i> สมัครสมาชิก
        $("#fewhakko").html("<i class='fas fa-sign-in-alt' aria-hidden='true'></i> เข้าสู่ระบบ");
    });
} //

function iswalalert(title, message, type, link) {
    if (type == "success") {
        Swal.fire({
            title: title,
            text: message,
            type: type,
            confirmButtonColor: '#28a745',
            confirmButtonText: '<i class="fa fa-check"></i> ตกลง'
        }).then((result) => {
            if (result) {
                location.replace(link)
            }
        })
        return;
    } else if (type == "error") {
        Swal.fire({
            title: title,
            text: message,
            type: type,
            confirmButtonColor: '#E54D40',
            confirmButtonText: '<i class="fa fa-times"></i> ตกลง'
        }).then((result) => {
            if (result) {}
        })
        return;
    }
}

function swalalert(title, message, type) {
    if (type == "success") {
        Swal.fire({
            title: title,
            text: message,
            type: type,
            confirmButtonColor: '#28a745',
            confirmButtonText: '<i class="fa fa-check"></i> ตกลง'
        }).then((result) => {
            if (result) {
                window.location.reload();
            }
        })
        return;
    } else if (type == "error") {
        Swal.fire({
            title: title,
            text: message,
            type: type,
            confirmButtonColor: '#E54D40',
            confirmButtonText: '<i class="fa fa-times"></i> ตกลง'
        }).then((result) => {
            if (result) {}
        })
        return;
    }
}