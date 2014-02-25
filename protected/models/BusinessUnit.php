<?php

/**
 * This is the model class for table "ETS_BUSINESS_UNIT".
 *
 * The followings are the available columns in table 'ETS_BUSINESS_UNIT':
 * @property integer $BUSINESS_UNIT
 * @property string $BU_DESCR
 * @property string $LOGO
 * @property string $EMAIL
 * @property string $PHONE
 * @property string $TIMINGS
 * @property string $ADDRESS1
 * @property string $ADDRESS2
 * @property string $CITY
 * @property string $STATE
 * @property string $ZIP
 */
class BusinessUnit extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return BusinessUnit the static model class
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
		return 'ETS_BUSINESS_UNIT';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('BU_DESCR', 'length', 'max'=>30),
			array('EMAIL', 'length', 'max'=>75),
			array('PHONE, ZIP', 'length', 'max'=>10),
			array('TIMINGS', 'length', 'max'=>100),
			array('ADDRESS1, ADDRESS2', 'length', 'max'=>50),
			array('CITY', 'length', 'max'=>40),
			array('STATE', 'length', 'max'=>2),
			array('LOGO', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('BUSINESS_UNIT, BU_DESCR, LOGO, EMAIL, PHONE, TIMINGS, ADDRESS1, ADDRESS2, CITY, STATE, ZIP', 'safe', 'on'=>'search'),
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
			'BU_DESCR' => 'Company Name',
			'LOGO' => 'Logo',
			'EMAIL' => 'Email',
			'PHONE' => 'Phone',
			'TIMINGS' => 'Timings',
			'ADDRESS1' => 'Address1',
			'ADDRESS2' => 'Address2',
			'CITY' => 'City',
			'STATE' => 'State',
			'ZIP' => 'Zip',
		);
	}

  public function beforeSave() {
     if ($file = CUploadedFile::getInstance($this, 'LOGO')) {
        $this->LOGO = file_get_contents($file->tempName);
    }
    return parent::beforeSave();
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
		$criteria->compare('BU_DESCR',$this->BU_DESCR,true);
		$criteria->compare('LOGO',$this->LOGO,true);
		$criteria->compare('EMAIL',$this->EMAIL,true);
		$criteria->compare('PHONE',$this->PHONE,true);
		$criteria->compare('TIMINGS',$this->TIMINGS,true);
		$criteria->compare('ADDRESS1',$this->ADDRESS1,true);
		$criteria->compare('ADDRESS2',$this->ADDRESS2,true);
		$criteria->compare('CITY',$this->CITY,true);
		$criteria->compare('STATE',$this->STATE,true);
		$criteria->compare('ZIP',$this->ZIP,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}