<?php

/**
 * This is the model class for table "q_roles".
 *
 * The followings are the available columns in table 'q_roles':
 * @property integer $role_id
 * @property string $role_name
 * @property integer $user_id
 * @property string $date_added
 */
class Roles extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Roles the static model class
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
		return 'q_roles';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id', 'numerical', 'integerOnly'=>true),
			array('role_name,description,date_added', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('role_id,role_name,description,user_id,date_added','safe', 'on'=>'search'),
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
			'role_id' => 'Role Id',
			'user_id' => 'User',
			'date_added' => 'Date Added',
			'role_name' => 'Role Name',
			'Description' => 'Description',
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
		
		if($this->role_id!='') 
			 { 
			   $criteria->addInCondition('role_id', explode('|', $this->role_id));
			 } else
			 {
				$criteria->compare('role_id',$this->role_id);
			 } 
		
   	if($this->role_name!='')
		{
		
		      $request_role_name =  explode('|', $this->role_name);
	    	  foreach($request_role_name as $r_role_name) {
		      $criteria->compare('role_name', $r_role_name, true, 'OR');
	                                                  }
	    }else {	 
		
 	 	      $criteria->compare('role_name',$this->role_name,true);
	    }	
		
		if($this->description!='')
		{
		      $request_description =  explode('|', $this->description);
	    	  foreach($request_description as $r_description) {
		      $criteria->compare('description', $r_description, true, 'OR');
	                                                  }
	    }else {	 
 	 	      $criteria->compare('description',$this->description,true);
	    }	
		
		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('date_added',$this->date_added,true);
		$sort = new CSort;
        $sort->defaultOrder = 'role_id  desc';

		$data = new CActiveDataProvider(get_class($this), array(
                     'criteria'=>$criteria,
					 'pagination'=>array(
                     'pageSize'=> Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']),
            ),
						'sort' => $sort,
                ));
	
	    return $data;
	}
	
	
	
   
	
	
}