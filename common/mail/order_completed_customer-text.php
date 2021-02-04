<?php
/** @author Akhror Gaibnazarov <akhrorgaibnazarov@gmail.com> */

/** @var \common\models\Order $order  */
$orderAddress = $order->orderAddress;

?>

    Order #<?php echo $order->id ?> summary:
Account information
Firstname
                <?php echo $order->firstname ?>

                Lastname
                <?php echo $order->lastname ?>

                Email
                <?php echo $order->email ?>


        Address information

            Address
                <?php echo $orderAddress->address ?>
            City
                <?php echo $orderAddress->city ?>
            State
                <?php echo $orderAddress->state ?>
            Country
                <?php echo $orderAddress->country ?>
            Zipcode
                <?php echo $orderAddress->zipcode ?>



        Products



                Image
                Name
                Quantity
                Price


            <?php foreach ($order->orderItems as $item): ?>



                    <?php echo $item->product_name ?>
                    <?php echo $item->quantity ?>
                    <?php echo Yii::$app->formatter->asCurrency($item->quantity * $item->unit_price) ?>

            <?php endforeach; ?>

                    Total items


                    <?php echo $order->getItemsQuantity() ?>


                    Total price


                    <?php echo Yii::$app->formatter->asCurrency($order->total_price) ?>


