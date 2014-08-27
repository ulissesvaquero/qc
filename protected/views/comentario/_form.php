<?php
$comentario = new Comentario();
$formComentario = $this->beginWidget(
		'booster.widgets.TbActiveForm',
		array(
				'id' => 'comentario'.$id,
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
					'htmlOptions' => array('id' => 'formComentario'.$id),
					'lang' => 'pt-BR',
					'height' => '100px'
				 )
			)
); ?>
<?php 
 echo CHtml::ajaxButton('Postar Comentário',
								Yii::app()->createUrl('comentario/cadastrarcomentario'),
								array("success" => 'js:function(retorno){$(\'#comentario'.$id.'\').append(retorno);}',
								//array("update" => '#comentario'.$id,
									  "data" => array("idPergunta" => $id)),
								array("class" => "btn btn-default bt-sm"));
?>
<?php $this->endWidget();?>