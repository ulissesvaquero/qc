<?php
/* @var $this PerguntaController */
/* @var $model Pergunta */

$this->breadcrumbs=array(
	'Perguntas'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Pergunta', 'url'=>array('index')),
	array('label'=>'Create Pergunta', 'url'=>array('create')),
	array('label'=>'Update Pergunta', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Pergunta', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Pergunta', 'url'=>array('admin')),
);
?>

<h1>View Pergunta #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'titulo',
		'link_assoc',
		'id_qc',
		'id_pagina',
		'link_gab',
		'id_banca',
		'id_orgao',
		'id_cargo',
		'ano',
		'id_disciplina',
		'texto_associado',
	),
)); ?>
