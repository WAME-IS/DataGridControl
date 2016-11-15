<?php

namespace Wame\DataGridControl\Actions;

use Wame\DataGridControl\BaseGridItem;

class Delete extends BaseGridItem
{
    /** {@inheritDoc} */
	public function render($grid)
    {
		$grid->addAction('delete', '', ":{$grid->getRoute()}:delete")
			->setIcon('trash')
			->setTitle(_('Delete'))
			->setClass('btn btn-xs btn-danger ajax-modal');
		
		return $grid;
	}
    
}