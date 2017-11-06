<?php
/**
 * Created by PhpStorm.
 * User: adrien
 * Date: 26/10/2017
 * Time: 20:31
 */

namespace Ipayroll\Model;

use JMS\Serializer\Annotation\Type;

class Page
{
    /**
     * @Type("integer")
     */
    var $size;

    /**
     * @Type("integer")
     */
    var $totalElements;

    /**
     * @Type("integer")
     */
    var $totalPages;

    /**
     * @Type("integer")
     */
    var $number;
}