<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-12-07
 * Time: 下午 10:49
 */

namespace xltxlm\weixinpay\SDK\Unit;

use xltxlm\weixinpay\SDK\WeixinConfig;

/**
 * 实现签名算法
 * Class Sign
 * @package xltxlm\weixinpay\SDK\Unit
 */
final class Sign
{
    /** @var array 需要签名的数据组 */
    protected $dataArray = [];
    /** @var WeixinConfig 配置的实例化 */
    protected $configObject;

    /**
     * @return WeixinConfig
     */
    public function getConfigObject(): WeixinConfig
    {
        return $this->configObject;
    }

    /**
     * @param WeixinConfig $configObject
     * @return Sign
     */
    public function setConfigObject(WeixinConfig $configObject): Sign
    {
        $this->configObject = $configObject;
        return $this;
    }

    /**
     * @return array
     */
    public function getDataArray(): array
    {
        return $this->dataArray;
    }

    /**
     * @param array $dataArray
     * @return Sign
     */
    public function setDataArray(array $dataArray): Sign
    {
        $this->dataArray = $dataArray;
        return $this;
    }

    /**
     * 返回微信专有签名
     * @return string
     */
    public function __invoke()
    {
        foreach ($this->dataArray as $key => $datum) {
            if (empty("$datum")) {
                unset($this->dataArray[$key]);
            }
        }
        reset($this->dataArray);
        //对待签名参数数组排序
        ksort($this->dataArray);
        reset($this->dataArray);
        //
        $data_str = [];
        foreach ($this->dataArray as $k => $v) {
            $data_str[] = "{$k}={$v}";
        }
        $signstr = join('&', $data_str);
        return strtoupper(md5($signstr.'&key='.$this->configObject->getKey()));
    }
}
