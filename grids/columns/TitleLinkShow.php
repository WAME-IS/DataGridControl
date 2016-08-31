<?php

namespace Wame\DataGridControl\Columns;

use Wame\DataGridControl\BaseGridItem;

class TitleLinkShow extends BaseGridItem
{
    /** {@inheritDoc} */
	public function render($grid) {
		$grid->addColumnLink('title', _('Title'), ":{$grid->presenter->getName()}:show", 'title')
                ->setSortable('l0.title')
				->setFilterText(['l0.title']);
		
		return $grid;
	}
    
}