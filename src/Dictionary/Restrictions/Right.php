<?php

declare(strict_types=1);

namespace Opencorpora\Dictionary\Restrictions;

use JMS\Serializer\Annotation as Serializer;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;

class Right
{
    /**
     * @SerializedName("type")
     * @XmlAttribute
     * @Type("string")
     */
    public string $type;
    /**
     * @var null|string
     * @Serializer\XmlValue()
     */
    public ?string $val = null;
}
