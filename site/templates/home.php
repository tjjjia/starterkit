<?php snippet('header') ?>

<?php
	if( $articles->pagination()->page() === 1 ) {
		$extra_class = " home";
	} else{
		$extra_class = "";
	}
?>

<main class="main current-affairs<?= $extra_class ?>" role="main">
	<h1 class="accessibility"><?= $page->title()->html() ?></h1>
	<?php snippet('list') ?>

	<nav class="pagination">
		<?php if($pagination->hasPrevPage()): ?>
			<div class="previous">
				<a href="<?= $pagination->prevPageUrl() ?>">Newer items</a>
			</div>
		<?php endif ?>

		<?php if($pagination->hasNextPage()): ?>
			<div class="next">
				<a href="<?= $pagination->nextPageUrl() ?>">Older items</a>
			</div>
		<?php endif ?>
	</nav>
</main>

<?php snippet('footer') ?>