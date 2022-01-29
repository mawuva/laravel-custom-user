<?php

namespace Mawuekom\CustomUser\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

class StoreUserDTO extends DataTransferObject
{
    public string|null $name;
    public string $email;
    public string|null $password;
    public string|null $first_name;
    public string|null $username;
    public string|null $phone_number;
    public string|null $is_admin;
    public string|null $gender;
    public string|null $agree_with_policy_and_terms;
}