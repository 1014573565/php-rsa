<?php
/**
 * Created by PhpStorm.
 * User: Giga
 * Date: 2018/7/5
 * Time: 15:20
 */

namespace RSA\OPENSSL;

class Rsa
{
    public static $privateKey = '-----BEGIN PRIVATE KEY-----
MIICdgIBADANBgkqhkiG9w0BAQEFAASCAmAwggJcAgEAAoGBAKXtr4vbdiYyP32z
B+fdc9pGsuKULwTaD5BEOXNdacPfmP3oha2YkRaJ2k0br7DDluzYOVT7i1hAdonH
qrF1WNqN/WWxm5ZOWfuWQ0BIGIRrUMJheFZ6BoSMjohKoIjA7g2+2QtV8ev2HUNM
PaRY9PC6iAF2F4xyEnFKssUM+XjFAgMBAAECgYEAg6pL9kq7Qiv1PaVmzJJpb/dR
04GKner7FptMi0LAvnEbUb/E869w0dWpqC4kB7vscxxQwiKou+rLJSGPTSm0ytFf
zJsIEp3fsOTeSNSlej0GwMi9jWpSwtwt3Gbg+pAzxu17AxM2YLBTZknelZ3hLHR0
CUvje0sHEfu/qnT2rgECQQDScxUuDjfTX5FL8Pgkf1bgpF8SYzEKBW6rAoJGoUJN
VtypY2kylYdjkuowsZb5V/G5wDhzvVCfGVEolDIZs4plAkEAyde1kqHMzF5aHxWg
M5h5egyqv+Y7bshUriF5SCjvDtdKH9O2lf5ZoXcyHRQjSXyc6kqGAHVVDiv2UNt0
+lEe4QJAZT6aXOrYLqeWdit6pcxhVnediXIRAJo2cK0nUaV5CU4VoKRD0uMfHGds
pXp6gICvuUZhokTcyX3bjqMlKzo2BQJAc4C0D//1ETIhAk6+ySfExBoBkCTw97k9
9BOFssxx2J1MdqARiQ3vPp3WGJvQgZoEtXIF8rcyABUaNDURYLkRIQJANhX+5IkT
7REiqz4F8V3IDcW0W72uFoc8z+COQvK3lQKZgSGMniKUBKnAoFGhpoEL1D2bHVin
46cikj1f71dWow==
-----END PRIVATE KEY-----
';

    public static $publicKey = '-----BEGIN PUBLIC KEY-----
MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCl7a+L23YmMj99swfn3XPaRrLi
lC8E2g+QRDlzXWnD35j96IWtmJEWidpNG6+ww5bs2DlU+4tYQHaJx6qxdVjajf1l
sZuWTln7lkNASBiEa1DCYXhWegaEjI6ISqCIwO4NvtkLVfHr9h1DTD2kWPTwuogB
dheMchJxSrLFDPl4xQIDAQAB
-----END PUBLIC KEY-----';

    public static function publicEncrypt($data)
    {
        $publicKey =  openssl_pkey_get_public(self::$publicKey);
        openssl_public_encrypt($data, $encrypted, $publicKey);
        return $encrypted;
    }

    public static function publicDecrypt($data)
    {
        $publicKey =  openssl_pkey_get_public(self::$publicKey);
        openssl_public_decrypt($data, $decrypted, $publicKey);
        return $decrypted;
    }

    public static function privateEncrypt($data)
    {
        $privateKey =  openssl_pkey_get_private(self::$privateKey);
        openssl_private_encrypt($data, $encrypted, $privateKey);
        return $encrypted;
    }

    public static function privateDecrypt($data)
    {
        $privateKey =  openssl_pkey_get_private(self::$privateKey);
        openssl_private_decrypt($data, $decrypted, $privateKey);
        return $decrypted;
    }
}
