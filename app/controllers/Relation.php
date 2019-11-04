<?php

namespace app\controllers;

/**
 * Description of Relation
 *
 * @author saisai
 */
class Relation extends Login
{

    /**
     * 解除关系
     * @return type
     */
    public function relieve()
    {
        $where = [
            'type' => $this->request->getQuery('type', 'string', 'ca'),
            'relation' => $this->request->getQuery('relation', 'int', 0),
            'relation2' => $this->request->getQuery('relation2', 'int', 0),
        ];
        if (!$where['relation'] || !$where['relation2']) {
            return $this->error('参数错误');
        }

        $Relation = \pconfig\Relation::get4where($where);
        if ($Relation instanceof \db\models\relation) {
            $Relation->delete();
            return $this->success('删除成功!');
        }
        return $this->error("不存在!");
    }

    public function addhtml()
    {

    }

    public function addca()
    {
        $cid = $this->request->getQuery('cid', 'int', 0);
        $cinfo = \pconfig\Consumers::info($cid);
        if (!$cinfo) {
            return $this->error("消费者错误");
        }
        $this->view->setVar('cinfo', $cinfo);
        $this->view->setVar('type', 'ca');
    }


    public function addcp()
    {
        $this->addca();
        $this->view->setVar('type', 'cp');
        $this->view->render('relation', 'addca');
    }

    /**
     * 增加
     * @return type
     */
    public function add()
    {
        $data = [
            'type' => $this->request->getPost('type', 'string', 'ca'),
            'relation' => $this->request->getPost('relation', 'int', 0),
            'relation2' => $this->request->getPost('relation2', 'int', 0),
        ];
        if (!$data['relation'] || !$data['relation2']) {
            return $this->error('参数错误');
        }

        $Re = \pconfig\Relation::add($data);
        if (is_string($Re)) {
            return $this->error($Re);
        }
        return $this->success("成功!");
    }


}
