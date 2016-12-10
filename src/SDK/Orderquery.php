<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-12-06
 * Time: 下午 11:57
 */

namespace xltxlm\weixinpay\SDK;

use GuzzleHttp\Client;
use xltxlm\helper\Hclass\EmptyAttribute;
use xltxlm\weixinpay\SDK\Unit\Sign;
use xltxlm\weixinpay\SDK\Unit\XmlToArray;

/**
 * 往微信服务器查询订单状态
 * Class Orderquery
 * @package xltxlm\weixinpay\SDK
 */
final class Orderquery
{
    use EmptyAttribute;
    protected $appid = "";
    protected $mch_id = "";
    protected $transaction_id = "";
    protected $out_trade_no = "";
    private $nonce_str = "";
    private $sign = "";
    /** @var   \xltxlm\weixinpay\SDK\WeixinConfig 微信配置 */
    protected $configObject;
    /** @var bool 调试开关 */
    protected $debug = false;

    /**
     * @return bool
     */
    public function isDebug(): bool
    {
        return $this->debug;
    }

    /**
     * @param bool $debug
     * @return Orderquery
     */
    public function setDebug(bool $debug): Orderquery
    {
        $this->debug = $debug;
        return $this;
    }


    /**
     * @return WeixinConfig
     */
    public function getConfigObject(): WeixinConfig
    {
        return $this->configObject;
    }

    /**
     * @param WeixinConfig $configObject
     * @return Orderquery
     */
    public function setConfigObject(WeixinConfig $configObject): Orderquery
    {
        $this->configObject = $configObject;
        $this->setAppid($this->configObject->getAppid());
        $this->setMchId($this->configObject->getMchId());
        return $this;
    }


    /**
     * @return string
     */
    private function getNonceStr(): string
    {
        return $this->nonce_str = uniqid();
    }

    /**
     * @return string
     */
    private function getSign(): string
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
     * @return string
     */
    public function getAppid(): string
    {
        return $this->appid;
    }

    /**
     * @param string $appid
     * @return Orderquery
     */
    private function setAppid(string $appid): Orderquery
    {
        $this->appid = $appid;
        return $this;
    }

    /**
     * @return string
     */
    public function getMchId(): string
    {
        return $this->mch_id;
    }

    /**
     * @param string $mch_id
     * @return Orderquery
     */
    private function setMchId(string $mch_id): Orderquery
    {
        $this->mch_id = $mch_id;
        return $this;
    }

    /**
     * @return string
     */
    public function getTransactionId(): string
    {
        return $this->transaction_id;
    }

    /**
     * @param string $transaction_id
     * @return Orderquery
     */
    public function setTransactionId(string $transaction_id): Orderquery
    {
        $this->transaction_id = $transaction_id;
        return $this;
    }

    /**
     * @return string
     */
    public function getOutTradeNo(): string
    {
        return $this->out_trade_no;
    }

    /**
     * @param string $out_trade_no
     * @return Orderquery
     */
    public function setOutTradeNo(string $out_trade_no): Orderquery
    {
        $this->out_trade_no = $out_trade_no;
        return $this;
    }

    /**
     * @return Model\NotifyUrlModel
     * @throws \Exception
     */
    public function __invoke()
    {
        $this->getNonceStr();
        $this->getSign();
        $this->notify(
            [
                0 => $this->appid,
                1 => $this->mch_id,
                2 => $this->nonce_str,
                3 => $this->sign,
                4 => $this->out_trade_no,
                5 => $this->out_trade_no
            ]
        );
        $vars = get_object_vars($this);
        $xml = "<xml>";
        foreach ($vars as $key => $var) {
            if (!empty("$var")) {
                $xml .= "<$key><![CDATA[$var]]></$key>";
            }
        }
        $xml .= "</xml>";
        $url = "https://api.mch.weixin.qq.com/pay/orderquery";
        $client = new Client();
        $options =
            [
                'timeout' => 6,
                //不检查https证书的合法性
                'verify' => false,
                'debug' => $this->debug,
                'body' => $xml
            ];
        $response = $client->post($url, $options);
        $returnXml = $response->getBody()->getContents();
        $tdb = (new XmlToArray)
            ->setXml($returnXml)
            ->__invoke();
        $notifyUrlModel = new Model\NotifyUrlModel($tdb);
        if ($notifyUrlModel->getResultCode() == 'SUCCESS' && $notifyUrlModel->getReturnCode() == 'SUCCESS') {
            return $notifyUrlModel;
        }
        throw new \Exception("接口错误:".$notifyUrlModel->getReturnMsg()."|$notifyUrlModel");
    }
}
