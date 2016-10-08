<?php

namespace SocketServerBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use SocketServerBundle\Business\Service\SocketService;

class HorusSocketCommand extends ContainerAwareCommand
{

    private $socketService;

    private function getSocketService() : SocketService
    {
        return $this->getContainer()->get('socket.service');
    }

    protected function configure()
    {
        $this->setName('horus:start')
        ->setDescription('Start the eyes service (socket).')
        ->addArgument('address:port', InputArgument::REQUIRED, '?');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $ipAndPort = $input->getArgument('address:port');

        $this->getSocketService()->setAddressAndPort($ipAndPort);

        $server = $ip = $this->getSocketService()->start();

        if($server) {
            $output->writeln("Running! <info>success</info>");
            $server->run();
        }
    }

}
