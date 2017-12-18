<?php

namespace Wame\DataGridControl\Columns;

use Wame\DataGridControl\BaseGridItem;


class NameLinkShowGridColumn extends BaseGridItem
{
    /** {@inheritDoc} */
	public function render($grid)
    {
		$grid->addColumnLink('name', _('Name'), ":{$grid->getRoute()}:show");
		
		return $grid;
	}

}
