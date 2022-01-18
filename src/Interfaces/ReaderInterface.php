<?php

declare(strict_types=1);

namespace Opencorpora\Interfaces;

interface ReaderInterface
{
    /**
     * @param string $filePath
     * @return \Generator
     */
    public function getData(string $filePath): \Generator;
}
