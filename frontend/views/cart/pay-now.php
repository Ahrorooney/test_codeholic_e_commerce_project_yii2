<?php
/** @author Akhror Gaibnazarov <akhrorgaibnazarov@gmail.com> */
/** @var Order $order */

$orderAddress = $order->orderAddress;
use common\models\Order;
use common\models\OrderAddress;

?>
<script>
    let $totalAmountPay = <?php echo $order->total_price; ?>;
    let $order_id = <?php echo $order->id; ?>;
</script>

<h3>
    Order #<?php echo $order->id ?> summary:
</h3>
<hr>
<div class="row">
    <div class="col">
        <h5>Account information</h5>
        <table class="table">
            <tr>
                <th>Firstname</th>
                <td><?php echo $order->firstname ?></td>
            </tr> <tr>
                <th>Lastname</th>
                <td><?php echo $order->lastname ?></td>
            </tr> <tr>
                <th>Email</th>
                <td><?php echo $order->email ?></td>
            </tr>
        </table>
        <h5>Address information</h5>
        <table class="table">
            <tr><th>Address</th>
            <td><?php echo $orderAddress->address ?></td></tr>
            <tr><th>City</th>
            <td><?php echo $orderAddress->city ?></td></tr>
            <tr><th>State</th>
            <td><?php echo $orderAddress->state ?></td></tr>
            <tr><th>Country</th>
            <td><?php echo $orderAddress->country ?></td></tr>
            <tr><th>Zipcode</th>
            <td><?php echo $orderAddress->zipcode ?></td></tr>
        </table>
    </div>
    <div class="col">
        <h5>Products</h5>
        <table class="table table-sm">
            <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>Price</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($order->orderItems as $item): ?>
                <tr>
                    <td>
                        <img src="<?php echo $item->product->getImageUrl() ?>" alt="" style="width:50px;">
                    </td>
                    <td><?php echo $item->product_name ?></td>
                    <td><?php echo $item->quantity ?></td>
                    <td><?php echo Yii::$app->formatter->asCurrency($item->quantity * $item->unit_price) ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <hr>
        <table class="table">
            <tr><th>
                Total items
            </th>
            <td>
                <?php echo $order->getItemsQuantity() ?>
            </td></tr>
            <tr><th>
                Total price
            </th>
            <td>
                <?php echo Yii::$app->formatter->asCurrency($order->total_price) ?>
            </td></tr>
        </table>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Pay with online-bank.test
        </button>

    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <a href="http://online-bank.test" class="modal-title" id="exampleModalLabel">online-bank.test</a>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <button type="button" class="btn btn-sm btn-primary" id="checkWalletBalance"
                ">Check my wallet!</button>
                <button type="button" class="btn btn-sm btn-primary" id="payTheCheckout">Pay the Checkout</button>
                <h4>Username: </h4><span id="balance_username"><?php echo Yii::$app->user->identity->username ?></span>
                <h4>Password: </h4><input type="text" id="balancePassword" class="input-group-text">
                <h4>Balance: </h4><span id="balance_user"></span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


