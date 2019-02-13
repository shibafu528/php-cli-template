<?php

namespace App\Commands;

use Psr\Log\LoggerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ButimiliCommand extends Command
{
    protected static $defaultName = 'sample:butimili';

    /** @var LoggerInterface */
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        parent::__construct(null);
        $this->logger = $logger;
    }

    protected function configure()
    {
        $this
            ->setDescription('Take a shit.')
            ->addOption('milli', 'm')
            ->addOption('chiufu', 'c');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        if ($input->getOption('milli')) {
            $output->writeln('㍉');
        } elseif ($input->getOption('chiufu')) {
            $output->writeln('ﾁｩﾌ');
        } else {
            $shit = file_get_contents('https://butimi.li/api/v1/butimili/raw');
            $output->writeln($shit);
            $this->logger->emergency($shit);
        }
    }
}