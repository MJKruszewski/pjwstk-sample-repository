<?php
/**
 * Created by PhpStorm.
 * User: maciejkruszewski
 * Date: 2019-03-31
 * Time: 09:32
 */

namespace App\Dto;


class RegionsDto
{
    /**
     * @var string[]
     */
    private $regions = [];

    /**
     * @return string[]
     */
    public function getRegions(): array
    {
        return $this->regions;
    }

    /**
     * @param string[] $regions
     * @return RegionsDto
     */
    public function setRegions(array $regions): RegionsDto
    {
        $this->regions = $regions;
        return $this;
    }


}
