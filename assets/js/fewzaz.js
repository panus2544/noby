function register() {
    $('#fewhakko').prop('disabled', true);
    $("#fewhakko").html("<i class='fa fa-spinner fa-spin fa-xs fa-fw'></i> à¸£à¸­à¸ªà¸±à¸à¸„à¸£à¸¹à¹ˆ.");

    if ($('#usernamefew').val().search(/[^a-zA-Z0-9]/) !== -1) {
        swalalert('à¸œà¸´à¸”à¸žà¸¥à¸²à¸”!', 'à¸Šà¸·à¹ˆà¸­à¸œà¸¹à¹‰à¹ƒà¸Šà¹‰à¸à¸£à¸­à¸à¹„à¸”à¹‰à¹€à¸‰à¸žà¸²à¸° a-Z, A-Z, 0-9 à¹à¸¥à¸° _ (underscore)', 'error')

        $('#fewhakko').prop('disabled', false); //<i class='fas fa-user-plus' aria-hidden='true'></i> à¸ªà¸¡à¸±à¸„à¸£à¸ªà¸¡à¸²à¸Šà¸´à¸
        $("#fewhakko").html("<i class='fas fa-user-plus' aria-hidden='true'></i> à¸ªà¸¡à¸±à¸„à¸£à¸ªà¸¡à¸²à¸Šà¸´à¸");
    }
    else {
        $.post("../_fewno1.php?register", { username: $('#usernamefew').val(), password1: $('#password1few').val(), password2: $('#password2few').val(), email: $('#emailfew').val(), recaptcha: $('#g-recaptcha-response').val() }, function (data) {
            var obj = jQuery.parseJSON(data);
            if (obj.status == 'success') {
                swalalert('à¸ªà¸³à¹€à¸£à¹‡à¸ˆ!', obj.message, 'success')
            } else if (obj.status == 'error') {
                swalalert('à¸œà¸´à¸”à¸žà¸¥à¸²à¸”!', obj.message, 'error')
            }
            $('#fewhakko').prop('disabled', false); //<i class='fas fa-user-plus' aria-hidden='true'></i> à¸ªà¸¡à¸±à¸„à¸£à¸ªà¸¡à¸²à¸Šà¸´à¸
            $("#fewhakko").html("<i class='fas fa-user-plus' aria-hidden='true'></i> à¸ªà¸¡à¸±à¸„à¸£à¸ªà¸¡à¸²à¸Šà¸´à¸");
        }
        );
    }
}

function sellrobux() {
    $('#fewhakko').prop('disabled', true);
    $("#fewhakko").html("<i class='fa fa-spinner fa-spin fa-xs fa-fw'></i> à¸£à¸­à¸ªà¸±à¸à¸„à¸£à¸¹à¹ˆ.");

    if ($('#amount').val().search(/[^0-9]/) !== -1) {
        swalalert('à¸œà¸´à¸”à¸žà¸¥à¸²à¸”!', 'à¸—à¹ˆà¸²à¸™à¸ªà¸²à¸¡à¸²à¸£à¸–à¸à¸£à¸­à¸à¹„à¸”à¹‰à¹à¸„à¹ˆà¸•à¸±à¸§à¹€à¸¥à¸‚', 'error')

        $('#fewhakko').prop('disabled', false); //<i class='fas fa-user-plus' aria-hidden='true'></i> à¸ªà¸¡à¸±à¸„à¸£à¸ªà¸¡à¸²à¸Šà¸´à¸
        $("#fewhakko").html("<i class='fas fa-user-plus' aria-hidden='true'></i> à¸ªà¸¡à¸±à¸„à¸£à¸ªà¸¡à¸²à¸Šà¸´à¸");
    }

    else {
        $.post("../_fewno1.php?fewofgod", { username: $('#usernamegame').val(), amount: $('#amount').val() }, function (data) {
            var obj = jQuery.parseJSON(data);
            if (obj.status == 'success') {
                swalalert('à¸ªà¸³à¹€à¸£à¹‡à¸ˆ!', obj.message, 'success')
            } else if (obj.status == 'error') {
                swalalert('à¸œà¸´à¸”à¸žà¸¥à¸²à¸”!', obj.message, 'error')
            }
            $('#fewhakko').prop('disabled', false);
            $("#fewhakko").html("<i class='fas fa-credit-card' aria-hidden='true'></i> à¸Šà¸³à¸£à¸°à¹€à¸‡à¸´à¸™");
        }
        );
    }
}

