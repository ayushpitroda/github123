<?php

/**
 * This is the model class for table "ETS_PROP_COMMENTS".
 *
 * The followings are the available columns in table 'ETS_PROP_COMMENTS':
 * @property string $PROPERTY_ID
 * @property string $ROOM_ID
 * @property string $OBSERV_ID
 * @property string $COMMENT_ID
 * @property string $LOCATION_ID
 * @property string $COMMENT_DESCR
 * @property string $LASTUPDDTTM
 * @property string $LASTUPDUSER
 * @property integer $STATUS
 *
 * The followings are the available model relations:
 * @property Users $lASTUPDUSER
 * @property ETSPROPERTY $pROPERTY
 */
class ETSProComment extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ETSProComment the static model class
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
		return 'ETS_PROP_COMMENTS';
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
			array('ROOM_ID, COMMENT_ID, LOCATION_ID', 'length', 'max'=>3),
			array('OBSERV_ID', 'length', 'max'=>15),
			array('COMMENT_DESCR', 'length', 'max'=>300),
			array('LASTUPDUSER', 'length', 'max'=>11),
			array('LASTUPDDTTM', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('PROPERTY_ID, ROOM_ID, OBSERV_ID, COMMENT_ID, LOCATION_ID, COMMENT_DESCR, LASTUPDDTTM, LASTUPDUSER, STATUS', 'safe', 'on'=>'search'),
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
			'lASTUPDUSER' => array(self::BELONGS_TO, 'Users', 'LASTUPDUSER'),
			'pROPERTY' => array(self::BELONGS_TO, 'ETSPROPERTY', 'PROPERTY_ID'),
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
			'COMMENT_ID' => 'Comment',
			'LOCATION_ID' => 'Location',
			'COMMENT_DESCR' => 'Comment Descr',
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
		$criteria->compare('COMMENT_ID',$this->COMMENT_ID,true);
		$criteria->compare('LOCATION_ID',$this->LOCATION_ID,true);
		$criteria->compare('COMMENT_DESCR',$this->COMMENT_DESCR,true);
		$criteria->compare('LASTUPDDTTM',$this->LASTUPDDTTM,true);
		$criteria->compare('LASTUPDUSER',$this->LASTUPDUSER,true);
		$criteria->compare('STATUS',$this->STATUS);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}