<?php

//objet mail

class mail{
    private $mailUser;

    public function __construct($unMail){
        $this->mailUser = $unMail;
    }

    public function getMail(){
        return $this->mailUser;
    }
}

?>