<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-12-06
 * Time: 下午 11:25
 */

namespace xltxlm\weixinpay\SDK\Unit;

/**
 * 把一维的xml解析成 key=>value数组
 * Class XmlToArray
 * @package xltxlm\weixinpay\SDK\Unit
 */
final class XmlToArray
{
    protected $xml = "";

    /**
     * @return string
     */
    public function getXml(): string
    {
        return $this->xml;
    }

    /**
     * @param string $xml
     * @return XmlToArray
     */
    public function setXml(string $xml): XmlToArray
    {
        $this->xml = $xml;
        return $this;
    }

    public function __invoke()
    {
        $parser = xml_parser_create();
        xml_parser_set_option($parser, XML_OPTION_CASE_FOLDING, 0);
        xml_parser_set_option($parser, XML_OPTION_SKIP_WHITE, 1);
        xml_parse_into_struct($parser, $this->xml, $values, $tags);
        xml_parser_free($parser);
        array_pop($values);
        array_shift($values);
        // 遍历 XML 结构
        $tdb = [];
        foreach ($values as $key => $val) {
            $tdb[$val['tag']] = $val['value'];
        }
        return $tdb;
    }
}
