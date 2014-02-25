<?php
/***
 * @param string $modelName
 * @param array $params conditions for the query [column => value]
 * @internal param array $fields
 * @return array
 */
function getAllAsArray($modelName, $params = array(), $date = false) {
    $tableSchema = $modelName::model()->getTableSchema();
    $criteria = new CDbCriteria();
    if (!empty($fields)) {
        $criteria->select = $fields;
    }
    if (!empty($params)) {
        foreach ($params as $k => $v) {
            if (is_array($v)) {
                $criteria->addInCondition($k,$v);
            } else {
                $criteria->addCondition($k,$v);
            }
        }
    }
    if ($date) {
        $criteria->addCondition('LASTUPDDTTM > :modified');
        $criteria->params += [':modified' => $date];
    }
    $command = $modelName::model()->getCommandBuilder()->createFindCommand($tableSchema, $criteria);
    return $command->queryAll();
}