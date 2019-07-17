<?php

namespace backend\controllers;

use Yii;
use backend\models\Places;
use backend\models\PlacesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use backend\models\UploadImage;
use yiister\grid\actions\ColumnUpdateAction;

/**
 * PlacesController implements the CRUD actions for Places model.
 */
class PlacesController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Places models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PlacesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Places model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Places model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {

        $model = new Places();
        $modelUpload = new UploadImage();

        if ($model->load(Yii::$app->request->post())) {
            $modelUpload->load(Yii::$app->request->post());
            $modelUpload->image = UploadedFile::getInstance($modelUpload, 'image');
            if ($modelUpload->image != null){
                $model->image = $modelUpload->upload($model->image);
            }
            $model->save();
            return $this->redirect('index');
        }

        return $this->render('create', [
            'model' => $model,
            'modelUpload' => $modelUpload,
        ]);
    }

    /**
     * Updates an existing Places model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {

        $model = $this->findModel($id);
        $modelUpload = new UploadImage();


        if ($model->load(Yii::$app->request->post())) {
            $modelUpload->load(Yii::$app->request->post());
            $modelUpload->image = UploadedFile::getInstance($modelUpload, 'image');
            if ($modelUpload->image != null){
                $model->image = $modelUpload->upload($model->image);
            }
            $model->save();
            return $this->redirect('index');
        }

        return $this->render('update', [
            'model' => $model,
            'modelUpload' => $modelUpload,
        ]);
    }

    public function actionUpdateColumn($id, $val)
    {
        $model = $this->findModel($id);
        $model->count = $val;
        $model->update();

        return $this->redirect(['index']);
    }

    /**
     * Deletes an existing Places model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $modelUpload = new UploadImage();

        $modelUpload->upload($model->image);
        $model->delete();

        return $this->redirect(['index']);
    }

//    public function actionUpload(){
//        $model = new UploadImage();
//        if(Yii::$app->request->isPost){
//            $model->upload();
//            return;
//        }
//        return $this->render('upload', ['model' => $model]);
//    }

    /**
     * Finds the Places model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Places the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Places::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
