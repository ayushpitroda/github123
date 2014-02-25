<?php

/**
 * This is the model class for table "ETS_COMMENTS".
 *
 * The followings are the available columns in table 'ETS_COMMENTS':
 * @property string $COMMENT_ID
 * @property string $COMMENT_DESCR
 * @property string $LOCATION_IDS
 * @property string $CREATE_DTTM
 * @property string $LASTUPDDTTM
 * @property string $LASTUPDUSER
 * @property integer $STATUS
 */
class COMMENTS extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return COMMENTS the static model class
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
		return 'ETS_COMMENTS_CFG';
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
			array('COMMENT_ID', 'length', 'max'=>3),
			array('COMMENT_DESCR', 'length', 'max'=>60),
			array('LOCATION_IDS', 'length', 'max'=>300),
			array('LASTUPDUSER', 'length', 'max'=>30),
			array('CREATE_DTTM, LASTUPDDTTM', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('COMMENT_ID, COMMENT_DESCR, LOCATION_IDS, CREATE_DTTM, LASTUPDDTTM, LASTUPDUSER, STATUS', 'safe', 'on'=>'search'),
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
			'COMMENT_ID' => 'Comment Id',
			'COMMENT_DESCR' => 'Comment Name',
			'LOCATION_IDS' => 'Location Ids',
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

		$criteria->compare('COMMENT_ID',$this->COMMENT_ID,true);
		$criteria->compare('COMMENT_DESCR',$this->COMMENT_DESCR,true);
		$criteria->compare('LOCATION_IDS',$this->LOCATION_IDS,true);
		$criteria->compare('CREATE_DTTM',$this->CREATE_DTTM,true);
		$criteria->compare('LASTUPDDTTM',$this->LASTUPDDTTM,true);
		$criteria->compare('LASTUPDUSER',$this->LASTUPDUSER,true);
		$criteria->compare('STATUS',$this->STATUS);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	 public function getSatusOptions() {
                return array(
                        1=>'Active', 0=>'InActive'
                );
        }
}