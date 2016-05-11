<?php

namespace Wame\DataGridControl\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="wame_grid")
 * @ORM\Entity
 */
class GridEntity extends \Wame\Core\Entities\BaseEntity 
{
	use \Wame\Core\Entities\Columns\Identifier;
	use \Wame\Core\Entities\Columns\Parameters;
	
	/**
	 * @ORM\Column(name="type", type="string", nullable=false)
	 */
	protected $type;
}