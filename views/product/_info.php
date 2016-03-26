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

		<div class="row">
			<div class="col-md-12">
				<p>Username: <?= $infa['username'] ?></p>
				<?php if ($infa['rating']!=0): ?> <p>Rating: <?= $infa['rating'] ?></p> <?php endif ?>
				<p>Comment: <?= $infa['comment'] ?> </p>
			</div>
		</div>

	<?php endforeach ?>

	<div class="row">
		<div class="col-md-2">SUMMA:<?= $summa ?></div>
		<div class="col-md-2">AVG:<?= $summa != 0 ? round($summa/$numberIsNotNullRating, 2) : 0 ?></div>
	</div>

<?php else: echo 'No result'; ?>

<?php endif ?>