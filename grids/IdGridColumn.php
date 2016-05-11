<?php

namespace Wame\DataGridControl;

class IdGridColumn extends BaseGridColumn
{
	public function addColumn($grid) {
		$grid->addColumnText('id', 'ID');
		
		return $grid;
	}
}