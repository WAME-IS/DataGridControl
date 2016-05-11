<?php

namespace Wame\DataGridControl;

class CreatorGridColumn extends BaseGridColumn
{
	public function addColumn($grid) {
		$grid->addColumnText('creator', 'Creator', 'createUser.fullName');
		
		return $grid;
	}
}