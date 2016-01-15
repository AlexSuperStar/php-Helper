<?php
/** uuid v4
 *  php5-uuid
 */
return function ($i_url='0') {
    if (!function_exists('uuid_create'))
        return false;
    $context=$uuid='';
    uuid_create(&$context);
    uuid_make($context, UUID_MAKE_V4);
    uuid_export($context, UUID_FMT_STR, &$uuid);
    return trim($uuid);
}?>