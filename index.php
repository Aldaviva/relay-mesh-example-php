<?php

require 'vendor/autoload.php';

$app = new \Slim\Slim(array(
    'log.enabled' => true
));

$app->get('/:ipAddress/callactive', function($ipAddress) use ($app) {
    $app->log->info("Received callactive request\n".print_r(array(
        'ipAddress' => $ipAddress,
        'port' => $app->request->get('port'),
        'name' => $app->request->get('name')
    ), true));

    $app->response->headers->set('Content-Type', 'application/json');
    echo json_encode(array('callActive' => false));
});

$app->post('/:ipAddress/join', function($ipAddress) use ($app) {
    $app->log->info("Received join request\n".print_r(array(
        'ipAddress' => $ipAddress,
        'dialString' => $app->request->get('dialString'),
        'meetingId' => $app->request->get('meetingId'),
        'passcode' => $app->request->get('passcode'),
        'bridgeAddress' => $app->request->get('bridgeAddress'),
        'endpoint' => json_decode($app->request->getBody())
    ), true));

    $app->response->setStatus(204);
});


$app->post('/:ipAddress/hangup', function($ipAddress) use ($app) {
    $app->log->info("Received hangup request\n".print_r(array(
        'ipAddress' => $ipAddress,
        'endpoint' => json_decode($app->request->getBody())
    ), true));

    $app->response->setStatus(204);
});

$app->run();

?>