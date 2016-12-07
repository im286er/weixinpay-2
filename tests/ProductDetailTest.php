<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-12-06
 * Time: 下午 3:27
 */

namespace xltxlm\weixinpay;


use PHPUnit\Framework\TestCase;
use xltxlm\weixinpay\SDK\Unit\ProductDetail;

/**
 * Class ProductDetailTest
 * @package xltxlm\weixinpay
 */
class ProductDetailTest extends TestCase
{
    /**
     * @test
     * @expectedException \Exception
     */
    public function test0()
    {
        (new ProductDetail)
            ->setGoodsId(123)
            ->setPrice(100)
            ->setQuantity(1)
            ->__invoke();
    }
    public function test1()
    {
        $ProductDetail=(new ProductDetail)
            ->setGoodsId(123)
            ->setGoodsName('hello商品名称')
            ->setPrice(100)
            ->setQuantity(1)
            ->__invoke();
        $this->assertEquals($ProductDetail,'{"goods_detail":[{"goods_id":123,"goods_name":"hello商品名称","quantity":1,"price":100,"boy":""}]}');
    }
}