$(function(){
    const $cartQuantity = $('#cart-quantity');
    const $addToCart = $('.btn-add-to-cart');
    const $itemQuantities = $('.item-quantity');
    const $balanceUser = $('#balance_user');
    const $checkWalletBalance = $('#checkWalletBalance');
    const $balanceUsername = $('#balance_username');
    const $balancePassword = $('#balancePassword');
    const $payTheCheckout = $('#payTheCheckout');

    $addToCart.click(ev => {
        ev.preventDefault();
        const $this = $(ev.target);
        const id = $this.closest('.product-item').data('key');
        $.ajax({
            method: 'POST',
            url: $this.attr('href'),
            data: {id},
            success: function(){
                $cartQuantity.text(parseInt($cartQuantity.text() || 0)+1);
            }
        })
    })

    $itemQuantities.change(ev => {
        const $this = $(ev.target);
        let $tr = $this.closest('tr');
        const $td = $this.closest('td');
        const id  = $tr.data('id');
        $.ajax({
            method: 'post',
            url: $tr.data('url'),
            data: {id, quantity: $this.val()},
            success: function(result){
                $cartQuantity.text(result.quantity)
                $td.next().text(result.price);
            }
        })
    })
    $checkWalletBalance.click(ev => {
        ev.preventDefault();
        const $this = $(ev.target);
        // let $url = 'http://online-bank.test/wallet/my-balance?username='+$balanceUsername.text()+'&password='+$balancePassword.val();
        let $url = 'http://distributor-pharmacy.test/v1/api/catalogue-medicine';
        $.ajax({
            method: 'get',
            url: $url,

        }).done(function(data){
            $balanceUser.text(data.balance);
        });
    })

    $payTheCheckout.click(ev => {
        ev.preventDefault();
        const $this = $(ev.target);
        const $totalCost = $totalAmountPay;
        let $url = 'http://online-bank.test/wallet/pay?username='+$balanceUsername.text()+'&password='+$balancePassword.val()+'&amount=' +$totalCost;
        $.ajax({
            method: 'get',
            url: $url,
        }).done(function(data){
            $balanceUser.text('Payment: '+data.payment + 'Balance: ' + data.balance);
            orderCapture(data.transaction_id, 1)
        });
    })

    function orderCapture(transaction_id, status){
        const $form = $('#checkout-form');
        const data = $form.serializeArray();
        const $orderId = $order_id;
        data.push({
            name: 'transaction_id',
            value: transaction_id
        })
        data.push({
            name: 'status',
            value: status
        })
        $.ajax({
            method: 'post',
            url: '/cart/submit-payment?orderId='+$orderId,
            data: data,
            success: function(res) {
                alert("Thanks for your business");
                window.location.href = '';
            }
        })
    }
});