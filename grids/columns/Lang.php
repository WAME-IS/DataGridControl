<?php

namespace Wame\DataGridControl\Columns;

use Wame\DataGridControl\BaseGridItem;


class Lang extends BaseGridItem
{
	/** {@inheritDoc} */
	public function render($grid)
    {
		$grid->addColumnText('lang', _('Lang'))
                ->setSortable()
				->setFilterText();
                
		return $grid;
	}
    
}
