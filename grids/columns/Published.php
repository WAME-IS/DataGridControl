<?php

namespace Wame\DataGridControl\Columns;

use Wame\DataGridControl\BaseGridItem;

class Published extends BaseGridItem
{
    /** {@inheritDoc} */
	public function render($grid) {
		$grid->addColumnDateTime('publishedBy', _('Published by'), 'publishStartDate')
//				->setSortable()
				->setFilterDate();
		
		$grid->addColumnDateTime('publishedAt', _('Published at'), 'publishEndDate')
//				->setSortable()
				->setFilterDate();
		
		return $grid;
	}
    
}