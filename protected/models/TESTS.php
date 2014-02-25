<?php

/**
 * This is the model class for table "ETS_TESTS".
 *
 * The followings are the available columns in table 'ETS_TESTS':
 * @property integer $TEST_ID
 * @property string $TEST_DESCR
 * @property string $MOLD_IND
 * @property string $BACTERIA_IND
 * @property string $ALLERGEN_IND
 * @property string $CHEMICAL_IND
 * @property string $ASBESTOS_IND
 * @property string $PARTICULATE_ANALYSIS_IND
 * @property string $BUILDING_MATERIAL_IND
 * @property string $RELATIVE_HUMIDITY_IND
 * @property string $TEMPERATURE_IND
 * @property string $SAMPLE_STRT_DTTM_IND
 * @property string $SAMPLE_END_DTTM_IND
 * @property string $LAB_CODE_IND
 * @property string $CREATE_DTTM
 * @property string $LASTUPDDTTM
 * @property string $LASTUPDUSER
 * @property integer $STATUS
 */
class TESTS extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TESTS the static model class
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
		return 'ETS_TESTS_CFG';
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
			array('TEST_DESCR, LASTUPDUSER', 'length', 'max'=>30),
			array('MOLD_IND, BACTERIA_IND, ALLERGEN_IND, CHEMICAL_IND, ASBESTOS_IND, PARTICULATE_ANALYSIS_IND, BUILDING_MATERIAL_IND, RELATIVE_HUMIDITY_IND, TEMPERATURE_IND, SAMPLE_STRT_DTTM_IND, SAMPLE_END_DTTM_IND, LAB_CODE_IND', 'length', 'max'=>1),
			array('CREATE_DTTM, LASTUPDDTTM', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('TEST_ID, TEST_DESCR, MOLD_IND, BACTERIA_IND, ALLERGEN_IND, CHEMICAL_IND, ASBESTOS_IND, PARTICULATE_ANALYSIS_IND, BUILDING_MATERIAL_IND, RELATIVE_HUMIDITY_IND, TEMPERATURE_IND, SAMPLE_STRT_DTTM_IND, SAMPLE_END_DTTM_IND, LAB_CODE_IND, CREATE_DTTM, LASTUPDDTTM, LASTUPDUSER, STATUS', 'safe', 'on'=>'search'),
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
			'TEST_ID' => 'Test Id',
			'TEST_DESCR' => 'Test Name',
			'MOLD_IND' => 'Mold',
			'BACTERIA_IND' => 'Bacteria',
			'ALLERGEN_IND' => 'Allergen',
			'CHEMICAL_IND' => 'Chemical',
			'ASBESTOS_IND' => 'Asbestos',
			'PARTICULATE_ANALYSIS_IND' => 'Particulate Analysis',
			'BUILDING_MATERIAL_IND' => 'Building Material',
			'RELATIVE_HUMIDITY_IND' => 'Relative Humidity',
			'TEMPERATURE_IND' => 'Temperature',
			'SAMPLE_STRT_DTTM_IND' => ' Sample Start Date/ Time',
			'SAMPLE_END_DTTM_IND' => 'Sample End Date/ Time ',
			'LAB_CODE_IND' => ' Lab Code ',
			'CREATE_DTTM' => 'Create Date',
			'LASTUPDDTTM' => 'Last update Date',
			'LASTUPDUSER' => 'User',
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

		$criteria->compare('TEST_ID',$this->TEST_ID);
		$criteria->compare('TEST_DESCR',$this->TEST_DESCR,true);
		$criteria->compare('MOLD_IND',$this->MOLD_IND,true);
		$criteria->compare('BACTERIA_IND',$this->BACTERIA_IND,true);
		$criteria->compare('ALLERGEN_IND',$this->ALLERGEN_IND,true);
		$criteria->compare('CHEMICAL_IND',$this->CHEMICAL_IND,true);
		$criteria->compare('ASBESTOS_IND',$this->ASBESTOS_IND,true);
		$criteria->compare('PARTICULATE_ANALYSIS_IND',$this->PARTICULATE_ANALYSIS_IND,true);
		$criteria->compare('BUILDING_MATERIAL_IND',$this->BUILDING_MATERIAL_IND,true);
		$criteria->compare('RELATIVE_HUMIDITY_IND',$this->RELATIVE_HUMIDITY_IND,true);
		$criteria->compare('TEMPERATURE_IND',$this->TEMPERATURE_IND,true);
		$criteria->compare('SAMPLE_STRT_DTTM_IND',$this->SAMPLE_STRT_DTTM_IND,true);
		$criteria->compare('SAMPLE_END_DTTM_IND',$this->SAMPLE_END_DTTM_IND,true);
		$criteria->compare('LAB_CODE_IND',$this->LAB_CODE_IND,true);
		$criteria->compare('CREATE_DTTM',$this->CREATE_DTTM,true);
		$criteria->compare('LASTUPDDTTM',$this->LASTUPDDTTM,true);
		$criteria->compare('LASTUPDUSER',$this->LASTUPDUSER,true);
		$criteria->compare('STATUS',$this->STATUS);

	   $sort = new CSort;
        $sort->defaultOrder = 'TEST_ID  asc';

		$data = new CActiveDataProvider(get_class($this), array(
                     'criteria'=>$criteria,
					 'pagination'=>array(
                     'pageSize'=> Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']),
            ),
						'sort' => $sort,
                ));
		return $data;	
	}
	
	 public function getSatusOptions() {
                return array(
                        1=>'Active', 0=>'InActive'
                );
        }
	
	
}