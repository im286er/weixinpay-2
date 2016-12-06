<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-12-06
 * Time: 下午 2:44
 */

namespace xltxlm\weixinpay\SDK;

use xltxlm\helper\Hclass\EmptyAttribute;

/**
 * 应用ID + 商户号 配置
 * Class Config
 * @package xltxlm\weixinpay\SDK
 */
class Config
{
    /** @var string 应用ID     微信开放平台审核通过的应用APPID */
    protected $appid = "";
    /** @var string 商户号     微信支付分配的商户号 */
    protected $mch_id = "";
    /** @var string 后台设置的key */
    protected $key = "";

    /**
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * @param string $key
     * @return Config
     */
    public function setKey(string $key): Config
    {
        $this->key = $key;
        return $this;
    }


    /**
     * @return string
     */
    public function getAppid()
    {
        return $this->appid;
    }

    /**
     * @param string $appid
     * @return Config
     */
    public function setAppid($appid)
    {
        $this->appid = $appid;
        return $this;
    }

    /**
     * @return string
     */
    public function getMchId()
    {
        return $this->mch_id;
    }

    /**
     * @param string $mch_id
     * @return Config
     */
    public function setMchId($mch_id)
    {
        $this->mch_id = $mch_id;
        return $this;
    }

    final public function __invoke()
    {
        return "";
    }

    final public function __toString()
    {
        return "";
    }


}
