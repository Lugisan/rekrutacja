<?php

declare(strict_types=1);

namespace App\Writer\Xml;

use App\Converter\ArrayToXmlConverterInterface;

abstract class AbstractXmlWriter
{
    private string $filename;

    public function __construct(
        protected ArrayToXmlConverterInterface $arrayToXMLConverter,
    ) {
    }

    abstract public function addMultiBeginSelector(): void;

    abstract public function addSingleSelector(array $data): void;

    abstract public function addMultiEndSelector(): void;

    public function setFilePath(
        string $filename
    ): void {
        $this->filename = $filename;
    }

    public function start(): void
    {
        $this->deleteFile();
        $this->appendDataToFile('<?xml version = "1.0" encoding = "utf-8"?><migration>');
    }

    public function finish(): void
    {
        $this->appendDataToFile('</migration>');
    }

    protected function appendDataToFile(
        string $value
    ): void {
        file_put_contents(
            $this->filename,
            $value,
            FILE_APPEND
        );
    }

    private function deleteFile(): void
    {
        if (file_exists($this->filename)) {
            unlink($this->filename);
        }
    }
}
