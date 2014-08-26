<?php
/* @var $this PerguntaController */
/* @var $model Pergunta */

$this->breadcrumbs=array(
	'Perguntas'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Pergunta', 'url'=>array('index')),
	array('label'=>'Create Pergunta', 'url'=>array('create')),
	array('label'=>'View Pergunta', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Pergunta', 'url'=>array('admin')),
);
?>

<h1>Update Pergunta <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>