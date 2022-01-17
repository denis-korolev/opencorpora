<?php

declare(strict_types=1);

namespace Opencorpora\Dictionary\Links;

use JMS\Serializer\Annotation as Serializer;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;

class LinkType
{
    /**
     * @SerializedName("id")
     * @XmlAttribute
     * @Type("string")
     */
    public string $id;
    /**
     * @Serializer\XmlValue()
     */
    public string $type;
}
