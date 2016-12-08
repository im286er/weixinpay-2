<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-12-08
 * Time: 上午 11:39
 */

namespace xltxlm\weixinpay\tests;

use PHPUnit\Framework\TestCase;
use xltxlm\weixinpay\SDK\CallBack\NotifyUrlCall;
use xltxlm\weixinpay\SDK\NotifyUrl;

class NotifyUrlTest extends TestCase
{
    public function test1()
    {
        /** @var  NotifyUrlCall $object */
        $object = new class extends NotifyUrlCall
        {
            public function callBack(): bool
            {
                /** @var  \xltxlm\weixinpay\SDK\Model\NotifyUrlModel $NotifyUrlMode */
//                $NotifyUrlMode = $this->getNotifyUrlModel();
//                $OutTradeNo = $NotifyUrlMode->getOutTradeNo();
                return true;
            }
        };
        (new NotifyUrl())
            ->then($object);
    }
}
