<?php

namespace Wame\DataGridControl\Columns;

use Wame\DataGridControl\BaseGridItem;


class Slug extends BaseGridItem
{
    /** {@inheritDoc} */
	public function render($grid)
    {
		$grid->addColumnText('slug', _('Slug'))
                ->setSortable()
				->setFilterText();
                
		return $grid;
	}
    
}
