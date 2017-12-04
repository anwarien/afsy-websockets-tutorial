<?php

namespace AppBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

// use Ratchet\Http\HttpServer;
use Ratchet\Server\IoServer;
// use Ratchet\WebSocket\WsServer;

use AppBundle\Server\Chat;

/**
 * Chat Server Command
 */
class ChatServerCommand extends ContainerAwareCommand
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName('afsy:app:chat-server')
            ->setDescription('Start chat server');
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        // Create server and run it!
        $server = IoServer::factory(
            new Chat(),
            8080,
            '127.0.0.1'
        );
        $server->run();
    }
}