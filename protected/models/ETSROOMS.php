<?php

/**
 * This is the model class for table "ETS_ROOMS".
 *
 * The followings are the available columns in table 'ETS_ROOMS':
 * @property string $ROOM_ID
 * @property string $ROOM_DESCR
 * @property string $CREATE_DTTM
 * @property string $LASTUPDDTTM
 * @property string $LASTUPDUSER
 * @property integer $STATUS
 */
class ETSROOMS extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ETSROOMS the static model class
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
		return 'ETS_ROOMS_CFG';
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
			array('STATUS', 'numerical', 'integerOnly'=>true),
			array('ROOM_ID', 'length', 'max'=>3),
			array('ROOM_DESCR, LASTUPDUSER', 'length', 'max'=>30),
			array('CREATE_DTTM, LASTUPDDTTM', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ROOM_ID, ROOM_DESCR, CREATE_DTTM, LASTUPDDTTM, LASTUPDUSER, STATUS', 'safe', 'on'=>'search'),
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
			'ROOM_ID' => 'Room Id',
			'ROOM_DESCR' => 'Room Name',
			'CREATE_DTTM' => 'Create Dttm',
			'LASTUPDDTTM' => 'Lastupddttm',
			'LASTUPDUSER' => 'Lastupduser',
			'STATUS' => 'STATUS',
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

		$criteria->compare('ROOM_ID',$this->ROOM_ID,true);
		$criteria->compare('ROOM_DESCR',$this->ROOM_DESCR,true);
		$criteria->compare('CREATE_DTTM',$this->CREATE_DTTM,true);
		$criteria->compare('LASTUPDDTTM',$this->LASTUPDDTTM,true);
		$criteria->compare('LASTUPDUSER',$this->LASTUPDUSER,true);
		$criteria->compare('STATUS',$this->STATUS);

       $sort = new CSort;
        $sort->defaultOrder = 'ROOM_ID  asc';

		$data = new CActiveDataProvider(get_class($this), array(
                     'criteria'=>$criteria,
					 'pagination'=>array(
                     'pageSize'=> Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']),
            ),
						'sort' => $sort,
                ));
		return $data;	
		/*return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));*/
	}
}