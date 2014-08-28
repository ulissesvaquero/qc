<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="language" content="en" />

<title><?php echo CHtml::encode($this->pageTitle); ?></title>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css" />

<style type="text/css">

	body
	{
		padding-top:40px;
	}
	/* Custom Styles */
    ul.nav-tabs{
        width: 140px;
        margin-top: 50px;
        border-radius: 4px;
        border: 1px solid #ddd;
        box-shadow: 0 1px 4px rgba(0, 0, 0, 0.067);
    }
    ul.nav-tabs li{
        margin: 0;
        border-top: 1px solid #ddd;
    }
    ul.nav-tabs li:first-child{
        border-top: none;
    }
    ul.nav-tabs li a{
        margin: 0;
        padding: 8px 16px;
        border-radius: 0;
    }
    ul.nav-tabs li.active a, ul.nav-tabs li.active a:hover{
        color: #fff;
        background: #0088cc;
        border: 1px solid #0088cc;
    }
    ul.nav-tabs li:first-child a{
        border-radius: 4px 4px 0 0;
    }
    ul.nav-tabs li:last-child a{
        border-radius: 0 0 4px 4px;
    }
    ul.nav-tabs.affix{
        top: 30px; /* Set the top position of pinned element */
    }
</style>
</style>	
</head>
<body data-spy="scroll" data-target="#myScrollspy">
	<?php 
		/*$this->widget('zii.widgets.CMenu',array(
				'items'=>array(
						array('label'=>Yii::t('app','Home'), 'url'=>array('/site/index')),
						array('label'=>Yii::t('app','About'), 'url'=>array('/site/page', 'view'=>'about')),
						array('label'=>Yii::t('app','Contact'), 'url'=>array('/site/contact')),
						array('label'=>Yii::t('app','Login'), 'url'=>array('/user/login'),'visible'=>Yii::app()->user->isGuest),
						array('label'=>Yii::t('app','Rights'), 'url'=>array('/rights')),
						array('label'=>Yii::t('app','Logout').' ('.Yii::app()->user->name.')', 'url'=>array('/user/logout'), 'visible'=>!Yii::app()->user->isGuest)
						,
				)));*/
			$this->renderPartial('//layouts/_navbar');
	?>
	<?php 
		$this->renderPartial('//layouts/_header');
	?>
<div class="container">
	<!-- Alertas -->
	<div id="alertas">
		<?php 
			$this->widget('booster.widgets.TbAlert', array(
					'fade' => true,
					'closeText' => '&times;', // false equals no close link
					'events' => array(),
					'htmlOptions' => array(),
					'userComponentId' => 'user',
					'alerts' => array( // configurations per alert type
							// success, info, warning, error or danger
							'success' => array('closeText' => '&times;'),
							'info', // you don't need to specify full config
							'warning' => array('closeText' => false),
							'error' => array('closeText' => 'AAARGHH!!')
					),
			));
		?>
	</div>
	
	<!-- Conteudo -->
	<div id="conteudo">
		<?php echo $content; ?>
	</div>
</div>
<?php 
		$this->renderPartial('//layouts/_footer');
?>
</body>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/geral.js"></script>
</html>                                		