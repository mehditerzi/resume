function saveProject() {
    var uploadFile = $('#projectImages').prop('files')[0];
    var formData = new FormData();
    formData.append('name',$('#projectName').val());
    formData.append('text',$('#projectText').val());
    formData.append('location',$('#projectLocation').val());
    formData.append('category',$('#projectCategory').val());
    formData.append('date',$('#projectDate').val());
    formData.append('count',$('#projectRoom').val());
    formData.append('slides',$('#projectSlides').prop('files'));
    formData.append("image", uploadFile);
    $.ajax({
        type: 'POST',
        url: 'assets/php/newproject.php',
        data: formData,
        //Options to tell jQuery not to process data or worry about content-type.
        cache: false,
        contentType: false,
        processData: false
    }).success((url) => {
        alert(url);
        location.reload();
    });
} //done

function projectChange(id) {
    var uploadFile = $('#projectImages'+id).prop('files')[0];
    var formData = new FormData();
    formData.append('name',$('#projectName'+id).val());
    formData.append('text',$('#projectText'+id).val());
    formData.append('location',$('#projectLocation'+id).val());
    formData.append('category',$('#projectCategory'+id).val());
    formData.append('date',$('#projectDate'+id).val());
    formData.append('count',$('#projectRoom'+id).val());
    formData.append('slides',$('#projectSlides'+id).prop('files'));
    formData.append("image", uploadFile);
    formData.append('id',id);
    $.ajax({
        type: 'POST',
        url: 'assets/php/updateproject.php',
        data: formData,
        //Options to tell jQuery not to process data or worry about content-type.
        cache: false,
        contentType: false,
        processData: false
    }).success((url) => {
        alert(url);
        location.reload();
    });
}

function removeProject(id) {
    var formData = new FormData();
    formData.append('id',id);
    $.ajax({
        type: 'POST',
        url: 'assets/php/updateproject.php',
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