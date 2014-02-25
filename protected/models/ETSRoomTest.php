<?php

/**
 * This is the model class for table "ETS_ROOM_TESTS".
 *
 * The followings are the available columns in table 'ETS_ROOM_TESTS':
 * @property string $PROPERTY_ID
 * @property string $ROOM_ID
 * @property string $OBSERV_ID
 * @property integer $TEST_COUNTER
 * @property string $TEST_ID
 * @property string $MOLD
 * @property string $BACTERIA
 * @property string $ALLERGEN
 * @property string $CHEMICAL
 * @property string $ASBESTOS
 * @property string $PARTICULATE_ANALYSIS
 * @property string $BUILDING_MATERIAL
 * @property double $RELATIVE_HUMIDITY
 * @property double $TEMPERATURE
 * @property string $SAMPLE_STRT_DTTM
 * @property string $SAMPLE_END_DTTM
 * @property string $LAB_CODE
 * @property string $LASTUPDDTTM
 * @property string $LASTUPDUSER
 * @property integer $STATUS
 */
class ETSRoomTest extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ETSRoomTest the static model class
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
		return 'ETS_ROOM_TESTS';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ROOM_ID', 'required'),
			array('TEST_COUNTER, STATUS', 'numerical', 'integerOnly'=>true),
			array('RELATIVE_HUMIDITY, TEMPERATURE', 'numerical'),
			array('PROPERTY_ID', 'length', 'max'=>6),
			array('ROOM_ID', 'length', 'max'=>11),
			array('OBSERV_ID', 'length', 'max'=>15),
			array('TEST_ID', 'length', 'max'=>3),
			array('MOLD, BACTERIA, ALLERGEN, CHEMICAL, ASBESTOS, PARTICULATE_ANALYSIS, BUILDING_MATERIAL', 'length', 'max'=>1),
			array('LAB_CODE', 'length', 'max'=>10),
			array('LASTUPDUSER', 'length', 'max'=>30),
			array('SAMPLE_STRT_DTTM, SAMPLE_END_DTTM, LASTUPDDTTM', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('PROPERTY_ID, ROOM_ID, OBSERV_ID, TEST_COUNTER, TEST_ID, MOLD, BACTERIA, ALLERGEN, CHEMICAL, ASBESTOS, PARTICULATE_ANALYSIS, BUILDING_MATERIAL, RELATIVE_HUMIDITY, TEMPERATURE, SAMPLE_STRT_DTTM, SAMPLE_END_DTTM, LAB_CODE, LASTUPDDTTM, LASTUPDUSER, STATUS', 'safe', 'on'=>'search'),
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
			'ROOM_ID' => 'Room',
			'OBSERV_ID' => 'Observ',
			'TEST_COUNTER' => 'Test Counter',
			'TEST_ID' => 'Test',
			'MOLD' => 'Mold',
			'BACTERIA' => 'Bacteria',
			'ALLERGEN' => 'Allergen',
			'CHEMICAL' => 'Chemical',
			'ASBESTOS' => 'Asbestos',
			'PARTICULATE_ANALYSIS' => 'Particulate Analysis',
			'BUILDING_MATERIAL' => 'Building Material',
			'RELATIVE_HUMIDITY' => 'Relative Humidity',
			'TEMPERATURE' => 'Temperature',
			'SAMPLE_STRT_DTTM' => 'Sample Strt Dttm',
			'SAMPLE_END_DTTM' => 'Sample End Dttm',
			'LAB_CODE' => 'Lab Code',
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
		$criteria->compare('ROOM_ID',$this->ROOM_ID,true);
		$criteria->compare('OBSERV_ID',$this->OBSERV_ID,true);
		$criteria->compare('TEST_COUNTER',$this->TEST_COUNTER);
		$criteria->compare('TEST_ID',$this->TEST_ID,true);
		$criteria->compare('MOLD',$this->MOLD,true);
		$criteria->compare('BACTERIA',$this->BACTERIA,true);
		$criteria->compare('ALLERGEN',$this->ALLERGEN,true);
		$criteria->compare('CHEMICAL',$this->CHEMICAL,true);
		$criteria->compare('ASBESTOS',$this->ASBESTOS,true);
		$criteria->compare('PARTICULATE_ANALYSIS',$this->PARTICULATE_ANALYSIS,true);
		$criteria->compare('BUILDING_MATERIAL',$this->BUILDING_MATERIAL,true);
		$criteria->compare('RELATIVE_HUMIDITY',$this->RELATIVE_HUMIDITY);
		$criteria->compare('TEMPERATURE',$this->TEMPERATURE);
		$criteria->compare('SAMPLE_STRT_DTTM',$this->SAMPLE_STRT_DTTM,true);
		$criteria->compare('SAMPLE_END_DTTM',$this->SAMPLE_END_DTTM,true);
		$criteria->compare('LAB_CODE',$this->LAB_CODE,true);
		$criteria->compare('LASTUPDDTTM',$this->LASTUPDDTTM,true);
		$criteria->compare('LASTUPDUSER',$this->LASTUPDUSER,true);
		$criteria->compare('STATUS',$this->STATUS);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}