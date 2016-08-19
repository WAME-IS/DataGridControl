<?php

namespace Wame\DataGridControl\Columns;

use Wame\DataGridControl\BaseGridItem;

class Title extends BaseGridItem
{
    /** {@inheritDoc} */
	public function render($grid) {
		$grid->addColumnText('title', _('Title'))
                ->setSortable('l0.title')
				->setFilterText(['l0.title']);
		
		return $grid;
	}
    
}