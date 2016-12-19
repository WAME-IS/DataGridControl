<?php

namespace Wame\DataGridControl\Columns;

use Wame\DataGridControl\BaseGridItem;

class EditUser extends BaseGridItem
{
    /** {@inheritDoc} */
	public function render($grid) {
		$grid->addColumnText('editeUser', _('Edit user'), 'editUser.fullName')
				->setFilterText();
//				->setSortable();
		
		return $grid;
	}
    
}