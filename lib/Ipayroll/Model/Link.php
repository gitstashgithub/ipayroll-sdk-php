<?php

namespace Ipayroll\Model;

use JMS\Serializer\Annotation\Type;

class Link
{
    /**
     * @Type("string")
     */
    public $rel;

    /**
     * @Type("string")
     */
    public $href;
}