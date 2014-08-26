<?php
/* @var $this OrgaoController */
/* @var $model Orgao */

$this->breadcrumbs=array(
	'Orgaos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Orgao', 'url'=>array('index')),
	array('label'=>'Create Orgao', 'url'=>array('create')),
	array('label'=>'View Orgao', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Orgao', 'url'=>array('admin')),
);
?>

<h1>Update Orgao <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>