<?php

require 'vendor/autoload.php';

$app = new \Slim\Slim(array(
    'log.enabled' => true
));

/**
 * Capabilities method
 * @see https://relay.bluejeans.com/docs/mesh.html#capabilities
 */
$app->get('/:ipAddress/capabilities', function($ipAddress) use ($app) {
    $app->log->info("Received capabilities request\n".print_r(array(
        'ipAddress' => $ipAddress,
        'port' => $app->request->get('port'),
        'name' => $app->request->get('name')
    ), true));

    $app->response->headers->set('Content-Type', 'application/json');
    echo json_encode(array(
        'JOIN' => true,
        'HANGUP' => true,
        'STATUS' => true,
        'MUTE_MICROPHONE' => true));
});

/**
 * Status method
 * @see https://relay.bluejeans.com/docs/mesh.html#status
 */
$app->get('/:ipAddress/status', function($ipAddress) use ($app) {
    $app->log->info("Received status request\n".print_r(array(
        'ipAddress' => $ipAddress,
        'port' => $app->request->get('port'),
        'name' => $app->request->get('name')
    ), true));

    $app->response->headers->set('Content-Type', 'application/json');
    echo json_encode(array(
            'callActive' => false,
            'microphoneMuted' => false));
});

/**
 * Join method
 * @see https://relay.bluejeans.com/docs/mesh.html#join
 */
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

/**
 * Hangup method
 * @see https://relay.bluejeans.com/docs/mesh.html#hangup
 */
$app->post('/:ipAddress/hangup', function($ipAddress) use ($app) {
    $app->log->info("Received hangup request\n".print_r(array(
        'ipAddress' => $ipAddress,
        'endpoint' => json_decode($app->request->getBody())
    ), true));

    $app->response->setStatus(204);
});

/**
 * Mute Microphone method
 * @see https://relay.bluejeans.com/docs/mesh.html#mutemicrophone
 */
$app->post('/:ipAddress/mutemicrophone', function($ipAddress) use ($app) {
    $app->log->info("Received mutemicrophone request\n".print_r(array(
        'ipAddress' => $ipAddress,
        'endpoint' => json_decode($app->request->getBody())
    ), true));

    $app->response->setStatus(204);
});

/**
 * Unmute Microphone method
 * @see https://relay.bluejeans.com/docs/mesh.html#mutemicrophone
 */
$app->post('/:ipAddress/unmutemicrophone', function($ipAddress) use ($app) {
    $app->log->info("Received unmutemicrophone request\n".print_r(array(
        'ipAddress' => $ipAddress,
        'endpoint' => json_decode($app->request->getBody())
    ), true));

    $app->response->setStatus(204);
});

$app->run();

?>