<?php
/* @var $this PerguntaController */
/* @var $model Pergunta */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pergunta-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'titulo'); ?>
		<?php echo $form->textArea($model,'titulo',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'titulo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'link_assoc'); ?>
		<?php echo $form->textField($model,'link_assoc',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'link_assoc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_qc'); ?>
		<?php echo $form->textField($model,'id_qc'); ?>
		<?php echo $form->error($model,'id_qc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_pagina'); ?>
		<?php echo $form->textField($model,'id_pagina'); ?>
		<?php echo $form->error($model,'id_pagina'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'link_gab'); ?>
		<?php echo $form->textField($model,'link_gab',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'link_gab'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_banca'); ?>
		<?php echo $form->textField($model,'id_banca'); ?>
		<?php echo $form->error($model,'id_banca'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_orgao'); ?>
		<?php echo $form->textField($model,'id_orgao'); ?>
		<?php echo $form->error($model,'id_orgao'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_cargo'); ?>
		<?php echo $form->textField($model,'id_cargo'); ?>
		<?php echo $form->error($model,'id_cargo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ano'); ?>
		<?php echo $form->textField($model,'ano'); ?>
		<?php echo $form->error($model,'ano'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_disciplina'); ?>
		<?php echo $form->textField($model,'id_disciplina'); ?>
		<?php echo $form->error($model,'id_disciplina'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'texto_associado'); ?>
		<?php echo $form->textArea($model,'texto_associado',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'texto_associado'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->