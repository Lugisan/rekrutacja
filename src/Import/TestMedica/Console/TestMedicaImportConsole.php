<?php

declare(strict_types=1);

namespace Import\TestMedica\Console;

use App\Enum\WidgetListEnum;
use Import\TestMedica\Service\ImportServiceEventTypes;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'import:TestMedica',
    description: 'Import TestMedcia',
    aliases: ['import:testMedica'],
    hidden: false
)]
final class TestMedicaImportConsole extends Command
{
    public function __construct(
        private ImportServiceEventTypes $eventTypeService
    ) {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this->setDescription('Test medica import');
        $this->addArgument(
            'files_path',
            InputArgument::REQUIRED,
            'Path where files will be get it and stored'
        );
    }

    public function execute(
        InputInterface $input,
        OutputInterface $output
    ): int {
        $filesPath = $input->getArgument('files_path');

        $this->eventTypeService->handle($filesPath);


        return Command::SUCCESS;
    }
}
