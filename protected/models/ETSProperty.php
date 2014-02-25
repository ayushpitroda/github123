<?php

/**
 * This is the model class for table "ETS_PROPERTY".
 *
 * The followings are the available columns in table 'ETS_PROPERTY':
 * @property string $BUSINESS_UNIT
 * @property string $PROPERTY_ID
 * @property string $FIRST_NAME
 * @property string $LAST_NAME
 * @property string $CUST_ADDRESS1
 * @property string $CUST_ADDRESS2
 * @property string $CUST_CITY
 * @property string $CUST_STATE
 * @property string $CUST_ZIP
 * @property string $CUST_EMAIL
 * @property integer $CUST_HOME_PHONE
 * @property integer $CUST_MOBILE
 * @property string $SAME_ADDR_AS_CUST
 * @property string $ADDRESS1
 * @property string $ADDRESS2
 * @property string $CITY
 * @property string $STATE
 * @property string $ZIP
 * @property integer $HOME_PHONE
 * @property integer $MOBILE
 * @property string $APPT_DT
 * @property string $APPT_TM
 * @property string $USER_ID
 * @property string $NOTES
 * @property string $PHOTO_URL
 * @property string $CREATE_DTTM
 * @property string $LASTUPDDTTM
 * @property string $LASTUPDUSER
 * @property string $PROP_STATUS
 * @property integer $STATUS
 *
 * The followings are the available model relations:
 * @property ETSBUSINESSUNITCFG $bUSINESSUNIT
 */
