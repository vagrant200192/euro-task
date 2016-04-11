<?php

namespace app\controllers;

use Yii;
use app\models\Product;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use yii\data\ActiveDataProvider;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
	        'access' => [
		        'class' => AccessControl::className(),
		        'only' => ['index', 'view'],
		        'rules' => [
			        [
				        'allow' => true,
				        'actions' => ['index', 'view'],
				        'roles' => ['@'],
			        ]
		        ],
	        ],
        ];
    }

    /**
     * Lists all Product models.
     * @return mixed
     */
    public function actionIndex()
    {
		$dataProvider = new ActiveDataProvider([
				'query' => Product::find(),
		]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Product model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
	    $model = $this->findModel($id);
	    $info = $model->info;

        return $this->render('view', [
            'model' => $model,
	        'info' => $info,
        ]);
    }

    /**
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
