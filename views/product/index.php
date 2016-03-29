<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $products array */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>

	<?php foreach($products as $product): ?>
	<h3>Product's name: <?= Html::a($product['title'], ['view', 'id' => $product['id']])?></h3>
		<div class="row">
			<?= Html::beginForm(['info/add-info', 'product_id' => $product['id'], 'info_id' => $product['info_id']], 'post') ?>
			<div class="col-md-1 text-right">Rating: </div>
			<div class="col-md-1">
				<?= Html::dropDownList('Rating',
						!empty($product['rating']) ? $product : 0,
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
				<?= Html::textarea('Comment', $product['comment'], ['rows' =>'10', 'cols' => '50']); ?>
			</div>
			<div class="col-md-10">
				<?= Html::submitButton('Save', ['class' => 'btn btn-lg btn-primary']) ?>
			</div>

			<?= Html::endForm() ?>
		</div>
	<?php endforeach ?>
</div>
