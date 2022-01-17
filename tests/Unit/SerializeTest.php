<?php

declare(strict_types=1);

namespace Test\Unit;

use JMS\Serializer\Naming\IdenticalPropertyNamingStrategy;
use JMS\Serializer\Naming\SerializedNameAnnotationStrategy;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializerInterface;
use Opencorpora\Dictionary\Grammeme;
use Opencorpora\Dictionary\Lemmata\Lemma;
use Opencorpora\Dictionary\Links\Link;
use Opencorpora\Dictionary\Links\LinkType;
use Opencorpora\Dictionary\Restrictions\Restr;
use Opencorpora\GrammemeProcessor;
use Opencorpora\LemmaProcessor;
use Opencorpora\LinksProcessor;
use Opencorpora\LinkTypeProcessor;
use Opencorpora\RestrictionProcessor;
use PHPUnit\Framework\TestCase;

class SerializeTest extends TestCase
{
    private function createSerializer(): SerializerInterface
    {
        return SerializerBuilder::create()->setPropertyNamingStrategy(
            new SerializedNameAnnotationStrategy(
                new IdenticalPropertyNamingStrategy()
            )
        )
            ->setDebug(true)
            ->build();
    }

    public function testGetAllGrammemes(): void
    {
        $fileName = __DIR__ . DIRECTORY_SEPARATOR . 'OpcorporaTestingFile.xml';
        $serializer = new GrammemeProcessor($this->createSerializer());

        foreach ($serializer->getData($fileName) as $grammeme) {
            self::assertInstanceOf(Grammeme::class, $grammeme);
            self::assertNotNull($grammeme->parent);
            self::assertNotNull($grammeme->name);
            self::assertNotNull($grammeme->alias);
            self::assertNotNull($grammeme->description);
        }
    }

    public function testGetAllRestrictions(): void
    {
        $fileName = __DIR__ . DIRECTORY_SEPARATOR . 'OpcorporaTestingFile.xml';
        $serializer = new RestrictionProcessor($this->createSerializer());

        foreach ($serializer->getData($fileName) as $restriction) {
            self::assertInstanceOf(Restr::class, $restriction);
            self::assertNotNull($restriction->left->type);
            self::assertNotNull($restriction->left->val);
            self::assertNotNull($restriction->auto);
            self::assertNotNull($restriction->type);
            self::assertNotNull($restriction->right->type);
            self::assertNotNull($restriction->right->val);
        }
    }

    public function testGetAllLemmas(): void
    {
        $fileName = __DIR__ . DIRECTORY_SEPARATOR . 'OpcorporaTestingFile.xml';
        $serializer = new LemmaProcessor($this->createSerializer());

        foreach ($serializer->getData($fileName) as $lemma) {
            self::assertInstanceOf(Lemma::class, $lemma);
            self::assertNotNull($lemma->id);
            self::assertNotNull($lemma->rev);
            self::assertNotNull($lemma->l);
            self::assertNotNull($lemma->l[0]->t);
            self::assertNotNull($lemma->l[0]->g[0]->v);
        }
    }

    public function testGetAllLinkTypes(): void
    {
        $fileName = __DIR__ . DIRECTORY_SEPARATOR . 'OpcorporaTestingFile.xml';
        $serializer = new LinkTypeProcessor($this->createSerializer());

        foreach ($serializer->getData($fileName) as $linkType) {
            self::assertInstanceOf(LinkType::class, $linkType);
            self::assertNotNull($linkType->id);
            self::assertNotNull($linkType->type);
        }
    }

    public function testGetAllLink(): void
    {
        $fileName = __DIR__ . DIRECTORY_SEPARATOR . 'OpcorporaTestingFile.xml';
        $serializer = new LinksProcessor($this->createSerializer());

        foreach ($serializer->getData($fileName) as $link) {
            self::assertInstanceOf(Link::class, $link);
            self::assertNotNull($link->id);
            self::assertNotNull($link->type);
            self::assertNotNull($link->from);
            self::assertNotNull($link->to);
        }
    }
}
