<?php
$comentario = new Comentario();
$formComentario = $this->beginWidget(
		'booster.widgets.TbActiveForm',
		array(
				'id' => 'formComentario'.$data->id,
		)
);
?>
<?php echo $formComentario->html5EditorGroup(
			$comentario,
			'comentario',
			 array(
				'widgetOptions' => array(
					'editorOptions' => array(
						'class' => '',
						'rows' => 5,
						'height' => '100px',
						'options' => array('color' => true),
					),
					'htmlOptions' => array('id' => 'conteudo'.$data->id),
					'lang' => 'pt-BR',
					'height' => '100px'
				 )
			)
); ?>

<?php echo $formComentario->hiddenField($data, 'id'); ?>
<?php echo CHtml::hiddenField('hiddenOffset'.$data->id,'5',array('id'=>'hiddenOffset'.$data->id));?>
<?php 
 echo CHtml::ajaxButton('Postar Comentário',
								Yii::app()->createUrl('comentario/cadastrarcomentario'),
								array("success" => 'js:function(retorno){retornoCadastrarComentario('.$data->id.',retorno);}',
									  //'beforeSend' => '$(this).addClass(\'disabled\')',
								//array("update" => '#comentario'.$id,
									  "data" => array("idPergunta" => $data->id,'formData' => 'js:$(\'#formComentario'.$data->id.'\').serialize()')),
								array("class" => "btn btn-info btn-sm pull-right clearfix",'onclick' => 'botaoComentario($(\'#formComentario'.$data->id.'\'))'));
?>
<?php $this->endWidget();?>