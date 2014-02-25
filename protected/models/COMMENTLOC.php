<?php

/**
 * This is the model class for table "ETS_COMMENT_LOC".
 *
 * The followings are the available columns in table 'ETS_COMMENT_LOC':
 * @property string $LOCATION_ID
 * @property string $LOCATION_DESCR
 * @property string $CREATE_DTTM
 * @property string $LASTUPDDTTM
 * @property string $LASTUPDUSER
 * @property integer $STATUS
 */
class COMMENTLOC extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return COMMENTLOC the static model class
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
		return 'ETS_COMMENT_LOC_CFG';
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
			array('LOCATION_ID', 'length', 'max'=>3),
			array('LOCATION_DESCR', 'length', 'max'=>60),
			array('LASTUPDUSER', 'length', 'max'=>30),
			array('CREATE_DTTM, LASTUPDDTTM', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('LOCATION_ID, LOCATION_DESCR, CREATE_DTTM, LASTUPDDTTM, LASTUPDUSER, STATUS', 'safe', 'on'=>'search'),
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
			'LOCATION_ID' => 'Location Id',
			'LOCATION_DESCR' => 'Location Name',
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

		$criteria->compare('LOCATION_ID',$this->LOCATION_ID,true);
		$criteria->compare('LOCATION_DESCR',$this->LOCATION_DESCR,true);
		$criteria->compare('CREATE_DTTM',$this->CREATE_DTTM,true);
		$criteria->compare('LASTUPDDTTM',$this->LASTUPDDTTM,true);
		$criteria->compare('LASTUPDUSER',$this->LASTUPDUSER,true);
		$criteria->compare('STATUS',$this->STATUS);

		$data = new CActiveDataProvider(get_class($this), array(
                     'criteria'=>$criteria,
					 'pagination'=>array(
                     'pageSize'=> Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']),
            ),

                ));
		return $data;	
	}
	
	 public function getSatusOptions() {
                return array(
                        1=>'Active', 0=>'InActive'
                );
        }
}