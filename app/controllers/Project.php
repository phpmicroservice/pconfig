<?php


namespace app\controllers;

/**
 * Project
 * 项目对象控制器
 * @author dongasai
 */
class Project extends Login
{
    
    
    public function index()
    {
        
        $page = $this->request->getQuery('page','int',1);
        $pid = $this->request->getQuery('pid','int',0);
        $ppid = $this->request->getQuery('ppid', 'int', 0);
        $only_sub = $this->request->getQuery('only_sub', 'int', 0);
        $cid = $this->request->getQuery('cid', 'int', 0);
        $where=[
            'pid' => $pid,
            'ppid' => $ppid,
            'only_sub' => $only_sub,
            'cid' => $cid
        ];
        $this->view->setVar('where', $where);
        if($where['pid']){
            $pinfo = \pconfig\Project::info($where['pid']);
            $this->view->setVar('pinfo', $pinfo);
        }
        $consumer = new \pconfig\Project();
        $info= $consumer->pagelist($where, $page);

        $this->view->setVar('info', $info);
        return $this->view->render('project', 'index');
    }

    public function search()
    {
        $search = $this->request->getQuery('search', 'string');
        $id = $this->request->getQuery('id', 'int');
        $where=[
            'id' => $id,
            'search' => $search
        ];

        $consumer = new \pconfig\Project();
        $info = $consumer->pagelist($where, 1, 20);
        return json_encode($info);

    }


    /**
     * 增加
     * @return type
     */
    public function add()
    {
        if($this->request->isPost()){
            # 提交
            $data=[
                'id'=>$this->request->getPost('id','int'),
                'name'=>$this->request->getPost('name','string'),
                'remark'=>$this->request->getPost('remark','string'),
                'content'=> $this->request->getPost('content', 'string'),
                'type'=> $this->request->getPost('type', 'string'),
                'pid'=> $this->request->getPost('pid', 'int'),
            ];
            
            $re = \pconfig\Project::add($data);
            
            if(is_string($re)){
                 return $this->error($re);
            }
            return $this->success('成功', '/project/index?pid=' . $data['pid']);
        }
        $pid = $this->request->get('pid','int',0);
        $this->view->setVar('pid', $pid);
        if($pid){
            $pinfo = \pconfig\Project::info($where['pid']);
            $this->view->setVar('pinfo', $pinfo);
        }
      
    }
    
    /**
     * 删除
     * @return type
     */
    public function delete() 
    {
        $id = $this->request->get('id', 'int');
        $re = \pconfig\Project::delete($id);
        
        if (is_string($re)) {
            return $this->error($re);
        }
        return $this->success('成功');
    }

    /**
     * 详情
     * @return type
     */
    public function info()
    {
        $id= $this->request->getQuery('id','int',0);
        $info = \pconfig\Project::info($id);
       
        if(!$info){
            $this->error('不存在的内容');
        }
        $content = \pconfig\Project::get($info->name, $info->pid);
       
        $this->view->setVar('content', $content);
        $this->view->setVar('info', $info);
        
    }
    
    public function merge() {
        $id = $this->request->getQuery('id', 'int', 0);
        $info = \pconfig\Project::info($id);

        if (!$info) {
            $this->error('不存在的内容');
        }
        $content = \pconfig\Project::get($info->name, $info->pid);

        $this->view->setVar('content', $content);
        $this->view->setVar('info', $info);

        $list = \pconfig\Project::list4ids(explode(',', $info->content));

        $this->view->setVar('mlist', $list);
    }
    
    /**
     * 输出
     */
    public function output()
    {
        $id = $this->request->getQuery('id', 'int', 0);
        $type = $this->request->getQuery('type', 'string', 'json');
       
        $c = \pconfig\Project::get4id($id);
        return \pconfig\Output::geshi($c,$type);
    }

    
    public function edit()
    {
        if($this->request->isPost()){
            # 提交
            $data=[
                'id'=>$this->request->getPost('id','int'),
                'name'=>$this->request->getPost('name','string'),
                'remark'=>$this->request->getPost('remark','string'),
                'content'=> $this->request->getPost('content', 'string')
            ];
            
            $re = \pconfig\Project::edit($data);
            
            if(is_string($re)){
                 return $this->error($re);
            }
            return $this->success('成功');
            
        }
        $id= $this->request->getQuery('id','int',0);
        $info = \pconfig\Project::info($id);
        if(!$info){
            $this->error('不存在的内容');
        }
        $this->view->setVar('info', $info);
    }




    /**
     * 详情
     * @return type
     */
    public function inherit()
    {
        $id= $this->request->getQuery('id','int',0);
        $info = \pconfig\Project::info($id);
       
        if(!$info){
            $this->error('不存在的内容');
        }
        $content = \pconfig\Project::get($info->name, $info->pid);
        $this->view->setVar('content', $content);
        $this->view->setVar('info', $info);
        
        # 要比对的
        $minfo = \pconfig\Project::info($info->pid);
        $mcontent= \pconfig\Project::get($minfo->name);

        $this->view->setVar('mcontent', $mcontent);
        $this->view->setVar('minfo', $minfo);
        return $this->view->render('project', 'merge');
    }
    
}
