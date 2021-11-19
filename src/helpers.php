<?php

if (!function_exists('uuid_is_enabled_and_has_column_defined')) {
    /**
     * Check if uuid is enabled and has column defined in config.
     * 
     * @return bool
     */
    function uuid_is_enabled_and_has_column_defined(): bool {
        $uuidEnabled    = config('custom-user.uuids.enabled');
        $uuidColumn     = config('custom-user.uuids.column');

        return ($uuidEnabled && $uuidColumn !== null)
                ? true
                : false;
    }
}

if (!function_exists('resolve_key')) {
    /**
     * Get key to use to make queries
     * 
     * @param string $config
     * @param string $entity
     * @param int|string $id
     * @param bool $inTrashed
     * 
     * @return string|null
     */
    function resolve_key(string $config, string $entity, $id = null, $inTrashed = false): string {
        $model          = config($config.'.'.$entity.'.model');
        $uuidColumn     = config($config.'.uuids.column');
        $entityPK       = config($config.'.'.$entity.'.table.primary_key');

        if (config($config.'.uuids.enabled')) {
            return (is_the_given_id_a_uuid($uuidColumn, $id, $model, $inTrashed))
                    ? $uuidColumn
                    : $entityPK;
        }

        else {
            return $entityPK;
        }   
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
