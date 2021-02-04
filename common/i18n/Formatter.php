<?php
/** @author Akhror Gaibnazarov <akhrorgaibnazarov@gmail.com> */

namespace common\i18n;

use yii\helpers\Html;

class Formatter extends \yii\i18n\Formatter
{
    public function asOrderStatus($status)
    {
        if($status === \common\models\Order::STATUS_COMPLETED){
            return Html::tag('span', 'Paid', ['class' => 'badge badge-success']);
        } elseif ($status === \common\models\Order::STATUS_DRAFT ) {
            return Html::tag('span', 'Unpaid', ['class' => 'badge badge-secondary']);
        } else {
            return Html::tag('span', 'Failured', ['class' => 'badge badge-danger']);
        }
    }
}