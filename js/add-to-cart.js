$(document).ready(function () {
    $(".add-to-cart-form").submit(function (e) {
        e.preventDefault();
        var form = $(this),
                button = form.find("button"),
                price = button.data("price"),
                product_id = button.data("pid"),
                member_id = button.data("mid"),
                message_box = form.find(".product-cart-message");

        button.prop('disabled', true);
        button.html("<i class=\"fa fa-circle-o-notch fa-spin\"></i>");

        if (!(button.data("quantity"))) {
            var quantity = form.find("input").val();
        } else {
            var quantity = 1;
        }
        $.ajax({
            type: "POST",
            url: "/inc/ajax_add_to_cart.php",
            dataType: "json",
            data: {
                price: price,
                product_id: product_id,
                member_id: member_id,
                quantity: quantity
            },
            success: function (msg) {
                if (msg.success) {
                    $.ajax({
                        type: "POST",
                        url: "/inc/your_cart.php",
                        data: {
                            member_id: member_id
                        }
                    }).done(function (msg) {
                        $("#my_cart").html(msg).addClass("highlight");
                        setTimeout(function () {
                            $("#my_cart").removeClass('highlight');
                        }, 1000);
                        message_box.html("<label class=\" remove-bottom form-succes\" style=\"margin-top:5px;margin-bottom:0px\"><i class=\"fa fa-check-circle\"></i> Succesfully added to cart.</label>");
                    });
                } else {
                    message_box.html("<label id=\"username-error\" class=\"form-error\"  style=\"margin-top:5px;margin-bottom:0px\" >Failed.</label>");
                }
            }
        }).done(function (msg) {
            //regardless reset stuff
            button.prop('disabled', false);
            button.html("Add to Cart");
        });
    });
});