<?php

namespace app\controllers;

use Yii;
use app\models\GaleriaFotos;
use app\models\GaleriaFotosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * GaleriaFotosController implements the CRUD actions for GaleriaFotos model.
 */
class GaleriaFotosController extends Controller
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
     * Lists all GaleriaFotos models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new GaleriaFotosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single GaleriaFotos model.
     * @param integer $id_galeria
     * @param integer $id_foto
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_galeria, $id_foto)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_galeria, $id_foto),
        ]);
    }

    /**
     * Creates a new GaleriaFotos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new GaleriaFotos();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_galeria' => $model->id_galeria, 'id_foto' => $model->id_foto]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing GaleriaFotos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id_galeria
     * @param integer $id_foto
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_galeria, $id_foto)
    {
        $model = $this->findModel($id_galeria, $id_foto);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_galeria' => $model->id_galeria, 'id_foto' => $model->id_foto]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing GaleriaFotos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id_galeria
     * @param integer $id_foto
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_galeria, $id_foto)
    {
        $this->findModel($id_galeria, $id_foto)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the GaleriaFotos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id_galeria
     * @param integer $id_foto
     * @return GaleriaFotos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_galeria, $id_foto)
    {
        if (($model = GaleriaFotos::findOne(['id_galeria' => $id_galeria, 'id_foto' => $id_foto])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
