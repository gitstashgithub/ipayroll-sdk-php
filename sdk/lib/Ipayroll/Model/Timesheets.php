<?php
/**
 * Created by PhpStorm.
 * User: adrien
 * Date: 27/10/2017
 * Time: 21:18
 */

namespace Ipayroll\Model;


class Timesheets extends Resources
{
    /**
     * @Type("ArrayCollection<Ipayroll\Model\Timesheet>")
     */
    public $content;

    public function __toString()
    {
        return (String)print_r($this, true);
    }
}