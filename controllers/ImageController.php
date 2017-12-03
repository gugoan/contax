<?php

namespace app\controllers;

use Yii;
use app\models\Image;
use app\models\ImageSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\base\Security;

//Cannot use yii\imagine\Image as Image because the name is already in use
// use yii\imagine\Image;
// use Imagine\Gd;
// use Imagine\Image\Box;
// use Imagine\Image\BoxInterface;

class ImageController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::classname(),
                'only'  => ['*'],
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

    public function actionIndex()
    {
        $searchModel = new ImageSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {
        $model = new Image();

        if ($model->load(Yii::$app->request->post())) {
            
            $file = $model->uploadImage();
            if ($model->save()) {
                if ($file !== false) {
                    if(!is_dir(Yii::$app->params['uploadImage'].$model->contact_id.'/')){
                    mkdir(Yii::$app->params['uploadImage'].$model->contact_id.'/', 0777, true);
                    }
                    $path = $model->getImageFile();
                    $file->saveAs($path);
                    // optimize image (path, border width, color, transp), uncomment:
                    // Image::frame($path, 5, '#0d4549', 100)
                    // ->thumbnail(new Box(1200, 1200))
                    // ->save($path, ['quality' => 60]);                    
                }
                Yii::$app->session->setFlash('img-success', Yii::t('app', 'Upload successfully'));
                return $this->redirect(['image/create', 'id' => $model->contact_id]);
            } else {
                // error in saving model
            }
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Image::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
