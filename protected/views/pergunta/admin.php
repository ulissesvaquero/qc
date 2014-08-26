<?php
/* @var $this PerguntaController */
/* @var $model Pergunta */


$opts = CHtml::listData(Disciplina::model()->findAll(),'id_qc','disciplina');
$htmlOptions = array(	'prompt' => 'Selecione uma disciplina',
						'ajax' => array('type' => 'POST',
									 'url' => Yii::app()->createUrl('pergunta/carregaassunto'),
									 'update' => '#assunto',
									 'data' => array('id_disciplina' => 'js:this.value'))
);


echo CHtml::dropDownList('disciplina', '', $opts,$htmlOptions);
echo CHtml::dropDownList('assunto','', array(), array('prompt'=>'Selecione um assunto'));

//Colocar tudo dentro de um form pra pegar geral


 echo CHtml::ajaxButton(
            'Filtrar',
            array('pergunta/gettabelapergunta'),
            array('type' => 'POST','update' => '#tabelaRetorno','data'=>array("id_disciplina"=>'js:$("#disciplina option:selected").val()')),
            array('update'=>'#tabelaRetorno')
//this is the update selector of yours $('#update_selector').load(url);
        );

        
echo "<div id=\"tabelaRetorno\">asdasd</div>";
        
$this->breadcrumbs=array(
	'Perguntas'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Pergunta', 'url'=>array('index')),
	array('label'=>'Create Pergunta', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#pergunta-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Perguntas</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php /*$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'pergunta-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'titulo',
		'link_assoc',
		'id_qc',
		'id_pagina',
		'link_gab',
		/*
		'id_banca',
		'id_orgao',
		'id_cargo',
		'ano',
		'id_disciplina',
		'texto_associado',
		array(
			'class'=>'CButtonColumn',
		),
	),
));*/ ?>
