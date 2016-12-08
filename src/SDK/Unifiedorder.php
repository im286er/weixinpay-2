<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-12-06
 * Time: 下午 2:42
 */

namespace xltxlm\weixinpay\SDK;

use GuzzleHttp\Client;
use xltxlm\helper\Hclass\EmptyAttribute;
use xltxlm\weixinpay\SDK\Model\AppCallModel;
use xltxlm\weixinpay\SDK\Unit;
use xltxlm\weixinpay\SDK\Unit\Sign;
use xltxlm\weixinpay\SDK\Unit\XmlToArray;

/**
 * 统一下单
 * 商户系统先调用该接口在微信支付服务后台生成预支付交易单，返回正确的预支付交易回话标识后再在APP里面调起支付。
 * Class unifiedorder
 * @package xltxlm\weixinpay\SDK
 */
final class Unifiedorder
{
    use EmptyAttribute;

    /** @var WeixinConfig 配置信息 */
    protected $configObject;
    protected $debug = false;
    /** @var string 应用ID */
    private $appid = "";
    /** @var string 商户号 */
    private $mch_id = "";

    /** @var string 设备号终端设备号(门店号或收银设备ID)，默认请传"WEB" */
    private $device_info = "";
    /** @var string 随机字符串随机字符串，不长于32位。推荐随机数生成算法 */
    private $nonce_str = "";
    /** @var string 签名:签名，详见签名生成算法 */
    private $sign = "";
    /** @var string 签名类型:签名类型，目前支持HMAC-SHA256和MD5，默认为MD5 */
    protected $sign_type = "";
    /** @var string 商品描述:商品描述交易字段格式根据不同的应用场景按照以下格式：APP——需传入应用市场上的APP名字-实际商品名称，天天爱消除-游戏充值。 */
    protected $body = "";
    /** @var \xltxlm\weixinpay\SDK\Unit\ProductDetail 商品详情 */
    protected $detail;
    /** @var string 商户订单号 */
    protected $out_trade_no = "";
    /** @var string 总金额 */
    protected $total_fee = "";
    /** @var string 用户端实际ip */
    private $spbill_create_ip = "";
    /** @var string 交易起始时间订单生成时间，格式为yyyyMMddHHmmss */
    protected $time_start = "";
    /** @var string 交易结束时间订单失效时间，格式为yyyyMMddHHmmss */
    protected $time_expire = "";
    /** @var string 通知地址 */
    protected $notify_url = "";
    /** @var string 交易类型 */
    private $trade_type = 'APP';

    /**
     * @return boolean
     */
    public function isDebug(): bool
    {
        return $this->debug;
    }

    /**
     * @param boolean $debug
     * @return Unifiedorder
     */
    public function setDebug(bool $debug): Unifiedorder
    {
        $this->debug = $debug;
        return $this;
    }

