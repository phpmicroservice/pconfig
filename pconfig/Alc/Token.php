<?php

namespace pconfig\Alc;

use Phalcon\Di\Injectable;


/**
 * Token
 * Token 验证
 */
class Token extends Injectable implements \pconfig\AlcInterface
{
    public $name = 'token';
    
    /**
     * $token
     * @var string
     */
    protected $token;


    public function __construct($token)
    {
        $this->token = trim($token);
    }

    /**
     * 验证
     * @param string $resource 要验证的资源.
     * @return bool
     */
    public function isAllowedAccess($resource = null)
    {
	
        if ($this->token == $resource)
        {
            return TRUE;
        }

        return FALSE;
    }

    
}
