<? class MyActiveRecord extends CActiveRecord {
    
    private static $pmsdb = null;
 
    protected static function getAdvertDbConnection()
    {
        if (self::$pmsdb !== null)
            return self::$pmsdb;
        else
        {
            self::$pmsdb = Yii::app()->pmsdb;
            if (self::$dbadvert instanceof CDbConnection)
            {
                self::$pmsdb->setActive(true);
                return self::$pmsdb;
            }
            else
                throw new CDbException(Yii::t('yii','Active Record requires a "db" CDbConnection application component.'));
        }
    }
	
?>	
	