<?php

namespace Wame\DataGridControl\Entities;

use Doctrine\ORM\Mapping as ORM;
use Wame\Core\Entities\BaseEntity;
use Wame\Core\Entities\Columns;

/**
 * @ORM\Table(name="wame_grid")
 * @ORM\Entity
 */
class GridEntity extends BaseEntity
{
	use Columns\Identifier;
	use Columns\Parameters;


	/**
	 * @ORM\Column(name="type", type="string", nullable=false)
	 */
	protected $type;

}