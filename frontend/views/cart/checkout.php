<?php
/** @author Akhror Gaibnazarov <akhrorgaibnazarov@gmail.com> */
/** @var Order $order */
/** @var OrderAddress $orderAddress */

/** @var array $cartItems */
/** @var int $productQuantity */

/** @var float $totalPrice */

use common\models\Order;
use common\models\OrderAddress;
use common\models\Product;
use yii\bootstrap4\ActiveForm;

?>
<?php $form = ActiveForm::begin([
    'id' => 'checkout-form',
]); ?>
<div class="row">
    <div class="col">

        <div class="card mb-3">
            <div class="card-header">
                <h5>
                    Account Information
                </h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <?= $form->field($order, 'firstname')->textInput(['autofocus' => true]) ?>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($order, 'lastname')->textInput(['autofocus' => true]) ?>
                    </div>
                </div>
                <?= $form->field($order, 'email')->textInput(['autofocus' => true]) ?>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                Address Information
            </div>
            <div class="card-body">
                <?= $form->field($orderAddress, 'address') ?>
                <?= $form->field($orderAddress, 'city') ?>
                <?= $form->field($orderAddress, 'state') ?>
                <?= $form->field($orderAddress, 'country') ?>
                <?= $form->field($orderAddress, 'zipcode') ?>
            </div>
        </div>

    </div>
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h5>Order summary</h5>
            </div>
            <div class="card-body">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                </tr>
                </thead>
                <tbody>

                <?php foreach($cartItems as $item) : ?>
                    <tr>
                        <td>
                            <img src="<?php echo Product::formatImageUrl($item['image']) ?>"
                                 alt="<?php echo $item['name'] ?>"
                                 style="width:50px;"
                            >
                        </td>
                        <td><?php echo $item['name'] ?></td>
                        <td>
                            <?php echo $item['quantity'] ?>
                        </td>
                        <td><?php echo Yii::$app->formatter->asCurrency($item['total_price']) ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
                <hr>
                <table class="table">
                    <tr>
                        <td>Total items</td>
                        <td class="text-right"><?php echo $productQuantity ?> Quantity</td>
                    </tr>
                    <tr>
                        <td>Total Price</td>
                        <td class="text-right"><?php echo Yii::$app->formatter->asCurrency($totalPrice) ?></td>
                    </tr>
                </table>

                <div class="flex-inline">

                    <p class="text-right mt-3">
                        <button class="btn btn-secondary">Checkout</button>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php ActiveForm::end(); ?>


