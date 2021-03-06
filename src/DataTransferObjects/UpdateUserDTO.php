<?php

namespace Mawuekom\CustomUser\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

class UpdateUserDTO extends DataTransferObject
{
    public string $name;
    public string $email;
    public string|null $first_name;
    public string|null $username;
    public string|null $phone_number;
    public string|null $is_admin;
    public string|null $gender;
}