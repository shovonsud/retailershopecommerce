function cartstatus(data) {
    data = $.parseJSON(data);
    $("#incartcount").html(data['itemcount']);
    for (var i in data) {
        /* $("#").append(data[i].name); */
        /* var itemquant = "quantity".concat(data[i].itemid); */
        if (data[i].itemid != null) {
            var cartvalueid = "cartvalue".concat(data[i].itemid);
            document.getElementById(cartvalueid).innerHTML = data[i].reqquant;
            var itemstatus = "incart".concat(data[i].itemid);
            $("#" + itemstatus).text("In-Cart");
            /* $('#carttable').append("<tr><td>" + data[i].name + "</td><td>" + data[i].reqquant + "</td><td>" + (data[i].rate * data[i].reqquant) + "</td></tr>"); */
        }

    }
}

function emptycart() {
    $.ajax({
        url: "manage_cart.php",
        type: "POST",
        data: {
            method: "emptycart",
        },
        success: function () {
            location.reload();
        }
    });
}
$(document).ready(function () {
    $.ajax({
        url: "manage_cart.php",
        type: "GET",
        success: function (data) {
            /* $("#carttable").append(data); */
            cartstatus(data);
        }
    });
    $(".addcartbtn").hover(function () {
        $(this).toggleClass("btn-success");
    });
    $(".removecartbtn").hover(function () {
        $(this).toggleClass("btn-danger");
    });
});

function addtocart(x) {
    var itemquant = "quantity".concat(x);
    var cartvalueid = "cartvalue".concat(x);
    var availableitemquantity = parseInt(document.getElementById(itemquant).innerHTML);
    var incart = parseInt(document.getElementById(cartvalueid).innerHTML);
    if (incart < availableitemquantity) {
        incart += 1;
        $('#' + cartvalueid).addClass("border-success");
        document.getElementById(cartvalueid).innerHTML = incart;
        $.ajax({
            url: "manage_cart.php",
            type: "POST",

            data: {
                method: "add",
                itemid: x,
                itemquantity: incart,
            },
            success: function (data) {
                cartstatus(data);
            }
        });
    }
}

function removefromcart(x) {
    var cartvalueid = "cartvalue".concat(x);
    var incart = parseInt(document.getElementById(cartvalueid).innerHTML);
    if (incart > 0) {
        incart -= 1;
        if (incart == 0) {
            var itemstatus = "#incart".concat(x);
            $(itemstatus).empty();
        }
        document.getElementById(cartvalueid).innerHTML = incart;
        $.ajax({
            url: "manage_cart.php",
            type: "POST",
            data: {
                method: "sub",
                itemid: x,
                itemquantity: incart
            },
            success: function (data) {
                cartstatus(data);
            }
        });
    }
}