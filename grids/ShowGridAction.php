<?php

namespace Wame\DataGridControl;

class ShowGridAction extends BaseGridColumn
{
	public function addColumn($grid)
	{
		$grid->addAction('show', '', ":{$grid->parent->presenterName}:show")
			->setIcon('eye')
			->setTitle(_('Show'))
			->setClass('btn btn-xs btn-default ajax');
		
		return $grid;
	}
}