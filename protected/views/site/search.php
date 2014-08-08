<?php
	$this->breadcrumbs = array(
				//'Djghjc'=>array('site/page/'),
				'Результаты поиска',
			);
	$this->addCss('page/page.css');
	$this->addCss('site/search.css');

	Utils::print_r($search_results,false);
?>
<!-- <div class='page'>
	<?php if (!$search_results['err']): ?>
		<h1>Результаты поиска</h1>
		<h3>(искомая строка <span><?php echo trim($search_results['search_text']);?></span>)</h3>

		<div class='border'>
		<?php
			$i = 1;
			foreach ($search_results['pages'] as $page) { ?>
				<div class='row'>
					<div class='href'>
						<?php echo $i++.') '; ?>
						<?php echo CHtml::link($page['pagename'], array($page['href'])); ?>
					</div>
					<div class='text'>
						<?php echo $page['text']; ?>
					</div>
				</div>
			<?php
			}
		?>
		</div>
	<?php else: ?>
			<h1>
				<?php echo $search_results['err']; ?>
			</h1>
	<?php endif; ?>
</div>
 -->