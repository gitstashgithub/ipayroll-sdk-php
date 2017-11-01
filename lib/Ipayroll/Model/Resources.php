<?php
/**
 * Created by PhpStorm.
 * User: adrien
 * Date: 26/10/2017
 * Time: 20:14
 */

namespace Ipayroll\Model;

use JMS\Serializer\Annotation\Type;

class Resources
{
    /**
     * @Type("ArrayCollection<Ipayroll\Model\Link>")
     */
    public $links; // = fields.Collection(Links)

    /**
     * @Type("Ipayroll\Model\Page")
     */
    public $page;
}