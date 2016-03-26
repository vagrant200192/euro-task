<?php

namespace app\controllers;

use Yii;
use app\models\Info;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;


class InfoController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
	        'access' => [
		        'class' => AccessControl::className(),
		        'only' => ['add-info'],
		        'rules' => [
			        [
				        'allow' => true,
				        'actions' => ['add-info'],
				        'roles' => ['@'],
			        ]
		        ],
	        ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'add-info' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Finds the Info model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Info the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Info::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

	public function actionAddInfo($product_id, $info_id = null)
	{
		$rating = Yii::$app->request->post('Rating');
		$comment = Yii::$app->request->post('Comment');
		$user_id = Yii::$app->getUser()->id;

		if ($info_id === null) {
			$model = new Info();
			$model->addedAttribute($rating, $comment, $product_id, $user_id);
			$model->save();
		} else {
			$model = $this->findModel($info_id);
			$model->addedAttribute($rating, $comment, $product_id, $user_id);
			$model->save();
		}

		$this->redirect('/product/index');
	}
}
