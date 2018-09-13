<?php snippet('header') ?>

<main class="main error" role="main">
	<article>
		<header class="article-header">
				<div class="cover--title">
					<h1><?= $page->title()->html() ?></h1>
				</div>
		</header>

		<div class="intro">
			<?= $page->intro()->kirbytext() ?>
		</div>

		<div class="text">
			<?= $page->text()->kirbytext() ?>
		</div>

	</article>

</main>

<?php snippet('footer') ?>