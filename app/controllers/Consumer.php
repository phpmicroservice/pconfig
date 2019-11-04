<?php

namespace app\controllers;

/**
 * 消费者控制器
 */
class Consumer extends Login
{
    
    public function index()
    {
        
        $page = $this->request->getQuery('page','int',1);
        $aid = $this->request->getQuery('aid', 'int', 0);
        $search = $this->request->getQuery('search', 'string');

        $where = [
            'aid' => $aid,
            'search' => $search
        ];
        $consumer = new \pconfig\Consumers();

        $info= $consumer->pagelist($where, $page);
        if ($this->request->isAjax()) {
            return json_encode($info);
        }
        $this->view->setVar('info', $info);
        return $this->view->render('consumer', 'index');
        
    }
    
    /**
     * 增加
     * @return type
     */
    public function add()
    {
        if($this->request->isPost()){
            # 修改
            $data = [
               
               'name'=> $this->request->getPost('name','string'),
               'remark'=> $this->request->getPost('remark','string'),
            ];
            
            $re = \pconfig\Consumers::add($data);
            if(is_string($re)){
                return $this->error($re);
            }
            return $this->success("增加成功!",'/consumer/index');
        }
    }

    
    public function delete()
    {
        $id = $this->request->getQuery('id', 'int');
        $re = \pconfig\Consumers::delete($id);
        if(is_string($re)){
            return $this->error($re);
        }
        return $this->success("删除成功!",'/consumer/index');
    }

        /**
     * 修正
     * @return type
     */
    public function edit()
    {
        if($this->request->isPost()){
            # 修改
            $data = [
               'id'=> $this->request->getPost('id','int',0),
               'name'=> $this->request->getPost('name','string'),
               'remark'=> $this->request->getPost('remark','string'),
            ];
            
            $re = \pconfig\Consumers::edit($data);
            if(is_string($re)){
                return $this->error($re);
            }
            return $this->success("修改成功!");
        }
        $id = $this->request->get('id','int');
        $info = \pconfig\Consumers::info($id);
        if(!$info){
            return $this->error("不存在的消费者信息");
        }
        $this->view->setVar('info', $info);
    }
    
}