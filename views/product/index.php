<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>

	<?= \yii\widgets\ListView::widget([
		'dataProvider' => $dataProvider,
		'itemView' => function ($model, $key, $index, $widget){
			return $this->render('_item', ['model' => $model]);
		},
	]); ?>

</div>
