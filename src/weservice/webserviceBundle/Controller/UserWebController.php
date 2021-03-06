<?php

namespace weservice\webserviceBundle\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use weservice\webserviceBundle\Entity\UserWeb;
use weservice\webserviceBundle\Form\UserWebType;

/**
 * UserWeb controller.
 *
 */
class UserWebController extends Controller
{

    /**
     * Lists all UserWeb entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('weservicewebserviceBundle:UserWeb')->findAll();

        return $this->render('weservicewebserviceBundle:UserWeb:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new UserWeb entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new UserWeb();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('userweb_show', array('id' => $entity->getId())));
        }

        return $this->render('weservicewebserviceBundle:UserWeb:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a UserWeb entity.
     *
     * @param UserWeb $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(UserWeb $entity)
    {
        $form = $this->createForm(new UserWebType(), $entity, array(
            'action' => $this->generateUrl('userweb_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new UserWeb entity.
     *
     */
    public function newAction()
    {
        $entity = new UserWeb();
        $form   = $this->createCreateForm($entity);

        return $this->render('weservicewebserviceBundle:UserWeb:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a UserWeb entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('weservicewebserviceBundle:UserWeb')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find UserWeb entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('weservicewebserviceBundle:UserWeb:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing UserWeb entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('weservicewebserviceBundle:UserWeb')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find UserWeb entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('weservicewebserviceBundle:UserWeb:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a UserWeb entity.
    *
    * @param UserWeb $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(UserWeb $entity)
    {
        $form = $this->createForm(new UserWebType(), $entity, array(
            'action' => $this->generateUrl('userweb_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing UserWeb entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('weservicewebserviceBundle:UserWeb')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find UserWeb entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('userweb_edit', array('id' => $id)));
        }

        return $this->render('weservicewebserviceBundle:UserWeb:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a UserWeb entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('weservicewebserviceBundle:UserWeb')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find UserWeb entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('userweb'));
    }

    public function getByNameAction(Request $request, $name)
    {
        $em = $this->getDoctrine()->getEntityManager();

        //$data = $em->getRepository('weservicewebserviceBundle:UserWeb')->findAll();

        $nome  = 'marcio.ramos';
        $senha = '1234567';

        $data = $em->createQuery('SELECT p FROM weservicewebserviceBundle:UserWeb p
                                  WHERE p.senha = :senha
                                  AND p.nome = :nome')
                    ->setParameter('nome',$nome)
                    ->setParameter('senha',$senha)
                   ->setMaxResults(1)
                   ->getResult();

        if($request->isXmlHttpRequest()){
            return new JsonResponse(array(array('geterror'=>'Ahh manolo')));
        }

       return $this->render('weservicewebserviceBundle:UserWeb:getbyname.html.twig', array(
            'data' => $data));

    }

    private function getUserDataBase(Request $request)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $nome  = $request->get('name');
        $senha = $request->get('password');

        $data = $em->createQuery('SELECT p FROM weservicewebserviceBundle:UserWeb p
                                  WHERE p.senha = :senha
                                  AND p.nome = :nome')
            ->setParameter('nome',$nome)
            ->setParameter('senha',$senha)
            ->setMaxResults(1)
            ->getResult();

        if(count($data) == 0){
            return false;
        }else{
            return true;
        }


    }


    public function loginAction()
    {
        return $this->render('weservicewebserviceBundle:UserWeb:login.html.twig');
    }

    public function doLoginAction(Request $request)
    {

        if($this->getUserDataBase($request)) {

            $dados = $this->get('validation.login')->getValidationLogin($request);

            $jsonResponse = new JsonResponse();
            $jsonResponse->headers->set('wetoken',sha1(date('Y-m-d')));

            $jsonResponse->setData($dados);

            return $jsonResponse;
        }else {

            /* if(('' == $request->get('name')) || ('' == $request->get('password')) ){

                 $dados = array(
                     array('geterror'=>'usuário ou senha não informado'));

             }else{

                 $token = $this->get('generate.token')->generateNewToken();
                 $dataExperies = $this->get('date.expiries')->getDataExpiries();

                 $dados = array(
                     array('nome'=>$request->get('name'),
                         'senha'=>$request->get('password'),
                         'wetoken'=>$token,
                         'dataExperies'=>$dataExperies,
                         'geterror'=>'not errors foud'));
             }*/

           return new JsonResponse(array(array('geterror' => 'User not found')));
        }

    }

    /**
     * Creates a form to delete a UserWeb entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('userweb_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
