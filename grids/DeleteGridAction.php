<?php

namespace Wame\DataGridControl;

class DeleteGridAction extends BaseGridColumn
{
	public function addColumn($grid) {
		$grid->addAction('delete', '', ":{$grid->parent->presenterName}:delete")
			->setIcon('trash')
			->setTitle('Delete')
			->setClass('btn btn-xs btn-danger ajax');
		
		return $grid;
	}
}