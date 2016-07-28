<?php

namespace Wame\DataGridControl;

class ShowGridAction extends BaseGridColumn
{
	public function addColumn($grid)
	{
		$grid->addAction('show', '', ":{$grid->presenter->getName()}:show")
			->setIcon('eye')
			->setTitle(_('Show'))
			->setClass('btn btn-xs btn-default');
		
		return $grid;
	}
}