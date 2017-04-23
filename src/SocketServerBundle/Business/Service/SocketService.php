<?php

namespace SocketServerBundle\Business\Service;

use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;

use SocketServerBundle\Business\Service\SocketServerService;
use SocketServerBundle\Business\Enum\SocketTimerEnum;

class SocketService
{

	private $ip;
	private $port;

	public function start() : IoServer
	{
		$horus = new SocketServerService();

		$server = IoServer::factory(
			new HttpServer(
				new WsServer($horus)
			),
			$this->port,
			$this->ip
		);

		$server->loop->addPeriodicTimer(SocketTimerEnum::TIMER, function () use ($horus) {
			$horus->sendBotMessage();
		});

		return $server;
	}

	public function setAddressAndPort(string $ipAndPort)
	{
		$ipAndPort = $this->getIpAndPortInArray($ipAndPort);

		$this->ip = $ipAndPort[0];
		$this->port = $ipAndPort[1];
	}

	private function getIpAndPortInArray(string $ipAndPort) : array
	{
		$ipAndPort = explode(":", $ipAndPort);

		if(!$this->ipAndPortIsValid($ipAndPort))
			throw new \Exception("Error! Check your IP or PORT.", 500);

		return $ipAndPort;
	}

	private function ipAndPortIsValid(array $ipAndPort) : bool
	{
		return !array_key_exists(0, $ipAndPort) || !array_key_exists(1, $ipAndPort);
	}

}
