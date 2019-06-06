<?php

namespace pconfig\validation;

/**
 * Description of Project
 *
 * @author Dongasai
 */
class Project extends Validation
{
    
    public function initialize()
    {
        $this->add('id',new \Phalcon\Validation\Validator\Callback([
            'message'=>'ID不和规矩',
            'callback'=>function($data){
               
                $id = $data['id'];
                $mode = \db\models\project::findFirst($id); 
                if($mode){
                    return TRUE;
                }
                return FALSE;
            }
        ]));
    }
    
}
