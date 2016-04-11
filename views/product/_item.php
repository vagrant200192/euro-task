<?php

/**
 * @var $model app\models\Product
 */

use yii\helpers\Html;

$infoUser = $model->infoUser;
?>

<h3>Product's name: <?= Html::a($model->title, ['view', 'id' => $model->id])?></h3>
<div class="row">
	<?= Html::beginForm(['info/add-info', 'product_id' => $model->id, 'info_id' => $infoUser->id], 'post') ?>
				<div class="col-md-1 text-right">Rating: </div>
				<div class="col-md-1">
					<?= Html::dropDownList('Rating',
							!empty($infoUser->rating) ? $infoUser->rating : 0,
							[
								0 => 'No rating',
								1 => 1,
								2 => 2,
								3 => 3,
								4 => 4,
								5 => 5
							]) ?>
				</div>
				<div class="col-md-1 text-right">Comment: </div>
				<div class="col-md-1">
					<?= Html::textarea('Comment', $infoUser->comment, ['rows' =>'10', 'cols' => '50']); ?>
				</div>
				<div class="col-md-10">
					<?= Html::submitButton('Save', ['class' => 'btn btn-lg btn-primary']) ?>
				</div>
	<?= Html::endForm() ?>
</div>