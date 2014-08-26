<?php

/**
 * This is the model class for table "usuario".
 *
 * The followings are the available columns in table 'usuario':
 * @property string $id
 * @property string $nome
 * @property string $login
 * @property string $senha
 * @property string $email
 * @property integer $flg_ativo
 * @property integer $id_perfil
 */
class Usuario extends CActiveRecord
{
	
	public $senhaRepete;
	
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'usuario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('flg_ativo, id_perfil', 'numerical', 'integerOnly'=>true),
			array('nome', 'length', 'max'=>200),
			array(array('nome','login','senha','email','senhaRepete'), 'required'),
			array('login', 'length', 'max'=>100),
			array('senha, email', 'length', 'max'=>50),
			array('senha','compare', 'compareAttribute'=>'senhaRepete'),
			array('login','verificaLogin'),
			array('email','email'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nome, login, senha, email, flg_ativo, senhaRepete,id_perfil', 'safe', 'on'=>'search'),
		);
	}
	
	
	public function verificaLogin($attribute)
	{
		$result = $this->exists('login = \''.$this->$attribute.'\'');
		if($result)
		{
			$this->addError($attribute, 'Login não disponível.');
		}
	}
	
	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nome' => 'Nome',
			'login' => 'Login',
			'senha' => 'Senha',
			'email' => 'Email',
			'flg_ativo' => 'Flg Ativo',
			'id_perfil' => 'Id Perfil',
			'senhaRepete' => 'Repetir Senha'
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('nome',$this->nome,true);
		$criteria->compare('login',$this->login,true);
		$criteria->compare('senha',$this->senha,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('flg_ativo',$this->flg_ativo);
		$criteria->compare('id_perfil',$this->id_perfil);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Usuario the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
