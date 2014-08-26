<?php
/* @var $this OrgaoController */
/* @var $model Orgao */

$this->breadcrumbs=array(
	'Orgaos'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Orgao', 'url'=>array('index')),
	array('label'=>'Create Orgao', 'url'=>array('create')),
	array('label'=>'Update Orgao', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Orgao', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Orgao', 'url'=>array('admin')),
);
?>

<h1>View Orgao #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'sigla',
		'descricao',
		'link',
	),
)); ?>
