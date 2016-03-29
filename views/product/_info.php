<?php

/** @var $info array */

$summa = 0;
$numberIsNotNullRating = 0;

if (!empty($info)) : ?>

	<?php foreach($info as $infa): ?>

		<?php if ($infa['rating']!=0) {
			$summa+=$infa['rating'];
			$numberIsNotNullRating+=1;
		}?>

		<?php if (($infa['rating']!=0) and ($infa['comment']!='')): ?>
			<div class="row border">
				<div class="col-md-12">
					<p>Username: <?= $infa['username'] ?></p>
					<?php if ($infa['rating']!=0): ?>
						<p>Rating: <?= $infa['rating'] ?></p>
					<?php endif ?>
					<?php if ($infa['comment']!=''): ?>
						<p>Comment: <?= $infa['comment'] ?></p>
					<?php endif ?>
				</div>
			</div>
		<?php endif ?>
	<?php endforeach ?>

	<div class="row">
		<div class="col-md-2"><strong>Total:</strong><?= $summa ?></div>
		<div class="col-md-2"><strong>Average value:</strong><?= $summa != 0 ? round($summa/$numberIsNotNullRating, 2) : 0 ?></div>
	</div>

<?php else: echo 'No result'; ?>

<?php endif ?>