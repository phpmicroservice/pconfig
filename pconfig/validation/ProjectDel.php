<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace pconfig\validation;

/**
 * Description of ProjectDel
 *
 * @author dongasai
 */
class ProjectDel  extends Validation
{
   
    public function initialize()
    {
        $this->add('id', new \Phalcon\Validation\Validator\Callback([
            'message' => '存在子级对象',
            'callback'=>function($data){
                $id = $data['id'];
                $mode = \db\models\project::findFirst([
                    'pid = :pid:',
                    'bind'=>[
                        'pid'=>$id
                    ]
                ]);
                if($mode){
                    return FALSE;
                }
                return TRUE;
            }
        ]));
        
    }
    
}
