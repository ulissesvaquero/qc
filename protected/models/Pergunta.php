<?php

/**
 * This is the model class for table "pergunta".
 *
 * The followings are the available columns in table 'pergunta':
 * @property string $id
 * @property string $titulo
 * @property string $link_assoc
 * @property integer $id_qc
 * @property integer $id_pagina
 * @property string $link_gab
 * @property integer $id_banca
 * @property integer $id_orgao
 * @property integer $id_cargo
 * @property integer $ano
 * @property integer $id_disciplina
 * @property string $texto_associado
 * @property integer $tipo_pergunta
 */
class Pergunta extends CActiveRecord
{
	public $id_assunto;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pergunta';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_qc, id_pagina, id_banca, id_orgao, id_cargo, ano, id_disciplina, tipo_pergunta', 'numerical', 'integerOnly'=>true),
			array('link_assoc', 'length', 'max'=>100),
			array('link_gab', 'length', 'max'=>40),
			array('titulo, texto_associado', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, titulo, link_assoc, id_qc, id_pagina, link_gab, id_banca, id_orgao, id_cargo, ano, id_disciplina, texto_associado, tipo_pergunta', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
				'assunto'=>array(self::MANY_MANY, 'Assunto',
                'pergunta_assunto(id_pergunta, id_assunto)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'titulo' => 'Titulo',
			'link_assoc' => 'Link Assoc',
			'id_qc' => 'Id Qc',
			'id_pagina' => 'Id Pagina',
			'link_gab' => 'Link Gab',
			'id_banca' => 'Id Banca',
			'id_orgao' => 'Id Orgao',
			'id_cargo' => 'Id Cargo',
			'ano' => 'Ano',
			'id_disciplina' => 'Id Disciplina',
			'texto_associado' => 'Texto Associado',
			'tipo_pergunta' => 'Tipo Pergunta',
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
		$criteria->compare('titulo',$this->titulo,true);
		$criteria->compare('link_assoc',$this->link_assoc,true);
		$criteria->compare('id_qc',$this->id_qc);
		$criteria->compare('id_pagina',$this->id_pagina);
		$criteria->compare('link_gab',$this->link_gab,true);
		$criteria->compare('id_banca',$this->id_banca);
		$criteria->compare('id_orgao',$this->id_orgao);
		$criteria->compare('id_cargo',$this->id_cargo);
		$criteria->compare('ano',$this->ano);
		$criteria->compare('id_disciplina',$this->id_disciplina);
		$criteria->compare('texto_associado',$this->texto_associado,true);
		$criteria->compare('tipo_pergunta',$this->tipo_pergunta);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Pergunta the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
