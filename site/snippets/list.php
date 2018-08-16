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
								<p>Originally published on
									<a href="<?= $article->url_src() ?>" target="_blank"><?= parse_url($article->url_src(), PHP_URL_HOST) ?></a>
									at
									<?= $article->datetime_src() ?>
								</p>
							</div>
						<?php endif ?>
						<div class="card--main">
							<a href="<?= $article->url_src() ?>" target="_blank">
								<h3><?= $article->title()->html() ?> <svg class="inline-logo symbol-exit" viewBox="0 0 71.365 80.001"><text>(External link)</text><use xlink:href="/assets/svg/symbols.svg#symbol-exit"></use></svg></h3>
							</a>
							<?php // image check
								$image = $article->image();
								if($image):
							?>
								<div class="card--image" style="display:block; height:60rem; margin-bottom:1.5rem; background-image: url(<?= $image->url()?>); background-position: <?= $image->focusPercentageX() ?>% <?= $image->focusPercentageY() ?>%;">
								</div>
							<?php endif ?>
							<p><?= excerpt($article->description(), 300) ?></p>
						</div>
					</li>

				<?php elseif($article->intendedTemplate() == 'resident'): ?>
							<li class="<?= $article->intendedTemplate() ?>">
								<a href="<?= $article->url() ?>">
									<h3><?= $article->title()->html() ?></h3>
								</a>
							</li>
				<?php endif ?>
			<?php endforeach ?>
		</ul>
	<?php else: ?>
	<?php endif ?>
</section>
