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
		parse_str($_GET['formData'], $formData);
		if(empty($formData['Comentario']['comentario']))
		{
			echo "<div class=\"alert in fade alert-danger\" style=\"margin-top:20px\">
			<a href=\"#\" class=\"close\" data-dismiss=\"alert\">AAARGHH!!</a>
			<strong>Erro!</strong> Digite um comentário
			</div>";
		}else 
		{
			$comentario = new Comentario();
			$comentario->comentario = $formData['Comentario']['comentario'];
			$comentario->id_pergunta = $_GET['idPergunta'];
			$comentario->id_usuario = Yii::app()->user->getId();
			$comentario->save();
			$dataProvider=new CActiveDataProvider('Comentario');
			$dataProvider->criteria->limit = 2;
			//$dataProvider->pagination->pageSize = 5;
			echo $this->render('/comentario/index',array('dataProvider'=>$dataProvider),true);
		}
		
		
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