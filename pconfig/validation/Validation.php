<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace pconfig\validation;

/**
 * Description of Validation
 *
 * @author saisai
 */
class Validation extends \Phalcon\Validation
{
    
 
    /**
     * 验证
     * @param type $data
     * @param type $entity
     * @return boolean
     */
    public function check($data = null, $entity = null)
    {
        $message = parent::validate($data, $entity);
        if(count($message)){
            return FALSE;
        }
        return TRUE;
    }
    
    /**
     * 获取一条消息
     * @return boolean
     */
    public function getMessage()
    {
        $messages = $this->getMessages();
        if(count($messages)){
            
            return (string)$messages[0];
        }
        return FALSE;
    }
    
}
