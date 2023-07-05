<!doctype html>
<html class="no-js" lang="">

<?= $this->include('head'); ?>

<body>
	<?= $this->include('bodymenu'); ?>

	<div id="right-panel" class="right-panel">
		<?= $this->include('header'); ?>
		
		<?= $this->include($content); ?>

		<div class="clearfix"></div>
		<?= $this->include('footer')?>
	</div><!-- /#right-panel -->
	
	<?= $this->include('scripts')?>

</body>
</html>