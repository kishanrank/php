function addToCart(data) {
    $.ajax({
        url: '/mvc_program/mvc_view_11/public/user/Cart/addCartDB',
        method: "POST",
        data: {
            data: data
        }
    }).done(function (data) {
        alert(data);
        displayCart();

    });
}
function displayCart() {
    $.ajax({
        url: '/mvc_program/mvc_view_11/public/user/Cart/displayCart',
        method: "POST",
    }).done(function (data) {
        //alert(data);
        productData = JSON.parse(data);
        var table = `<table border='1px'>
                    <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Total Quantity</th>
                    <th>Total Value</th>
                    <th>Remove</th>
                    </tr>`;
        var total = 0;
        for (var i = 0; i < productData.length; i++) {
            table += `<tr>
                            <td> ${productData[i]['product_name']} </td>
                            <td>${productData[i]['product_price']}</td>
                            <td>${productData[i]['product_quantity']}</td>
                            <td>${productData[i]['total']}</td>
                            <td><button class="btn btn-info" onclick="removeSingleProduct(${productData[i]['product_id']})">Remove</button></td>
                        </tr>`;
            total = total + parseInt(productData[i]['total']);
        }
        table += `<tr>
                        <td colspan="3"><b>Total Cart Value</b></td>
                        <td colspan="2">Rs. <b><u>${total}</u></b>/- Only.</td>
                        </tr>`;
        table += `</table>`;

        document.getElementById("cart_data").innerHTML = table;
    });
}

function clearCart() {
    $.ajax({
        url: '/mvc_program/mvc_view_11/public/user/Cart/clearCart',
        method: "POST",
    }).done(function (data) {
        alert(data);
        displayCart();

    });
}

function removeSingleProduct(id_data) {
    $.ajax({
        url: '/mvc_program/mvc_view_11/public/user/Cart/removeSingleProduct',
        method: "POST",
        data: {
            product_id: id_data
        }
    }).done(function (result) {
        alert(result);
        displayCart();
    });
}