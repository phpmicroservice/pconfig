<?php

namespace app\validation;

/**
 * Description of Out
 *
 * @author saisai
 */
class Out extends \pconfig\validation\Validation
{
   
    public function initialize()
    {
	
	$this->add('cname', new \pconfig\validator\Cname([
	    'message'=>'消费者不存在'
	]));
	
	$this->add('pid',new \pconfig\validator\Pid([
	    'message'=>'缺少对象权限'
	]));
	$this->add('pid',new  \pconfig\validator\Auth([
	    'message'=>'权限验证失败'
	]));
    }
    
    
    
}
