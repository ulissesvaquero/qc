<div id="pergunta<?php echo $data->id;?>" style="padding-top: 50px; min-height:300px">
	<?php 
		$this->widget(
				'booster.widgets.TbPanel',
				array(
						'title' => 'Questão'.$data->id,
						'headerIcon' => 'question-sign',
						'context' => 'primary',
						'content' => $this->renderPartial('_view',$data,true),
				)
		);
	?>
</div>