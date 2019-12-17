<?php


namespace App\Controller;


use App\Service\EqualsCalculator;
use App\Service\EqualsSourceValidator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class MathEndpoint extends AbstractController
{
    /**
     * @var EqualsCalculator
     */
    private $equalsCalculator;
    /**
     * @var EqualsSourceValidator
     */
    private $equalsSourceValidator;

    /**
     * MathEndpoint constructor.
     *
     * @param EqualsCalculator $equalsCalculator
     */
    public function __construct(EqualsCalculator $equalsCalculator, EqualsSourceValidator $equalsSourceValidator)
    {
        $this->equalsCalculator      = $equalsCalculator;
        $this->equalsSourceValidator = $equalsSourceValidator;
    }

    /**
     * @Route("/equals", name="calculate_equals")
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function calculateEqualsAction(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        try {
            $source    = $data['source'];
            $neededSum = $data['sum'];
        } catch (\Throwable $e) {
            throw new \InvalidArgumentException('Wrong incoming parameters');
        }

        $this->equalsSourceValidator->validate($source);

        $mathResult = $this->equalsCalculator->getEqualsKeysRelativelySum($source, $neededSum);

        return new JsonResponse($mathResult);
    }
}