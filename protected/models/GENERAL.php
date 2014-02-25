<?php

/**
 * This is the model class for table "ETS_GENERAL".
 *
 * The followings are the available columns in table 'ETS_GENERAL':
 * @property string $COMPANY
 * @property string $LOGO
 * @property string $DESCRIPTION
 * @property string $ADDRESS1
 * @property string $ADDRESS2
 * @property string $CITY
 * @property string $STATE
 * @property string $ZIP
 * @property string $EMAIL
 * @property string $PHONE
 * @property string $TIMINGS
 */
class GENERAL extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return GENERAL the static model class
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
		return 'ETS_GENERAL';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('COMPANY', 'length', 'max'=>60),
			array('DESCRIPTION', 'length', 'max'=>300),
			array('ADDRESS1, ADDRESS2', 'length', 'max'=>50),
			array('CITY', 'length', 'max'=>40),
			array('STATE', 'length', 'max'=>2),
			array('ZIP, PHONE', 'length', 'max'=>10),
			array('EMAIL', 'length', 'max'=>75),
			array('TIMINGS', 'length', 'max'=>100),
//			array('LOGO', 'file','types'=>'jpg, gif, png', 'allowEmpty'=>true, 'on'=>'update'), // this 
			array('LOGO', 'file', 
					'types'=>'jpg, gif, png, bmp, jpeg',
						'maxSize'=>1024 * 1024 * 1, // 10MB
						//'minSize'=>1024 * 1024 * 1, // 10MB
							'tooLarge'=>'The file was larger than 1MB. Please upload a smaller file.',
						'allowEmpty' => true,
						'on'=>'update',
					 ),
			//array('LOGO', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('COMPANY, LOGO, DESCRIPTION, ADDRESS1, ADDRESS2, CITY, STATE, ZIP, EMAIL, PHONE, TIMINGS', 'safe', 'on'=>'search'),
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
			'COMPANY' => 'Company',
			'LOGO' => 'Logo',
			'DESCRIPTION' => 'Description',
			'ADDRESS1' => 'Address1',
			'ADDRESS2' => 'Address2',
			'CITY' => 'City',
			'STATE' => 'State',
			'ZIP' => 'Zip',
			'EMAIL' => 'Email',
			'PHONE' => 'Phone',
			'TIMINGS' => 'Timings',
		);
	}
	
	/*public function beforeSave() {
    if ($file = CUploadedFile::getInstance($this, 'LOGO')) {
        $this->LOGO = file_get_contents($file->tempName);
    }
    return parent::beforeSave();
        }*/

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('COMPANY',$this->COMPANY,true);
		$criteria->compare('LOGO',$this->LOGO,true);
		$criteria->compare('DESCRIPTION',$this->DESCRIPTION,true);
		$criteria->compare('ADDRESS1',$this->ADDRESS1,true);
		$criteria->compare('ADDRESS2',$this->ADDRESS2,true);
		$criteria->compare('CITY',$this->CITY,true);
		$criteria->compare('STATE',$this->STATE,true);
		$criteria->compare('ZIP',$this->ZIP,true);
		$criteria->compare('EMAIL',$this->EMAIL,true);
		$criteria->compare('PHONE',$this->PHONE,true);
		$criteria->compare('TIMINGS',$this->TIMINGS,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}