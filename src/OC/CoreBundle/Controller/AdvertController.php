<?php


namespace OC\CoreBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AdvertController extends Controller
{
    /**
     * @return array
     * @Route("/", name="oc_platform_home")
     * @Template("CoreBundle::index.html.twig")
     */
    public function indexAction()
    {
        $listAdverts = array(
            array(
                'title'   => 'Recherche développpeur Symfony',
                'id'      => 1,
                'author'  => 'Alexandre',
                'content' => 'Nous recherchons un développeur Symfony débutant sur Lyon. Blabla…',
                'date'    => new \Datetime()),
            array(
                'title'   => 'Mission de webmaster',
                'id'      => 2,
                'author'  => 'Hugo',
                'content' => 'Nous recherchons un webmaster capable de maintenir notre site internet. Blabla…',
                'date'    => new \Datetime()),
            array(
                'title'   => 'Offre de stage webdesigner',
                'id'      => 3,
                'author'  => 'Mathieu',
                'content' => 'Nous proposons un poste pour webdesigner. Blabla…',
                'date'    => new \Datetime())
        );

        return array('listAdverts' => $listAdverts);
    }

    /**
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/advert/{id}", name="oc_platform_view", requirements={"id": "\d+"})
     * @Template("CoreBundle::view.html.twig")
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
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @Route("/add", name="oc_platform_add")
     * @Template("CoreBundle::add.html.twig")
     */
    public function addAction()
    {
        $this->addFlash('notice', 'Annonce bien enregistrée.');
        return $this->redirect('oc_platform_view');
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @Route("/edit/{id}", name="oc_platform_edit", requirements={"id": "\d+"})
     * @Template("CoreBundle::edit.html.twig")
     */
    public function editAction()
    {
        $this->addFlash('notice', 'Annonce bien modifiée.');
        $advert = array(
            'title'   => 'Recherche développpeur Symfony',
            'id'      => $id,
            'author'  => 'Alexandre',
            "content" => "Nous recherchons un développeur Symfony débutant sur Lyon. Blabla…",
            'date'    => new \Datetime()
        );

        return $this->redirect('oc_platform_view', array('advert' => $advert));
    }

    /**
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/delete/{id}", name="oc_platform_delete", requirements={"id": "\d+"})
     * @Template("CoreBundle::delete.html.twig")
     */
    public function deleteAction($id)
    {
        return array('id' => $id);
    }

    /**
     * @param $limit
     * @return \Symfony\Component\HttpFoundation\Response
     * @Template("CoreBundle::menu.html.twig")
     */
    public function menuAction()
    {
        $listAdverts = array(
            array('id' => 2, 'title' => 'Recherche développeur Symfony'),
            array('id' => 5, 'title' => 'Mission de webmaster'),
            array('id' => 9, 'title' => 'Offre de stage webdesigner')
        );

        return array('listAdverts' => $listAdverts);
    }
}