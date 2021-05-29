<?php

namespace app\controllers;

use Yii;
use app\models\ArtigoArea;
use app\models\ArtigoAreaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ArtigoAreaController implements the CRUD actions for ArtigoArea model.
 */
class ArtigoAreaController extends Controller
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
     * Lists all ArtigoArea models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ArtigoAreaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ArtigoArea model.
     * @param integer $id_artigo
     * @param integer $id_area
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_artigo, $id_area)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_artigo, $id_area),
        ]);
    }

    /**
     * Creates a new ArtigoArea model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ArtigoArea();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_artigo' => $model->id_artigo, 'id_area' => $model->id_area]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ArtigoArea model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id_artigo
     * @param integer $id_area
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_artigo, $id_area)
    {
        $model = $this->findModel($id_artigo, $id_area);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_artigo' => $model->id_artigo, 'id_area' => $model->id_area]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ArtigoArea model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id_artigo
     * @param integer $id_area
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_artigo, $id_area)
    {
        $this->findModel($id_artigo, $id_area)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ArtigoArea model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id_artigo
     * @param integer $id_area
     * @return ArtigoArea the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_artigo, $id_area)
    {
        if (($model = ArtigoArea::findOne(['id_artigo' => $id_artigo, 'id_area' => $id_area])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
