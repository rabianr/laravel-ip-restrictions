<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Whitelist Ip Provider
    |--------------------------------------------------------------------------
    |
    | This value is the list of ip addresses allowed to access your routes.
    | You can also set this in your ".env" file. Example:
    |
    | IPRESTRICTIONS_WHITELIST=1.1.1.1,1.1.1.2
    |
    | Asterisk (*) can also be used to allow any ip addresses.
    |
    | IPRESTRICTIONS_WHITELIST=*
    |
    | Values set in ".env" file will be merged to the value in this file.
    |
    */

    'whitelist' => array_merge([
        // '1.1.1.1',
    ], array_filter(explode(',', env('IPRESTRICTIONS_WHITELIST', '')))),

];
