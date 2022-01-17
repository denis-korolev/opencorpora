<?php

declare(strict_types=1);

namespace Opencorpora;

use JMS\Serializer\SerializerInterface;
use Opencorpora\Dictionary\Grammeme;

class GrammemeProcessor extends OpencorporaSerializer
{
    private SerializerInterface $serializer;

    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    protected function processXmlNode(\XMLReader $reader): ?\Generator
    {
        if ($reader->name === 'grammeme' && $reader->nodeType === XML_ELEMENT_NODE) {
            $element = new \SimpleXMLElement($reader->readOuterXml());
            yield $this->serializer->deserialize($element->asXML(), Grammeme::class, 'xml');
        }
        yield;
    }
}
