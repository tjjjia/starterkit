<!doctype html>
<html lang="<?= site()->language() ? site()->language()->code() : 'en' ?>">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">

	<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">

	<?= $page->metaTags() ?>
	<meta name="apple-mobile-web-app-title" content="Crossing Parallels">
	<link rel="apple-touch-icon" href="http://www.crossingparallels.nl/assets/img/mobius-textured-02-logo-square-insta.png">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

	<?= css('/assets/css/index.css') ?>

</head>
<body>
	<header>
		<a href="<?= url() ?>" rel="home">
			<svg class="worm" viewBox="0 0 771.3 109.9">
				<text><?= $site->title()->html() ?></text>
				<use xlink:href="/assets/svg/symbols.svg#crossing-parallels-worm" />
			</svg>
		</a>
		<?php snippet('menu') ?>
	</header>
