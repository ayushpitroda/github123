<?php

/**
 * This is the model class for table "ETS_ESTIMATE_DTL".
 *
 * The followings are the available columns in table 'ETS_ESTIMATE_DTL':
 * @property string $PROPERTY_ID
 * @property integer $ESTIMATE_ID
 * @property string $ROOM_ID
 * @property string $OBSERV_ID
 * @property string $TEST_ID
 * @property integer $TEST_COUNTER
 * @property double $PRICE
 * @property string $TEST_SELECTED
 * @property string $LASTUPDDTTM
 * @property string $LASTUPDUSER
 * @property integer $STATUS
 */
class ETSEstimateDtl extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ETSEstimateDtl the static model class
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
		return 'ETS_ESTIMATE_DTL';
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
			array('ESTIMATE_ID, TEST_COUNTER, STATUS', 'numerical', 'integerOnly'=>true),
			array('PRICE', 'numerical'),
			array('PROPERTY_ID', 'length', 'max'=>6),
			array('ROOM_ID, TEST_ID', 'length', 'max'=>3),
			array('OBSERV_ID', 'length', 'max'=>15),
			array('TEST_SELECTED', 'length', 'max'=>1),
			array('LASTUPDUSER', 'length', 'max'=>11),
			array('LASTUPDDTTM', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('PROPERTY_ID, ESTIMATE_ID, ROOM_ID, OBSERV_ID, TEST_ID, TEST_COUNTER, PRICE, TEST_SELECTED, LASTUPDDTTM, LASTUPDUSER, STATUS', 'safe', 'on'=>'search'),
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
			'ROOM_ID' => 'Room',
			'OBSERV_ID' => 'Observ',
			'TEST_ID' => 'Test',
			'TEST_COUNTER' => 'Test Counter',
			'PRICE' => 'Price',
			'TEST_SELECTED' => 'Test Selected',
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
		$criteria->compare('ROOM_ID',$this->ROOM_ID,true);
		$criteria->compare('OBSERV_ID',$this->OBSERV_ID,true);
		$criteria->compare('TEST_ID',$this->TEST_ID,true);
		$criteria->compare('TEST_COUNTER',$this->TEST_COUNTER);
		$criteria->compare('PRICE',$this->PRICE);
		$criteria->compare('TEST_SELECTED',$this->TEST_SELECTED,true);
		$criteria->compare('LASTUPDDTTM',$this->LASTUPDDTTM,true);
		$criteria->compare('LASTUPDUSER',$this->LASTUPDUSER,true);
		$criteria->compare('STATUS',$this->STATUS);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}