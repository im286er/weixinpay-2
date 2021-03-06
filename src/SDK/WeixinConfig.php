<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-12-06
 * Time: 下午 2:44
 */

namespace xltxlm\weixinpay\SDK;

/**
 * 应用ID + 商户号 配置
 * Class Config
 * @package xltxlm\weixinpay\SDK
 */
class WeixinConfig
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
     * @return WeixinConfig
     */
    public function setKey(string $key): WeixinConfig
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
     * @return WeixinConfig
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
     * @return WeixinConfig
     */
    public function setMchId($mch_id)
    {
        $this->mch_id = $mch_id;
        return $this;
    }

    /**
     * 解决这个实例不参与签名
     * @return string
     */
    final public function __toString()
    {
        return "";
    }
}
