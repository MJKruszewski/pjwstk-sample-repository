<?php
/**
 * Created by PhpStorm.
 * User: maciejkruszewski
 * Date: 2019-03-30
 * Time: 14:07
 */

namespace App\Controller;


use App\Dto\RegionsDto;
use App\Entity\MapPoints;
use App\Repository\MapPointsRepository;
use Doctrine\Common\Collections\Criteria;
use Doctrine\Common\Collections\ExpressionBuilder;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\FOSRestBundle;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * Class FilterController
 * @package App\Controller
 *
 *
 * @Rest\Route(path="/filter")
 */
class FilterController extends FOSRestBundle
{
    /**
     * @var MapPointsRepository
     */
    private $mapPointsRepository;
    /**
     * @var SerializerInterface
     */
    private $serializer;

    /**
     * FilterController constructor.
     * @param MapPointsRepository $mapPointsRepository
     * @param SerializerInterface $serializer
     */
    public function __construct(MapPointsRepository $mapPointsRepository, SerializerInterface $serializer)
    {
        $this->mapPointsRepository = $mapPointsRepository;
        $this->serializer = $serializer;
    }


    /**
     * @Rest\Post(path="/list", requirements={"_format"="json"}))
     *
     * @param Request $request
     * @return Response
     */
    public function postList(Request $request): Response
    {
        $response = new JsonResponse();

        /** @var RegionsDto $regions */
        $regions = $this->serializer->deserialize($request->getContent(), RegionsDto::class, 'json');

        $resultCollection = $this->mapPointsRepository->findBy(
            [
                'region' => $regions->getRegions()
            ]
        );

        return $response
            ->setStatusCode(Response::HTTP_OK)
            ->setContent(json_encode(array_map(function (MapPoints $mapPoints) {
                return $mapPoints->toArray();
            }, $resultCollection)));
    }

}
