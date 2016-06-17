<?php

namespace Wame\DataGridControl;

class CreateGridColumn extends BaseGridColumn
{
	public function addColumn($grid) {
		$grid->addColumnDateTime('create', _('Created'), 'createDate')
				->setFilterDate();
		
		return $grid;
	}
}