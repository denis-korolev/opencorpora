<?php

declare(strict_types=1);

namespace Opencorpora\Interfaces;

interface OpencorporaSerializerInterface
{
    /**
     * @param string $filePath
     * @return \Generator
     */
    public function getData(string $filePath): \Generator;
}
