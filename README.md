![Test status on master](https://github.com/denis-korolev/opencorpora/workflows/Master%20status/badge.svg)

Library to serialize opencorpora export file data from xml to objects
----------------------------------------

This library will help you read Opencorpora [export file](http://opencorpora.org/?page=export). 
In library we have 5 processors:

- GrammemeProcessor (reads only Grammeme node)
- LemmaProcessor (reads only Lemma node)
- LinksProcessor (reads only Links node)
- LinkTypeProcessor (reads only LinkType node)
- RestrictionProcessor (reads only Restr node)

Use this processors to extract xml data to simple DTO objects. XML file opens and reads by PHP library `XMLReader`
and `SimpleXMLElement` node by node. That why it use not a lot of memory.

Installation / Usage
--------------------

Install the latest version via [composer](https://getcomposer.org/):

```bash
composer require denis-korolev/opencorpora
```

Here is an example of usage `GrammemeProcessor`. Other processors using exactly same.
--------------------

```php
use JMS\Serializer\Naming\IdenticalPropertyNamingStrategy;
use JMS\Serializer\Naming\SerializedNameAnnotationStrategy;
use JMS\Serializer\SerializerBuilder;
use Opencorpora\Dictionary\Grammeme;
use Opencorpora\GrammemeProcessor;

        
 $serializer =  SerializerBuilder::create()->setPropertyNamingStrategy(
    new SerializedNameAnnotationStrategy(
        new IdenticalPropertyNamingStrategy()
    )
    )
    ->build();

// path to file
$fileName = $this->projectDir . DIRECTORY_SEPARATOR . 'var' . DIRECTORY_SEPARATOR . 'dict.opcorpora.xml';

$processor = new GrammemeProcessor($serializer);

foreach ($processor->getData($fileName) as $grammeme) {
    /**
     * @var $grammeme Grammeme
     */
    echo $grammeme->name;
    echo $grammeme->parent;
    echo $grammeme->description;
    echo $grammeme->alias;
}
```