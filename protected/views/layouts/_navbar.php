<?php 
$this->widget(
    'booster.widgets.TbNavbar',
    array(
        'type' => null, // null or 'inverse'
        'brand' => 'Vaquero QC',
        'brandUrl' => '#',
        'collapse' => true, // requires bootstrap-responsive.css
        'fixed' => 'top',
        'fluid' => true,
        'items' => array(
            array(
                'class' => 'booster.widgets.TbMenu',
            	'htmlOptions' => array('div' => '#navbar'),
            	'type' => 'navbar',
                'items' => array(
                    array('label' => 'Inicial', 'url' => array('/site/index')),
                    array('label' => 'Perguntas', 'url' => array('/pergunta/index'),'visible'=>!Yii::app()->user->isGuest),
                	array('label'=>Yii::t('app','Sair').' ('.Yii::app()->user->name.')', 'url'=>array('/usuario/logout'), 'visible'=>!Yii::app()->user->isGuest),
                	array('label'=>Yii::t('app','Logar'), 'url'=>array('/usuario/login'), 'visible'=>Yii::app()->user->isGuest),
                	array('label'=>Yii::t('app','Inscreva-se'), 'url'=>array('/usuario/create'), 'visible'=>Yii::app()->user->isGuest)
                   /* array(
                        'label' => 'Dropdown',
                        'url' => '#',
                        'items' => array(
                            array('label' => 'Action', 'url' => '#'),
                            array('label' => 'Another action', 'url' => '#'),
                            array(
                                'label' => 'Something else here',
                                'url' => '#'
                            ),
                            '---',
                            array('label' => 'NAV HEADER'),
                            array('label' => 'Separated link', 'url' => '#'),
                            array(
                                'label' => 'One more separated link',
                                'url' => '#'
                            ),
                        )
                    ),*/
                ),
            ),
           // '<form class="navbar-form navbar-left" action=""><div class="form-group"><input type="text" class="form-control" placeholder="Search"></div></form>',
        ),
    )
);