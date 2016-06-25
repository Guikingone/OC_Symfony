<?php


namespace OC\PlatformBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AdvertController extends Controller
{
    /**
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/advert/{id}", name="oc_platform_view", requirements={"id": "\d+"})
     * @Template("PlatformBundle::view.html.twig")
     */
    public function viewAction($id)
    {
        $advert = array(
            'title'   => 'Recherche développpeur Symfony2',
            'id'      => $id,
            'author'  => 'Alexandre',
            'content' => "Nous recherchons un développeur Symfony2 débutant sur Lyon. Blabla…",
            'date'    => new \Datetime()
        );
        return array( 'advert' => $advert );
    }

    /**
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @Route("/add", name="oc_platform_add")
     * @Template("PlatformBundle::add.html.twig")
     */
    public function addAction(){}

    /**
     * @param $id
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @Route("/edit/{id}", name="oc_platform_edit", requirements={"id": "\d+"})
     * @Template("PlatformBundle::edit.html.twig")
     */
    public function editAction($id)
    {
        $this->addFlash('notice', 'Annonce bien modifiée.');
        $advert = array(
            'title'   => 'Recherche développpeur Symfony',
            'id'      => $id,
            'author'  => 'Alexandre',
            "content" => "Nous recherchons un développeur Symfony débutant sur Lyon. Blabla…",
            'date'    => new \Datetime()
        );
        return array('advert' => $advert);
    }

    /**
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/delete/{id}", name="oc_platform_delete", requirements={"id": "\d+"})
     * @Template("PlatformBundle::delete.html.twig")
     */
    public function deleteAction($id)
    {
        $this->addFlash('notice', 'La suppression n\'est pas encore disponible, merci de réessayer ultérieurement.');
        return array('id' => $id); 
    }

    /**
     * @param $limit
     * @return \Symfony\Component\HttpFoundation\Response
     * @Template("PlatformBundle::menu.html.twig")
     */
    public function menuAction()
    {
        $listAdverts = array(
            array('id' => 2, 'title' => 'Recherche développeur Symfony'),
            array('id' => 5, 'title' => 'Mission de webmaster'),
            array('id' => 9, 'title' => 'Offre de stage webdesigner')
        );
        return array( 'listAdverts' => $listAdverts );
    }

    /**
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     * @Route("/contact", name="oc_platform_contact")
     */
    public function contactAction()
    {
        $this->addFlash('notice', 'La page de contact n’est pas encore disponible, merci de revenir plus tard.');
        return $this->redirectToRoute('home');
    }
}