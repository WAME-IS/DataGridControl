<?php

namespace Wame\DataGridControl\Columns;

use Wame\DataGridControl\BaseGridItem;

class Text extends BaseGridItem
{
    /** {@inheritDoc} */
	public function render($grid) {
		$grid->addColumnText('text', _('text'))
                ->setSortable()
				->setFilterText();
                
		return $grid;
	}
    
}