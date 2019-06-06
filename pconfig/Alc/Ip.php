<?php

namespace pconfig\Alc;

use Phalcon\Di\Injectable;


/**
 * Ip
 * Ip 地址的验证
 */
class Ip extends Injectable implements \pconfig\AlcInterface
{
    public $name = 'ip';


    /**
     * 允许的IP
     * @var string
     */
    protected $allowedIp;

    /**
     * Ip constructor.
     *
     * @param string $ip The allowed IP address.
     */
    public function __construct($ip)
    {
        $this->allowedIp = trim($ip);
    }

    /**
     * 验证
     * @param string $resource 要验证的资源.
     * @return bool
     */
    public function isAllowedAccess($resource = null)
    {
        if (!$resource)
        {
            $resource = $this->request->getClientAddress();
        }


        if ($resource && ($resource == '127.0.0.1' || $resource == '::1' || $this->checkIp($resource)))
        {
            return TRUE;
        }

        return FALSE;
    }

    /**
     * 验证IP
     *
     * @param  string $ip
     * @return bool
     */
    private function checkIp($ip)
    {
        return 0 === strpos($ip, $this->allowedIp);
    }
}
