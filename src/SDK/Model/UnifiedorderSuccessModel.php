<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-12-06
 * Time: 下午 9:05
 */

namespace xltxlm\weixinpay\SDK\Model;

use xltxlm\helper\Hclass\LoadFromArray;
use xltxlm\helper\Hclass\ObjectToJson;

/**
 * 下单成功后返回的结构
 * Class UnifiedorderSuccess
 * @package xltxlm\weixinpay\SDK\Unit
 */
final class UnifiedorderSuccessModel
{
    use LoadFromArray, ObjectToJson;
    protected $return_code;
    protected $return_msg;
    protected $appid;
    protected $mch_id;
    protected $nonce_str;
    protected $sign;
    protected $result_code;
    protected $prepay_id;
    protected $trade_type;

    /**
     * @return mixed
     */
    public function getReturnCode()
    {
        return $this->return_code;
    }

    /**
     * @return mixed
     */
    public function getReturnMsg()
    {
        return $this->return_msg;
    }

    /**
     * @return mixed
     */
    public function getAppid()
    {
        return $this->appid;
    }

    /**
     * @return mixed
     */
    public function getMchId()
    {
        return $this->mch_id;
    }

    /**
     * @return mixed
     */
    public function getNonceStr()
    {
        return $this->nonce_str;
    }

    /**
     * @return mixed
     */
    public function getSign()
    {
        return $this->sign;
    }

    /**
     * @return mixed
     */
    public function getResultCode()
    {
        return $this->result_code;
    }

    /**
     * @return mixed
     */
    public function getPrepayId()
    {
        return $this->prepay_id;
    }

    /**
     * @return mixed
     */
    public function getTradeType()
    {
        return $this->trade_type;
    }
}
