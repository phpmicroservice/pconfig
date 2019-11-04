<?php

namespace pconfig;

/**
 * Description of Alc
 *
 * @author dongasai
 */
class Alc extends \Phalcon\Di\Injectable
{

    /**
     * 分页列表
     * @param type $where
     * @param type $page
     */
    public function pagelist($where, $page = 1, $limit = 20)
    {
        $build = $this->modelsManager->createBuilder()
            ->from(\db\models\alc::class);
        if ($where['id'] ?? 0) {
            $build->andWhere(' id = :id:', [
                'id' => $where['id']
            ]);
        }
        if ($where['cid'] ?? 0) {
            # 消费者的
            $idlist = Relation::idlist($where['cid']);
            $where['in'] = $idlist;
        }


        if ($where['in'] ?? []) {
            $build->andWhere(' id IN ({letter:array})', [
                'letter' => empty($where['in']) ? [10] : $where['in']
            ]);
        }

        if ($where['search'] ?? '') {
            $build->andWhere('name LIKE :name:', [
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
     * 信息
     * @param type $id
     * @return type
     */
    public function info($id)
    {
        $alc = \db\models\alc::findFirstById($id);
        return $alc;
    }

    /**
     *
     * @param type $alc
     */
    public function getAlc4Id($id)
    {
        $alc = self::info($id);

        $class_name = '\pconfig\Alc\\' . ucfirst($alc->type);
        if (class_exists($class_name)) {
            return new $class_name($alc->content);
        }
        return FALSE;
    }

    /**
     * 增加
     * @param type $data
     */
    public function add($data)
    {
        $data['create_time'] = date(MYSQL_DATA_F);
        $data['update_time'] = date(MYSQL_DATA_F);
        $model = new \db\models\alc();
        if (!$model->save($data)) {
            return '增加失败!' . modelmessage($model->getMessages());
        }
        return TRUE;
    }

    /**
     * 修改
     * @param type $data
     */
    public function edit($data)
    {
        $mode = \db\models\alc::findFirst([
            'id = :id:',
            'bind' => [
                'id' => $data['id']
            ]
        ]);
        if (!$mode->save($data)) {
            return '修改失败' . modelmessage($mode->getMessages());
        }
        return TRUE;
    }

}
