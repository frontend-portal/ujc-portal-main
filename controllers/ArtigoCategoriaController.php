<?php

namespace app\controllers;

use Yii;
use app\models\ArtigoCategoria;
use app\models\ArtigoCategoriaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ArtigoCategoriaController implements the CRUD actions for ArtigoCategoria model.
 */
class ArtigoCategoriaController extends Controller
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
     * Lists all ArtigoCategoria models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ArtigoCategoriaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ArtigoCategoria model.
     * @param integer $id_artigo
     * @param integer $id_categoria
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_artigo, $id_categoria)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_artigo, $id_categoria),
        ]);
    }

    /**
     * Creates a new ArtigoCategoria model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ArtigoCategoria();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_artigo' => $model->id_artigo, 'id_categoria' => $model->id_categoria]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ArtigoCategoria model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id_artigo
     * @param integer $id_categoria
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_artigo, $id_categoria)
    {
        $model = $this->findModel($id_artigo, $id_categoria);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_artigo' => $model->id_artigo, 'id_categoria' => $model->id_categoria]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ArtigoCategoria model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id_artigo
     * @param integer $id_categoria
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_artigo, $id_categoria)
    {
        $this->findModel($id_artigo, $id_categoria)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ArtigoCategoria model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id_artigo
     * @param integer $id_categoria
     * @return ArtigoCategoria the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_artigo, $id_categoria)
    {
        if (($model = ArtigoCategoria::findOne(['id_artigo' => $id_artigo, 'id_categoria' => $id_categoria])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
