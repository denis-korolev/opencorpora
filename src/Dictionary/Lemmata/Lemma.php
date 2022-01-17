<?php

declare(strict_types=1);

namespace Opencorpora\Dictionary\Lemmata;

use JMS\Serializer\Annotation as Serializer;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;

class Lemma
{
    /**
     * @SerializedName("id")
     * @XmlAttribute
     * @Type("string")
     */
    public string $id;
    /**
     * @SerializedName("rev")
     * @XmlAttribute
     * @Type("string")
     */
    public string $rev;
    /**
     * @var L[]
     * @Serializer\XmlList(inline = true, entry = "l")
     * @Type("array<Opencorpora\Dictionary\Lemmata\L>")
     */
    public array $l = [];
}
