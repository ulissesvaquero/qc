<?php
/* @var $this OrgaoController */
/* @var $model Orgao */

$this->breadcrumbs=array(
	'Orgaos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Orgao', 'url'=>array('index')),
	array('label'=>'Manage Orgao', 'url'=>array('admin')),
);
?>

<h1>Create Orgao</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>