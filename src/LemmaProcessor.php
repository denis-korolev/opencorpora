<?php

declare(strict_types=1);

namespace Opencorpora;

use JMS\Serializer\SerializerInterface;
use Opencorpora\Dictionary\Lemmata\Lemma;

class LemmaProcessor extends OpencorporaSerializer
{
    private SerializerInterface $serializer;

    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    protected function processXmlNode(\XMLReader $reader): ?\Generator
    {
        if ($reader->name === 'lemma' && $reader->nodeType === XML_ELEMENT_NODE) {
            $element = new \SimpleXMLElement($reader->readOuterXml());
            yield $this->serializer->deserialize($element->asXML(), Lemma::class, 'xml');
        }
        yield;
    }
}
