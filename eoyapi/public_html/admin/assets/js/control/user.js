$('#passwordIcon').click(function () {
    var type = $('#userPassword').attr('type')
    if (type == 'password') {
        $('#userPassword').attr('type', 'text');
        $('#passwordIcon').toggleClass('fa-eye');
        $('#passwordIcon').toggleClass('fa-eye-slash')
    } else {
        $('#userPassword').attr('type', 'password');
        $('#passwordIcon').toggleClass('fa-eye');
        $('#passwordIcon').toggleClass('fa-eye-slash')
    }
})

function addUser() {
    if ($('#userMail').val() || $('#userPassword').val() || $('#userName').val()) {
        var formData = new FormData();
        formData.append('mail',$('#userMail').val());
        formData.append('password',$('#userPassword').val());
        formData.append('username',$('#userName').val());
        $.ajax({
            type: 'POST',
            url: 'assets/php/adduser.php',
            data: formData,
            //Options to tell jQuery not to process data or worry about content-type.
            cache: false,
            contentType: false,
            processData: false,
            success:function (url){
            alert(url);
            location.reload();
        }
        });
    } else {
        alert("Lütfen bilgileri doldurunuz")
    }
} // done

function updateUser(id) {
    if ($('#userMail'+id).val() || $('#userPassword'+id).val() || $('#userName'+id).val()) {
        var formData = new FormData();
        formData.append('mail',$('#userMail'+id).val());
        formData.append('password',$('#userPassword'+id).val());
        formData.append('username',$('#userName'+id).val());
        formData.append('id',id);
        $.ajax({
            type: 'POST',
            url: 'assets/php/updateuser.php',
            data: formData,
            //Options to tell jQuery not to process data or worry about content-type.
            cache: false,
            contentType: false,
            processData: false,
            success: function (url) {
            alert(url);
            location.reload();
        }
        });
    } else {
        alert("Lütfen bilgileri doldurunuz")
    }
}
function removeUser(id) {
    if (confirm("Kullanıcı silmek istediğinize emin misiniz?")){
        var formData = new FormData();
        formData.append('id',id);
        $.ajax({
            type: 'POST',
            url: 'assets/php/deleteuser.php',
            data: formData,
            //Options to tell jQuery not to process data or worry about content-type.
            cache: false,
            contentType: false,
            processData: false,
            success:function (url){
            alert(url);
            location.reload();
        }
        });
    }
}