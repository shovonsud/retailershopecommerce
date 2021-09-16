function preview_image(event) {
    var reader = new FileReader();
    reader.onload = function () {
        var output = document.getElementById('itempicpreview');
        output.src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
}

function vieworder(id) {
    window.location.href = "../orders/view_order.php?orderid=" + id;
}

$(document).ready(function () {
    $('img').bind('contextmenu', function () {
        return false;
    });
});