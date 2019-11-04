<?php

namespace pconfig\Alc;

use Phalcon\Di\Injectable;


/**
 * Kong
 * Kong 验证
 */
class Kong extends Injectable implements \pconfig\AlcInterface
{
    public $name = 'sign';
    /**
     * $sign
     * @var string
     */
    protected $sign;


    public function __construct($sign)
    {
        $this->sign = trim($sign);
    }

    /**
     * 验证
     * @param string $resource 要验证的资源.
     * @return bool
     */
    public function isAllowedAccess($resource = [])
    {
        return TRUE;

    }


}
