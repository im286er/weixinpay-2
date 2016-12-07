<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-12-06
 * Time: 下午 5:07
 */

namespace xltxlm\weixinpay\tests;

use PHPUnit\Framework\TestCase;
use xltxlm\weixinpay\SDK\Unifiedorder;
use xltxlm\weixinpay\SDK\Unit\ProductDetail;

// TODO: 完成\xltxlm\weixinpay\tests\DemoConfig 的配置
class UnifiedorderTest extends TestCase
{
    /**
     * 测试错误接口
     * @expectedException \Exception
     */
    public function test0()
    {
        $ProductDetail = (new ProductDetail)
            ->setGoodsId(123)
            ->setGoodsName('hello商品名称')
            ->setPrice(12)
            ->setQuantity(1)
            ->__invoke();

        (new Unifiedorder(new DemoWeixinConfig))
            ->setDetail($ProductDetail)
            ->setBody('abc')
            ->setOutTradeNo(rand(1, 9999))
            ->setTotalFee(-136)#错误内容
            ->setNotifyUrl("http://wwww.com/")
            ->__invoke();
    }

    /**
     * 测试正常数据
     */
    public function test1()
    {
        $unifiedorderConfig = (new Unifiedorder(new DemoWeixinConfig))
            ->setBody('abc')
            ->setOutTradeNo(rand(1, 9999))
            ->setTotalFee(136)
            ->setNotifyUrl("http://wwww.com/");
        $data = $unifiedorderConfig
            ->__invoke();
        $this->assertNotEmpty($data->getPrepayid());
    }
    /**
     * 测试正常数据 带商品信息
     */
    public function test2()
    {
        $ProductDetail = (new ProductDetail)
            ->setGoodsId(123)
            ->setGoodsName('hello商品名称')
            ->setPrice(12)
            ->setQuantity(1)
            ->__invoke();

        $unifiedorderConfig = (new Unifiedorder(new DemoWeixinConfig))
            ->setDetail($ProductDetail)
            ->setBody('abc')
            ->setOutTradeNo(rand(1, 9999))
            ->setTotalFee(136)
            ->setNotifyUrl("http://wwww.com/");
        $data = $unifiedorderConfig
            ->__invoke();
        $this->assertNotEmpty($data->getPrepayid());
    }

    /**
     * 测试正常数据 - debug
     */
    public function test3()
    {
        $unifiedorderConfig = (new Unifiedorder(new DemoWeixinConfig))
            ->setBody('abc')
            ->setOutTradeNo(rand(1, 9999))
            ->setTotalFee(136)
            ->setDebug(true)
            ->setNotifyUrl("http://wwww.com/");
        $data = $unifiedorderConfig
            ->__invoke();
        $this->assertNotEmpty($data->getPrepayid());
    }
}
