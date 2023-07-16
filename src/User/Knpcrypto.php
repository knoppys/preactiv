<?php

namespace PreActive\User;

use Defuse\Crypto\Key;
use Defuse\Crypto\Crypto;

class KnpCrypto extends Knpuser
{

    

    protected $key;

    public function __construct()
    {

        parent::__construct();

        $this->key = Key::loadFromAsciiSafeString($this->user->user_pass);

    }

    public function decode_user_profile($meta)
    {

        try {
            $data = Crypto::decrypt($meta, $this->key);
        }
        catch (\Defuse\Crypto\Exception\WrongKeyOrModifiedCiphertextException $ex) { }

        return $data;

    }

    public function encode_user_profile($meta, $key = ''){

        if($key !== ''){
            $data = Crypto::encrypt($meta, $key);
        } else {
            $data = Crypto::encrypt($meta, $this->key);
        }

        return $data;

    }

}