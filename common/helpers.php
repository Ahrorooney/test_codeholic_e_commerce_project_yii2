<?php
/** @author Akhror Gaibnazarov <akhrorgaibnazarov@gmail.com> */

function isGuest()
{
    return Yii::$app->user->isGuest;
}

function currUserId()
{
    return Yii::$app->user->id;
}
