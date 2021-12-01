<?php

if (!function_exists('uuid_is_enabled_and_has_column_defined')) {
    /**
     * Check if uuid is enabled and has column defined in config.
     * 
     * @return bool
     */
    function uuid_is_enabled_and_has_column_defined(): bool {
        $uuidEnabled    = config('custom-user.uuids.enabled');
        $uuidColumn     = config('custom-user.uuids.column', '_id');

        return ($uuidEnabled && $uuidColumn !== null)
                ? true
                : false;
    }
}

if (!function_exists('get_attribute')) {
    /**
     * Get attribute config property
     * 
     * @param string $attribute
     * @param string $property
     * 
     * @return string|null
     */
    function get_attribute(string $attribute, string $property) {
        return (config('custom-user.attributes.'.$attribute.'.'.$property) !== null)
                ? config('custom-user.attributes.'.$attribute.'.'.$property)
                : config('custom-user.attributes.extra.'.$attribute.'.'.$property);
    }
}
