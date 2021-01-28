$(function(){
    const $cartQuantity = $('#cart-quantity');
    const $addToCart = $('.btn-add-to-cart');
    const $itemQuantities = $('.item-quantity');
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
        const id  = $tr.data('id');
        $.ajax({
            method: 'post',
            url: $tr.data('url'),
            data: {id, quantity: $this.val()},
            success: function(totalQuantity){
                $cartQuantity.text(totalQuantity)
            }
        })
    })
});