<?php

return [
    'token' => env('RETAILCRM_TOKEN', ''),
    'url' => 'https://superposuda.retailcrm.ru',
    // Максимальное время, которое ждём
    'timeout' => env('RETAILCRM_MAX_TIMEOUT', 60),
];
