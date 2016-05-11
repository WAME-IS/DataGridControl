<?php

namespace Wame\DataGridControl;

class CreateGridColumn extends BaseGridColumn
{
	public function addColumn($grid) {
		$grid->addColumnDateTime('create', 'Created', 'createDate');
		
		return $grid;
	}
}