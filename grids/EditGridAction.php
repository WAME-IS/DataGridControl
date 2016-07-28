<?php

namespace Wame\DataGridControl;

class EditGridAction extends BaseGridColumn
{
	public function addColumn($grid)
	{
		$grid->addAction('edit', '', ":{$grid->presenter->getName()}:edit")
			->setIcon('edit')
			->setTitle(_('Edit'))
			->setClass('btn btn-xs btn-info');
		
		return $grid;
	}
}