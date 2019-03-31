<?php
/**
 * Created by PhpStorm.
 * User: maciejkruszewski
 * Date: 2019-03-31
 * Time: 09:07
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class MapPoints
 * @package App\Entity
 *
 * @ORM\Entity(repositoryClass="\App\Repository\MapPointsRepository")
 */
class MapPoints
{
    const REGION_MAZOVIA = 'mazovia';
    const REGION_KUJAWSKIE = 'kujawskie';
    // .... to do more

    /**
     * @ORM\Id()
     * @ORM\Column(name="id")
     * @var int
     */
    private $id;
    /**
     * @ORM\Column(name="name")
     * @var string
     */
    private $name;
    /**
     * @ORM\Column(name="region")
     * @var string
     */
    private $region;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return MapPoints
     */
    public function setId(int $id): MapPoints
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return MapPoints
     */
    public function setName(string $name): MapPoints
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getRegion(): string
    {
        return $this->region;
    }

    /**
     * @param string $region
     * @return MapPoints
     */
    public function setRegion(string $region): MapPoints
    {
        $this->region = $region;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'region' => $this->region,
            'id' => $this->id,
            'name' => $this->name,
        ];
    }

}
