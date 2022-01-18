<?php

declare(strict_types=1);

namespace Opencorpora;

use JMS\Serializer\SerializerInterface;
use Opencorpora\Dictionary\Restrictions\Restr;

class RestrictionProcessor extends ExportFileReader
{
    private SerializerInterface $serializer;

    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    protected function processXmlNode(\XMLReader $reader): ?\Generator
    {
        if ($reader->name === 'restr' && $reader->nodeType === XML_ELEMENT_NODE) {
            $element = new \SimpleXMLElement($reader->readOuterXml());
            yield $this->serializer->deserialize($element->asXML(), Restr::class, 'xml');
        }
        yield;
    }
}
