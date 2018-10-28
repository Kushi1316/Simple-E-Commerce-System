function addCommas(nStr)
{
    nStr += '';
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
}
$(document).ready(function () {
    $("input[name='quantity']").change(function () {
        var $_this = $(this),
                original_quantity = $_this.data("original-quantity"),
                new_quantity = $_this.val(),
                button = $("#checkout_button"),
                product_id = $_this.data("pid"),
                price = $_this.data("price"),
                row = $(".checkout-product-row-" + product_id),
                member_id = $_this.data("mid"),
                price_wrapper = row.find(".product-total-price"),
                new_price = (price * new_quantity).toFixed(2),
                grand_total = $("#grand_total"),
                new_grand_total = 0;
        if (original_quantity != new_quantity) {
            button.html("<i class=\"fa fa-circle-o-notch fa-spin\"></i>");
            $("input[name='quantity']").prop("disabled", true);
            $_this.data("original-quantity", new_quantity);
            $.ajax({
                type: "POST",
                url: "/inc/ajax_add_to_cart.php",
                dataType: "json",
                data: {
                    price: price,
                    product_id: product_id,
                    member_id: member_id,
                    quantity: new_quantity,
                    update: "1"
                }
            }).done(function (msg) {
                //regardless reset stuff
                if (member_id > 0) {
                    button.html("Buy");
                } else {
                    button.html("Next");
                }
                price_wrapper.html(addCommas(new_price));
                price_wrapper.data("price", new_price);
                $(".product-total-price").each(function () {
                    new_grand_total = new_grand_total + parseFloat($(this).data("price"));
                });
                grand_total.html(addCommas(parseFloat(new_grand_total).toFixed(2)));
                $("input[name='quantity']").prop("disabled", false);

            });
        }
    });
});