<?php
/**
 * Created by PhpStorm.
 * User: compy
 * Date: 2019-07-13
 * Time: 14:25
 */
$publicKey = '02488c00fcace60df488207e962fb683ded65efd22bbee57d6c11cd331fa9db869';

$signTypeMap = [
    'ELA_STANDARD' => ['type' => 0xAC, 'address' => 0x21],
    'ELA_MULTISIG' => ['type' => 0xAE, 'address' => 0x12],
    'ELA_CROSSCHAIN' => ['type' => 0xAF, 'address' => 0x48],
    'ELA_IDCHAIN' => ['type' => 0xAD, 'address' => 0x67],
    'ELA_DESTROY' => ['type' => 0xAA, 'address' => 0x00]
];

function base58_encode($inbytes) {
    $alphabet = '123456789ABCDEFGHJKLMNPQRSTUVWXYZabcdefghijkmnopqrstuvwxyz';
    if (strlen($inbytes) == 0) return "";

    // Count leading zeros
    $zeros = 0;
    while ($zeros < strlen($inbytes) && $inbytes[$zeros] == 0) {
        ++$zeros;
    }

}

function toCode($pubKeyBuf, $signType)
{
    return pack('C*', 0x21) . $pubKeyBuf . pack('C*', $signType);
}

function getAddressBase($pubKey, $signType)
{
    global $signTypeMap;
    $pubKeyBuf = hex2bin($pubKey);
    $code = toCode($pubKeyBuf, $signTypeMap[$signType]['type']);
    $hashBuf = hash('ripemd160', hash('sha256', $code, true), true);
    $programHashBuf = pack('C*', $signTypeMap[$signType]['address']) . $hashBuf;
    return $programHashBuf;
}

function createSingleSignatureRedeemScript(string $pubKey, int $signType)
{
    return pack('C*', 33) . hex2bin($pubKey) . pack('C*', $signType);
}

function getIdentityFromPublicKey(string $pk)
{
    $rs = createSingleSignatureRedeemScript($pk, 3);
    $ph = toCodeHash($rs, 3);
    return toAddress($ph);
}

function toCodeHash(string $code, int $signType)
{
    $f = hash('ripemd160', hash('sha256', $code, true), true); // returns bin string
    if ($signType == 0x1C) {
        return pack('C*', $signType) . strrev($f);
    }
    return pack('C*', $signType) . $f;
}

function toAddress(string $programHash)
{
    $f = hash('sha256', hash('sha256', $programHash, true), true);
    $g = $programHash . substr($f, 0, 4);
    return bin2hex($g);
}

var_dump(bin2hex(getAddressBase($publicKey, 'ELA_STANDARD')));