function bsettings4() {
    $('#fewhakko4').prop('disabled', true);
    $("#fewhakko4").html("<i class='fa fa-spinner fa-spin fa-xs fa-fw'></i> à¸£à¸­à¸ªà¸±à¸à¸„à¸£à¸¹à¹ˆ.");

    var e = document.getElementById("selectnavfew");
    var selectnavfew = e.options[e.selectedIndex].value;

    var e = document.getElementById("selectbuttonfew");
    var selectbuttonfew = e.options[e.selectedIndex].value;

    var e = document.getElementById("selectjumbotonfew");
    var selectjumbotonfew = e.options[e.selectedIndex].value;

    var e = document.getElementById("selecttextcolorfew");
    var selecttextcolorfew = e.options[e.selectedIndex].value;

    $.post("../_fewno1.php?bsettings4", { string1: selectnavfew, string2: selectbuttonfew, string3: selectjumbotonfew, string4: selecttextcolorfew,}, function (data) {
        var obj = jQuery.parseJSON(data);
        if (obj.status == 'success') {
            swalalert('à¸ªà¸³à¹€à¸£à¹‡à¸ˆ!', obj.message, 'success')
        } else if (obj.status == 'error') {
            swalalert('à¸œà¸´à¸”à¸žà¸¥à¸²à¸”!', obj.message, 'error')
        }
        $('#fewhakko4').prop('disabled', false);
        $("#fewhakko4").html("<i class='fas fa-save' aria-hidden='true'></i> à¹€à¸›à¸¥à¸µà¹ˆà¸¢à¸™à¸à¸²à¸£à¸•à¸±à¹‰à¸‡à¸„à¹ˆà¸²");
    }
    );

}

function c_rb(val) {
    if (val == "0") {
        $('#s111mn').html("0");
    }
    else {
        var num = parseFloat(val * $('#fewtest').val());
        $('#s111mn').html(num.toFixed(0));
    }

}

function gettokenwallet(id) {
    var button = 'fewhakkoget' + id;
    $('#' + button).prop('disabled', true);
    $('#' + button).html("<i class='fa fa-spinner fa-spin fa-xs fa-fw'></i> à¸£à¸­à¸ªà¸±à¸à¸„à¸£à¸¹à¹ˆ.");

    if (id == "1") {
        $.post("../true/gettoken.php?id=" + id, { phone: $('#phonemodal').val(), password: $('#passmodal').val() }, function (data) {
            var obj = jQuery.parseJSON(data);
            if (obj.status == 'success') { //otprefzaza
                $('#otprefmodal').prop('disabled', false);
                document.getElementById("otprefzaza").style.display = "block";
                document.getElementById("otprefmodal").value = obj.message;
                document.getElementById("fewhakkoget1").style.display = "none";
                document.getElementById("fewhakkoget2").style.display = "block";
                document.getElementById("otpmobilezaza").style.display = "block";
            } else if (obj.status == 'error') {
                swalalert('à¸œà¸´à¸”à¸žà¸¥à¸²à¸”!', obj.message, 'error')
                $('#' + button).prop('disabled', false);
                $('#' + button).html("à¸£à¸±à¸š OTP");
            }
        }
        );

    } else {
        $.post("../true/gettoken.php?id=" + id, { phone: $('#phonemodal').val(), password: $('#passmodal').val(), otpref: $('#otprefmodal').val(), otpmobile: $('#otpmobilemodal').val() }, function (data) {
            var obj = jQuery.parseJSON(data);
            if (obj.status == 'success') { //otprefzaza
                swalalert('à¸ªà¸³à¹€à¸£à¹‡à¸ˆ!', "à¹‚à¸—à¹€à¸„à¸™ : " + obj.message, 'success')
            } else if (obj.status == 'error') {
                swalalert('à¸œà¸´à¸”à¸žà¸¥à¸²à¸”!', obj.message, 'error')
                $('#' + button).prop('disabled', false);
                $('#' + button).html("à¸£à¸±à¸šà¹‚à¸—à¹€à¸„à¸™");
            }
        }
        );
    }
}

