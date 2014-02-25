<?php
 
/**
 * This is the model class for table "question_pages".
 *
 * The followings are the available columns in table 'question_pages':
 * @property integer $auto_id
 */
class Pages extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Pages the static model class
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
		return 'question_pages';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('content', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('auto_id,content', 'safe', 'on'=>'search'),
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
			'auto_id' => 'Auto',
			'content' => 'Content',
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

		
		
		if($this->auto_id!='') 
			 { 
			   $criteria->addInCondition('auto_id', explode('|', $this->auto_id));
			 } else
			 {
				$criteria->compare('auto_id',$this->auto_id);
			 } 
			 
	  if($this->content!='')
		{
		
		      $request_content =  explode('|', $this->content);
	    	  foreach($request_content as $r_content) {
		      $criteria->compare('content', $r_content, true, 'OR');
	                                                  }
	    }else {	 
		
 	 	      $criteria->compare('content',$this->content,true);
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