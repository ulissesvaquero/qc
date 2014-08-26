<div id="pergunta<?php echo $data->id;?>" style="padding-top: 50px; min-height:300px">
	<?php 
		$this->widget(
				'ext.vaquero.widgets.VTbPanel',
				array(
						'title' => 'Questão'.$data->id,
						'headerIcon' => 'question-sign',
						'context' => 'primary',
						'content' => $this->renderPartial('_view',$data,true),
						'footer' => $this->renderPartial('_footer',$data,true)
				)
		);
	?>
</div>