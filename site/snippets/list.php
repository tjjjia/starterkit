<?php
/*
This list returns all articles related to a resident (original content)
*/

?>
<?php if (isset($cp_filter)): // residents page ?>
	<section class="list <?=$cp_filter?>">
<?php elseif (isset($resident)): // resident page ?>
	<section class="list related-publications">
		<h2>Related publications</h2>
<?php else: // other instances of list.php ?>
	<section class="list">
<?php endif; ?>
	<?php if($articles->count()): ?>
		<?php
			if (isset($cp_filter)) {
				$articles = $articles->filterBy('programme', $cp_filter,',');
			}
		?>
		<ul>
			<?php foreach($articles as $article): ?>
				<?php if($article->intendedTemplate() == 'article'): ?>
					<li class="<?= $article->intendedTemplate() ?>">
						<?php if(! $article->datetime()->empty() && ! $article->author()->empty() ): ?>
							<div class="card--infobox">
								<p>Published by <?= $article->author() ?>
								at <?= $article->datetime() ?></p>
							</div>
						<?php endif ?>
							<div class="card--title">
								<a href="<?= $article->url() ?>">
									<h3><?= $article->title()->html() ?></h3>
									<?php // image check
										$image = $article->image($article->coverimage());
										if($image):
									?>
										<div class="card--image filter--blueAlpha" style="background-image: url(<?php echo $image->url() ?>); background-position: <?php echo $image->focusPercentageX() ?>% <?php echo $image->focusPercentageY() ?>%;">
									<?php else: ?>
										<div class="card--image filter--blueAlpha">
									<?php endif ?>
										</div>
									</a>
							</div>
							<?php if(! $article->teaser()->empty() ): ?>
								<div class="card--main">
									<p><?= $article->teaser() ?></p>
								</div>
							<?php elseif(! $article->text()->empty() ): ?>
								<div class="card--main">
									<p><?= excerpt($article->text(), 300) ?></p>
								</div>
							<?php else: ?>
							<?php endif ?>
					</li>

				<?php elseif($article->intendedTemplate() == 'metascraper'): ?>
					<li class="<?= $article->intendedTemplate() ?>">
						<?php if(! $article->datetime_src()->empty() && ! $article->url_src()->empty()): ?>
							<div class="card--infobox">
								<p>Originally published
									on
									<a href="<?= $article->url_src() ?>" target="_blank">
										<?= parse_url($article->url_src(), PHP_URL_HOST) ?>
									</a>
									at
									<?= $article->datetime_src() ?>
									  <!-- on <?= $article->publisher() ?> -->
								</p>
							</div>
						<?php endif ?>
						<div class="card--main">
							<a href="<?= $article->url_src() ?>" target="_blank">
								<h3><?= $article->title()->html() ?> <img src="/assets/svg/chain.svg" style="fill:#fff; height: 5rem; padding: .7rem;"></h3>
							</a>
							<?php if($article->image()): ?>
								<figure>
									<img src="<?= $article->image()->url() ?>" alt="Preview of <?= $article->title() ?>">
								</figure>
							<?php endif ?>
							<p><?= excerpt($article->description(), 300) ?></p>
						</div>
					</li>

				<?php elseif($article->intendedTemplate() == 'resident'): ?>
							<li class="<?= $article->intendedTemplate() ?>">
								<a href="<?= $article->url() ?>">
									<h3><?= $article->title()->html() ?></h3>
									<!-- <?php if($image = $article->images()->sortBy('sort', 'asc')->first()): $thumb = $image->crop(720, 240); ?>
										<img src="<?= $thumb->url() ?>" alt="Thumbnail for <?= $article->title()->html() ?>" />
									<?php endif ?> -->
								</a>
							</li>
				<?php endif ?>
			<?php endforeach ?>
		</ul>
	<?php else: ?>
	<?php endif ?>
</section>
