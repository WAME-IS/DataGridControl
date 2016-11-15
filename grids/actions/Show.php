<?php

namespace Wame\DataGridControl\Actions;

use Wame\DataGridControl\BaseGridItem;

class Show extends BaseGridItem
{
    /** {@inheritDoc} */
	public function render($grid)
	{
		$grid->addAction('show', '', ":{$grid->getRoute()}:show")
			->setIcon('eye')
			->setTitle(_('Show'))
			->setClass('btn btn-xs btn-default');
		
		return $grid;
	}
    
}