<div class="raq-block">
	<div class="close-btn clearfix">
		<a href="#">close menu</a>
	</div>
	<h2><?php echo l(t('Request a quote'), 'request_quote'); ?></h2>
	<ul>
		<?php foreach($sideMenus as $key=>$value): ?>
			<li><?php echo l(t($value['title']), $value['href'], array('attributes' => $value['attributes'])); ?></li>
    <?php endforeach; ?>
	</ul>
</div>

