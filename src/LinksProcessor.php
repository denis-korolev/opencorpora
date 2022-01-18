<?php

declare(strict_types=1);

namespace Opencorpora;

use JMS\Serializer\SerializerInterface;
use Opencorpora\Dictionary\Links\Link;

class LinksProcessor extends ExportFileReader
{
    private SerializerInterface $serializer;

    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    protected function processXmlNode(\XMLReader $reader): ?\Generator
    {
        if ($reader->name === 'link' && $reader->nodeType === XML_ELEMENT_NODE) {
            $element = new \SimpleXMLElement($reader->readOuterXml());
            yield $this->serializer->deserialize($element->asXML(), Link::class, 'xml');
        }
        yield;
    }
}
