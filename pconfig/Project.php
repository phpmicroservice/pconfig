<?php

namespace pconfig;

use Phalcon\Db;

/**
 * Project
 * 配置对象类
 * @author dongasai
 */
class Project extends \Phalcon\Di\Injectable
{


    /**
     * 列表 根据 id列表
     * @param type $in
     * @return type
     */
    public static function list4ids($in)
    {
        $list = \db\models\project::find([
            'id IN ({id:array})',
            'bind' => [
                'id' => $in
            ]
        ]);
        return $list;
    }


    /**
     * 删除
     * @param type $id
     * @return boolean|string
     */
    public static function delete($id)
    {
        $validation =new validation\ProjectDel();
        if(!$validation->check(['id'=>$id])){
            return $validation->getMessage();
        }

        $model =\db\models\project::findFirstById($id);

        if($model->delete()===FALSE){
            return '删除失败';
        }
        return TRUE;
    }

    /**
     * 增加
     * @param type $data
     * @return boolean|string
     */
    public static function add($data)
    {

        $validation =new validation\ProjectAdd();
        if(!$validation->check($data)){
            return $validation->getMessage();
        }
        $data['ppid']= self::ppid($data);
        $data['create_time']= date(MYSQL_DATA_F);
        $data['update_time']= date(MYSQL_DATA_F);
        $model =new \db\models\project();
        if($model->save($data)===FALSE){
            return '增加失败'.modelmessage($model->getMessages());
        }
        return TRUE;
    }

    /**
     * PPid 顶级ID
     * @param type $data
     * @return int
     */
    private static function ppid($data)
    {
        if($data['pid']){
            # 读取父级
            $p= \db\models\project::findFirstById($data['pid']);

            if($p){
                if( $p->ppid){
                    return $p->ppid;
                }
                return $p->id;
            }
            return $data['pid'];
        }
        return 0;

    }

    public static function pidlist($id)
    {

        $data =\db\models\project::findFirstById($id);
        if($data){
            if($data->pid){
                $pid2 = self::pidlist($data->pid);
                return array_merge($pid2,[$id]);
            }
            return [$id];
        }
        return [$id];
    }


    /**
     * 编辑
     * @param type $data
     * @return type
     */
    public static function edit($data)
    {
        $validation =new validation\Project();
        if(!$validation->check($data)){
            return $validation->getMessage();
        }

        $model = \db\models\project::findFirst($data['id']);
        if($model->save($data)===FALSE){
            return '修改失败';
        }
        return TRUE;
    }

    /**
     * 分页列表
     */
    public function pagelist($where, $page, $limit = 20)
    {

        $build = $this->modelsManager->createBuilder()
            ->from(\db\models\project::class);
        if ($where['id'] ?? 0) {
            $build->andWhere(' id = :id:', [
                'id' => $where['id']
            ]);
        }
        if ($where['cid'] ?? 0) {
            # 消费者的
            $idlist = Relation::idlist($where['cid'], 'cp');

            $where['in'] = $idlist;
        }


        if (isset($where['in'])) {
            $build->andWhere(' id IN ({letter:array})', [
                'letter' => empty($where['in']) ? [0] : $where['in']
            ]);
        }

        if (isset($where['pid'])) {

            if ($where['only_sub'] ?? 0) {

                # 只看自己和下级
                $build->andWhere(' id = :id: or pid = :id:', [
                    'id' => $where['pid']
                ]);
            } else {

                $build->andWhere(' id = :id: or ppid = :id: or pid = :id:', [
                    'id' => $where['pid']
                ]);
            }

        }

        if ($where['ppid'] ?? 0) {
            $build->andWhere(' id = :id: or ppid = :id: ', [
                'id' => $where['pid']
            ]);
        }
        if ($where['search'] ?? '') {
            $build->andWhere('name LIKE :name: or remark LIKE :name:', [
                'name' => '%' . $where['search'] . '%'
            ]);
        }


        $paginator = new \Phalcon\Paginator\Adapter\QueryBuilder([
            'builder' => $build,
            'page' => $page,
            'limit' => $limit
        ]);

        return $paginator->paginate();
    }

    /**
     * 单条信息
     * @param type $id
     */
    public static function info($id, $content = FALSE)
    {
        $pr = \db\models\project::findFirst($id);
        if ($content) {
            $pr->content = self::typeConversion($pr);
        }
        return $pr;
    }

    /**
     *
     * @param type $name 名字
     * @param type $sub 是否获取子集
     * @param type $format 格式
     */
    /**
     * 获取信息
     * @param $name 名字
     * @param int $pid 父级ｉｄ
     * @return array|float|int|type|string|null
     */
    public static function get($name, $pid)
    {
        $pr = \db\models\project::findFirst([
            'name = :name: and pid = :pid:',
            'bind' => [
                'name' => $name,
                'pid' => $pid
            ]
        ]);

        if ($pr) {
            return self::typeConversion($pr);
        }
        return NULL;
    }


    /**
     * 获取信息使用id
     * @param type $id Id
     */
    public static function get4id($id)
    {
        $pr = \db\models\project::findFirstById($id);
        if ($pr) {
            return self::typeConversion($pr);
        }
        return NULL;
    }

    /**
     * 类型转换
     */
    private static function typeConversion(\db\models\project $pr)
    {
        switch ($pr->type) {
            case 'array':
                return self::get4array($pr->id);
                # 数组
                break;
            case 'index':
                return self::get4index($pr->id);
                # 索引数组
                break;
            case 'inherit':
                return self::get4inherit($pr->id);
                # 索引数组
                break;
            case 'merge':
                return self::get4merge($pr->content);
                # 索引数组
                break;
            case 'string':
                return (string) $pr->content;
                # 字符串
                break;
            case 'int':
                return intval($pr->content);
                # 整形
                break;
            case 'decimal':
                return floatval($pr->content);
                # 浮点
                break;
            case 'bool':
                return boolval($pr->content);
                # 浮点
                break;

        }
    }

    /**
     * 合并
     * @param type $content
     * @return type
     */
    public static function get4merge($content)
    {
        $in = explode(',', $content);
        $list = self::list4ids($in);

        $arr = [];
        foreach ($list as $pr) {
            $arr[$pr->name] = self::typeConversion($pr);
        }
        return $arr;
    }


    /**
     *
     * @param type $id
     */
    private static function get4inherit($id)
    {
        $ziji = self::info($id, FALSE);

        $merge = self::info($ziji->content, TRUE);
        $ziji->type = $merge->type;
        $zijic = self::typeConversion($ziji);
        return array_replace_recursive($merge->content, $zijic);
    }

    /**
     * 获取关联信息
     * @param type $id
     */
    private static function get4array($id)
    {
        $list = \db\models\project::find([
            'pid = :pid:',
            'bind' => [
                'pid' => $id
            ]
        ]);

        $arr = [];

        foreach ($list as $pr) {
            $arr[$pr->name] = self::typeConversion($pr);
        }
        return $arr;
    }

    /**
     * 获取索引
     * @param type $id
     */
    private static function get4index($id)
    {
        $list = \db\models\project::find([
            'pid = :pid: and ( pid = :pid: and type != "inherit" ) ',
            'bind' => [
                'pid' => $id
            ]
        ]);

        $arr = [];
        foreach ($list as $pr) {
            $arr[] = self::typeConversion($pr);
        }
        sort($arr);
        return $arr;
    }

}
