<?php

namespace Wame\DataGridControl\Columns;

use Wame\DataGridControl\BaseGridItem;

class Name extends BaseGridItem
{
    /** {@inheritDoc} */
	public function render($grid) {
		$grid->addColumnText('name', _('Name'))
                ->setSortable()
				->setFilterText();
                
		return $grid;
	}
    
}