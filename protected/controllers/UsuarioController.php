<?php
class UsuarioController extends Controller {
	
	
	/**
	 * Displays a particular model.
	 * 
	 * @param integer $id
	 *        	the ID of the model to be displayed
	 *        	
	 */
	public function actionView($id) {
		$this->render ( 'view', array (
				'model' => $this->loadModel ( $id ) 
		) );
	}
	
	public function actionLogin()
	{
		$usuario = new Usuario();
		if(isset($_POST["Usuario"]["login"]))
		{
			$identity = new UsuarioIdentity($_POST["Usuario"]["login"], $_POST["Usuario"]["senha"]);
			if($identity->authenticate())
			{
				Yii::app()->user->login($identity);
				$this->redirect(array('pergunta/index'));
			}
			else
			{
				$this->user->setFlash(
						'error',
						"<strong>$identity->errorMessage</strong> "
				);
				$this->redirect ( array (
						'login'
				) );
			}
		}
		$this->render('login',array('usuario' => $usuario));
	}
	
	public function actionLogout()
	{
		Yii::app()->user->logout(true);
		$this->redirect(array('login'));
	}
	
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate() {
		
		$model = new Usuario ();
		
		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);
		
		if (isset ( $_POST ['Usuario'] )) 
		{
			$model->attributes = $_POST ['Usuario'];
			$model->flg_ativo = 1;
			$model->id_perfil = 1;
			if ($model->save ())
			{
				$this->user->setFlash(
						'success',
						"<strong>Pronto!</strong> ".CHtml::link('Clique aqui para efetuar o login',array('usuario/login'))
				);
				$this->redirect ( array (
						'create'
				) );
			}
				
		}
		
		$this->render ( 'create', array (
				'model' => $model 
		) );
	}
	
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * 
	 * @param integer $id
	 *        	the ID of the model to be updated
	 *        	
	 */
	public function actionUpdate($id) {
		$model = $this->loadModel ( $id );
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		
		if (isset ( $_POST ['Usuario'] )) {
			$model->attributes = $_POST ['Usuario'];
			if ($model->save ())
				$this->redirect ( array (
						'view',
						'id' => $model->id 
				) );
		}
		$this->render ( 'update', array (
				'model' => $model 
		) );
	}
	
	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * 
	 * @param integer $id
	 *        	the ID of the model to be deleted
	 *        	
	 */
	public function actionDelete($id) {
		if (Yii::app ()->request->isPostRequest) {
			// we only allow deletion via POST request
			$this->loadModel ( $id )->delete ();
			
			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if (! isset ( $_GET ['ajax'] ))
				$this->redirect ( isset ( $_POST ['returnUrl'] ) ? $_POST ['returnUrl'] : array (
						'admin' 
				) );
		} else
			throw new CHttpException ( 400, 'Invalid request. Please do not repeat this request again.' );
	}
	
	/**
	 * Lists all models.
	 */
	public function actionIndex() {
		$dataProvider = new CActiveDataProvider ( 'Usuario' );
		$this->render ( 'index', array (
				'dataProvider' => $dataProvider 
		) );
	}
	
	/**
	 * Manages all models.
	 */
	public function actionAdmin() {
		$model = new Usuario ( 'search' );
		$model->unsetAttributes (); // clear any default values
		if (isset ( $_GET ['Usuario'] ))
			$model->attributes = $_GET ['Usuario'];
		
		$this->render ( 'admin', array (
				'model' => $model 
		) );
	}
	
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * 
	 * @param
	 *        	integer the ID of the model to be loaded
	 *        	
	 */
	public function loadModel($id) {
		$model = Usuario::model ()->findByPk ( $id );
		if ($model === null)
			throw new CHttpException ( 404, 'The requested page does not exist.' );
		return $model;
	}
	
	/**
	 * Performs the AJAX validation.
	 * 
	 * @param
	 *        	CModel the model to be validated
	 *        	
	 */
	protected function performAjaxValidation($model) {
		if (isset ( $_POST ['ajax'] ) && $_POST ['ajax'] === 'usuario-form') {
			echo CActiveForm::validate ( $model );
			Yii::app ()->end ();
		}
	}
}
