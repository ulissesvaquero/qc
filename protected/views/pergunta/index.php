<?php 

Yii::app()->session['header'] = "<h1>Questões</h1>"." <p class=\"lead\">Selecione abaixo a disciplina, assunto e até mesmo a banca de deseja</p>"


?>




<?php $form=$this->beginWidget('booster.widgets.TbActiveForm', array(
	'id'=>'pergunta-form',
	'method' => 'GET',
	'action' => Yii::app()->createUrl('pergunta/index'),
	'htmlOptions' => array('class' => 'well'),
	'type' => 'horizontal',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>



<?php
$opts = CHtml::listData(Disciplina::model()->findAll(),'id_qc','disciplina');
$htmlOptions = array(	'prompt' => 'Selecione uma disciplina',
		'ajax' => array('type' => 'POST',
				'url' => Yii::app()->createUrl('pergunta/carregaassunto'),
				'update' => '#Pergunta_id_assunto',
				'data' => array('id_disciplina' => 'js:this.value'))
);
 echo $form->dropDownListGroup(
		$pergunta,
		'id_disciplina',
		array(
				'wrapperHtmlOptions' => array(
						'class' => 'col-sm-5',
				),
				'widgetOptions' => array(
						'data' => $opts,
						'htmlOptions' => $htmlOptions,
				)
			)
		);

$optAssunto = array('' => 'Selecione um assunto');
if($pergunta->id_disciplina)
{
	$arrOptAssunto = CHtml::listData(Assunto::model()->findAll('id_disciplina = '.$pergunta->id_disciplina),'id','assunto');
	$optAssunto = $optAssunto + $arrOptAssunto;
}

echo $form->dropDownListGroup($pergunta,'id_assunto',array('wrapperHtmlOptions' => array(
						'class' => 'col-sm-5',
				),'widgetOptions' => array('data' => $optAssunto)));

$optsBanca = CHtml::listData(Banca::model()->findAll(),'id','sigla');

echo $form->dropDownListGroup($pergunta,'id_banca',array(
	'wrapperHtmlOptions' => array('class' => 'col-sm-5'),
	'widgetOptions' => array('data' => array('' => 'Selecione uma banca') + $optsBanca)
));

?>


<?php 
	$this->widget(
			'booster.widgets.TbButton',
			array(
				'buttonType' => 'submit',
				'context' => 'primary',
				'label' => 'Filtrar'
			)
		); 
?>

<?php 
	$this->widget(
			'booster.widgets.TbButton',
			array('buttonType' => 'reset', 'label' => 'Limpar')
		); 
?>



<?php $this->endWidget(); ?>



<?php
			/*	$this->widget(
    					'booster.widgets.TbMenu',
					array(
					    'type' => 'list',
						'htmlOptions' => array('data-spy' => 'affix','class'=>'nav nav-list bs-docs-sidenav affix'),
					    'items' => array(
									array(
					    'label' => 'List header',
					    'itemOptions' => array('class' => 'nav-header')
									),
									array(
					    'label' => 'Home',
					    'url' => '#form1',
					    //'itemOptions' => array('class' => 'active')
									),
									array('label' => 'Library', 'url' => '#form2'),
									array('label' => 'Applications', 'url' => '#form3'),
				
				)));*/
?>



<div class="col-xs-2 hidden-xs" id="myScrollspy">
	<ul class="nav nav-tabs nav-stacked" data-spy="affix" data-offset-top="400">
<?php 
	foreach($dataProvider->getData() as $key => $data)
	{
		if($key == 0)
		{
			echo "<li class=\"active\"><a href=\"#pergunta{$data->id}\">Pergunta {$data->id}</a></li>";
		}else 
		{
			echo "<li><a href=\"#pergunta{$data->id}\">Pergunta {$data->id}</a></li>";
		}
	}
?>
	</ul>
</div>
                
          



<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_pergunta',
	'pager' => array('pageSize' => 5),
	'ajaxUpdate' => false,
	'htmlOptions' => array('class' => 'col-xs-10'),
	)); ?>
	
	
	
	
