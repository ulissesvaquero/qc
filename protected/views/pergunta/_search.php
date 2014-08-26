<?php
/* @var $this PerguntaController */
/* @var $model Pergunta */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'titulo'); ?>
		<?php echo $form->textArea($model,'titulo',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'link_assoc'); ?>
		<?php echo $form->textField($model,'link_assoc',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_qc'); ?>
		<?php echo $form->textField($model,'id_qc'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_pagina'); ?>
		<?php echo $form->textField($model,'id_pagina'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'link_gab'); ?>
		<?php echo $form->textField($model,'link_gab',array('size'=>40,'maxlength'=>40)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_banca'); ?>
		<?php echo $form->textField($model,'id_banca'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_orgao'); ?>
		<?php echo $form->textField($model,'id_orgao'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_cargo'); ?>
		<?php echo $form->textField($model,'id_cargo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ano'); ?>
		<?php echo $form->textField($model,'ano'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_disciplina'); ?>
		<?php echo $form->textField($model,'id_disciplina'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'texto_associado'); ?>
		<?php echo $form->textArea($model,'texto_associado',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->