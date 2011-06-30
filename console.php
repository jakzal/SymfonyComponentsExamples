<?php

require_once __DIR__.'/src/autoload.php';

use Symfony\Component\Console as Console;

class HelloWorldCommand extends Console\Command\Command
{
    public function __construct($name = null)
    {
        parent::__construct($name);

        $this->setDescription('Outputs welcome message');
        $this->setHelp('Outputs welcome message.');
        $this->addArgument('name', Console\Input\InputArgument::OPTIONAL, 'The name to output to the screen', 'World');
        $this->addOption('more', 'm', Console\Input\InputOption::VALUE_NONE, 'Tell me more');
    }

    protected function execute(Console\Input\InputInterface $input, Console\Output\OutputInterface $output)
    {
        $name = $input->getArgument('name');

        $output->writeln(sprintf('Hello %s!', $name));

        if ($input->getOption('more')) {
            $output->writeln('It is really nice to meet you!');
        }
    }
}

$application = new Console\Application('Demo', '1.0.0');
$application->add(new \HelloWorldCommand('hello-world'));
$application->run();

