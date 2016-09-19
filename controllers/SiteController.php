<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use yii\base\Security;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::classname(),
                'only'  => ['about','index'],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@']
                    ],
                ]
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    public function bootstrap($app)
    {
        if(!Yii::$app->user->isGuest) {
            Yii::$app->language = 'pt';
            //Yii::$app->defaultRoute = Yii::$app->user->identity->profile->startpage;
            //Yii::$app->defaultRoute = 'cashbook/overview';
            //Yii::$app->user->getIdentity()->language = Yii::$app->language;
            // Yii::$app->formatter->defaultTimeZone = 'Europe/Malta';
            // Yii::$app->formatter->timeZone = 'Europe/Malta';
            // Yii::$app->formatter->dateFormat = 'php:d/m/Y';
            // Yii::$app->formatter->datetimeFormat = 'php:d/m/Y H:i:s';
            // Yii::$app->formatter->currencyCode = 'EUR';
            // Yii::$app->formatter->decimalSeparator = ',';
        }else{
            Yii::$app->language = Yii::$app->request->getPreferredLanguage($this->supportedLanguages);
        }
    }    

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionAbout()
    {
        return $this->render('about');
    }
}