<?php

namespace InnotecScotlandLtd\Graydon\Services;

Class GraydonSearchService
{
    protected $config = [];

    protected $curlService;

    public function __construct()
    {
        $this->config = config('graydon');
        $this->curlService = new CurlService();
    }

    public function search($data = [])
    {
        $url = $this->config['SEARCH_END_POINT'];
        if ($this->config['IS_MOCK']) {
            $url = $this->config['MOCK_SEARCH_END_POINT'];
        }

        $url = $url . '?client_id=' . $this->config['CLIENT_ID'] . '&client_secret=' . $this->config['CLIENT_SECRET'];

        if (!empty($data)) {
            foreach ($data as $key => $value) {
                $url .= '&' . $key . '=' . $value;
            }
        }

        $url = replaceVars($url);

        $headers = [
            'searchType: ' . $this->config['SEARCH_TYPE'],
            'Accept: ' . $this->config['ACCEPT'],
            'mockRequest: ' . ($this->config['IS_MOCK']) ? 'true' : 'false',
        ];
        $curl = $this->curlService->initiateCurl($url, $data, $headers);
        return $response = $this->curlService->executeCurl($curl);
    }
}