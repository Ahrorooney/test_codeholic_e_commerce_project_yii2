<?php

/** @var User $user */
/** @var UserAddresses $userAddress */
/** @var \yii\web\View $this */

use common\models\User;
use common\models\UserAddresses;
use yii\widgets\Pjax;

?>

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                Address Information
            </div>
            <div class="card-body">
                <?php
                Pjax::begin([
                    'enablePushState' => false
                ])?>
               <?php echo $this->render('user_address', [
                       'userAddress' => $userAddress
                ]) ?>
                <?php Pjax::end() ?>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card">
            <div class="card-header">
                Account Information
            </div>
            <div class="card-body">
                <?php \yii\widgets\Pjax::begin([
                    'enablePushState' => false
                ]); ?>
                    <?php echo $this->render('user_account', [
                        'user' => $user
                            ]) ?>
                <?php \yii\widgets\Pjax::end() ?>
            </div>
        </div>
    </div>
</div>
