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
//@ORM\Table(name="albuns") = database do banco

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
	
	
	
	
	
}