<div id="pergunta<?php echo $data->id;?>">
	<?php 
		$this->widget(
				'booster.widgets.TbPanel',
				array(
						'title' => 'Questão '.$data->id,
						'headerIcon' => 'question-sign',
						'context' => 'primary',
						'content' => $this->renderPartial('_view',$data,true),
				)
		);
	?>
</div>