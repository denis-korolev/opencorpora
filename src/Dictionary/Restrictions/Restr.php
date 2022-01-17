<?php

declare(strict_types=1);

namespace Opencorpora\Dictionary\Restrictions;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;

class Restr
{
    /**
     * @SerializedName("type")
     * @XmlAttribute
     * @Type("string")
     */
    public string $type;
    /**
     * @SerializedName("auto")
     * @XmlAttribute
     * @Type("string")
     */
    public string $auto;
    /**
     * @var null|Left
     * @Type("Opencorpora\Dictionary\Restrictions\Left")
     */
    public ?Left $left = null;

    /**
     * @var null|Right
     * @SerializedName("right")
     * @Type("Opencorpora\Dictionary\Restrictions\Right")
     */
    public ?Right $right = null;
}
