<?php
/** @var \common\models\Product $model */

use yii\helpers\Url;

?>
<div class="card h-100">
    <a href="#" class="img-wrapper">
        <img class="card-img-top" src="<?php echo $model->getImageUrl() ?>" alt="">
    </a>
    <div class="card-body">
        <h5 class="card-title">
            <a href="#" class="text-dark"><?php echo \yii\helpers\StringHelper::truncateWords($model->name, 10) ?></a>
        </h5>
        <h5><?php echo $model->price?></h5>
        <div class="card-text">
            <?php echo $model->getShortDescription()?>
        </div>
    </div>
    <div class="card-footer text text-right">
        <a href="<?php echo Url::to(['/cart/add']) ?>" class="btn btn-primary btn-add-to-cart">
            Add to Cart
        </a>
    </div>
</div>