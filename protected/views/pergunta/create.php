<?php
/* @var $this PerguntaController */
/* @var $model Pergunta */

$this->breadcrumbs=array(
	'Perguntas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Pergunta', 'url'=>array('index')),
	array('label'=>'Manage Pergunta', 'url'=>array('admin')),
);
?>

<h1>Create Pergunta</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>