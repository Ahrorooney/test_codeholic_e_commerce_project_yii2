<?php


namespace frontend\controllers;


use common\models\User;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;

class ProfileController extends \frontend\base\Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['update-account', 'index', 'update-address'],
                'rules' => [
                    [
                        'actions' => ['update-account', 'index', 'update-address'],
                        'allow' => true,
                        'roles' => ['@']
                    ]
                ]
            ],
        ];
    }

    public function actionIndex()
    {
        /** @var User $user */
        $user = Yii::$app->user->identity;
        $userAddress = $user->getAddress();

        return $this->render('index', [
            'user' => $user,
            'userAddress' => $userAddress
        ]);
    }
    public function actionUpdateAddress()
    {
        if (!Yii::$app->request->isAjax) {
            throw ForbiddenHttpException('You are only allowed to make ajax request!');
        }
        $user = Yii::$app->user->identity;
        $userAddress = $user->getAddress();
        $success = false;
        if ($userAddress->load(Yii::$app->request->post()) && $userAddress->save()) {
            $success = true;
        }
        return $this->renderAjax('user_address', [
            'userAddress' => $userAddress,
            'success' => $success,
        ]);
    }
    public function actionUpdateAccount()
    {
        if (!Yii::$app->request->isAjax) {
            throw ForbiddenHttpException('You are only allowed to make ajax request!');
        }
        $user = Yii::$app->user->identity;
        $success = false;
        if ($user->load(Yii::$app->request->post()) && $user->save()) {
            $success = true;
        }
        return $this->renderAjax('user_account', [
            'user' => $user,
            'success' => $success,
        ]);
    }
}