function addtocart(id,src) {
    if (src=="modal"){
        var quantity = $('#modalqty').val();
    }
    else {
        var quantity = 1;
    }
    var data = new FormData();
    data.append('id',id);
    data.append('qty',quantity);
    $.ajax({
        type: 'POST',
        url: 'assets/php/addtocart.php',
        processData: false,  // tell jQuery not to process the data
        contentType: false,  // tell jQuery not to set contentType
        data: data,
        success: function (output) {
            if (output=="login"){
                window.location="login";
            }
            else {
                $('#quickview').modal('hide');
            }
        },
        error: function (xhr, err) {
            alert("readyState: " + xhr.readyState + "\nstatus: " + xhr.status);
            alert("responseText: " + xhr.responseText);
        }
    });
}
function showmodal(id) {
    var data = new FormData();
    data.append('id',id);
    $.ajax({
        type: 'POST',
        url: 'assets/php/getproduct.php',
        processData: false,  // tell jQuery not to process the data
        contentType: false,  // tell jQuery not to set contentType
        data: data,
        success: function (output) {
            data = JSON.parse(output);
            $('#modalname').html(data[0].name);
            document.getElementById('productimage').setAttribute('src',data[0].image);
            if (data[0].hassale == 1){
                $('#price').html(data[0].saleprice+'₺');
                $('#saleprice').html(data[0].price+'₺');
            }
            else {
                $('#saleprice').html('');
                $('#price').html(data[0].price+'₺');
            }

            document.getElementById('addbuttonmodal').setAttribute('onclick','addtocart('+id+',"modal")');
        },
        error: function (xhr, err) {
            alert("readyState: " + xhr.readyState + "\nstatus: " + xhr.status);
            alert("responseText: " + xhr.responseText);
        }
    });
}
function sortproducts() {
    var process = document.getElementById('sorter').value;
    var arr = document.getElementsByClassName('product');
    var elements = Array.from(arr);
    elements.forEach(element => element.price = element.getAttribute('price'));
    elements.forEach(element => element.name = element.getAttribute('name'));
    if (process==1){
        elements.sort(dynamicSort("name"));
        $('#container').html(elements);
    }
    if (process==4){
        elements.sort(dynamicSort("price"));
        $('#container').html(elements);
    }
    if (process==5){
        elements.sort(dynamicSort("-price"));
        $('#container').html(elements);
    }

}
function dynamicSort(property) {
    var sortOrder = 1;

    if(property[0] === "-") {
        sortOrder = -1;
        property = property.substr(1);
    }

    return function (a,b) {
        if(sortOrder == -1){
            return b[property].localeCompare(a[property]);
        }else{
            return a[property].localeCompare(b[property]);
        }
    }
}
function searchproducts(a) {
    var key = document.getElementById('searchinput').value;
    window.location.replace = "shop?search="+key;
}