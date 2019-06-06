<?php
namespace app\validation;

/**
 * Description of Login
 * 登录验证
 * @author dongasai
 */
class Login extends \Phalcon\Validation
{
   
    public function initialize()
    {
        $this->add('password', new \Phalcon\Validation\Validator\Callback([
            "message" => "用户名密码错误",
            "callback" => function($data) {
                
                

                return true;
            }
        ]));
    }
}
