<?php

namespace app\modules\auth\controllers;

use Yii;
use app\modules\auth\models\AuthAssignment;
use app\modules\auth\models\AuthAssignmentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\HttpException;

/**
 * AuthAssignmentController implements the CRUD actions for AuthAssignment model.
 */
class AuthAssignmentController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
			// 'access'=>[
			// 	'class'=>AccessControl::className(),
			// 	'only'=>['create', 'update', 'delete'],
			// 	'rules'=>[
			// 		[
			// 		'actions'=>['create', 'update', 'delete'],
			// 		'allow'=>true,
			// 		'roles'=>[Yii::$app->user->can('administrador')],
			// 		],
					
					
			// 	],
			// ],
			
		
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all AuthAssignment models.
     * @return mixed
     */
    public function actionIndex()
    {
		if(Yii::$app->user->can('listar.assignments')){
			$searchModel = new AuthAssignmentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
		}
		else{
			throw new HttpException(403, 'Nao tem Permissão para executar esta acção '); 
		}
        
    }

    /**
     * Displays a single AuthAssignment model.
     * @param string $item_name
     * @param string $user_id
     * @return mixed
     */
    public function actionView($item_name, $user_id)
    {
		if(Yii::$app->user->can('ver.assignment')){
			return $this->render('view', [
            'model' => $this->findModel($item_name, $user_id),
        ]);
		}
		else{
			throw new HttpException(403, 'Nao tem Permissão para executar esta acção'); 
		}
        
    }

    /**
     * Creates a new AuthAssignment model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
		
		if(Yii::$app->user->can('admin')){
			$model = new AuthAssignment();
			if ($model->load(Yii::$app->request->post()) && $model->save()) {
				return $this->redirect(['view', 'item_name' => $model->item_name, 'user_id' => $model->user_id]);
			} else {
				return $this->render('create', [
					'model' => $model,
				]);
        }
		}
		else{
			throw new HttpException(403, 'Nao tem Permissão para executar esta acção'); 
		}
        
    }

    /**
     * Updates an existing AuthAssignment model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $item_name
     * @param string $user_id
     * @return mixed
     */
    public function actionUpdate($item_name, $user_id)
    {
		if(Yii::$app->user->can('admin')){
			$model = $this->findModel($item_name, $user_id);

			if ($model->load(Yii::$app->request->post()) && $model->save()) {
				return $this->redirect(['view', 'item_name' => $model->item_name, 'user_id' => $model->user_id]);
			} else {
				return $this->render('update', [
					'model' => $model,
				]);
			}
		}
		else{
			throw new HttpException(403, 'Nao tem Permissão para executar esta acção'); 
		}
        
    }

    /**
     * Deletes an existing AuthAssignment model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $item_name
     * @param string $user_id
     * @return mixed
     */
    public function actionDelete($item_name, $user_id)
    {
		if(Yii::$app->user->can('apagar.assignment')){
			$this->findModel($item_name, $user_id)->delete();

			return $this->redirect(['index']);
		}
		else{
			throw new HttpException(403, 'Nao tem permissao para executar esta accao'); 
		}
        
    }

    /**
     * Finds the AuthAssignment model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $item_name
     * @param string $user_id
     * @return AuthAssignment the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($item_name, $user_id)
    {
        if (($model = AuthAssignment::findOne(['item_name' => $item_name, 'user_id' => $user_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
