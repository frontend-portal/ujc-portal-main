<?php

namespace app\modules\auth\controllers;

use Yii;
use app\modules\auth\models\AuthItem;
use app\modules\auth\models\AuthItemSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\HttpException;

/**
 * AuthItemController implements the CRUD actions for AuthItem model.
 */
class AuthItemController extends Controller
{
    /**
     * @inheritdoc
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
     * Lists all AuthItem models.
     * @return mixed
     */
    public function actionIndex()
    {
		//if(Yii::$app->user->can('ver-permissoes')){
			$searchModel = new AuthItemSearch();
			$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

			return $this->render('index', [
				'searchModel' => $searchModel,
				'dataProvider' => $dataProvider,
			]);
		//}
		//else{
		//	throw new HttpException(403, 'Nao tem permissao para executar esta accao'); 
		//}
        
    }

//action para exibir papeis de utilizadores
    public function actionRoles()
    {
		//if(Yii::$app->user->can('ver-papeis')){
			$searchModel = new AuthItemSearch();
			$dataProvider = $searchModel->searchRoles(Yii::$app->request->queryParams);

			return $this->render('roles', [
				'searchModel' => $searchModel,
				'dataProvider' => $dataProvider,
			]);
		//}
		//else{
		//	throw new HttpException(403, 'Nao tem permissao para executar esta accao'); 
		//}
        
    }


//action para exibir permissoes de utilizadores
public function actionPermissions()
    {
		//if(Yii::$app->user->can('ver-permissoes')){
			$searchModel = new AuthItemSearch();
			$dataProvider = $searchModel->searchPermissions(Yii::$app->request->queryParams);

			return $this->render('permissions', [
				'searchModel' => $searchModel,
				'dataProvider' => $dataProvider,
			]);
		/*}
		else{
			throw new HttpException(403, 'Nao tem permissao para executar esta accao'); 
		}*/
        
    }


    /**
     * Displays a single AuthItem model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
		//if(Yii::$app->user->can('administrador')){
			return $this->render('view', [
            'model' => $this->findModel($id),
			]);
		//}
		//else{
		//	throw new HttpException(403, 'Nao tem permissao para executar esta accao'); 
		//}
        
    }

    /**
     * Creates a new AuthItem model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
		//if(Yii::$app->user->can('criar-permissoes')){
			$model = new AuthItem();

			if ($model->load(Yii::$app->request->post()) && $model->save()) {
				return $this->redirect(['view', 'id' => $model->name]);
			} else {
				return $this->render('create', [
					'model' => $model,
				]);
			}
		/*}
		else{
			throw new HttpException(403, 'Nao tem permissao para executar esta accao'); 
		}*/
        
    }

    public function actionCreatePermission()
    {
		//if(Yii::$app->user->can('criar-permissoes')){
			 $model = new AuthItem();

			if ($model->load(Yii::$app->request->post()) && $model->save()) {
				return $this->redirect(['view', 'id' => $model->name]);
			} else {
				return $this->render('create-permission', [
					'model' => $model,
				]);
			}
		/*}
		else{
			throw new HttpException(403, 'Nao tem permissao para executar esta accao'); 
		}*/
		
       
    }

    public function actionCreatePapel()
    {
		//if(Yii::$app->user->can('criar-papeis')){
			$model = new AuthItem();

			if ($model->load(Yii::$app->request->post()) && $model->save()) {
				return $this->redirect(['view', 'id' => $model->name]);
			} else {
				return $this->render('create-papel', [
					'model' => $model,
				]);
			}
		/*}
		else{
			throw new HttpException(403, 'Nao tem permissao para executar esta accao'); 
		}*/
        
    }


    /**
     * Updates an existing AuthItem model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
		//if(Yii::$app->user->can('editar-permissoes')){
			$model = $this->findModel($id);

			if ($model->load(Yii::$app->request->post()) && $model->save()) {
				return $this->redirect(['view', 'id' => $model->name]);
			} else {
				return $this->render('update', [
					'model' => $model,
				]);
			}
		/*}
		else{
			throw new HttpException(403, 'Nao tem permissao para executar esta accao'); 
		}*/
        
    }

    /**
     * Deletes an existing AuthItem model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
		//if(Yii::$app->user->can('apagar-permissoes')){
			        $this->findModel($id)->delete();

			return $this->redirect(['index']);
		/*}
		else{
			throw new HttpException(403, 'Nao tem permissao para executar esta accao'); 
		}*/

    }

    /**
     * Finds the AuthItem model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return AuthItem the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AuthItem::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
