<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/9
 * Time: 16:16
 */

namespace Leo108\CorpWeChat\Exceptions;

/**
 * Class CryptException
 *
 * @package Leo108\CorpWeChat\Exceptions
 */
class CryptException extends \RuntimeException
{
    const ERROR_INVALID_SIGNATURE = -40001; // 校验签名失败
    const ERROR_PARSE_XML = -40002; // 解析xml失败
    const ERROR_CALC_SIGNATURE = -40003; // 计算签名失败
    const ERROR_INVALID_AESKEY = -40004; // 不合法的AESKey
    const ERROR_INVALID_APPID = -40005; // 校验AppID失败
    const ERROR_ENCRYPT_AES = -40006; // AES加密失败
    const ERROR_DECRYPT_AES = -40007; // AES解密失败
    const ERROR_INVALID_XML = -40008; // 公众平台发送的xml不合法
    const ERROR_BASE64_ENCODE = -40009; // Base64编码失败
    const ERROR_BASE64_DECODE = -40010; // Base64解码失败
    const ERROR_XML_BUILD = -40011; // 公众帐号生成回包xml失败

    /**
     * CryptException constructor.
     *
     * @param string $code
     */
    public function __construct($code)
    {
        parent::__construct('', $code);
    }
}
