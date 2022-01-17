<?php

declare(strict_types=1);

namespace Opencorpora\Dictionary;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlAttribute;

class Grammeme
{
    /**
     * @SerializedName("parent")
     * @XmlAttribute
     * @Type("string")
     */
    public ?string $parent = null;
    /**
     * @Type("string")
     */
    public ?string $name = null;
    /**
     * @Type("string")
     */
    public ?string $alias = null;
    /**
     * @Type("string")
     */
    public ?string $description = null;
}
