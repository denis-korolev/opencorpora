<?php

declare(strict_types=1);

namespace Opencorpora\Dictionary\Links;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;

class Link
{
    /**
     * @SerializedName("id")
     * @XmlAttribute
     * @Type("string")
     */
    public string $id;
    /**
     * @SerializedName("from")
     * @XmlAttribute
     * @Type("string")
     */
    public string $from;
    /**
     * @SerializedName("to")
     * @XmlAttribute
     * @Type("string")
     */
    public string $to;
    /**
     * @SerializedName("type")
     * @XmlAttribute
     * @Type("string")
     */
    public string $type;
}
