<?php

namespace Wame\DataGridControl\Columns;

use Wame\DataGridControl\BaseGridItem;

class TextLinkShow extends BaseGridItem
{
    /** {@inheritDoc} */
	public function render($grid)
    {
		$grid->addColumnLink('text', _('Text'), ":{$grid->getRoute()}:show", 'text');
		
		return $grid;
	}
    
}