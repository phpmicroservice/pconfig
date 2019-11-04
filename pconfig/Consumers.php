<?php

namespace pconfig;

/**
 * Description of Consumers
 *
 * @author dongasai
 */
class Consumers  extends \Phalcon\Di\Injectable
{
    
    public static function get4name($name)
    {
	return \db\models\consumers::findFirstByName($name);
	
    }

        /**
     * 删除
     * @param type $id
     * @return boolean|string
     */
    public function delete($id)
    {
        $validation =new validation\ConsumersDel();
        if(!$validation->check(['id'=>$id])){
            return $validation->getMessage();
        }
        $mode = \db\models\consumers::findFirstById($id);
        if($mode->delete()===FALSE){
            return '删除失败';
        }
        return TRUE;
    }

    /**
     * 增加
     * @param type $data
     * @return boolean
     */
    public function add($data)
    {
        $data['create_time']= date(MYSQL_DATA_F);
	$data['update_time']= date(MYSQL_DATA_F);
        $mode =new \db\models\consumers();
        if($mode->save($data)===FALSE){
            return '增加失败!'. modelmessage($mode->getMessages());
        }
        return TRUE;
        
    }
    
    /**
     * 编辑
     * @param type $data
     * @return boolean
     */
    public function edit($data)
    {
        $validation = new validation\ConsumersEdit();
        if(!$validation->check($data)){
            return $validation->getMessage();
        }
        $mode = \db\models\consumers::findFirstById($data['id']);
        if($mode->save($data)===FALSE){
            return '修改失败!'. modelmessage($mode->getMessages());
        }
        return TRUE;
        
    }

        /**
     * 信息
     * @param type $id
     */
    public static function info($id)
    {
        $info = \db\models\consumers::findFirstById($id);
        return $info;
        
    }

    /**
     * 分页列表
     */
    public function pagelist($where, $page, $limit = 20) {
      
        $build = $this->modelsManager->createBuilder()
                ->from(\db\models\consumers::class);
        if($where['id']??0){
            $build->andWhere(' id = :id:',[
                'id'=>$where['id']
            ]);
        }

        if ($where['aid'] ?? 0) {
            $idlist = Relation::idlist($where['aid'], 'ca');
            $where['in'] = $idlist;
        }


        if (isset($where['in'])) {
            $build->andWhere(' id IN ({letter:array})', [
                'letter' => empty($where['in']) ? [0] : $where['in']
            ]);
        }
        //search
        if ($where['search'] ?? '') {
            $build->andWhere('name LIKE :name:', [
                'name' => '%' . $where['search'] . '%'
            ]);
        }
        $paginator = new \Phalcon\Paginator\Adapter\QueryBuilder([
            'builder'=>$build,
            'page'=>$page,
            'limit'=>$limit
        ]);
        return $paginator->paginate();
        
    }

}
