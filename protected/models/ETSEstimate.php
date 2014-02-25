<?php

/**
 * This is the model class for table "ETS_ESTIMATE".
 *
 * The followings are the available columns in table 'ETS_ESTIMATE':
 * @property string $PROPERTY_ID
 * @property integer $ESTIMATE_ID
 * @property string $ACCEPTED_TERMS
 * @property string $SIGNATURE_URL
 * @property string $LASTUPDDTTM
 * @property string $LASTUPDUSER
 * @property integer $STATUS
 */
class ETSEstimate extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ETSEstimate the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ETS_ESTIMATE';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ESTIMATE_ID', 'required'),
			array('ESTIMATE_ID, STATUS', 'numerical', 'integerOnly'=>true),
			array('PROPERTY_ID', 'length', 'max'=>6),
			array('ACCEPTED_TERMS', 'length', 'max'=>1),
			array('SIGNATURE_URL', 'length', 'max'=>255),
			array('LASTUPDUSER', 'length', 'max'=>11),
			array('LASTUPDDTTM', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('PROPERTY_ID, ESTIMATE_ID, ACCEPTED_TERMS, SIGNATURE_URL, LASTUPDDTTM, LASTUPDUSER, STATUS', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'PROPERTY_ID' => 'Property',
			'ESTIMATE_ID' => 'Estimate',
			'ACCEPTED_TERMS' => 'Accepted Terms',
			'SIGNATURE_URL' => 'Signature Url',
			'LASTUPDDTTM' => 'Lastupddttm',
			'LASTUPDUSER' => 'Lastupduser',
			'STATUS' => 'Status',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('PROPERTY_ID',$this->PROPERTY_ID,true);
		$criteria->compare('ESTIMATE_ID',$this->ESTIMATE_ID);
		$criteria->compare('ACCEPTED_TERMS',$this->ACCEPTED_TERMS,true);
		$criteria->compare('SIGNATURE_URL',$this->SIGNATURE_URL,true);
		$criteria->compare('LASTUPDDTTM',$this->LASTUPDDTTM,true);
		$criteria->compare('LASTUPDUSER',$this->LASTUPDUSER,true);
		$criteria->compare('STATUS',$this->STATUS);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}