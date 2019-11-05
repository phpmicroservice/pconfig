<?php

namespace pconfig\Alc;

use Phalcon\Di\Injectable;


/**
 * Sign
 * Sign 验证
 */
class Sign extends Injectable implements \pconfig\AlcInterface
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
        $token = $resource['token'];
        unset($resource['token']);
        if ($token == $this->getHash($resource)) {
            return TRUE;
        }
        return FALSE;
    }

    /**
     * 获取hash 排序,拼接串,拼接key,url格式化,md5
     * @param $resource
     * @return string
     */
    private function getHash(array $resource): string
    {
        $chuan = '';
        ksort($resource);
        foreach ($resource as $k => $v) {
            $chuan .= '&' . $k . '=' . $v;
        }
        $chuan = trim($chuan, '&');
        $chuan = $chuan . '&key=' . $this->sign;
        return md5(urlencode($chuan));

    }


}
