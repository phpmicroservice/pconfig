<?php

namespace pconfig\validator;

/**
 * Description of Cname
 *
 * @author saisai
 */
class Cname extends \Phalcon\Validation\Validator
{
    public function validate(\Phalcon\Validation $validation, $attribute)
    {
        $cname = $validation->getValue($attribute);

        if (empty($cname)) {
            return FALSE;
        }
        $c = \pconfig\Consumers::get4name($cname);
        if (!$c) {
            $message = $this->getOption('message');
            $validation->appendMessage(
                new \Phalcon\Validation\Message($message, $attribute, 'Ip')
            );
            return FALSE;
        }
        return TRUE;


    }
}
