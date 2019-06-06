<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace pconfig\validation;

/**
 * Description of ProjectAdd
 *
 * @author dongasai
 */
class ProjectAdd extends Validation
{
   
    public function initialize()
    {
        $this->add('type', new \Phalcon\Validation\Validator\InclusionIn( [
              "message" => "类型选择错误",
              "domain"  => [
                 'index','array','string','int','decimal','inherit','merge'
                  ]
          ]));
        
        $this->add('pid', new \Phalcon\Validation\Validator\Callback([
            "message" => "父级ID错误",
            "callback" => function($data) {
                $pid = $data['id'];
                if ($pid == 0) {
                    return TRUE;
                }
                $mode = \db\models\project::findFirst($pid);
                if($mode){
                    return TRUE;
                }
                return FALSE;
                
            }
        ]));
    }
}
