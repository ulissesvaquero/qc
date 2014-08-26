<?php

class PerguntaController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	//public $layout='//layouts/column2';

	
	
	public function actionGettabelapergunta()
	{
		if($_POST['id_disciplina'])
		{
			/*$model=new Pergunta;
			$model->id_disciplina = $_POST['id_disciplina'];*/
			//$model=Pergunta::model()->findAll('id_disciplina=:id_disciplina', array(':id_disciplina'=>(int) $_POST['id_disciplina']));
		
		}
	}
	
	public function actionCarregaassunto()
	{
		if(isset($_POST['id_disciplina']))
		{
			$data=Assunto::model()->findAll('id_disciplina=:id_disciplina', array(':id_disciplina'=>(int) $_POST['id_disciplina']));
			$data=CHtml::listData($data,'id','assunto');
			echo "<option value=''>Selecione um assunto</option>";
			foreach($data as $id => $assunto)
			{
				echo CHtml::tag('option', array('value'=>$id),CHtml::encode($assunto),true);
			}
		}
	}
	
	
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		/*return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);*/
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Pergunta;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Pergunta']))
		{
			$model->attributes=$_POST['Pergunta'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Pergunta']))
		{
			$model->attributes=$_POST['Pergunta'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	
	public function actionCorrigepergunta()
	{
		if($_GET['idPergunta'])
		{
			if(empty($_GET['resposta']))
			{
				echo "<div class=\"alert in fade alert-info\">
							<a href=\"#\" class=\"close\" data-dismiss=\"alert\"> =D</a>
							<strong>Selecione uma alternativa</strong>
						  </div>";	
				return;
			}
			
			$pergunta  = Pergunta::model()->findByPk($_GET['idPergunta']);
			if($pergunta->gabarito)
			{	
				if($pergunta->gabarito == $_GET['resposta'] )
				{
					echo "<div class=\"alert in fade alert-success\">
							<a href=\"#\" class=\"close\" data-dismiss=\"alert\">PARABÉNS!!</a>
							<strong>Você acertou!</strong>
						  </div>";					
				}else
				{
					echo "<div class=\"alert in fade alert-danger\">
						  <a href=\"#\" class=\"close\" data-dismiss=\"alert\">AAARGHH!!</a>
						  	<strong>Você errou!</strong> A resposta certa é a alternativa $pergunta->gabarito
						 </div>";
					//echo utf8_encode("VOC� ERROU A RESPOSTA CERTA � <strong>".."</strong>");
				}
			}else
			{
				echo utf8_encode("AINDA N�O TEMOS A RESPOSTA");
			}
		}
		
	}
	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{	
		$pergunta = new Pergunta();
		$criteria = new CDbCriteria();
		$arrVar = array();
		$condition = "";
		$perguntaForm = new stdClass();
		$perguntaForm->id_disciplina = "";
		$perguntaForm->id_assunto = "";
		$perguntaForm->id_banca = "";
		if(isset($_GET['Pergunta']['id_disciplina']) && !empty($_GET['Pergunta']['id_disciplina']))
		{
			$condition .= "p.id_disciplina=".$_GET['Pergunta']['id_disciplina'];
			$pergunta->id_disciplina = $_GET['Pergunta']['id_disciplina'];
		}
		if(isset($_GET['Pergunta']['id_assunto']) && !empty($_GET['Pergunta']['id_assunto']))
		{
			$condition .= " AND pa.id_assunto=".$_GET['Pergunta']['id_assunto'];
			$pergunta->id_assunto = $_GET['Pergunta']['id_assunto'];
		}
		if(isset($_GET['Pergunta']['id_banca']) && !empty($_GET['Pergunta']['id_banca']))
		{
			$condition .= " AND p.id_banca=".$_GET['Pergunta']['id_banca'];
			$pergunta->id_banca = $_GET['Pergunta']['id_banca'];
		}
		
		//$dataProvider=new CActiveDataProvider('Pergunta',array('criteria' => array('condition' => $condition)));
		$dataProvider=new CActiveDataProvider('Pergunta');
		if(!empty($condition))
		{
			//$dataProvider = Pergunta::model()->findByPK(1);
			$dataProvider->criteria->alias = 'p';
			$dataProvider->criteria->select = 'p.*';
			$dataProvider->criteria->distinct = true;
			$dataProvider->criteria->join = 'JOIN pergunta_assunto pa ON pa.id_pergunta = p.id';
			$dataProvider->criteria->condition = $condition;
			$dataProvider->criteria->order = "p.id ASC";
			//Numero de tamanho por pagina
			$dataProvider->pagination->pageSize = 5;
		}else {
			$dataProvider->criteria->limit = 5;
		}
		$this->render('index',array(
					  'dataProvider'=>$dataProvider,
					  'perguntaForm' => $perguntaForm,
					  'pergunta' => $pergunta,
		));
	}
	
	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Pergunta('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Pergunta']))
			$model->attributes=$_GET['Pergunta'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Pergunta the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Pergunta::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Pergunta $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='pergunta-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
