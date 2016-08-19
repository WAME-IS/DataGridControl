<?php

namespace Wame\DataGridControl\Columns;

use Wame\DataGridControl\BaseGridItem;

class CreateDate extends BaseGridItem
{
    /** {@inheritDoc} */
	public function render($grid) {
		$grid->addColumnDateTime('createDate', _('Created'))
				->setFilterDate();
		
		return $grid;
	}
    
}