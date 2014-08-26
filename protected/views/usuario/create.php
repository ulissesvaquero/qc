<?php
$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Usuario','url'=>array('index')),
array('label'=>'Manage Usuario','url'=>array('admin')),
);
?>

<header class="masthead subhead" id="overview">
    <div class="container">
        <h1>Conta de Acesso</h1>
        <p class="lead">Falta pouco para acessar o maior repositório de questões da internet gratuito.</p>
    </div>
</header>


<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>