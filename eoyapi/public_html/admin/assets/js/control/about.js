function saveSlider() {
    var formData = new FormData();
    formData.append('header',$('#sliderYear').val());
    formData.append('subheader',$('#sliderText').val());
    $.ajax({
        type: 'POST',
        url: 'assets/php/aboutnewslider.php',
        data: formData,
        //Options to tell jQuery not to process data or worry about content-type.
        cache: false,
        contentType: false,
        processData: false,
        success:function (url) {
            alert(url);
            location.reload();
        }
    });
}

function changeSlider(id) {
    var formData = new FormData();
    formData.append('id',id);
    formData.append('header',$('#sliderYear'+id).val());
    formData.append('subheader',$('#sliderText'+id).val());
    $.ajax({
        type: 'POST',
        url: 'assets/php/aboutsliderupdate.php',
        data: formData,
        //Options to tell jQuery not to process data or worry about content-type.
        cache: false,
        contentType: false,
        processData: false,
        success:function (url) {
        alert(url);
        location.reload();
    }
    });
}

function deleteSlider(id) {
    var formData = new FormData();
    formData.append('id',id);
    $.ajax({
        type: 'POST',
        url: 'assets/php/aboutsliderdel.php',
        data: formData,
        //Options to tell jQuery not to process data or worry about content-type.
        cache: false,
        contentType: false,
        processData: false,
        success:function (url) {
            alert(url);
            location.reload();
        }
    });
}