<?php

namespace InnotecScotlandLtd\Graydon\Services;

use Illuminate\Support\Facades\DB;

Class GraydonMonitoringService
{
    protected $config = [];

    protected $curlService;

    public function __construct()
    {
        $this->config = config('graydon');
        $this->curlService = new CurlService();
    }

    public function delete($company_id = '', $data = [])
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
        $url = $this->replaceVars($url, $company_id);
        $headers = [];
        $curl = $this->curlService->initiateCurl($url, $data, $headers,'DELETE');
        return $response = $this->curlService->executeCurl($curl);
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
        $url = $this->replaceVars($url, $company_id);
        $headers = [];
        $curl = $this->curlService->initiateCurl($url, $data, $headers,'PUT');
        return $response = $this->curlService->executeCurl($curl);
    }

    public function get($company_id = '', $data = [], $store_db = false)
    {
        $url = $this->config['MONITORING_END_POINT'];
        if ($this->config['IS_MOCK']) {
            $url = $this->config['MOCK_MONITORING_END_POINT'];
        }

        $url = $url . '?client_id=' . $this->config['CLIENT_ID'] . '&client_secret=' . $this->config['CLIENT_SECRET'];

        if (!empty($data)) {
            foreach ($data as $key => $value) {
                $url .= '&' . $key . '=' . urlencode($value);
            }
        }
        $url = $this->replaceVars($url, $company_id);
        $headers = [];
        $curl = $this->curlService->initiateCurl($url, $data, $headers);
        $response = $this->curlService->executeCurl($curl);
        $response = json_decode($response);
        if ($store_db) {
            if (!empty($response->monitoringEvents)) {
                foreach ($response->monitoringEvents as $key => $value) {
                    if (!empty($value->monitoringEvents)) {
                        foreach ($value->monitoringEvents as $k => $v) {

                            $data = DB::table('graydon_company_monitoring_events')->where('eventId', $v->eventId)->first();
                            if (empty($data)) {

                                DB::table('graydon_company_monitoring_events')->insert([
                                    'graydonEnterpriseId' => !empty($value->companyIdentification->graydonEnterpriseId) ? $value->companyIdentification->graydonEnterpriseId : '',
                                    'registrationId' => !empty($value->companyIdentification->registrationId) ? $value->companyIdentification->registrationId : '',
                                    'eventId' => $v->eventId,
                                    'eventDate' => $v->eventDate,
                                    'eventCode' => $v->eventCode,
                                    'oldValue' => (!empty($v->change->from)) ? $v->change->from : '-',
                                    'newValue' => (!empty($v->change->to)) ? $v->change->to : '-',
                                ]);
                            }
                        }
                    }
                }
            }
        }
        return $response;

    }

    function replaceVars($string, $company_id = '', $other_uri = '')
    {
        $company_id = !empty($company_id) ? '/'.$company_id : '';
        return str_ireplace(
            array(
                '{account_id}',
                '{country_id}',
                '/{company_id}',
                '{other_uri}',
                '{profile_id}',
            ),
            array(
                config('graydon.ACCOUNT_ID'),
                config('graydon.COUNTRY_CODE'),
                $company_id,
                $other_uri,
                config('graydon.MONITORING_PROFILE_ID'),
            ),
            $string
        );
    }

}