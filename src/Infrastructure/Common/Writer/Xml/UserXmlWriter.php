<?php

declare(strict_types=1);

namespace Infrastructure\Common\Writer\Xml;

use App\Common\Writer\Xml\AbstractXmlWriter;

final class UserXmlWriter extends AbstractXmlWriter
{
    public function addMultiBeginSelector(): void
    {
        $this->appendDataToFile('<users>');
    }

    public function addSingleSelector(array $data): void
    {
        $this->appendDataToFile('<user>');
        $this->appendDataToFile($this->arrayToXMLConverter->convertUser($data));
        $this->appendDataToFile('</user>');
    }

    public function addMultiEndSelector(): void
    {
        $this->appendDataToFile('</users>');
    }

}
