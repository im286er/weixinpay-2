<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-12-06
 * Time: 下午 11:22
 */

namespace xltxlm\weixinpay\SDK;

use xltxlm\weixinpay\SDK\Model\NotifyUrlModel;
use xltxlm\weixinpay\SDK\Unit\XmlToArray;

final class NotifyUrl
{
    private $xml = "";
    /** @var   \xltxlm\weixinpay\SDK\Model\NotifyUrlModel */
    private $notifyUrlModel;

    /**
     * NotifyUrl constructor.
     */
    public function __construct()
    {
        $this->xml = file_get_contents("php://input");
        $tdb = (new XmlToArray())
            ->setXml($this->xml)
            ->__invoke();

        $this->notifyUrlModel = (new NotifyUrlModel($tdb));
        if ($this->notifyUrlModel->getReturnCode() != 'SUCCESS') {
            throw new \Exception("支付异常:".$this->notifyUrlModel->getReturnMsg());
        }
    }

    /**
     * 处理逻辑回调
     * @param \xltxlm\weixinpay\SDK\CallBack\NotifyUrl $object
     */
    public function then(\xltxlm\weixinpay\SDK\CallBack\NotifyUrl $object)
    {
        $object->setNotifyUrlModel($this->notifyUrlModel);
        $callBack = $object->callBack();
        if ($callBack) {
            echo '<xml><return_code>SUCCESS</return_code>'.
                '<return_msg>OK</return_msg></xml>';
        } else {
            echo '<xml><return_code>FAIL</return_code>'.
                '<return_msg>'.$object->getErrorMessage().'</return_msg></xml>';
        }
    }
}
