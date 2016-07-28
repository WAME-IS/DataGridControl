<?php

namespace Wame\DataGridControl;

class DeleteGridAction extends BaseGridColumn
{
	public function addColumn($grid) {
		$grid->addAction('delete', '', ":{$grid->presenter->getName()}:delete")
			->setIcon('trash')
			->setTitle(_('Delete'))
			->setClass('btn btn-xs btn-danger ajax-modal');
		
		return $grid;
	}
}