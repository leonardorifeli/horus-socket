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

		if (!array_key_exists('name', $queryParams)) {
			$connection->close();
			return;
		}

		if (!array_key_exists('room', $queryParams)) {
			$connection->close();
			return;
		}

		$session = new \stdClass;
		$session->room = $queryParams['room'];
		$session->name = $queryParams['name'];
		$connection->session = $session;

		self::$connections->attach($connection);
	}

	public function onMessage(ConnectionInterface $connection, $jsonMessage)
	{
		foreach (self::$connections as $otherConnection) {
			if($otherConnection->session->room != $connection->session->room)
				continue;

			if ($connection === $otherConnection)
				continue;
			
			$otherConnection->send($jsonMessage);
		}
	}

	public function onClose(ConnectionInterface $connection)
	{
		self::$connections->detach($connection);
	}

	public function onError(ConnectionInterface $connection, \Exception $e)
	{
		$connection->close();
	}

	public function sendBotMessage()
	{
		foreach (self::$connections as $connection) {
			$message = [
				"user" => "Server",
				"room" => "meetupPHPSC",
				"text" => "Hello users! I'm a boot.",
				"time" => date("H:i a"),
			];

			$connection->send(json_encode($message));
		}
	}
}
