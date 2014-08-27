<?php

class ComentarioController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}
	
	public function actionGetform()
	{
		$conteudo = $this->renderPartial('_form',array('id' => $_GET['idPergunta']),true);
		//{'formComentario#'.$_GET['idPergunta']}$varName = 
		//{'formComentario#'.$_GET['idPergunta']}
		//$scripts = Yii::app()->getClientScript()->scripts;
		//echo $conteudo;
		//echo "<script>".$scripts[4]['TbHtml5Editor#formComentario'.$_GET['idPergunta']]."</script>";
	}
	
	public function actionCadastrarcomentario()
	{
		echo "<div class=\"popover right\" style=\"display:block\">
        <div class=\"arrow\"></div>
        <h3 class=\"popover-title\">Popover right</h3>
 
        <div class=\"popover-content\">
            <p>Sed posuere consectetur est at lobortis. Aenean eu leo quam.
                Pellentesque ornare sem lacinia quam
                venenatis vestibulum.</p>
        	</div>
    		</div>";
		
		//echo "<p><b>teste</b></p>";
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}