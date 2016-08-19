<?php

namespace Wame\DataGridControl\Columns;

use Wame\DataGridControl\BaseGridItem;

class Parameters extends BaseGridItem
{
	/** {@inheritDoc} */
	public function render($grid)
	{
		$grid->addColumnText('parameters', _('Parameters'))
				->setRenderer(function($item) {
					return $item->parameters ? json_encode($item) : null;
				});
		
		return $grid;
	}
	
}