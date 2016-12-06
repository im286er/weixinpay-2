<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-12-06
 * Time: 下午 11:15
 */

namespace xltxlm\weixinpay\SDK\Model;

use xltxlm\helper\Hclass\LoadFromArray;

/**
 * 收到微信的成功支付通知 字段注释看文档: https://pay.weixin.qq.com/wiki/doc/api/app/app.php?chapter=9_7&index=3
 * Class NotifyUrl
 * @package xltxlm\weixinpay\SDK
 */
final class NotifyUrlModel
{
    use LoadFromArray;
    protected $return_code = "";
    protected $return_msg = "";

    protected $appid = "";
    protected $mch_id = "";
    protected $device_info = "";
    protected $nonce_str = "";
    protected $sign = "";
    protected $err_code = "";
    protected $err_code_des = "";
    protected $openid = "";
    protected $is_subscribe = "";
    protected $trade_type = "";
    protected $bank_type = "";
    protected $total_fee = "";
    protected $fee_type = "";
    protected $cash_fee = "";
    protected $cash_fee_type = "";
    protected $coupon_fee = "";
    protected $coupon_count = "";
    protected $transaction_id = "";
    protected $out_trade_no = "";
    protected $attach = "";
    protected $time_end = "";

    /**
     * @return string
     */
    public function getReturnCode(): string
    {
        return $this->return_code;
    }

    /**
     * @return string
     */
    public function getReturnMsg(): string
    {
        return $this->return_msg;
    }

    /**
     * @return string
     */
    public function getAppid(): string
    {
        return $this->appid;
    }

    /**
     * @return string
     */
    public function getMchId(): string
    {
        return $this->mch_id;
    }

    /**
     * @return string
     */
    public function getDeviceInfo(): string
    {
        return $this->device_info;
    }

    /**
     * @return string
     */
    public function getNonceStr(): string
    {
        return $this->nonce_str;
    }

    /**
     * @return string
     */
    public function getSign(): string
    {
        return $this->sign;
    }

    /**
     * @return string
     */
    public function getErrCode(): string
    {
        return $this->err_code;
    }

    /**
     * @return string
     */
    public function getErrCodeDes(): string
    {
        return $this->err_code_des;
    }

    /**
     * @return string
     */
    public function getOpenid(): string
    {
        return $this->openid;
    }

    /**
     * @return string
     */
    public function getIsSubscribe(): string
    {
        return $this->is_subscribe;
    }

    /**
     * @return string
     */
    public function getTradeType(): string
    {
        return $this->trade_type;
    }

    /**
     * @return string
     */
    public function getBankType(): string
    {
        return $this->bank_type;
    }

    /**
     * @return string
     */
    public function getTotalFee(): string
    {
        return $this->total_fee;
    }

    /**
     * @return string
     */
    public function getFeeType(): string
    {
        return $this->fee_type;
    }

    /**
     * @return string
     */
    public function getCashFee(): string
    {
        return $this->cash_fee;
    }

    /**
     * @return string
     */
    public function getCashFeeType(): string
    {
        return $this->cash_fee_type;
    }

    /**
     * @return string
     */
    public function getCouponFee(): string
    {
        return $this->coupon_fee;
    }

    /**
     * @return string
     */
    public function getCouponCount(): string
    {
        return $this->coupon_count;
    }

    /**
     * @return string
     */
    public function getTransactionId(): string
    {
        return $this->transaction_id;
    }

    /**
     * @return string
     */
    public function getOutTradeNo(): string
    {
        return $this->out_trade_no;
    }

    /**
     * @return string
     */
    public function getAttach(): string
    {
        return $this->attach;
    }

    /**
     * @return string
     */
    public function getTimeEnd(): string
    {
        return $this->time_end;
    }
}
