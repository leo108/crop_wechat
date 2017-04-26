<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/9
 * Time: 16:08
 */

namespace Leo108\CorpWeChat\Utils;

use Leo108\CorpWeChat\Exceptions\CryptException;

/**
 * 微信加解密类
 * Class Crypt
 *
 * @package Leo108\CorpWeChat\Utils
 */
class Crypt
{
    const BLOCK_SIZE = 32;

    /**
     * 应用ID
     *
     * @var string
     */
    protected $corpId;

    /**
     * 应用token
     *
     * @var string
     */
    protected $token;

    /**
     * 加密用的AESkey
     *
     * @var string
     */
    protected $AESKey;

    /**
     * constructor
     *
     * @param string $corpId
     * @param string $token
     * @param string $encodingAESKey
     */
    public function __construct($corpId, $token, $encodingAESKey)
    {
        if (strlen($encodingAESKey) !== 43) {
            throw new CryptException(CryptException::ERROR_INVALID_AESKEY);
        }

        $this->corpId = $corpId;
        $this->token  = $token;
        $this->AESKey = base64_decode($encodingAESKey.'=', true);
    }

    /**
     * 验证URL
     *
     * @param string $msgSignature 签名串，对应URL参数的msg_signature
     * @param string $nonce        随机串，对应URL参数的nonce
     * @param int    $timestamp    时间戳，对应URL参数的timestamp
     * @param string $echoStr      随机串，对应URL参数的echostr
     *
     * @return string
     */
    public function verifyURL($msgSignature, $nonce, $timestamp, $echoStr)
    {
        $signature = $this->getSHA1([$this->token, $timestamp, $nonce, $echoStr]);

        if ($signature != $msgSignature) {
            throw new CryptException(CryptException::ERROR_INVALID_SIGNATURE);
        }

        return $this->decrypt($echoStr);
    }

    /**
     * 将公众平台回复用户的消息加密打包.
     *
     * @param string $xml       公众平台待回复用户的消息，xml格式的字符串
     * @param string $nonce     随机串，可以自己生成，也可以用URL参数的nonce
     * @param int    $timestamp 时间戳，可以自己生成，也可以用URL参数的timestamp
     *
     * @return string 加密后的可以直接回复用户的密文，包括msg_signature, timestamp,
     *                          nonce, encrypt的xml格式的字符串
     */
    public function encryptMsg($xml, $nonce = null, $timestamp = null)
    {
        $encrypt = $this->encrypt($xml);

        !is_null($nonce) || $nonce = substr($this->corpId, 0, 10);
        !is_null($timestamp) || $timestamp = time();

        //生成安全签名
        $signature = $this->getSHA1([$this->token, $timestamp, $nonce, $encrypt]);

        $response = array(
            'Encrypt'      => $encrypt,
            'MsgSignature' => $signature,
            'TimeStamp'    => $timestamp,
            'Nonce'        => $nonce,
        );

        //生成响应xml
        return XML::build($response);
    }

    /**
     * 检验消息的真实性，并且获取解密后的明文.
     *
     * @param string $msgSignature 签名串，对应URL参数的msg_signature
     * @param string $nonce        随机串，对应URL参数的nonce
     * @param string $timestamp    时间戳 对应URL参数的timestamp
     * @param string $postXML      密文，对应POST请求的数据
     *
     * @return array
     */
    public function decryptMsg($msgSignature, $nonce, $timestamp, $postXML)
    {
        //提取密文
        $array = XML::parse($postXML);

        if (empty($array)) {
            throw new CryptException(CryptException::ERROR_PARSE_XML);
        }

        $encrypted = $array['Encrypt'];

        //验证安全签名
        $signature = $this->getSHA1([$this->token, $timestamp, $nonce, $encrypted]);

        if ($signature !== $msgSignature) {
            throw new CryptException(CryptException::ERROR_INVALID_SIGNATURE);
        }

        return XML::parse($this->decrypt($encrypted));
    }

    /**
     * 生成SHA1签名
     *
     * @param array $params
     *
     * @return string
     */
    public function getSHA1($params)
    {
        sort($params, SORT_STRING);

        return sha1(implode($params));
    }

    /**
     * 对明文进行加密
     *
     * @param string $text 需要加密的明文
     *
     * @return string 加密后的密文
     */
    protected function encrypt($text)
    {
        $key       = $this->AESKey;
        $random    = $this->getRandomStr();
        $text      = $this->encode($random.pack('N', strlen($text)).$text.$this->corpId);
        $iv        = substr($key, 0, 16);
        $encrypted = openssl_encrypt($text, 'aes-256-cbc', $key, OPENSSL_RAW_DATA | OPENSSL_NO_PADDING, $iv);

        return base64_encode($encrypted);
    }

    /**
     * 对密文进行解密
     *
     * @param string $encrypted 需要解密的密文
     *
     * @return string 解密得到的明文
     */
    protected function decrypt($encrypted)
    {
        $key        = $this->AESKey;
        $ciphertext = base64_decode($encrypted, true);
        $iv         = substr($key, 0, 16);
        $decrypted  = openssl_decrypt($ciphertext, 'aes-256-cbc', $key, OPENSSL_RAW_DATA | OPENSSL_NO_PADDING, $iv);
        $result     = $this->decode($decrypted);
        if (strlen($result) < 16) {
            return '';
        }
        $content = substr($result, 16, strlen($result));
        $listLen = unpack('N', substr($content, 0, 4));
        $xmlLen  = $listLen[1];
        $xml     = substr($content, 4, $xmlLen);
        if (trim(substr($content, $xmlLen + 4)) != $this->corpId) {
            throw new CryptException(CryptException::ERROR_INVALID_APPID);
        }

        return $xml;
    }

    /**
     * 随机生成16位字符串
     *
     * @return string 生成的字符串
     */
    protected function getRandomStr()
    {
        return substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz'), 0, 16);
    }

    /**
     * 对需要加密的明文进行填充补位
     *
     * @param string $text 需要进行填充补位操作的明文
     *
     * @return string 补齐明文字符串
     */
    protected function encode($text)
    {
        //计算需要填充的位数
        $padAmount = self::BLOCK_SIZE - (strlen($text) % self::BLOCK_SIZE);

        $padAmount = $padAmount !== 0 ? $padAmount : self::BLOCK_SIZE;

        //获得补位所用的字符
        $padChr = chr($padAmount);

        $tmp = '';

        for ($index = 0; $index < $padAmount; $index++) {
            $tmp .= $padChr;
        }

        return $text.$tmp;
    }

    /**
     * 对解密后的明文进行补位删除
     *
     * @param string $decrypted 解密后的明文
     *
     * @return string 删除填充补位后的明文
     */
    protected function decode($decrypted)
    {
        $pad = ord(substr($decrypted, -1));

        if ($pad < 1 || $pad > self::BLOCK_SIZE) {
            $pad = 0;
        }

        return substr($decrypted, 0, (strlen($decrypted) - $pad));
    }
}
