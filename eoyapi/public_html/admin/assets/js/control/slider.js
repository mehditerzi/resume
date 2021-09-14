function saveSlider() {
    var uploadFile = $('#sliderImage').prop('files')[0];
    var formData = new FormData();
    formData.append('header',$('#sliderHeader').val());
    formData.append('subheader',$('#sliderSubHeader').val());
    formData.append('buttontext',$('#sliderButtonText').val());
    formData.append('buttonlink',$('#sliderButtonLink').val());
    formData.append("image", uploadFile)
    $.ajax({
        type: 'POST',
        url: 'assets/php/newslider.php',
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
} //done

function sliderRemove(id) {
    var formData = new FormData();
    formData.append("id", id)
    $.ajax({
        type: 'POST',
        url: 'assets/php/deleteslider.php',
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
} //done

function sliderChange(id) {
    var formData = new FormData();
    formData.append('header',$('#sliderHeader'+ id).val());
    formData.append('subheader',$('#sliderSubHeader'+ id).val());
    formData.append('buttontext',$('#sliderButtonText'+ id).val());
    formData.append('buttonlink',$('#sliderButtonLink'+ id).val());
    formData.append("id", id)
    $.ajax({
        type: 'POST',
        url: 'assets/php/updateslider.php',
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
} //done