<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-12-06
 * Time: 下午 11:33
 */

namespace xltxlm\weixinpay\SDK\CallBack;

use xltxlm\weixinpay\SDK\Model\NotifyUrlModel;

/**
 * 交易成功处理模型
 * Class NotifyUrl
 * @package xltxlm\weixinpay\SDK\CallBack
 */
abstract class NotifyUrlCall
{
    /** @var  NotifyUrlModel */
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
     * @return NotifyUrlCall
     */
    public function setErrorMessage(string $errorMessage): NotifyUrlCall
    {
        $this->errorMessage = $errorMessage;
        return $this;
    }


    /**
     * @return NotifyUrlModel
     */
    public function getNotifyUrlModel()
    {
        return $this->NotifyUrlModel;
    }

    /**
     * @param NotifyUrlModel $NotifyUrlModel
     * @return NotifyUrlCall
     */
    public function setNotifyUrlModel(NotifyUrlModel $NotifyUrlModel)
    {
        $this->NotifyUrlModel = $NotifyUrlModel;
        return $this;
    }

    abstract public function callBack(): bool;
}
