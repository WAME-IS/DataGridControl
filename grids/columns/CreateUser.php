<?php

namespace Wame\DataGridControl\Columns;

use Wame\DataGridControl\BaseGridItem;

class CreateUser extends BaseGridItem
{
    /** {@inheritDoc} */
	public function render($grid) {
		$grid->addColumnText('creator', _('Creator'), 'createUser.fullName')
				->setFilterText();
//				->setSortable();
		
		return $grid;
	}
    
}