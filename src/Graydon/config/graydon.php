<?php
return [
    'ACCOUNT_ID' => env('GRAYDON_ACCOUNT_ID'),
    'CLIENT_ID' => env('GRAYDON_CLIENT_ID'),
    'CLIENT_SECRET' => env('GRAYDON_CLIENT_SECRET'),
    'COUNTRY_CODE' => env('GRAYDON_COUNTRY_CODE','gb'),
    'ACCEPT' => env('GRAYDON_ACCEPT','application/json'),
    'SEARCH_TYPE' => env('GRAYDON_SEARCH_TYPE','GDM'),
    'IS_MOCK' => env('GRAYDON_IS_MOCK',false),
    'MONITORING_PROFILE_ID' => env('GRAYDON_MONITORING_PROFILE_ID','89375423-c20b-46c9-94d9-684964d2dec6'),

    'MOCK_SEARCH_END_POINT' => env('GRAYDON_MOCK_SEARCH_END_POINT','https://anypoint.mulesoft.com/mocking/api/v1/sources/exchange/assets/{account_id}/graydon-search-api-v1.0.0/1.0.2/m/{country_id}/companies'),
    'SEARCH_END_POINT' => env('GRAYDON_SEARCH_END_POINT','https://api.graydon.io/{country_id}/companies'),

    'MOCK_MONITORING_END_POINT' => env('GRAYDON_MOCK_MONITORING_END_POINT','https://anypoint.mulesoft.com/mocking/api/v1/sources/exchange/assets/{account_id}/monitoring-api-v1.0.0/1.0.1/m/{country_id}/companies/monitoring/profiles/{profile_id}/events'),
    'MONITORING_END_POINT'      => env('GRAYDON_MONITORING_END_POINT', 'https://api.graydon.io/{country_id}/companies/{company_id}/monitoring/profiles/{profile_id}/events'),

    'MOCK_MONITORING_SET_END_POINT' => env('GRAYDON_MOCK_MONITORING_SET_END_POINT','https://anypoint.mulesoft.com/mocking/api/v1/sources/exchange/assets/{account_id}/monitoring-api-v1.0.0/1.0.1/m/{country_id}/companies/monitoring/profiles/{profile_id}/events'),
    'MONITORING_SET_END_POINT'      => env('GRAYDON_MONITORING_SET_END_POINT', 'https://api.graydon.io/{country_id}/companies/{company_id}/monitoring/profiles/{profile_id}'),

    'MOCK_COMPANY_END_POINT' => env('GRAYDON_MOCK_COMPANY_END_POINT','https://anypoint.mulesoft.com/mocking/api/v1/sources/exchange/assets/{account_id}/company-api-v1.0.0/1.0.12/m/{country_id}/companies/{company_id}/{other_uri}'),
    'COMPANY_END_POINT' => env('GRAYDON_COMPANY_END_POINT','https://api.graydon.io/{country_id}/companies/{company_id}/{other_uri}'),
];
