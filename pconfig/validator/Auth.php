<?php

namespace pconfig\validator;

/**
 * Description of Auth
 *
 * @author saisai
 */
class Auth extends \Phalcon\Validation\Validator
{

    public function validate(\Phalcon\Validation $validation, $attribute)
    {
        $data = $validation->getData();
        $cname = $validation->getValue('cname');
        $cid = $validation->getValue('cid');
        if (!$cid && !$cname) {
            return FALSE;
        }
        if ($cid) {
            $c = \pconfig\Consumers::info($cid);
        }

        if ($cname) {
            $c = \pconfig\Consumers::get4name($cname);
        }
        if (!$c) {
            return FALSE;
        }
        # 读取关系
        $plist = \pconfig\Relation::lists($c->id, 'ca');
        if (count($plist) == 0) {
            $message = $this->getOption('message');
            $validation->appendMessage(
                new \Phalcon\Validation\Message($message, $attribute, 'AlcError')
            );
            return FALSE;
        }
        foreach ($plist as $p) {
            $alc = \pconfig\Alc::getAlc4Id($p->relation2);

            switch ($alc->name) {
                case 'ip':
                    if (!$alc->isAllowedAccess($data['ip'])) {
                        $message = $this->getOption('message');
                        $validation->appendMessage(
                            new \Phalcon\Validation\Message($message, $attribute, 'Ip')
                        );
                        return FALSE;
                    };
                    break;
                case 'token':
                    if (!$alc->isAllowedAccess($data['token'])) {
                        $message = $this->getOption('message');
                        $validation->appendMessage(
                            new \Phalcon\Validation\Message($message, $attribute, 'Token')
                        );
                        return FALSE;
                    }

                    break;
                case 'sign':
                    if (!$alc->isAllowedAccess($data['data'])) {
                        $message = $this->getOption('message');
                        $validation->appendMessage(
                            new \Phalcon\Validation\Message($message, $attribute, 'Sign')
                        );
                        return FALSE;
                    }

                    break;
                default:
                    if (!$alc->isAllowedAccess($data)) {
                        $message = $this->getOption('message');
                        $validation->appendMessage(
                            new \Phalcon\Validation\Message($message, $attribute, 'Ip')
                        );
                        return FALSE;
                    }

                    break;

            }
        }
        return TRUE;
    }

}
