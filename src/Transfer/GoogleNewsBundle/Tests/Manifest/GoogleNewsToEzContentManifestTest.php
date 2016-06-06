<?php

use Symfony\Bundle\FrameworkBundle\Tests\TestCase;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;
use Transfer\Console\Command\Manifest\ListCommand;

class GoogleNewsToEzContentManifestTest extends TestCase
{
    public function testManifestRun()
    {
        $application = new Application();
        $application->add(new ListCommand());

        $command = $application->find('transfer:manifest:list');
        $commandTester = new CommandTester($command);
        $commandTester->execute(array('command' => $command->getName()));

        print_r($commandTester->getDisplay());
        $this->assertRegExp('/.../', $commandTester->getDisplay());
    }
}