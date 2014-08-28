<?php 
	$div = "divFormComentario".$data->id;
	$this->widget(
			'booster.widgets.TbButton',
			array(
					'label' => 'Comentários',
					'context' => 'primary',
					'icon' => 'glyphicon glyphicon-comment',
					'htmlOptions' => array('onclick' => '$(\'#'.$div.'\').toggle()'),
					
			)
	);
?>


	<?php 
		/* echo CHtml::ajaxButton('Comentarios',
								Yii::app()->createUrl('comentario/getform'),
								array("update" => '#comentario'.$data->id ,
									  "data" => array("idPergunta" => $data->id)),
								array("class" => "btn btn-default bt-sm")); */
	?>
<div id="<?php echo $div;?>" style="padding: 10px ; display:none;">
<?php 
	echo CHtml::tag('a', array('class'=>'close','onclick'=>'$(\'#'.$div.'\').hide()'),'X',true);	
?>
<?php $this->renderPartial('/comentario/_form',array('data' => $data));?>

<div id="comentario<?php echo $data->id;?>" style="padding-top: 30px;"></div>

<?php 
	echo CHtml::tag('a', array('class'=>'close pull-left','onclick'=>'$(\'#'.$div.'\').hide()'),'X',true);	
?>
</div>

