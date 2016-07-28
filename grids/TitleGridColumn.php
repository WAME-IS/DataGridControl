<?php

namespace Wame\DataGridControl;

class TitleGridColumn extends BaseGridColumn
{
	public function addColumn($grid) {
		$grid->addColumnText('title', _('Title'))
                ->setSortable('l0.title')
				->setFilterText(['l0.title']);
		
		return $grid;
	}
}