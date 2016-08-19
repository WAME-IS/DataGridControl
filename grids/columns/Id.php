<?php

namespace Wame\DataGridControl\Columns;

use Wame\DataGridControl\BaseGridItem;

class Id extends BaseGridItem
{
    /** {@inheritDoc} */
	public function render($grid) {
		$grid->addColumnText('id', _('ID'));
		
		return $grid;
	}
    
}