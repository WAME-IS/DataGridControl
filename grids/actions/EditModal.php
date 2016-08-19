<?php

namespace Wame\DataGridControl\Actions;

use Wame\DataGridControl\BaseGridItem;

class EditModal extends BaseGridItem
{
    /** {@inheritDoc} */
	public function render($grid)
	{
		$grid->addAction('edit', '', ":{$grid->presenter->getName()}:edit")
			->setIcon('edit')
			->setTitle(_('Edit'))
			->setClass('btn btn-xs btn-info ajax-modal');
		
		return $grid;
	}
    
}