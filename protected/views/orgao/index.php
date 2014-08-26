<?php
/* @var $this OrgaoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Orgaos',
);

$this->menu=array(
	array('label'=>'Create Orgao', 'url'=>array('create')),
	array('label'=>'Manage Orgao', 'url'=>array('admin')),
);
?>

<h1>Orgaos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
