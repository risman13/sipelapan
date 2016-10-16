<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= getTitle() ?></title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="<?=base_url('assets/css/icons/icomoon/styles.css')?>" rel="stylesheet" type="text/css">
	<link href="<?=base_url('assets/css/icons/fontawesome/styles.min.css')?>" rel="stylesheet" type="text/css">
	<link href="<?=base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet" type="text/css">
	<link href="<?=base_url('assets/css/core.min.css')?>" rel="stylesheet" type="text/css">
	<link href="<?=base_url('assets/css/components.min.css')?>" rel="stylesheet" type="text/css">
	<link href="<?=base_url('assets/css/colors.min.css')?>" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Add stylesheets -->
	<?php foreach ($css as $file): ?>
	<link rel="stylesheet" href="<?= $file; ?>" type="text/css" /><br>
	<?php endforeach ?>
	<!-- /Add stylesheets -->

	<!-- Core JS files -->
	<script type="text/javascript" src="<?=base_url('assets/js/plugins/loaders/pace.min.js')?>"></script>
	<script type="text/javascript" src="<?=base_url('assets/js/core/libraries/jquery.min.js')?>"></script>
	<script type="text/javascript" src="<?=base_url('assets/js/plugins/loaders/blockui.min.js')?>"></script>
	<script type="text/javascript" src="<?=base_url('assets/js/core/libraries/bootstrap.min.js')?>"></script>
	<script type="text/javascript" src="<?=base_url('assets/js/plugins/ui/moment/moment.min.js')?>"></script>
	<!-- /core JS files -->

	<!-- Add js -->
	<?php foreach ($js as $file): ?>
	<script type="text/javascript" src="<?= $file; ?>"></script>
	<?php endforeach ?>
	<!-- /Add js -->

	<!-- Theme JS files -->
	<script type="text/javascript" src="<?=base_url('assets/js/core/app.min.js')?>"></script>
	<!-- /theme JS files -->
</head>

<body>

	<?= $this->output->get_section('navbar'); ?>

	<?= $this->output->get_section('pageheader'); ?>

	<?= $output ?>

	<?= $this->output->get_section('footer'); ?>

</body>
</html>