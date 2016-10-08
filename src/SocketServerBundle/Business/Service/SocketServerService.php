<?php

namespace SocketServerBundle\Business\Service;

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

class SocketServerService implements MessageComponentInterface
{

    public static $connections;

    public function __construct()
    {
        self::$connections = new \SplObjectStorage;
    }

    public function onOpen(ConnectionInterface $connection)
    {
        $queryExplode = explode('&', $connection->WebSocket->request->getQuery());
        $queryParams = [];

        foreach ($queryExplode as $queryParam) {
            $queryParamExplode = explode('=', $queryParam);
            $queryParamKey = $queryParamExplode[0];
            array_shift($queryParamExplode);
            $queryParamValue = implode($queryParamExplode);
            $queryParams[$queryParamKey] = $queryParamValue;
        }

        if (!array_key_exists('id', $queryParams)) {
            $connection->close();
            return;
        }

        if (!array_key_exists('name', $queryParams)) {
            $connection->close();
            return;
        }

        if (!array_key_exists('room', $queryParams)) {
            $connection->close();
            return;
        }

        $connection->session = array(
            'room' => $queryParams['room'],
            'user' => str_replace("%20", " ", $queryParams['name']),
            'id' => $queryParams['id'],
            'message' => (array_key_exists('message', $queryParams)) ? $queryParams['message'] : null
        );

        self::$connections->attach($connection);
    }

    public function onMessage(ConnectionInterface $connection, $jsonMessage)
    {
    }

    public function onClose(ConnectionInterface $connection)
    {
        $user[$connection->resourceId] = array(
            'user' => $connection->session['user'],
            'id' => $connection->session['id'],
            'room' => $connection->session['room'],
            'socketId' => $connection->resourceId,
            'message' => $connection->session['message'],
            'action' => 2
        );

        $user = json_encode($user);

        foreach (self::$connections as $key => $client) {
            $client->send($user);
        }

        self::$connections->detach($connection);
    }

    public function onError(ConnectionInterface $connection, \Exception $e)
    {
        $connection->close();
    }

    public function sendUsers()
    {
        $users = [];
        foreach (self::$connections as $anotherConnection) {
            $users[intval($anotherConnection->resourceId)] = array(
                'user' => $anotherConnection->session['user'],
                'id' => $anotherConnection->session['id'],
                'room' => $anotherConnection->session['room'],
                'socketId' => $anotherConnection->resourceId,
                'message' => $anotherConnection->session['message'],
                'action' => 1
            );
        }

        foreach (self::$connections as $key => $client) {
            $newUser = json_encode($users);
            $client->send($newUser);
        }
    }
}
