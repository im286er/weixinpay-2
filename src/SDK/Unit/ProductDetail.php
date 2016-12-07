<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-12-06
 * Time: 下午 3:02
 */

namespace xltxlm\weixinpay\SDK\Unit;

use xltxlm\helper\Hclass\EmptyAttribute;

/**
 * 商品详情的格式
 * Class ProductDetail
 * @package xltxlm\weixinpay\SDK\Unit
 */
final class ProductDetail
{
    use EmptyAttribute;
    /** @var string 商品的代号 */
    protected $goods_id = "";
    /** @var string 商品的名称 */
    protected $goods_name = "";
    /** @var int 商品的个数 */
    protected $quantity = 1;
    /** @var string 商品的单价 */
    protected $price = 0;
    /** @var string 商品类目ID */
    protected $boy = "";

    /**
     * @return string
     */
    public function getGoodsId()
    {
        return $this->goods_id;
    }

    /**
     * @param string $goods_id
     * @return ProductDetail
     */
    public function setGoodsId($goods_id)
    {
        $this->goods_id = $goods_id;
        return $this;
    }

    /**
     * @return string
     */
    public function getGoodsName()
    {
        return $this->goods_name;
    }

    /**
     * @param string $goods_name
     * @return ProductDetail
     */
    public function setGoodsName($goods_name)
    {
        $this->goods_name = $goods_name;
        return $this;
    }

    /**
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     * @return ProductDetail
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
        return $this;
    }

    /**
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param string $price
     * @return ProductDetail
     */
    public function setPrice($price)
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @return string
     */
    public function getBoy()
    {
        return $this->boy;
    }

    /**
     * @param string $boy
     * @return ProductDetail
     */
    public function setBoy($boy)
    {
        $this->boy = $boy;
        return $this;
    }


    /**
     * 返回微信需要的json格式
     */
    public function __invoke()
    {
        $this->notify([$this->goods_id, $this->goods_name, $this->price, $this->price]);
        return json_encode(['goods_detail' => [get_object_vars($this)]], JSON_UNESCAPED_UNICODE);
    }
}
