<?php


class User  implements JsonSerializable
{
    public $id;
    public $name;
    public $surname;
    public $username;
    public $password;
    public $email;
    public $date_created;
    public $date_edit;
    public $role;
    public $status;
    public function jsonSerialize()
    {
        return [
            'name' => $this->name,
            'surname' => $this->surname,
            'username' => $this->username
        ];
    }
}
$user = new User();

$user->name = "&Pritesh";
$user->surname = "Yadav";
$user->username = "priteshyadav444";
var_dump(json_encode($user->jsonSerialize(), JSON_HEX_TAG | JSON_PRETTY_PRINT | JSON_HEX_AMP));
