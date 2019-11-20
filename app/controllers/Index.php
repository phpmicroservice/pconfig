<?php

namespace app\controllers;

use Phalcon\Mvc\Controller;

class Index extends Controller
{
    
    use \app\traits\Jump;
    
    public function initialize()
    {
        $this->view->setVar('login', $this->session->get('login'));
    }
    public function index()
    {
       
        return $this->view->render('index','index');
    }
    
    public function login()
    {
            
       
        if($this->session->get('login')){
          
            $this->success('已经登录','/index/index');
            return FALSE;
        }
        if($this->request->isPost()){
            return $this->logincall();
        }
        $this->session->set('dengluqian', $_SERVER["HTTP_REFERER"]);
        return $this->view->render('index','login');
    }
    
    public function logout()
    {
        $this->session->set('login', FALSE);
        return $this->success('退出成功','/index/index');
    }




    /**
     * 登录处理
     */
    private function logincall()
    {
       
        $data= [
            'username'=>$this->request->getPost('username','string'),
            'password' => $this->request->get('password', 'string'),
        ];
        $validation = new \app\validation\Login();
        $message = $validation->validate($data);
        
        if(count($message) > 0){
            return $this->error($message);
        }
        
        $this->session->set('login', TRUE);
        return $this->success('登录成功',$this->session->get('dengluqian'));
    }
    
    
    public function demo()
    {
        \pconfig\Project::get($name);
    }
    
    public function password()
    {
        $password=$this->request->get('password','string',123456);
        return password_hash($password, 1);
    }
}
