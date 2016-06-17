<?php

namespace Wame\DataGridControl;

class CreatorGridColumn extends BaseGridColumn
{
	public function addColumn($grid) {
		$grid->addColumnText('creator', _('Creator'), 'createUser.fullName')
				->setFilterText();
//				->setSortable();
		
		return $grid;
	}
}