<?php

namespace app\controllers;

/**
 * Alc
 * 权限控制器
 * @author dongasai
 */
class Alc extends Login
{

    public function initialize()
    {
        parent::initialize();
        $this->view->setVar('alc_type', [
            'ip' => 'ip地址验证',
            'token' => 'token验证',
            'sign' => 'sign验证',
            'kong' => '空验证'
        ]);
    }

    public function index()
    {
        $page = $this->request->getQuery('page', 'int', 1);
        $cid = $this->request->getQuery('cid', 'int', 0);
        $where = [
            'cid' => $cid
        ];
        $Alc = new \pconfig\Alc();
        $info = $Alc->pagelist($where, $page);
        $this->view->setVar('where', $where);
        $this->view->setVar('info', $info);
        if ($this->request->isAjax()) {
            return json_encode($info);
        }
        return $this->view->render('consumer', 'index');

    }


    public function edit()
    {
        if ($this->request->isPost()) {
            # 修改
            $data = [
                'id' => $this->request->getPost('id', 'int', 0),
                'type' => $this->request->getPost('type', 'string'),
                'name' => $this->request->getPost('name', 'string'),
                'content' => $this->request->getPost('content', 'string'),
            ];

            $re = \pconfig\Alc::edit($data);
            if (is_string($re)) {
                return $this->error($re);
            }
            return $this->success("修改成功!");
        }
        $id = $this->request->get('id', 'int');
        $info = \pconfig\Alc::info($id);
        if (!$info) {
            return $this->error("不存在的信息");
        }
        $this->view->setVar('info', $info);
    }

    /**
     * 增加
     * @return type
     */
    public function add()
    {
        if ($this->request->isPost()) {
            # 修改
            $data = [
                'name' => $this->request->getPost('name', 'string'),
                'type' => $this->request->getPost('type', 'string'),
                'content' => $this->request->getPost('content', 'string'),
            ];

            $re = \pconfig\Alc::add($data);
            if (is_string($re)) {
                return $this->error($re);
            }
            return $this->success("增加成功!", '/alc/index');
        }
    }

    /**
     * ajax获取单条信息
     * @return type
     */
    public function ajaxinfo()
    {
        $id = $this->request->get('id', 'int');
        $info = \pconfig\Alc::info($id);
        if (!$info) {
            return json_encode([
                'code' => 1,
                'msg' => '不存在的信息'
            ]);
        }
        return json_encode([
            'code' => 0,
            'data' => $info
        ]);
    }

}
