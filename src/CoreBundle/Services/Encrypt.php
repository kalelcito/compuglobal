<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 18/12/16
 * Time: 16:02
 */

namespace CoreBundle\Services;
use Urlcrypt\Urlcrypt;

class Encrypt
{
    private $hash;
    
    public function __construct(){
        $this->hash="6474ff23d76c141f0343fb8bcdc33d3951";
    }
    public function salt($salt=''){

        if($salt!=''){
            $code=$salt;
        }else{
            $code = md5(uniqid(rand(), true));
        }
        return $code;

    }
    public function encrypt($text,$hash=''){

        if($hash!=''){
            $this->hash=$hash;
        }
        $code=base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256,md5($this->hash),$text,MCRYPT_MODE_CBC,md5(md5($this->hash))));
            
        return $code;

    }
    public function decrypt($text,$hash=''){
        
        if($hash!=''){
            $this->hash=$hash;
        }
        $code=rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256,md5($this->hash),base64_decode($text),MCRYPT_MODE_CBC,md5(md5($this->hash))));
        
        return $code;

    }

    public function encryptsecure($text,$hash=''){
        if($hash!=''){
            $this->hash=$hash;
        }
        Urlcrypt::$key = $this->hash;
        $code=Urlcrypt::encrypt($text);
        return $code;

    }
    public function decryptsecure($text,$hash=''){
        if($hash!=''){
            $this->hash=$hash;
        }
        Urlcrypt::$key = $this->hash;
        $code = Urlcrypt::decrypt($text);
        return $code;

    }


    public function rand_uniqid($in, $to_num = false, $pad_up = false, $passKey = null)
    {
        $index = "abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        if ($passKey !== null) {
            // Although this function's purpose is to just make the
            // ID short - and not so much secure,
            // you can optionally supply a password to make it harder
            // to calculate the corresponding numeric ID

            for ($n = 0; $n<strlen($index); $n++) {
                $i[] = substr( $index,$n ,1);
            }

            $passhash = hash('sha256',$passKey);
            $passhash = (strlen($passhash) < strlen($index))
                ? hash('sha512',$passKey)
                : $passhash;

            for ($n=0; $n < strlen($index); $n++) {
                $p[] =  substr($passhash, $n ,1);
            }

            array_multisort($p,  SORT_DESC, $i);
            $index = implode($i);
        }

        $base  = strlen($index);

        if ($to_num) {
            // Digital number  <<--  alphabet letter code
            $in  = strrev($in);
            $out = 0;
            $len = strlen($in) - 1;
            for ($t = 0; $t <= $len; $t++) {
                $bcpow = pow($base, $len - $t);
                $out   = $out + strpos($index, substr($in, $t, 1)) * $bcpow;
            }

            if (is_numeric($pad_up)) {
                $pad_up--;
                if ($pad_up > 0) {
                    $out -= pow($base, $pad_up);
                }
            }
            $out = sprintf('%F', $out);
            $out = substr($out, 0, strpos($out, '.'));
        } else {
            // Digital number  -->>  alphabet letter code
            if (is_numeric($pad_up)) {
                $pad_up--;
                if ($pad_up > 0) {
                    $in += pow($base, $pad_up);
                }
            }

            $out = "";
            for ($t = floor(log($in, $base)); $t >= 0; $t--) {
                $bcp = pow($base, $t);
                $a   = floor($in / $bcp) % $base;
                $out = $out . substr($index, $a, 1);
                $in  = $in - ($a * $bcp);
            }
            $out = strrev($out); // reverse
        }

        return $out;
    }

}