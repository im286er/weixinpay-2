<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-12-10
 * Time: 下午 1:30
 */

namespace xltxlm\weixinpay\tests;

use xltxlm\weixinpay\SDK\CallBack\NotifyUrlCall;
use xltxlm\weixinpay\SDK\NotifyUrl;

include_once __DIR__.'/../vendor/autoload.php';

/** @var  NotifyUrlCall $object */
$object = new class extends NotifyUrlCall {
    public function callBack(): bool
    {
        /** @var  \xltxlm\weixinpay\SDK\Model\NotifyUrlModel $NotifyUrlMode */
//        $NotifyUrlMode = $this->getNotifyUrlModel();
//        $OutTradeNo = $NotifyUrlMode->getOutTradeNo();
        return true;
    }
};
//发起请求
(new NotifyUrl())
    ->then($object);
