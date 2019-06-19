<?php

namespace InnotecScotlandLtd\Graydon\Services;

Class GraydonMonitoringService
{
    protected $config = [];

    protected $curlService;

    public function __construct()
    {
        $this->config = config('graydon');
        $this->curlService = new CurlService();
    }

    public function set($company_id = '', $data = [])
    {
        $url = $this->config['MONITORING_SET_END_POINT'];
        if ($this->config['IS_MOCK']) {
            $url = $this->config['MOCK_MONITORING_SET_END_POINT'];
        }

        $url = $url . '?client_id=' . $this->config['CLIENT_ID'] . '&client_secret=' . $this->config['CLIENT_SECRET'];

        if (!empty($data)) {
            foreach ($data as $key => $value) {
                $url .= '&' . $key . '=' . $value;
            }
        }
        $url = replaceVars($url, $company_id);
        $headers = [
            'searchType: ' . $this->config['SEARCH_TYPE'],
            'Accept: ' . $this->config['ACCEPT'],
            'mockRequest: ' . ($this->config['IS_MOCK']) ? 'true' : 'false',
        ];
        $curl = $this->curlService->initiateCurl($url, $data, $headers);
        return $response = $this->curlService->executeCurl($curl);
    }

    public function get($company_id = '', $data = [])
    {
        $url = $this->config['MONITORING_END_POINT'];
        if ($this->config['IS_MOCK']) {
            $url = $this->config['MOCK_MONITORING_END_POINT'];
        }

        $url = $url . '?client_id=' . $this->config['CLIENT_ID'] . '&client_secret=' . $this->config['CLIENT_SECRET'];

        if (!empty($data)) {
            foreach ($data as $key => $value) {
                $url .= '&' . $key . '=' . $value;
            }
        }
        $url = replaceVars($url, $company_id);
        $headers = [
            'searchType: ' . $this->config['SEARCH_TYPE'],
            'Accept: ' . $this->config['ACCEPT'],
            'mockRequest: ' . ($this->config['IS_MOCK']) ? 'true' : 'false',
        ];
        $curl = $this->curlService->initiateCurl($url, $data, $headers);
        return $response = $this->curlService->executeCurl($curl);

    }

}