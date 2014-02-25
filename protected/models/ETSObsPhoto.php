<?php

/**
 * This is the model class for table "ETS_OBSERV_PHOTOS".
 *
 * The followings are the available columns in table 'ETS_OBSERV_PHOTOS':
 * @property string $PROPERTY_ID
 * @property string $ROOM_ID
 * @property string $OBSERV_ID
 * @property string $PHOTO_ID
 * @property string $PHOTO_URL
 * @property string $LASTUPDDTTM
 * @property string $LASTUPDUSER
 * @property integer $STATUS
 */
class ETSObsPhoto extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ETSObsPhoto the static model class
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
		return 'ETS_OBSERV_PHOTOS';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('STATUS', 'numerical', 'integerOnly'=>true),
			array('PROPERTY_ID', 'length', 'max'=>6),
			array('ROOM_ID, PHOTO_ID', 'length', 'max'=>3),
			array('OBSERV_ID', 'length', 'max'=>15),
			array('PHOTO_URL', 'length', 'max'=>255),
			array('LASTUPDUSER', 'length', 'max'=>30),
			array('LASTUPDDTTM', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('PROPERTY_ID, ROOM_ID, OBSERV_ID, PHOTO_ID, PHOTO_URL, LASTUPDDTTM, LASTUPDUSER, STATUS', 'safe', 'on'=>'search'),
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
			'PHOTO_ID' => 'Photo',
			'PHOTO_URL' => 'Photo Url',
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
		$criteria->compare('PHOTO_ID',$this->PHOTO_ID,true);
		$criteria->compare('PHOTO_URL',$this->PHOTO_URL,true);
		$criteria->compare('LASTUPDDTTM',$this->LASTUPDDTTM,true);
		$criteria->compare('LASTUPDUSER',$this->LASTUPDUSER,true);
		$criteria->compare('STATUS',$this->STATUS);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}