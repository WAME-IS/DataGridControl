<?php

namespace Wame\DataGridControl\Columns;

use Wame\DataGridControl\BaseGridItem;

class Value extends BaseGridItem
{
	/** {@inheritDoc} */
	public function render($grid)
	{
		$grid->addColumnText('value', 'Value');
		
		return $grid;
	}
    
}