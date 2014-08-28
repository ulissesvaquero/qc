<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="language" content="en" />

<title><?php echo CHtml::encode($this->pageTitle); ?></title>

<style type="text/css">
    /* Custom Styles */
    ul.nav-tabs{
        width: 140px;
        margin-top: 20px;
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
</head>
<body data-spy="scroll" data-target="#myScrollspy">
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
</body>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/geral.js"></script>
</html>                                		