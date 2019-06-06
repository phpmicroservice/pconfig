<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace pconfig\validation;

/**
 * Description of ConsumersEdit
 *
 * @author saisai
 */
class ConsumersEdit extends Validation
{
   
    public function initialize()
    {
        $this->add('id', new \Phalcon\Validation\Validator\Callback([
            'message'=>'不可修改的内容',
            'callback'=>function($data){
                $id = $data['id'];
                $model = \db\models\consumers::findFirstById($id);
                if($model){
                    return TRUE;
                }
                return FALSE;
            }
        ]));
    }
    
}
