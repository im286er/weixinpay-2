<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-12-07
 * Time: 下午 11:12
 */

namespace xltxlm\weixinpay\SDK\Model;

use xltxlm\helper\Ctroller\ResponseJson;
use xltxlm\weixinpay\SDK\Unit\Sign;
use xltxlm\weixinpay\SDK\WeixinConfig;

/**
 * 返回给app的数据,可以直接用上去  https://pay.weixin.qq.com/wiki/doc/api/app/app.php?chapter=9_12&index=2
 * Class AppCallModel
 * @package xltxlm\weixinpay\SDK\Model
 */
final class AppCallModel
{
    use ResponseJson;
    protected $appid;
    protected $partnerid;
    protected $prepayid;
    protected $package = 'Sign=WXPay';
    protected $noncestr;
    protected $timestamp;
    protected $sign;
    /** @var  WeixinConfig */
    protected $configObject;

    /**
     * @return WeixinConfig
     */
    public function getConfigObject(): WeixinConfig
    {
        return $this->configObject;
    }

    /**
     * @param WeixinConfig $configObject
     * @return AppCallModel
     */
    public function setConfigObject(WeixinConfig $configObject): AppCallModel
    {
        $this->configObject = $configObject;
        return $this;
    }


    /**
     * @return mixed
     */
    public function getAppid()
    {
        return $this->appid;
    }

    /**
     * @param mixed $appid
     * @return AppCallModel
     */
    public function setAppid($appid)
    {
        $this->appid = $appid;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPartnerid()
    {
        return $this->partnerid;
    }

    /**
     * @param mixed $partnerid
     * @return AppCallModel
     */
    public function setPartnerid($partnerid)
    {
        $this->partnerid = $partnerid;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPrepayid()
    {
        return $this->prepayid;
    }

    /**
     * @param mixed $prepayid
     * @return AppCallModel
     */
    public function setPrepayid($prepayid)
    {
        $this->prepayid = $prepayid;
        return $this;
    }

    /**
     * @return string
     */
    public function getPackage(): string
    {
        return $this->package;
    }


    /**
     * @return mixed
     */
    public function getNoncestr()
    {
        return $this->noncestr = uniqid();
    }

    /**
     * @return mixed
     */
    public function getTimestamp()
    {
        return $this->timestamp = time();
    }


    /**
     * @return mixed
     */
    public function getSign()
    {
        if (!$this->sign) {
            $data = get_object_vars($this);
            $this->sign = (new Sign())
                ->setDataArray($data)
                ->setConfigObject($this->configObject)
                ->__invoke();
        }
        return $this->sign;
    }

    /**
     * @param mixed $sign
     * @return AppCallModel
     */
    public function setSign($sign)
    {
        $this->sign = $sign;
        return $this;
    }

    /**
     * @return $this
     */
    public function make()
    {
        $this->getTimestamp();
        $this->getNoncestr();
        $this->getSign();
        return $this;
    }
}
