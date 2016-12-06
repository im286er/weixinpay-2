<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-12-06
 * Time: 下午 11:33
 */

namespace xltxlm\weixinpay\SDK\CallBack;


/**
 * 交易成功处理模型
 * Class NotifyUrl
 * @package xltxlm\weixinpay\SDK\CallBack
 */
abstract class NotifyUrl
{
    private $NotifyUrlModel;
    /** @var string 返回给微信的错误信息 */
    protected $errorMessage = "";

    /**
     * @return string
     */
    public function getErrorMessage(): string
    {
        return $this->errorMessage;
    }

    /**
     * @param string $errorMessage
     * @return NotifyUrl
     */
    public function setErrorMessage(string $errorMessage): NotifyUrl
    {
        $this->errorMessage = $errorMessage;
        return $this;
    }


    /**
     * @return mixed
     */
    public function getNotifyUrlModel()
    {
        return $this->NotifyUrlModel;
    }

    /**
     * @param mixed $NotifyUrlModel
     * @return NotifyUrl
     */
    public function setNotifyUrlModel($NotifyUrlModel)
    {
        $this->NotifyUrlModel = $NotifyUrlModel;
        return $this;
    }

    abstract public function callBack(): bool;
}