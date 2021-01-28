
<?php use common\models\UserAddresses;
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use yii\widgets\Pjax;

/** @var UserAddresses $userAddress */
/** @var \yii\web\View $this */

 ?>
<?php if (isset($success)&&$success): ?>
    <div class="alert alert-success">
        Your address was successfully updated!
    </div>
<?php endif; ?>
    <?php $addressForm = ActiveForm::begin([
        'action' => '/profile/update-address',
        'options' => [
            'data-pjax' => 1
        ]
    ]); ?>
        <?= $addressForm->field($userAddress, 'address')?>
        <?= $addressForm->field($userAddress, 'city')?>
        <?= $addressForm->field($userAddress, 'state')?>
        <?= $addressForm->field($userAddress, 'country')?>
        <?= $addressForm->field($userAddress, 'zipcode')?>
        <?= Html::submitButton('Update', ['class' => 'btn btn-primary']) ?>
    <?php ActiveForm::end(); ?>
