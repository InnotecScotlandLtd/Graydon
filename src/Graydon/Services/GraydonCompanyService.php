<?php

namespace InnotecScotlandLtd\Graydon\Services;

Class GraydonCompanyService
{
    protected $config = [];

    protected $curlService;

    public function __construct()
    {
        $this->config = config('graydon');
        $this->curlService = new CurlService();
    }

    public function get($company_id = '', $other_uri = '', $data = [])
    {
        switch ($other_uri) {
            case 'profile':
            case 'company-profile':
            case 'companyProfile':
                $other_uri = 'companyProfile';
                break;

            case 'branch':
            case 'branches':
            case 'branchOffices':
                $other_uri = 'branchOffices';
                break;

            case 'credit-score':
            case 'credit-scores':
            case 'scores/creditScores':
                $other_uri = 'scores/creditScores';
                break;

            case 'opportunity-score':
            case 'opportunity-scores':
            case 'scores/opportunityScores':
                $other_uri = 'scores/opportunityScores';
                break;

            case "financial":
            case "financial-summary":
            case "financials/summary":
                $other_uri = 'financials/summary';
                break;

            case "manager":
            case "managers":
            case "affiliations/managers":
                $other_uri = 'affiliations/managers';
                break;

            case "shareholder":
            case "shareholders":
            case "share-holder":
            case "share-holders":
            case "affiliations/shareholders":
                $other_uri = 'affiliations/shareholders';
                break;

            case "participation":
            case "participations":
            case "affiliations/participations":
                $other_uri = 'affiliations/participations';
                break;

            case "groupStructure":
            case "group-structure":
            case "affiliations/groupStructure":
                $other_uri = 'affiliations/groupStructure';
                break;

            case "declarationOfLiability":
            case "declaration-of-liability":
                $other_uri = 'affiliations/declarationOfLiability';
                break;

            case "other":
            case "affiliations/other":
                $other_uri = 'affiliations/other';
                break;

            case "xseptions":
                $other_uri = 'xseptions';
                break;

            case "event":
            case "events":
                $other_uri = 'events';
                break;

            default:
                $other_uri = 'companyProfile';
                break;
        }
        $url = $this->config['COMPANY_END_POINT'];
        if ($this->config['IS_MOCK']) {
            $url = $this->config['MOCK_COMPANY_END_POINT'];
        }

        $url = $url . '?client_id=' . $this->config['CLIENT_ID'] . '&client_secret=' . $this->config['CLIENT_SECRET'];

        if (!empty($data)) {
            foreach ($data as $key => $value) {
                $url .= '&' . $key . '=' . $value;
            }
        }

        $url = $this->replaceVars($url, $company_id, $other_uri);

        $headers = [
            'searchType: ' . $this->config['SEARCH_TYPE'],
            'Accept: ' . $this->config['ACCEPT'],
            'mockRequest: ' . ($this->config['IS_MOCK']) ? 'true' : 'false',
        ];
        $curl = $this->curlService->initiateCurl($url, $data, $headers);
        return $response = $this->curlService->executeCurl($curl);
    }

    function replaceVars($string, $company_id = '', $other_uri = '')
    {
        return str_ireplace(
            array(
                '{account_id}',
                '{country_id}',
                '{company_id}',
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