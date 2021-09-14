function login() {
    var formData = new FormData();
    formData.append('mail',$('#userMail').val());
    formData.append('password',$('#userPassword').val());
    $.ajax({
        type: 'POST',
        url: 'assets/php/auth.php',
        data: formData,
        //Options to tell jQuery not to process data or worry about content-type.
        cache: false,
        contentType: false,
        processData: false,
        success:function (url) {
        alert(url);
        if (url=="Giriş Başarılı!"){
            location.assign("dashboard.php");
        }else {
            location.reload();
        }
    }
    });
}

function enter31(event) {
    var x = event.which || event.keyCode;
    if (x == 13) {
        login()
    }
}

function saveMee() {
    var saveButton = $('#saveMe').is(':checked')
    if (saveButton == true) {
        localStorage.setItem("mail", $('#userMail').val())
        localStorage.setItem("password", $('#userPassword').val())
        localStorage.setItem("saveMod", true)
    } else {
        localStorage.clear()
        localStorage.setItem("saveMod", false)
    }
}

$(document).ready(function () {
    var saveMod = localStorage.getItem("saveMod")
    if (saveMod == "true") {
        $('#userMail').val(localStorage.getItem("mail"))
        $('#userPassword').val(localStorage.getItem("password"))
        $('#saveMe').prop('checked', true)
    }
})