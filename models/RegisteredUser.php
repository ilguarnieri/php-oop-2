<?php

require_once __DIR__.'/User.php';

class RegisteredUser extends User {

    public $nickname;
    private $password;

    public function __construct(string $_name, string $_surname, int $_age, string $_email, $_adress, string $_nickname, $_password)
    {

        parent::__construct($_name, $_surname, $_age, $_email, $_adress);

        $this->password = hash('md5', $_password);
    }

}