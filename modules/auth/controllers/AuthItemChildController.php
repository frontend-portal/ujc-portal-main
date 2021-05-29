<?php

namespace app\modules\auth\controllers;

use Yii;
use app\modules\auth\models\AuthItemChild;
use app\modules\auth\models\AuthItem;
use app\modules\auth\models\AuthItemChildSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\HttpException;

/**
 * AuthItemChildController implements the CRUD actions for AuthItemChild model.
 */
class AuthItemChildController extends Controller
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
     * Lists all AuthItemChild models.
     * @return mixed
     */
    public function actionIndex()
    {
		if(Yii::$app->user->can('admin')){
			$searchModel = new AuthItemChildSearch();
			$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

			return $this->render('index', [
				'searchModel' => $searchModel,
				'dataProvider' => $dataProvider,
			]);
		}
		else{
			throw new HttpException(403, 'Nao tem permissao para executar esta accao'); 
		}
        
    }

    /**
     * Displays a single AuthItemChild model.
     * @param string $parent
     * @param string $child
     * @return mixed
     */
    public function actionView()
    {
		if(Yii::$app->user->can('admin')){
			$searchModel = new AuthItemChildSearch();
			$dataProvider = $searchModel->searchPermissions(Yii::$app->request->get('parent'));

			return $this->render('view', [
				'searchModel' => $searchModel,
				'dataProvider' => $dataProvider,
			]);
		}
		else{
			throw new HttpException(403, 'Nao tem permissao para executar esta accao'); 
		}
        
    }

    /**
     * Creates a new AuthItemChild model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
		// if(Yii::$app->user->can('criar.itemchild')){
				$model = new AuthItemChild();

			if ($model->load(Yii::$app->request->post()) && $model->validate()) {
				
				$children = ($_POST['child']);
				$parent  = $model->parent;
				foreach($children as $child){
					
					$model = new AuthItemChild();
					$model->child = $child;
					$model->parent = $parent;
					if(AuthItemChild::find()->where( [ 'parent' => $model->parent, 'child'=>$model->child ] )->exists()){
						
					}else{
						$model->save();
						}
					
					
					
				}
				return $this->redirect(['view', 'parent' => $model->parent,]);
			} else {
				return $this->render('create', [
					'model' => $model,
				]);
			}
		// }
		// else{
		// 	throw new HttpException(403, 'Nao tem permissao para executar esta accao'); 
		// }
		
        
    }
	
	
	/*Get permisions according to the selected role in the form*/
	public function actionGetpermissions()
{
	
    if ($id = Yii::$app->request->post('id')) {
        $itemPosts = AuthItem::find()
            ->where(['type' => 2])
            ->count();
			
		$selectedoptions = AuthItemChild::find()
                ->where(['parent' => $id])
                ->all();
		
		$order = 0;
		
 
        if ($itemPosts > 0) {
            $items = AuthItem::find()
                ->where(['type' => 2])
                ->all();
				
            foreach ($items as $item){
				$order = $order+1;
				$checked = false;
				foreach($selectedoptions as $selected){
					//$checked=$checked;
					if($selected->child==$item->name){
						$checked = true;
						//break;
					}

				}
				//echo $checked.'<br/>';
				if($checked){$seleccionado = 'checked';}
								else{$seleccionado='';}
				//echo $seleccionado.'<br/>';
				
							echo "<div class='checkbox col-md-12' ><label>$order.</label>&nbsp;
							<label><input name='child[]' type='checkbox' $seleccionado  value='".$item->name."'/>".$item->description."</label>
							</div>
							";
				
			}
                exit;
        } else{
            echo "";
        }
 
    }
	
 
    }
	

    /**
     * Updates an existing AuthItemChild model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $parent
     * @param string $child
     * @return mixed
     */
    public function actionUpdate($parent, $child)
    {
		//if(Yii::$app->user->can('actualizar.itemchild')){
			$model = $this->findModel($parent, $child);

			if ($model->load(Yii::$app->request->post()) && $model->save()) {
				return $this->redirect(['view', 'parent' => $model->parent, 'child' => $model->child]);
			} else {
				return $this->render('update', [
					'model' => $model,
				]);
			}
		//}
		//else{
		//	throw new HttpException(403, 'Nao tem permissao para executar esta accao'); 
		//}
        
    }

    /**
     * Deletes an existing AuthItemChild model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $parent
     * @param string $child
     * @return mixed
     */
    public function actionDelete($parent, $child)
    {
		if(Yii::$app->user->can('apagar.itemchild')){
			$this->findModel($parent, $child)->delete();

			return $this->redirect(['index']);
		}
		else{
			throw new HttpException(403, 'Nao tem permissao para executar esta accao'); 
		}
        
    }

    /**
     * Finds the AuthItemChild model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $parent
     * @param string $child
     * @return AuthItemChild the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($parent, $child)
    {
        if (($model = AuthItemChild::findOne(['parent' => $parent, 'child' => $child])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
