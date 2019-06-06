<?php

namespace app\controllers;

/**
 * Description of Login
 *
 * @author dongasai
 */
class Login extends \Phalcon\Mvc\Controller {

    use \app\traits\Jump;

    public function initialize() {
        $this->view->setVar('login', $this->session->get('login'));
        $this->view->setVar('ctip',[
            'inherit'=>'继承,内容无效',
            'merge'=>'合并,内容为要合并配置项的ID,英文逗号分割',
            'array'=>'关联集合内容无效',
            'index'=>'有序集合内容无效',
            'string'=>'字符串类型内容',
            'int'=>'内容将转换为数字型输出',
            'float'=>'内容将转换为浮点型输出'
        ]);
        $this->view->setVar('ttip', [
            'inherit'=>'继承,继承父级内容并覆盖',
            'merge'=>'合并多个配置项',
            'array'=>'关联集合',
            'index'=>'有序集合',
            'string'=>'字符串类型',
            'int'=>'整形',
            'float'=>'浮点型'
        ]);
	$this->view->setVar('relation_type', [
	    'ca'=>'消费者绑定ALC',
	    'cp'=>'消费者绑定资源'
	]);
    }

    /**
     * 登录验证
     * @param \Phalcon\Mvc\Dispatcher $dispatcher
     */
    public function beforeExecuteRoute(\Phalcon\Mvc\Dispatcher $dispatcher) 
    {
        if (!$this->session->get('login')) {
            # 没有登录
            $this->view->setVar('login', false);
            $this->error('需要登录', $this->url->get('index/login'));
            $this->response->setContent($this->view->getContent());
            $dispatcher->setReturnedValue($this->response);
            return FALSE;
        } else {
            $this->view->setVar('login', true);
        }
    }

}