    /**
     * UnifiedorderConfig constructor.
     * @param WeixinConfig $config
     */
    public function __construct(WeixinConfig $config)
    {
        $this->configObject = $config;
        $this->appid = $this->configObject->getAppid();
        $this->mch_id = $this->configObject->getMchId();
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
     * @return Unifiedorder
     */
    public function setAppid(string $appid): Unifiedorder
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
     * @return Unifiedorder
     */
    public function setMchId(string $mch_id): Unifiedorder
    {
        $this->mch_id = $mch_id;
        return $this;
    }

    /**
     * @return string
     */
    private function getNonceStr()
    {
        return $this->nonce_str = uniqid();
    }

    /**
     * @return string
     */
    public function getSign()
    {
        if (!$this->sign) {
            $data = get_object_vars($this);
            $this->sign = (new Sign)
                ->setDataArray($data)
                ->setConfigObject($this->configObject)
                ->__invoke();
        }
        return $this->sign;
    }

    /**
     * @return string
     */
    private function getSpbillCreateIp()
    {
        return $this->spbill_create_ip = $_SERVER['REMOTE_ADDR'] ?: '127.0.0.1';
    }

    /**
     * @return string
     */
    public function getTradeType()
    {
        return $this->trade_type;
    }


    /**
     * @return string
     */
    public function getDeviceInfo()
    {
        return $this->device_info = $_SERVER['HTTP_USER_AGENT'];
    }

    /**
     * @return string
     */
    public function getSignType()
    {
        return $this->sign_type;
    }

    /**
     * @param string $sign_type
     * @return Unifiedorder
     */
    public function setSignType($sign_type)
    {
        $this->sign_type = $sign_type;
        return $this;
    }

    /**
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param string $body
     * @return Unifiedorder
     */
    public function setBody($body)
    {
        $this->body = $body;
        return $this;
    }

    /**
     * @return Unit\ProductDetail
     */
    public function getDetail()
    {
        return $this->detail;
    }

    /**
     * @param Unit\ProductDetail $detail
     * @return Unifiedorder
     */
    public function setDetail($detail)
    {
        $this->detail = $detail;
        return $this;
    }

    /**
     * @return string
     */
    public function getOutTradeNo()
    {
        return $this->out_trade_no;
    }

    /**
     * @param string $out_trade_no
     * @return Unifiedorder
     */
    public function setOutTradeNo($out_trade_no)
    {
        $this->out_trade_no = $out_trade_no;
        return $this;
    }

    /**
     * @return string
     */
    public function getTotalFee()
    {
        return $this->total_fee;
    }

    /**
     * @param string $total_fee
     * @return Unifiedorder
     */
    public function setTotalFee($total_fee)
    {
        $this->total_fee = $total_fee;
        return $this;
    }

    /**
     * @return string
     */
    public function getTimeStart()
    {
        return $this->time_start;
    }

    /**
     * @param string $time_start
     * @return Unifiedorder
     */
    public function setTimeStart($time_start)
    {
        $this->time_start = $time_start;
        return $this;
    }

    /**
     * @return string
     */
    public function getTimeExpire()
    {
        return $this->time_expire;
    }

    /**
     * @param string $time_expire
     * @return Unifiedorder
     */
    public function setTimeExpire($time_expire)
    {
        $this->time_expire = $time_expire;
        return $this;
    }

    /**
     * @return string
     */
    public function getNotifyUrl()
    {
        return $this->notify_url;
    }

    /**
     * @param string $notify_url
     * @return Unifiedorder
     */
    public function setNotifyUrl($notify_url)
    {
        $this->notify_url = $notify_url;
        return $this;
    }

    /**
     * @return Model\AppCallModel
     * @throws \Exception
     */
    public function __invoke()
    {
        $debug=$this->debug;
        unset($this->debug);
        $this->getNonceStr();
        $this->getSpbillCreateIp();
        $this->getSign();
        $this->notify(
            [
                0 => $this->appid,
                1 => $this->mch_id,
                2 => $this->nonce_str,
                3 => $this->sign,
                4 => $this->body,
                5 => $this->out_trade_no,
                6 => $this->total_fee,
                7 => $this->spbill_create_ip,
                8 => $this->notify_url,
                9 => $this->trade_type
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

        $client = new Client();
        $options =
            [
                'timeout' => 6,
                //不检查https证书的合法性
                'verify' => false,
                'debug' => $debug,
                'body' => $xml
            ];
        $response = $client->post("https://api.mch.weixin.qq.com/pay/unifiedorder", $options);
        $returnXml = $response->getBody()->getContents();
        $tdb = (new XmlToArray)
            ->setXml($returnXml)
            ->__invoke();
        $unifiedorderSuccess = new Model\UnifiedorderSuccessModel($tdb);
        if ($unifiedorderSuccess->getResultCode() == 'SUCCESS' && $unifiedorderSuccess->getReturnCode() == 'SUCCESS') {
            return (new AppCallModel)
                ->setAppid($unifiedorderSuccess->getAppid())
                ->setPartnerid($this->configObject->getMchId())
                ->setPrepayid($unifiedorderSuccess->getPrepayId())
                ->setConfigObject($this->configObject)
                ->make();
        }
        throw new \Exception("接口错误:".$unifiedorderSuccess->getReturnMsg()."|$unifiedorderSuccess");
    }
}
