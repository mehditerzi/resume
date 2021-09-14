function getcart() {
    var data = new FormData();
    $.ajax({
        type: 'POST',
        url: 'assets/php/getcart.php',
        processData: false,  // tell jQuery not to process the data
        contentType: false,  // tell jQuery not to set contentType
        data: data,
        success: function (output) {
            document.getElementById('cartt').innerHTML=output;
            document.getElementById('cartcount').innerHTML=document.getElementById('cartitems').innerHTML;
        },
        error: function (xhr, err) {
            alert("readyState: " + xhr.readyState + "\nstatus: " + xhr.status);
            alert("responseText: " + xhr.responseText);
        }
    });
}
function removefromcart(id) {
    var data = new FormData();
    data.append('id',id);
    $.ajax({
        type: 'POST',
        url: 'assets/php/removecart.php',
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
function updateitem(id) {
    var data = new FormData();
    data.append('qty',document.getElementById('product'+id).value);
    data.append('id',id);
    $.ajax({
        type: 'POST',
        url: 'assets/php/cartinc.php',
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