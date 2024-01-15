<?php

declare(strict_types=1);

namespace App\Service\EventType;

use App\Enum\ImportFileNamesEnum;
use App\Utility\UUIDGeneratorInterface;
use App\Writer\Json\JsonWriterInterface;
use App\Writer\Xml\UserXmlWriter;

abstract class AbstractImportUsers
{
    protected const UUID = 'uuid';
    protected const EMAIL = 'email';
    protected const FIRST_NAME = 'firstName';
    protected const LAST_NAME = 'lastName';
    protected const PHONE_NUMBER = 'phoneNumber';
    protected const LICENSE_NUMBER = 'licenseNumber';

    public function __construct(
        protected UUIDGeneratorInterface $uuidGenerator,
        private UserXmlWriter $userXmlWriter,
        private JsonWriterInterface $jsonWriter
    ) {
    }

    abstract protected function import(string $inputPathDir): array;
    public function handle(
        string $inputPathDir
    ): void {
        $this->userXmlWriter
            ->setFilePath(
                sprintf(
                    '/%s/%s/%s',
                    getcwd(),
                    $inputPathDir,
                    ImportFileNamesEnum::USERS_XML->value
                )
            );
        $this->userXmlWriter->start();
        $this->userXmlWriter->addMultiBeginSelector();
        $users = $this->import($inputPathDir);
        $this->userXmlWriter->addMultiEndSelector();
        $this->userXmlWriter->finish();

        $this->jsonWriter
            ->save(
                sprintf(
                    '/%s/%s/%s',
                    getcwd(),
                    $inputPathDir,
                    ImportFileNamesEnum::USERS_TEXT->value
                ),
                $users
            );
    }

    protected function addUser(
        array $data
    ): void {
        $user[self::UUID] = $data[self::UUID];
        $user[self::EMAIL] = $data[self::EMAIL];
        $user[self::FIRST_NAME] = $data[self::FIRST_NAME];
        $user[self::LAST_NAME] = $data[self::LAST_NAME];
        $user[self::PHONE_NUMBER] = $data[self::PHONE_NUMBER];
        $user[self::LICENSE_NUMBER] = $data[self::LICENSE_NUMBER];

        $this->userXmlWriter->addSingleSelector($user);
    }
}