class ETSProperty extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ETSProperty the static model class
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
		return 'ETS_PROPERTY';
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
			array('CUST_HOME_PHONE, CUST_MOBILE, HOME_PHONE, MOBILE, STATUS', 'numerical', 'integerOnly'=>true),
			array('BUSINESS_UNIT, CUST_ZIP, ZIP', 'length', 'max'=>10),
			array('FIRST_NAME, LAST_NAME, USER_ID, LASTUPDUSER', 'length', 'max'=>30),
			array('CUST_ADDRESS1, CUST_ADDRESS2, ADDRESS1, ADDRESS2', 'length', 'max'=>50),
			array('CUST_CITY, CITY', 'length', 'max'=>40),
			array('CUST_STATE, STATE', 'length', 'max'=>2),
			array('CUST_EMAIL', 'length', 'max'=>75),
			array('SAME_ADDR_AS_CUST, PROP_STATUS', 'length', 'max'=>1),
			array('PHOTO_URL', 'length', 'max'=>300),
			array('NOTES, PHOTO_URL, APPT_DT, APPT_TM, CREATE_DTTM, LASTUPDDTTM', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('BUSINESS_UNIT, PROPERTY_ID, FIRST_NAME, LAST_NAME, CUST_ADDRESS1, CUST_ADDRESS2, CUST_CITY, CUST_STATE, CUST_ZIP, CUST_EMAIL, CUST_HOME_PHONE, CUST_MOBILE, SAME_ADDR_AS_CUST, ADDRESS1, ADDRESS2, CITY, STATE, ZIP, HOME_PHONE, MOBILE, APPT_DT, APPT_TM, USER_ID, NOTES, PHOTO_URL, CREATE_DTTM, LASTUPDDTTM, LASTUPDUSER, PROP_STATUS, STATUS', 'safe', 'on'=>'search'),
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
			'bUSINESSUNIT' => array(self::BELONGS_TO, 'ETSBUSINESSUNITCFG', 'BUSINESS_UNIT'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'BUSINESS_UNIT' => 'Business Unit',
			'PROPERTY_ID' => 'Property',
			'FIRST_NAME' => 'First Name',
			'LAST_NAME' => 'Last Name',
			'CUST_ADDRESS1' => 'Cust Address1',
			'CUST_ADDRESS2' => 'Cust Address2',
			'CUST_CITY' => 'Cust City',
			'CUST_STATE' => 'Cust State',
			'CUST_ZIP' => 'Cust Zip',
			'CUST_EMAIL' => 'Cust Email',
			'CUST_HOME_PHONE' => 'Cust Home Phone',
			'CUST_MOBILE' => 'Cust Mobile',
			'SAME_ADDR_AS_CUST' => 'Same Addr As Cust',
			'ADDRESS1' => 'Address1',
			'ADDRESS2' => 'Address2',
			'CITY' => 'City',
			'STATE' => 'State',
			'ZIP' => 'Zip',
			'HOME_PHONE' => 'Home Phone',
			'MOBILE' => 'Mobile',
			'APPT_DT' => 'Appt Dt',
			'APPT_TM' => 'Appt Tm',
			'USER_ID' => 'User',
			'NOTES' => 'Notes',
			'PHOTO_URL' => 'Photo Url',
			'CREATE_DTTM' => 'Create Dttm',
			'LASTUPDDTTM' => 'Lastupddttm',
			'LASTUPDUSER' => 'Lastupduser',
			'PROP_STATUS' => 'Prop Status',
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

		$criteria->compare('BUSINESS_UNIT',$this->BUSINESS_UNIT,true);
		$criteria->compare('PROPERTY_ID',$this->PROPERTY_ID,true);
		$criteria->compare('FIRST_NAME',$this->FIRST_NAME,true);
		$criteria->compare('LAST_NAME',$this->LAST_NAME,true);
		$criteria->compare('CUST_ADDRESS1',$this->CUST_ADDRESS1,true);
		$criteria->compare('CUST_ADDRESS2',$this->CUST_ADDRESS2,true);
		$criteria->compare('CUST_CITY',$this->CUST_CITY,true);
		$criteria->compare('CUST_STATE',$this->CUST_STATE,true);
		$criteria->compare('CUST_ZIP',$this->CUST_ZIP,true);
		$criteria->compare('CUST_EMAIL',$this->CUST_EMAIL,true);
		$criteria->compare('CUST_HOME_PHONE',$this->CUST_HOME_PHONE);
		$criteria->compare('CUST_MOBILE',$this->CUST_MOBILE);
		$criteria->compare('SAME_ADDR_AS_CUST',$this->SAME_ADDR_AS_CUST,true);
		$criteria->compare('ADDRESS1',$this->ADDRESS1,true);
		$criteria->compare('ADDRESS2',$this->ADDRESS2,true);
		$criteria->compare('CITY',$this->CITY,true);
		$criteria->compare('STATE',$this->STATE,true);
		$criteria->compare('ZIP',$this->ZIP,true);
		$criteria->compare('HOME_PHONE',$this->HOME_PHONE);
		$criteria->compare('MOBILE',$this->MOBILE);
		$criteria->compare('APPT_DT',$this->APPT_DT,true);
		$criteria->compare('APPT_TM',$this->APPT_TM,true);
		$criteria->compare('USER_ID',$this->USER_ID,true);
		$criteria->compare('NOTES',$this->NOTES,true);
		$criteria->compare('PHOTO_URL',$this->PHOTO_URL,true);
		$criteria->compare('CREATE_DTTM',$this->CREATE_DTTM,true);
		$criteria->compare('LASTUPDDTTM',$this->LASTUPDDTTM,true);
		$criteria->compare('LASTUPDUSER',$this->LASTUPDUSER,true);
		$criteria->compare('PROP_STATUS',$this->PROP_STATUS,true);
		$criteria->compare('STATUS',$this->STATUS);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public function getEverythingAsArray() {
        if (!$this->PROPERTY_ID) { return false;}
        $result = [];

        $result['ETS_PROPERTY'] = $this->attributes;

        $result['ETS_OBSERVATIONS'] = getAllAsArray('ETSObservation', ['PROPERTY_ID' => $this->PROPERTY_ID]);

        $result['ETS_OBSERV_PHOTOS'] = getAllAsArray('ETSObsPhoto', ['PROPERTY_ID' => $this->PROPERTY_ID]);

        $result['ETS_COMMENTS'] = getAllAsArray('ETSProComment', ['PROPERTY_ID' => $this->PROPERTY_ID]);

        $result['ETS_ROOM_TESTS'] = getAllAsArray('ETSRoomTest', ['PROPERTY_ID' => $this->PROPERTY_ID]);

        $result['ETS_ESTIMATE'] = getAllAsArray('ETSEstimate', ['PROPERTY_ID' => $this->PROPERTY_ID]);

        $result['ETS_ESTIMATE_DTL'] = getAllAsArray('ETSEstimateDtl', ['PROPERTY_ID' => $this->PROPERTY_ID]);

        return $result;

    }
}