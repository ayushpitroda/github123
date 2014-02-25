<?php

/**
 * This is the model class for table "ETS_REPORT_TMPL".
 *
 * The followings are the available columns in table 'ETS_REPORT_TMPL':
 * @property integer $BUSINESS_UNIT
 * @property integer $REPORT_ID
 * @property string $REPORT_NAME
 * @property string $REPORT_BODY
 * @property string $CREATE_DTTM
 * @property string $LASTUPDDTTM
 * @property string $LASTUPDUSER
 * @property integer $STATUS
 */
class ReportTemplate extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ReportTemplate the static model class
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
		return 'ETS_REPORT_TMPL_CFG';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('REPORT_NAME', 'required'),
			array('BUSINESS_UNIT, STATUS', 'numerical', 'integerOnly'=>true),
			array('REPORT_NAME, LASTUPDUSER', 'length', 'max'=>30),
			array('REPORT_BODY, CREATE_DTTM, LASTUPDDTTM', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('BUSINESS_UNIT, REPORT_ID, REPORT_NAME, REPORT_BODY, CREATE_DTTM, LASTUPDDTTM, LASTUPDUSER, STATUS', 'safe', 'on'=>'search'),
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
			'REPORT_ID' => 'Report',
			'REPORT_NAME' => 'Report Name',
			'REPORT_BODY' => 'Report Body',
			'CREATE_DTTM' => 'Create Dttm',
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

		$criteria->compare('BUSINESS_UNIT',$this->BUSINESS_UNIT);
		$criteria->compare('REPORT_ID',$this->REPORT_ID);
		$criteria->compare('REPORT_NAME',$this->REPORT_NAME,true);
		$criteria->compare('REPORT_BODY',$this->REPORT_BODY,true);
		$criteria->compare('CREATE_DTTM',$this->CREATE_DTTM,true);
		$criteria->compare('LASTUPDDTTM',$this->LASTUPDDTTM,true);
		$criteria->compare('LASTUPDUSER',$this->LASTUPDUSER,true);
		$criteria->compare('STATUS',$this->STATUS);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	/* Get all business Units */
	 public function getAllBusinessUnits()
	  {
	   $model = BusinessUnit::model()->findAll(array('Order'=>BUSINESS_UNIT)); 
	   $list = CHtml::listdata($model,'BUSINESS_UNIT','BUSINESS_UNIT_ID');
	   return $list;
	  } 
	
	
}