function bsettings(id) {
    $('#fewhakko' + id).prop('disabled', true);
    $("#fewhakko" + id).html("<i class='fa fa-spinner fa-spin fa-xs fa-fw'></i> à¸£à¸­à¸ªà¸±à¸à¸„à¸£à¸¹à¹ˆ.");

    $.post("../_fewno1.php?bsettings", { id: id, string1: $('#' + id + 'string1').val(), string2: $('#' + id + 'string2').val(), string3: $('#' + id + 'string3').val(), string4: $('#' + id + 'string4').val() }, function (data) {
        var obj = jQuery.parseJSON(data);
        if (obj.status == 'success') {
            swalalert('à¸ªà¸³à¹€à¸£à¹‡à¸ˆ!', obj.message, 'success')
        } else if (obj.status == 'error') {
            swalalert('à¸œà¸´à¸”à¸žà¸¥à¸²à¸”!', obj.message, 'error')
        }
        $('#fewhakko' + id).prop('disabled', false); //<i class='fas fa-user-plus' aria-hidden='true'></i> à¸ªà¸¡à¸±à¸„à¸£à¸ªà¸¡à¸²à¸Šà¸´à¸
        $("#fewhakko" + id).html("<i class='fas fa-save' aria-hidden='true'></i> à¹€à¸›à¸¥à¸µà¹ˆà¸¢à¸™à¸à¸²à¸£à¸•à¸±à¹‰à¸‡à¸„à¹ˆà¸²");
    }
    );
}

function changepassword() {
    $('#fewhakko1').prop('disabled', true);
    $("#fewhakko1").html("<i class='fa fa-spinner fa-spin fa-xs fa-fw'></i> à¸£à¸­à¸ªà¸±à¸à¸„à¸£à¸¹à¹ˆ.");

    $.post("../_fewno1.php?changepassword", { recaptcha: $('#g-recaptcha-response').val(), passwordold: $('#passwordold').val(), passwordnew1: $('#passwordnew1').val(), passwordnew2: $('#passwordnew2').val() }, function (data) {
        var obj = jQuery.parseJSON(data);
        if (obj.status == 'success') {
            swalalert('à¸ªà¸³à¹€à¸£à¹‡à¸ˆ!', obj.message, 'success')
        } else if (obj.status == 'error') {
            swalalert('à¸œà¸´à¸”à¸žà¸¥à¸²à¸”!', obj.message, 'error')
        }
        $('#fewhakko1').prop('disabled', false); //<i class='fas fa-user-plus' aria-hidden='true'></i> à¸ªà¸¡à¸±à¸„à¸£à¸ªà¸¡à¸²à¸Šà¸´à¸
        $("#fewhakko1").html("à¹€à¸›à¸¥à¸µà¹ˆà¸¢à¸™à¸£à¸«à¸±à¸ªà¸œà¹ˆà¸²à¸™");
    }
    );
}

function topuptruemoney() {
    $('#fewhakko1').prop('disabled', true);
    $("#fewhakko1").html("<i class='fa fa-spinner fa-spin fa-xs fa-fw'></i> à¸£à¸­à¸ªà¸±à¸à¸„à¸£à¸¹à¹ˆ.");

    $.post("../_fewno1.php?topupmoney", { truemoney: $('#passwordtruemoney').val() }, function (data) {
        var obj = jQuery.parseJSON(data);
        if (obj.status == 'success') {
            swalalert('à¸ªà¸³à¹€à¸£à¹‡à¸ˆ!', obj.message, 'success')
        } else if (obj.status == 'error') {
            swalalert('à¸œà¸´à¸”à¸žà¸¥à¸²à¸”!', obj.message, 'error')
        }
        $('#fewhakko1').prop('disabled', false); //<i class='fas fa-user-plus' aria-hidden='true'></i> à¸ªà¸¡à¸±à¸„à¸£à¸ªà¸¡à¸²à¸Šà¸´à¸
        $("#fewhakko1").html("<i class='fas fa-credit-card' aria-hidden='true'></i> à¹€à¸•à¸´à¸¡à¹€à¸‡à¸´à¸™");
    }
    );
}

