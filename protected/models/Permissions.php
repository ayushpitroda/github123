<?php
/**
 * This is the model class for table "q_rights".
 *
 * The followings are the available columns in table 'q_rights':
 * @property integer $right_id
 * @property string $right_name
 * @property string $right_backname
 * @property string $right_description
 */
class Permissions extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Permissions the static model class
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
		return 'q_rights';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('right_name,right_description', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('right_name,right_description', 'safe', 'on'=>'search'),
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
			'right_id' => 'Right',
			'right_name' => 'Right Name',
			'right_backname' => 'Right Backname',
			'right_description' => 'Right Description',
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

		if($this->right_id!='') 
			 { 
			   $criteria->addInCondition('right_id', explode('|', $this->right_id));
			 } else
			 {
				$criteria->compare('right_id',$this->right_id);
			 } 
		
 
		if($this->right_name!='')
		{
		
		      $request_right_name =  explode('|', $this->right_name);
	    	  foreach($request_right_name as $r_r_name) {
		      $criteria->compare('right_name', $r_r_name, true, 'OR');
	                                                  }
	    }else {	 
		
 	 	      $criteria->compare('right_name',$this->right_name,true);
	    }	
		
			
		
		if($this->right_description!='')
		{
		      $request_right_description =  explode('|', $this->right_description);
	    	  foreach($request_right_description as $r_right_description) {
		      $criteria->compare('right_description', $r_right_description, true, 'OR');
	                                                  }
	    }else {	 
 	 	      $criteria->compare('right_description',$this->right_description,true);
	    }	
		
		$data = new CActiveDataProvider(get_class($this), array(
                     'criteria'=>$criteria,
					 'pagination'=>array(
                     'pageSize'=> Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']),
            ),
						
                ));
	
				
				
        return $data;
	}
}