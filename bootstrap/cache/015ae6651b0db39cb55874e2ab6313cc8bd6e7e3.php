<?php $__env->startSection("title","Developer"); ?>

<?php $__env->startSection('content'); ?>
<input type="hidden" id="token" value="<?php echo e(\App\Classes\CSRFToken::_token()); ?>">
<div class="container my-5">
    <!-- Table Start -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Action</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody id="tablebody">

        </tbody>

        <tr>
            <td colspan="7" style="text-align:right;" id="checkOutBtn">
                <a><button class="btn-primary" onclick="payOut()">Checkout</button></a>
            </td>
        </tr>
        <tr id="stripeTR">
            <td style="text-align: right;">
                <form action="/payment/stripe" method="post" id="stripeForm">
                    <script src="https://checkout.stripe.com/checkout.js" async class="stripe-button" data-key="<?php echo e(\App\Classes\Session::get('publishable_key')); ?>" data-description="Access for a year" data-amount="5000" data-image="http://localhost/E-Commerce/public//assets//images/emoji.png" data-zip-code="true" data-locale="auto">
                    </script>
                </form>
            </td>
        </tr>
        <tr>
            <td colspan="7" style="text-align:right;">
                <a href="user/login"><button class="btn-primary">Login to Checkout</button></a>
            </td>
        </tr>
    </table>
    <!-- Table End -->

</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script>
    function loadProduct() {
        $.ajax({
            type: "POST",
            url: "/cart",
            data: {
                "cart": getCartItem(),
                "token": $("#token").val()
            },
            success: function(results) {
                //console.log(results);
                saveProducts(results);
            },
            errors: function(respone) {
                console.log(respone.responeText);
            }
        });
    }

    function saveProducts(res) {
        localStorage.setItem("products", res);
        let results = JSON.parse(localStorage.getItem("products"));
        showProducts(results);
    }

    function addProductQty(id) {
        let results = JSON.parse(localStorage.getItem("products"));
        results.forEach((result) => {
            if (result.id === id) {
                result.qty = result.qty + 1;
            }
        });
        saveProducts(JSON.stringify(results));
    }

    function deduceProductQty(id) {
        let results = JSON.parse(localStorage.getItem("products"));
        results.forEach((result) => {
            if (result.id === id) {
                if (result.qty > 1) {
                    result.qty = result.qty - 1;
                }
            }
        });
        saveProducts(JSON.stringify(results));
    }

    function showProducts(results) {
        var str = "";
        var total = 0;
        results.forEach((result) => {
            total += result.qty * result.price;
            str += "<tr>";
            str += `
                <td>${result.id}</td>
                <td><img src='${result.image}' style="width:60px;min-height:60px;"></td>
                <td>${result.name}</td>
                <td>${result.price}</td>
                <td>${result.qty}</td>
                <td>
                <i class="fa fa-minus" aria-hidden="true" style="cursor:pointer;" onclick="deduceProductQty(${result.id})"></i>
                <i class="fa fa-plus" aria-hidden="true" style="cursor:pointer;" onclick="addProductQty(${result.id})"></i>
                <i class="fa fa-trash" aria-hidden="true" style="cursor:pointer;" onclick="deleteProductQty(${result.id})"></i>
                </td>
                <td>${result.qty*result.price}</td>
            `;
            str += "</tr>";
        });
        str += `
            <tr>
                <td colspan="6" style="text-align:right;"><b>Grand Total</b></td>
                <td>${total.toFixed(2)}</td>
            </tr>
            `;
        $('#tablebody').html(str);
    }

    function deleteProductQty(id) {
        //clearCart();
        var results = JSON.parse(localStorage.getItem("products"));
        results.forEach((result) => {
            if (result.id === id) {
                var ind = results.indexOf(result);
                results.splice(ind, 1);
            }
        });
        deleteItem(id);
        saveProducts(JSON.stringify(results));
    }

    function payOut() {
        let results = JSON.parse(localStorage.getItem("products"));
        $.ajax({
            type: "POST",
            url: "/payout",
            data: {
                "items": results,
                "token": $("#token").val()
            },
            success: function(results) {
                $('#checkOutBtn').css("display", "none");
                $('#stripeTR').css("visibility", "visible");
                $('#stripeForm').css("display", "block");
                // clearCart();
                // showCartItem();
                // showProducts([]);
            },
            errors: function(respone) {
                console.log(respone.responeText);
            }
        });
    }
    loadProduct();
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>