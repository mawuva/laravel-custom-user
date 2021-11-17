<?php

namespace Mawuekom\CustomUser\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

class StoreUserDTO extends DataTransferObject
{
    public string $name;
    public string|null $first_name;
    public string $email;
    public string|null $phone_number;
    public string|null $password;
}