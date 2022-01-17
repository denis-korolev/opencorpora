<?php

declare(strict_types=1);

namespace Opencorpora\Dictionary\Lemmata;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;

class G
{
    /**
     * @SerializedName("v")
     * @XmlAttribute
     * @Type("string")
     */
    public string $v;
}
