<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-12-08
 * Time: 上午 11:39
 */

namespace xltxlm\weixinpay\tests;

use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;

class NotifyUrlTest extends TestCase
{
    public function test1()
    {
        $xml = '<xml>
  <appid>wx2421b1c4370ec43b</appid>
  <attach>支付测试</attach>
  <bank_type>CFT</bank_type>
  <fee_type>CNY</fee_type>
  <is_subscribe>Y</is_subscribe>
  <mch_id>10000100</mch_id>
  <nonce_str>5d2b6c2a8db53831f7eda20af46e531c</nonce_str>
  <openid>oUpF8uMEb4qRXf22hE3X68TekukE</openid>
  <out_trade_no>1409811653</out_trade_no>
  <result_code>SUCCESS</result_code>
  <return_code>SUCCESS</return_code>
  <sign>B552ED6B279343CB493C5DD0D78AB241</sign>
  <sub_mch_id>10000100</sub_mch_id>
  <time_end>20140903131540</time_end>
  <total_fee>1</total_fee>
  <trade_type>JSAPI</trade_type>
  <transaction_id>1004400740201409030005092168</transaction_id>
</xml>';
        $client = new Client();
        $options =
            [
                'timeout' => 6,
                //不检查https证书的合法性
                'verify' => false,
                'body' => $xml
            ];
        $data = $client->post("http://127.0.0.1:1472/NotifyUrlDemo.php", $options);
        $this->assertEquals(
            '<xml><return_code>SUCCESS</return_code><return_msg>OK</return_msg></xml>',
            $data->getBody()->getContents()
        );
    }
}
