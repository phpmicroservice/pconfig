<?php

namespace pconfig\validation;

/**
 * Description of ConsumersDel
 *
 * @author saisai
 */
class ConsumersDel extends Validation
{
    public function initialize()
    {
        $this->add('id', new \Phalcon\Validation\Validator\Callback([
            'message'=>'不可删除的内容,存在关联关系',
            'callback'=>function($data){
                $id = $data['id'];
                $model = \db\models\relation::findFirst([
                    'type = "ca" and relation = :relation:',
                    'bind'=>[
                        'relation'=>$id
                    ]
                ]);
                if($model){
                    return FALSE;
                }
                return TRUE;
            }
        ]));
    }
}
