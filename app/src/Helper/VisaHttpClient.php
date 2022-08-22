<?php

namespace App\Helper;

use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class VisaHttpClient
{
    protected HttpClientInterface $client;

    const API_URL = 'http://nte.test.xo-dmp.com:85/api/';

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    public function getAllApplications()
    {
        $result = $this->client->request('GET', self::API_URL . 'application');
        $applications = json_decode($result->getContent());
        return $applications;
    }

    public function getApplicationById($id)
    {
        $result = $this->client->request('GET', self::API_URL . 'application/' . $id);
        $application = json_decode($result->getContent());
        return $application;
    }

    public function getApplicationDocuments($id)
    {
        $result = $this->client->request('POST', self::API_URL . 'application/attached_document/' . $id);
        $documents = json_decode($result->getContent());
        return $documents;
    }

    public function generateVisa($id)
    {
        $result = $this->client->request('GET', self::API_URL . 'visa/generate/' . $id);
        return json_decode($result->getContent());
    }

    public function changeApplicationStatus($id, $status)
    {
        switch (strtoupper($status)){
            case 'APPROVE':
                $result = $this->client->request('POST', self::API_URL . 'application/approve/' . $id);
                return json_decode($result->getContent());
            case 'DENY':
                $result = $this->client->request('POST', self::API_URL . 'application/deny/' . $id);
                return json_decode($result->getContent());
            case 'NEEDMORE':
                $result = $this->client->request('POST', self::API_URL . 'application/needmore/' . $id);
                return json_decode($result->getContent());
        }

    }

}