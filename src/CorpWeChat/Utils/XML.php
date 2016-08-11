<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/9
 * Time: 16:11
 */

namespace CorpWeChat\Utils;

/**
 * XML操作类
 * Class XML
 * @package CorpWeChat\Utils
 * @link    https://github.com/overtrue/wechat/blob/1a78084ce26367e832597fc49645717a5b01b85c/src/Support/XML.php
 */
class XML
{
    /**
     * XML 转换为数组.
     *
     * @param string $xml XML string
     *
     * @return array
     */
    public static function parse($xml)
    {
        return self::normalize(simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA | LIBXML_NOBLANKS));
    }

    /**
     * XML编码
     *
     * @param mixed  $data 数据
     * @param string $root 根节点名
     * @param string $item 数字索引的子节点名
     * @param string $attr 根节点属性
     * @param string $id   数字索引子节点key转换的属性名
     *
     * @return string
     */
    public static function build($data, $root = 'xml', $item = 'item', $attr = '', $id = 'id')
    {
        if (is_array($attr)) {
            $_attr = [];
            foreach ($attr as $key => $value) {
                $_attr[] = "{$key}=\"{$value}\"";
            }
            $attr = implode(' ', $_attr);
        }
        $attr = trim($attr);
        $attr = empty($attr) ? '' : " {$attr}";
        $xml  = "<{$root}{$attr}>";
        $xml .= self::data2Xml($data, $item, $id);
        $xml .= "</{$root}>";

        return $xml;
    }

    /**
     * 生成<![CDATA[%s]]>.
     *
     * @param string $string 内容
     *
     * @return string
     */
    public static function cdata($string)
    {
        return sprintf('<![CDATA[%s]]>', $string);
    }

    /**
     * 把对象转换成数组.
     *
     * @param \SimpleXMLElement $obj 数据
     *
     * @return array
     */
    protected static function normalize($obj)
    {
        $result = null;
        if (is_object($obj)) {
            $obj = (array) $obj;
        }
        if (is_array($obj)) {
            foreach ($obj as $key => $value) {
                $res = self::normalize($value);
                if (($key === '@attributes') && ($key)) {
                    $result = $res;
                } else {
                    $result[$key] = $res;
                }
            }
        } else {
            $result = $obj;
        }

        return $result;
    }

    /**
     * 转换数组为xml.
     *
     * @param array  $data 数组
     * @param string $item item的属性名
     * @param string $id   id的属性名
     *
     * @return string
     */
    protected static function data2Xml($data, $item = 'item', $id = 'id')
    {
        $xml = $attr = '';
        foreach ($data as $key => $val) {
            if (is_numeric($key)) {
                $id && $attr = " {$id}=\"{$key}\"";
                $key = $item;
            }
            $xml .= "<{$key}{$attr}>";
            if ((is_array($val) || is_object($val))) {
                $xml .= self::data2Xml((array) $val, $item, $id);
            } else {
                $xml .= is_numeric($val) ? $val : self::cdata($val);
            }
            $xml .= "</{$key}>";
        }

        return $xml;
    }
}
