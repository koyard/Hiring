<?php
declare(strict_types=1);

namespace HiringBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/demands")
 */
class DemandsController extends Controller
{

    /**
     * @Route("", name="demands_path")
     * @Method("GET")
     */
    public function indexAction(Request $request)
    {
        $form = $this->createForm($this->get('hiring.form_type.demands_filters_type'), $this->get('hiring.model.demands_filters'));
        $form->handleRequest($request);
        $filters = $form->getData();

        $demands = $this->getDemandsManager()->getDemandsByFilters($filters);

        return new JsonResponse(['applications' => $demands]);
    }

    /**
     * @Route("/new", methods={"GET"}, name="new_demand_path")
     */
    public function newAction(Request $request)
    {
        // TODO: Написать метод получения формы для создания заявки
        return $this->render('HiringBundle::form.html.twig');
    }

    /**
     * @Route("", name="create_demand_path")
     * @Method("POST")
     */
    public function createAction(Request $request)
    {
        // TODO: Написать метод сохраниения заявки
    }

    private function getDemandsManager()
    {
        return $this->get('hiring.manager.demands_manager');
    }
}
