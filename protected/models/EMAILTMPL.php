<?php

/**
 * This is the model class for table "ETS_EMAIL_TMPL".
 *
 * The followings are the available columns in table 'ETS_EMAIL_TMPL':
 * @property string $BUSINESS_UNIT
 * @property string $EMAIL_ID
 * @property string $EMAIL_NAME
 * @property string $FROM_EMAIL_DEF
 * @property string $SUBJECT_DEF
 * @property string $EMAIL_BODY
 * @property string $CREATE_DTTM
 * @property string $LASTUPDDTTM
 * @property string $LASTUPDUSER
 * @property integer $STATUS
 */
class EMAILTMPL extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return EMAILTMPL the static model class
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
		return 'ETS_EMAIL_TMPL';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('BUSINESS_UNIT', 'required'),
			array('STATUS', 'numerical', 'integerOnly'=>true),
			array('BUSINESS_UNIT', 'length', 'max'=>10),
			array('EMAIL_ID', 'length', 'max'=>3),
			array('EMAIL_NAME, LASTUPDUSER', 'length', 'max'=>30),
			array('FROM_EMAIL_DEF', 'length', 'max'=>75),
			array('SUBJECT_DEF', 'length', 'max'=>100),
			array('EMAIL_BODY, CREATE_DTTM, LASTUPDDTTM', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('BUSINESS_UNIT, EMAIL_ID, EMAIL_NAME, FROM_EMAIL_DEF, SUBJECT_DEF, EMAIL_BODY, CREATE_DTTM, LASTUPDDTTM, LASTUPDUSER, STATUS', 'safe', 'on'=>'search'),
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
			'BUSINESS_UNIT' => 'Business Unit',
			'EMAIL_ID' => 'Email',
			'EMAIL_NAME' => 'Email Name',
			'FROM_EMAIL_DEF' => 'From Email Def',
			'SUBJECT_DEF' => 'Subject Def',
			'EMAIL_BODY' => 'Email Body',
			/*'CREATE_DTTM' => 'Create Dttm',
			'LASTUPDDTTM' => 'Lastupddttm',
			'LASTUPDUSER' => 'Lastupduser',
			'STATUS' => 'Status',*/
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

		$criteria->compare('BUSINESS_UNIT',$this->BUSINESS_UNIT,true);
		$criteria->compare('EMAIL_ID',$this->EMAIL_ID,true);
		$criteria->compare('EMAIL_NAME',$this->EMAIL_NAME,true);
		$criteria->compare('FROM_EMAIL_DEF',$this->FROM_EMAIL_DEF,true);
		$criteria->compare('SUBJECT_DEF',$this->SUBJECT_DEF,true);
		$criteria->compare('EMAIL_BODY',$this->EMAIL_BODY,true);
		$criteria->compare('CREATE_DTTM',$this->CREATE_DTTM,true);
		$criteria->compare('LASTUPDDTTM',$this->LASTUPDDTTM,true);
		$criteria->compare('LASTUPDUSER',$this->LASTUPDUSER,true);
		$criteria->compare('STATUS',$this->STATUS);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}