<?php

namespace Wame\DataGridControl\Columns;

use Wame\DataGridControl\BaseGridItem;

class CreateUser extends BaseGridItem
{
    /** {@inheritDoc} */
	public function render($grid) {
		$grid->addColumnText('createUser', _('Create user'), 'createUser.fullName')
				->setFilterText();
//				->setSortable();
		
		return $grid;
	}
    
}