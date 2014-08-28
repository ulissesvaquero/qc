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
	
	/*
	 * Método responsavél pela paginação
	 */
	public function actionGetcomentario()
	{
		$dataProvider=new CActiveDataProvider('Comentario');
		$dataProvider->criteria->condition = "id_pergunta=".$_GET['idPergunta'];
		$dataProvider->criteria->order =  "t.id DESC";
		$dataProvider->criteria->offset = $_GET['offset'];
		$dataProvider->criteria->limit = 5;
		$dataProvider->pagination = false;
		$arrRetorno["conteudo"] = $this->renderPartial('/comentario/_list',array('dataProvider'=>$dataProvider),true);
		$arrRetorno['id_pergunta'] = $_GET['idPergunta'];
		echo json_encode($arrRetorno);	
	}
	
	/*
	 * Método responsável por cadastrar um comentário
	 */
	public function actionCadastrarcomentario()
	{
		parse_str($_GET['formData'], $formData);
		if(empty($formData['Comentario']['comentario']))
		{
			$arrRetorno['status'] = 0;
			$arrRetorno['cStatus'] = "<div class=\"alert in fade alert-danger\" style=\"margin-top:20px\">
			<a href=\"#\" class=\"close\" data-dismiss=\"alert\">AAARGHH!!</a>
			<strong>Erro!</strong> Digite um comentário
			</div>";
			$arrRetorno['conteudo'] = "";
		}else 
		{
			$comentario = new Comentario();
			$comentario->comentario = $formData['Comentario']['comentario'];
			$comentario->id_pergunta = $_GET['idPergunta'];
			$comentario->id_usuario = Yii::app()->user->getId();
			$comentario->save();
			$dataProvider=new CActiveDataProvider('Comentario');
			//$dataProvider->criteria->limit = 5;
		//	$dataProvider->criteria->alias = 'c';
			$dataProvider->criteria->condition = "id_pergunta=".$comentario->id_pergunta;
			$dataProvider->criteria->order =  "t.id DESC";
			$dataProvider->pagination->pageSize = 1;
			$arrRetorno["conteudo"] = $this->renderPartial('/comentario/_list',array('dataProvider'=>$dataProvider,'insert' => true),true);
			$arrRetorno['status'] = 1;
			$arrRetorno['cStatus'] = "<div class=\"alert in fade alert-success\" style=\"margin-top:20px\">
			<a href=\"#\" class=\"close\" data-dismiss=\"alert\">YYEAAHHH!!</a>
			Comentário salvo com sucesso.
			</div>";
		}
		echo json_encode($arrRetorno);
		
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