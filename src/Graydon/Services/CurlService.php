<?php

namespace InnotecScotlandLtd\Graydon\Services;

class CurlService
{
    /**
     * @param $url
     * @param $data
     * @param array $headers
     * @param string $type
     * @return false|resource
     */
    public function initiateCurl($url, $data, $headers = [], $type = 'GET')
    {
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_HEADER => 0,
            CURLOPT_URL => $url,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_POST => (!empty($type) && $type == 'POST') ? true : false,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_TIMEOUT => 30000,
            CURLOPT_POSTFIELDS => $data,
            CURLOPT_CUSTOMREQUEST => (!empty($type) && $type == 'POST') ? 'POST' : (!empty($type) ? $type : 'GET'),
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_HTTPHEADER => $headers,
        ]);
        return $curl;
    }

    public function executeCurl($curl)
    {
        return curl_exec($curl);
    }

    public function closeCurl($curl)
    {
        return curl_close($curl);
    }
}
