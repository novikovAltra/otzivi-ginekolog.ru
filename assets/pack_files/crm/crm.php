<?php

require_once dirname(__FILE__) . '/vendor/autoload.php';

use GuzzleHttp\Client as Guzzle;

use DigitalArts\Crm\SiteFormIntegration\Models\Platform;
use DigitalArts\Crm\SiteFormIntegration\Models\Client;
use DigitalArts\Crm\SiteFormIntegration\Models\Lead;
use DigitalArts\Crm\SiteFormIntegration\Models\LeadType;
use DigitalArts\Crm\SiteFormIntegration\Models\User;

$baseUri = 'https://crm.arts-digital.ru/api/';
$projectId = 5;
$httpClient = new Guzzle([
    'base_uri' => $baseUri
]);
$user = new User($httpClient);
$tokenData = $user->token('medics-api@arts-digital.ru', 'x300iKWMRf');
$httpClient = new Guzzle([
    'base_uri' => $baseUri,
    'headers' => [
        "Authorization" => 'Bearer ' . $tokenData['token'],
        "Accept" => "application/json"
    ]
]);

$clientModel = new Client($httpClient);
$leadTypeModel = new LeadType($httpClient);
$platformModel = new Platform($httpClient);
$leadModel = new Lead($httpClient);

$clientModel->setProjectId($projectId);
$leadTypeModel->setProjectId($projectId);
$platformModel->setProjectId($projectId);

$phone = str_replace(['+', '(', ')', '-', ' '], '', $pls['phone']);
$email = $pls['email'];
$name = !empty($pls['name']) ? $pls['name'] : $email;

if (!empty($phone) || !empty($email)) {
    if (!empty($phone)) {
        $clientInfo = $clientModel->where(['phone' => $phone])->first();
    }
    if (empty($clientInfo) && !empty($email)) {
        $clientInfo = $clientModel->where(['email' => $email])->first();
        if (!empty($clientInfo) && !empty($phone)) {
            $clientModel->addPhone($clientInfo['id'], $phone);
        }
    }
    if (empty($clientInfo)) {
        $clientInfo = $clientModel->create(['project_id' => $projectId, 'name' => $name]);
        if (!empty($phone)) {
            $clientModel->addPhone($clientInfo['id'], $phone);
        }
        if (!empty($email)) {
            $clientModel->addEmail($clientInfo['id'], $email);
        }
    }
    
    $leadTypeInfo = $leadTypeModel->where(['name' => $pls['type']])->first();
    if (empty($leadTypeInfo)) {
        $leadTypeInfo = $leadTypeModel->create(['project_id' => $projectId, 'name' => $pls['type']]);
    }
    
    $site = str_replace(['https', 'http', '://', '/'], '', $modx->getOption('site_url'));
    $platformInfo = $platformModel->where(['name' => $site])->first();
    if (empty($platformInfo)) {
        $platformInfo = $platformModel->create(['project_id' => $projectId, 'name' => $site]);
    }
    
    $leadDescription = '';
    $leadDescriptionExcludedFields = ['type', 'tpl', 'token'];
    foreach ($pls as $key => $value) {
        if (empty($value) || in_array($key, $leadDescriptionExcludedFields)) {
            continue;
        }
        
        switch ($key) {
            case 'name':
                $ruName = 'Имя';
                break;
            case 'phone':
                $ruName = 'Телефон';
                break;
            case 'email':
                $ruName = 'E-mail';
                break;
            case 'message':
                $ruName = 'Сообщение';
                break;
            case 'theme':
                $ruName = 'Тема';
                break;
            default:
                $ruName = $key;
                break;
        }
        $leadDescription .= "$ruName: $value\n";
    }
    
    $lead = $leadModel->create([
        'client_id' => $clientInfo['id'],
        'lead_type_id' => $leadTypeInfo['id'],
        'platform_id' => $platformInfo['id'],
        'data' => [
            'info' => $leadDescription,
            'original' => $pls
        ]
    ]);
}