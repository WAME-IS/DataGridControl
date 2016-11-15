<?php

namespace Wame\DataGridControl\Actions;

use Wame\DataGridControl\BaseGridItem;

class Edit extends BaseGridItem
{
    /** {@inheritDoc} */
	public function render($grid)
	{
		$grid->addAction('edit', '', ":{$grid->getRoute()}:edit")
			->setIcon('edit')
			->setTitle(_('Edit'))
			->setClass('btn btn-xs btn-info');
		
		return $grid;
	}
    
}