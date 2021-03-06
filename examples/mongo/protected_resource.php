<?php

/**
 * @file
 * Sample protected resource.
 *
 * Obviously not production-ready code, just simple and to the point.
 *
 * In reality, you'd probably use a nifty framework to handle most of the crud for you.
 */

require 'OAuth2/Server/StorageMongo.php';
require_once 'OAuth2/Storage/StorageMongo.php';
require 'OAuth2/Exception/ServerException.php';

$token = isset($_GET[\OAuth2\Server\Server::TOKEN_PARAM_NAME]) ? $_GET[\OAuth2\Server\Server::TOKEN_PARAM_NAME] : null;

try {
    $oauth = new OAuth2\Server\Server(new OAuth2\Storage\StorageMongo());
    $token = $oauth->getBearerToken();
    $oauth->verifyAccessToken($token);
} catch (OAuth2\Exception\ServerException $oauthError) {
    $oauthError->sendHttpResponse();
}

// With a particular scope, you'd do:
// $oauth->verifyAccessToken("scope_name");


?>

<html>
    <head>
        <title>Hello!</title>
    </head>
    <body>
        <p>This is a secret.</p>
    </body>
</html>
