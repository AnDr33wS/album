<?php

namespace Application\Model;

use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;
use Core\Model\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Entidade Album
 *
 * @category Application
 * @package Model
 *          @ORM\Entity
 *          @ORM\Table(name="albuns")
 */
// @ORM\Table(name="albuns") = database do banco
class Album extends Entity {
	
	/**
	 * @ORM\id
	 * @ORM\column(type="integer")
	 */
	protected $id;
	
	/**
	 * @ORM\column(type="string")
	 */
	protected $artist;
	
	/**
	 * @ORM\column(type="string")
	 */
	protected $title;
	public function getId() {
		return $this->$id;
	}
	public function setId($id) {
		$this->id = $id;
	}
	public function getArtist() {
		return $this->$artist;
	}
	public function setArtist($artist) {
		$this->artist = $artist;
	}
	public function getTitle() {
		return $this->$title;
	}
	public function setTitle($title) {
		$this->artist = $artist;
	}
	/**
	 * Configura os filtros dos campos da entidade
	 *
	 * @return Zend\InputFilter\InputFilter
	 */
	public function getInputFilter(){
		if(! $this->inputFilter){
			$inputFilter = new InputFilter();
			$factory = new InputFactory();
			$inputFilter->add ( $factory->createInput (array(
					//filtros para ID no banco
					'name' => 'id',
					'required' => true,
					'filters' => array(
							array(
									'name'=>'Int'
							)
					)
			)));
			$inputFilter->add ($factory->createInput (array(
					'name'=> 'artist',
					'required'=> true,
					'filters' => array(
							array(
									'name'=>'StringTags'
									),
							array(
									'name'=>'StringTrim'
							)
					),
			
					'validators' => array(
							array(
									'name'=>'StringLength',
									'options'=> array(
											'encoding'=>'UTF-8',
											'min' => 1,
											'max' => 100
									)
							)
					)
			)));
			$inputFilter->add ($factory->createInput (array(
					'name'=> 'tile',
					'required'=> true,
					'filters' => array(
							array(
									'name'=>'StringTags'
							),
							array(
									'name'=>'StringTrim'
							)
					),
						
					'validators' => array(
							array(
									'name'=>'StringLength',
									'options'=> array(
											'encoding'=>'UTF-8',
											'min' => 1,
											'max' => 100
									)
							)
					)
			)));		
		}
		return $this->inputFilter;
	}
	
	
	
}

	
	
	
