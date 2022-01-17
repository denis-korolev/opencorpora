<?php

declare(strict_types=1);

namespace Opencorpora\Dictionary\Lemmata;

use JMS\Serializer\Annotation as Serializer;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;

class L
{
    /**
     * @SerializedName("t")
     * @XmlAttribute
     * @Type("string")
     */
    public string $t;
    /**
     * @var G[]
     *
     * @Serializer\XmlList(inline = true, entry = "g")
     * @Type("array<Opencorpora\Dictionary\Lemmata\G>")
     */
    public ?array $g = [];
}
