<?php

class TokenAPI
{
    public $header;
    public $payload;
    public $private_key;

    public function __construct($header,$payload,$private_key){
        $this->header       = $header;
        $this->payload      = $payload;
        $this->private_key  = $private_key;


    }

}
?>