function topuptruewallet() {
    $('#fewhakko2').prop('disabled', true);
    $("#fewhakko2").html("<i class='fa fa-spinner fa-spin fa-xs fa-fw'></i> à¸£à¸­à¸ªà¸±à¸à¸„à¸£à¸¹à¹ˆ.");

    $.post("../_fewno1.php?topupwallet", { truewallet: $('#passwordtruewallet').val() }, function (data) {
        var obj = jQuery.parseJSON(data);
        if (obj.status == 'success') {
            swalalert('à¸ªà¸³à¹€à¸£à¹‡à¸ˆ!', obj.message, 'success')
        } else if (obj.status == 'error') {
            swalalert('à¸œà¸´à¸”à¸žà¸¥à¸²à¸”!', obj.message, 'error')
        }
        $('#fewhakko2').prop('disabled', false); //<i class='fas fa-user-plus' aria-hidden='true'></i> à¸ªà¸¡à¸±à¸„à¸£à¸ªà¸¡à¸²à¸Šà¸´à¸
        $("#fewhakko2").html("<i class='fas fa-credit-card' aria-hidden='true'></i> à¹€à¸•à¸´à¸¡à¹€à¸‡à¸´à¸™");
    }
    );
}


function logout() {
    $.post("../_fewno1.php?logout", {}, function (data) {
        var obj = jQuery.parseJSON(data);
        if (obj.status == 'success') {
            swalalert('à¸ªà¸³à¹€à¸£à¹‡à¸ˆ!', obj.message, 'success')
        } else if (obj.status == 'error') {
            swalalert('à¸œà¸´à¸”à¸žà¸¥à¸²à¸”!', obj.message, 'error')
        }
    }
    );
}

function login() {
    $('#fewhakko').prop('disabled', true);
    $("#fewhakko").html("<i class='fa fa-spinner fa-spin fa-xs fa-fw'></i> à¸£à¸­à¸ªà¸±à¸à¸„à¸£à¸¹à¹ˆ.");

    $.post("/_fewno1.php?login", { username: $('#usernamefew').val(), password: $('#passwordfew').val() }, function (data) {
        var obj = jQuery.parseJSON(data);
        if (obj.status == 'success') {
            swalalert('à¸ªà¸³à¹€à¸£à¹‡à¸ˆ!', obj.message, 'success')
        } else if (obj.status == 'error') {
            swalalert('à¸œà¸´à¸”à¸žà¸¥à¸²à¸”!', obj.message, 'error')
        }
        $('#fewhakko').prop('disabled', false); //<i class='fas fa-user-plus' aria-hidden='true'></i> à¸ªà¸¡à¸±à¸„à¸£à¸ªà¸¡à¸²à¸Šà¸´à¸
        $("#fewhakko").html("<i class='fas fa-sign-in-alt' aria-hidden='true'></i> à¹€à¸‚à¹‰à¸²à¸ªà¸¹à¹ˆà¸£à¸°à¸šà¸š");
    }
    );
}

function swalalert(title, message, type) {
    if (type == "success") {
        Swal.fire({
            title: title,
            text: message,
            type: type,
            confirmButtonColor: '#28a745',
            confirmButtonText: '<i class="fa fa-check"></i> à¸•à¸à¸¥à¸‡'
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
            confirmButtonText: '<i class="fa fa-times"></i> à¸•à¸à¸¥à¸‡'
        }).then((result) => {
            if (result) {
            }
        })
        return;
    }
}