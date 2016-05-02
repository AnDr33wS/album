<?php

/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */
namespace Application\Controller;

use Core\Controller\ActionController;
use Zend\View\Model\ViewModel;
use Doctrine\ORM\EntityManager;
use Application\Model\Album;
use Application\Form\Album as AlbumForm;

class IndexController extends ActionController {
	/**
	 *
	 * @var Doctrine\ORM\EntityManager
	 */
	protected $em;
	public function setEntityManager(EntityManager $em) {
		$this->em = $em;
	}
	public function getEntityManager() {
		if (null === $this->em) {
			$this->em = $this->getServiceLocator ()->get ( 'Doctrine\ORM\EntityManager' );
		}
		return $this->em;
	}
	public function indexAction() {
		$albuns = $this->getEntityManager ()->getRepository ( 'Application\Model\Album' )->findAll ();
		return new ViewModel ( array (
				'albuns' => $albuns 
		) );
	}
}
// 	public function listarAction() {
// 		$em = $this->getServiceLocator ()->get ( "Doctrine\ORM\EntityManager" );
// 		$lista = $em->getRepository ( "Application\Model\Album" )->findAll ();
// 		return new ViewModel ( array (
// 				'lista' => $lista 
// 		) );
// 	}
// 	public function excluirAction() {
// 		$id = $this->params ()->fromRoute ( "id", 0 );
// 		$em = $this->getServiceLocator ()->get ( "Doctrine\ORM\EntityManager" );
// 		$album = $em->find ( "Application\Model\Album", $id );
// 		$em->remove ( $album );
// 		$em->flush ();
		
// 		return $this->redirect ()->toRoute ( 'application/default', array (
// 				'controller' => 'index',
// 				'action' => 'listar' 
// 		) );
// 	}
// 	public function editarAction() {
// 		$id = $this->params ()->fromRoute ( "id", 0 );
// 		$em = $this->getServiceLocator ()->get ( "Doctrine\ORM\EntityManager" );
		
// 		$album = $em->find ( "Application\Model\Album", $id );
// 		$request = $this->getRequest ();
// 		if ($request->isAlbum ()) {
// 			try {
// 				$album = $request->getPost ( "album" );
// 				$title = $request->getPost ( "title" );
				
// 				$album->setAlbum ( $Album );
// 				$album->setTitle ( $title );
				
// 				$em = $this->getServiceLocator ()->get ( "Doctrine\ORM\EntityManager" );
// 				$em->merge ( $album );
// 				$em->flush ();
// 			} catch ( Exception $e ) {
// 			}
			
// 			return $this->redirect ()->toRoute ( 'application/default', array (
// 					'controller' => 'index',
// 					'action' => 'listar' 
// 			) );
// 		}
		
// 		return new ViewModel ( array (
// 				'f' => $album 
// 		) );
//	}
// }

	
	
// 	public function getEntityManager() {
// 		if (null === $this->em) {
// 			$this->em = $this->getServiceLocator ()->get ( 'Doctrine\ORM\EntityManager' );
// 		}
// 		return $this->em;
// 	}
// 	public function indexAction() {
// 		$album = $this->getEntityManager ()->getRepository ( 'Application\Model\Album' )->findAll ();
// 		return new ViewModel ( array (
// 				'album' => $album 
// 		) );
// 	}
// 	public function saveAction() {
// 		$form = new AlbumForm ();
// 		$request = $this->getRequest ();
// 		if ($request->isAlbum ()) {
// 			$album = new Album ();
// 			$form->setInputFilter ( $album->getInpitFilter () );
// 			$form_setData ( $request->getAlbum () );
// 			if ($form->isValid ()) {
// 				$data = $form->getData ();
// 				if (isset ( $data ['id'] ) && $data > 0) {
// 					$album = $this->getEntityManager ()->find ( 'Application\Model\Album', $data ['id'] );
// 				}
// 				unset ( $data ['submit'] );
// 				$Album->setData ( $data );
// 				$this->getEntityManager ()->persist ( $album );
// 				$this->getEntityManager ()->flush ();
// 				return $this->redirect ()->toUrl ( '/application' );
// 			}
// 		} else {
// 			$id = ( int ) $this->params ()->fromRoute ( 'id', 0 );
// 			if ($id > 0) {
// 				$album = $this->getEntityManager ()->find ( 'Application\Model\Album', $id );
// 				$form->bind ( $album );
// 				$form->get ( 'submit' )->setAttribute ( 'value', 'Edit' );
// 			}
// 		}
// 	}
// 	public function deleteAction() {
// 		$id = ( int ) $this->params ()->fromRoute ( 'id', 0 );
// 		if ($id == 0) {
// 			throw new \exception ( "Código obrigatório" );
// 		}
// 		$album = $this->getEntityManager ()->find ( 'Application\Model\Album', $id );
// 		if ($album) {
// 			$this->getEntityManager ()->remove ( $album );
// 			$this->getEntityManager ()->flush ();
// 		}
// 		return $this->redirect ()->toUrl ( '/application' );
// 	}  