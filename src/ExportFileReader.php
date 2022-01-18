<?php

declare(strict_types=1);

namespace Opencorpora;

use Opencorpora\Exceptions\OpencorporaException;
use Opencorpora\Interfaces\ReaderInterface;

abstract class ExportFileReader implements ReaderInterface
{
    public function getData(string $filePath): \Generator
    {
        if (!file_exists($filePath)) {
            throw new OpencorporaException('File not exists');
        }

        $xml = new \XMLReader();
        $xml->open('compress.zlib://' . $filePath);

        while ($xml->read()) {
            foreach ($this->processXmlNode($xml) as $node) {
                if ($node !== null) {
                    yield $node;
                }
            }
        }

        $xml->close();
    }

    abstract protected function processXmlNode(\XMLReader $reader): ?\Generator;
}
