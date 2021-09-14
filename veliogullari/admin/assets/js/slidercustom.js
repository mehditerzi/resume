 function previewslider() {
    if (document.getElementById('baslik').value=="" || document.getElementById('text').value=="" || document.getElementById('image').value== undefined || document.getElementById('btn-text').value=="" ||document.getElementById('btn-link').value==""){
    alert("Eksik veri girdiniz.");
}
    else {
    var file = document.querySelector('#image').files[0];
    var data = new FormData();
    data.append('image',file);
    $.ajax({
    type: 'POST',
    url: 'assets/php/uploadpreview.php',
    processData: false,  // tell jQuery not to process the data
    contentType: false,  // tell jQuery not to set contentType
    data: data,
    success: function (output) {
    var image = output;
    document.getElementById('preview').setAttribute('width','100%');
    document.getElementById('preview').setAttribute('src','/index.php?'+'testing=1&title='+document.getElementById('baslik').value+'&text='+document.getElementById('text').value+'&image='+image+'&button='+document.getElementById('btn-text').value);
},
    error: function (xhr, err) {
    alert("readyState: " + xhr.readyState + "\nstatus: " + xhr.status);
    alert("responseText: " + xhr.responseText);
}
});
}
}
    function mobileslider() {
    if (document.getElementById('baslik').value=="" || document.getElementById('text').value=="" || document.getElementById('image').value== undefined || document.getElementById('btn-text').value=="" ||document.getElementById('btn-link').value==""){
    alert("Eksik veri girdiniz.");
}
    else {
    var file = document.querySelector('#image').files[0];
    var data = new FormData();
    data.append('image',file);
    $.ajax({
    type: 'POST',
    url: 'assets/php/uploadpreview.php',
    processData: false,  // tell jQuery not to process the data
    contentType: false,  // tell jQuery not to set contentType
    data: data,
    success: function (output) {
    var image = output;
    document.getElementById('preview').setAttribute('width','600px');
    document.getElementById('preview').setAttribute('src','/index.php?'+'testing=1&title='+document.getElementById('baslik').value+'&text='+document.getElementById('text').value+'&image='+image+'&button='+document.getElementById('btn-text').value);
},
    error: function (xhr, err) {
    alert("readyState: " + xhr.readyState + "\nstatus: " + xhr.status);
    alert("responseText: " + xhr.responseText);
}
});
}
}
    var tempimage;
    function getslider() {
    var id = document.getElementById('select').value;
    var data = new FormData();
    data.append('id',id);
    $.ajax({
    type: 'POST',
    url: 'assets/php/getslide.php',
    processData: false,  // tell jQuery not to process the data
    contentType: false,  // tell jQuery not to set contentType
    data: data,
    success: function (output) {
    var data = JSON.parse(output);
    document.getElementById('baslik').value=data[0];
    document.getElementById('text').value=data[1];
    tempimage=data[2];
    document.getElementById('btn-text').value=data[3];
    document.getElementById('btn-link').value=data[4];
},
    error: function (xhr, err) {
    alert("readyState: " + xhr.readyState + "\nstatus: " + xhr.status);
    alert("responseText: " + xhr.responseText);
}
});
}
 function deleteslider() {
     var id = document.getElementById('select').value;
     var data = new FormData();
     data.append('id',id);
     $.ajax({
         type: 'POST',
         url: 'assets/php/deleteslider.php',
         processData: false,  // tell jQuery not to process the data
         contentType: false,  // tell jQuery not to set contentType
         data: data,
         success: function (output) {
             window.location.reload();
         },
         error: function (xhr, err) {
             alert("readyState: " + xhr.readyState + "\nstatus: " + xhr.status);
             alert("responseText: " + xhr.responseText);
         }
     });
 }
    function savechangesslider() {
    if (document.getElementById('baslik').value=="" || document.getElementById('text').value=="" || document.getElementById('image').value== undefined || document.getElementById('btn-text').value=="" ||document.getElementById('btn-link').value==""){
    alert("Eksik veri girdiniz.");
}
    else {
    var id = document.getElementById('select').value;
    if (document.getElementById("image").files.length == 0){
    var file = tempimage;
    var filestat = 0;
}
    else {
    var file = document.querySelector('#image').files[0];
    var filestat =1;
}
    var data = new FormData();
    data.append('image',file);
    data.append('filestat',filestat);
    data.append('title',document.getElementById('baslik').value);
    data.append('text',document.getElementById('text').value);
    data.append('btntext',document.getElementById('btn-text').value);
    data.append('btnlink',document.getElementById('btn-link').value);
    data.append('id',id);
    $.ajax({
    type: 'POST',
    url: 'assets/php/saveslider.php',
    processData: false,  // tell jQuery not to process the data
    contentType: false,  // tell jQuery not to set contentType
    data: data,
    success: function (output) {

},
    error: function (xhr, err) {
    alert("readyState: " + xhr.readyState + "\nstatus: " + xhr.status);
    alert("responseText: " + xhr.responseText);
}
});
}
}
    function newslider() {
    if (document.getElementById('baslik').value=="" || document.getElementById('text').value=="" || document.getElementById('image').value== undefined || document.getElementById('btn-text').value=="" ||document.getElementById('btn-link').value==""){
    alert("Eksik veri girdiniz.");
}
    else {
    if (document.getElementById("image").files.length == 0){
    var file = tempimage;
    var filestat = 0;
}
    else {
    var file = document.querySelector('#image').files[0];
    var filestat =1;
}
    var data = new FormData();
    data.append('image',file);
    data.append('filestat',filestat);
    data.append('title',document.getElementById('baslik').value);
    data.append('text',document.getElementById('text').value);
    data.append('btntext',document.getElementById('btn-text').value);
    data.append('btnlink',document.getElementById('btn-link').value);
    $.ajax({
    type: 'POST',
    url: 'assets/php/newslide.php',
    processData: false,  // tell jQuery not to process the data
    contentType: false,  // tell jQuery not to set contentType
    data: data,
    success: function (output) {

},
    error: function (xhr, err) {
    alert("readyState: " + xhr.readyState + "\nstatus: " + xhr.status);
    alert("responseText: " + xhr.responseText);
}
});
}
}