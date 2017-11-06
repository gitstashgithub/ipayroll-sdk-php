<?php

namespace Ipayroll\Exception;

use JMS\Serializer\Annotation\Exclude;
use JMS\Serializer\Annotation\Type;

class Error
{
    /**
     * @Type("string")
     */
    var $id;

    /**
     * @Type("array<string>")
     */
    var $messages;

    /**
     * @Type("string")
     */
    var $status;

    /**
     * @Exclude()
     * @return mixed
     */
    public function getMessage()
    {
        return $this->status . ': ' . implode(", ", $this->messages);
    }

}