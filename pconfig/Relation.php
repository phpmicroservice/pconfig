<?php

namespace pconfig;

/**
 * Description of Relation
 *
 * @author saisai
 */
class Relation extends \Phalcon\Di\Injectable
{
    
    
    public function add($data)
    {
	$model = new \db\models\relation();
	$data['create_time']= date(MYSQL_DATA_F);
	$data['update_time']= date(MYSQL_DATA_F);
	if(!$model->save($data)){
	    return modelmessage($model->getMessages());
	}
	return TRUE;
    }

    /**
     * id 列表
     * @param type $relation
     * @param type $type
     */
    public static function idlist($relation,$type = 'ca')
    {
	$list = \db\models\relation::find([
	    'columns'=>'relation2,relation',
	    'relation = :relation: and type = :type:',
	    'bind'=>[
		'relation'=>$relation,
		'type'=>$type
	    ]
	]);
	return array_column($list->toArray(), 'relation2');
    }
    
    /**
     * id 列表
     * @param type $relation
     * @param type $type
     */
    public static function lists($relation,$type = 'ca')
    {
	$list = \db\models\relation::find([
	   
	    'relation = :relation: and type = :type:',
	    'bind'=>[
		'relation'=>$relation,
		'type'=>$type
	    ]
	]);
	return $list;
    }
    
    /**
     * where 条件获取
     * @param type $where
     * @return type
     */
    public static function get4where($where )
    {
	$model = \db\models\relation::findFirst([
	    ' type =:type: and relation = :relation: and relation2 = :relation2:',
	    'bind'=>[
		'type'=>$where['type'],
		'relation'=>$where['relation'],
		'relation2'=>$where['relation2']
	    ]
	]);
	return $model;
    }
	
    
}
