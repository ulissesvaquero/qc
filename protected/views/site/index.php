<?php $this->beginWidget(
    'booster.widgets.TbJumbotron',
    array(
        'heading' => 'Concurseiro',
    )
); ?>
<p>Se está a procura de questões, este é o lugar certo, temos mais de 250.000 , 
   divididas por disciplina,assunto e até mesmo banca.</p>
<p><?php 

	echo CHtml::link('Inscreva-se',array('usuario/create'),array('class'=>'btn btn-primary btn-lg'));

?></p>
 
<?php $this->endWidget(); ?>