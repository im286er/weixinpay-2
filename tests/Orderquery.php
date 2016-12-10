<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-12-10
 * Time: 下午 12:54
 */

namespace xltxlm\weixinpay\tests;

use PHPUnit\Framework\TestCase;

class Orderquery extends TestCase
{
    public function test1()
    {
        $data = (new \xltxlm\weixinpay\SDK\Orderquery())
            ->setOutTradeNo("5000006020161208103553")
            ->setConfigObject((new DemoWeixinConfig()))
            ->__invoke();
        $this->assertEquals($data->getReturnCode(), 'SUCCESS');
        $this->assertEquals($data->getResultCode(), 'SUCCESS');
    }
}
