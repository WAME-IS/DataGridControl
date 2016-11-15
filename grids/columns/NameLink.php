<?php

namespace Wame\DataGridControl\Columns;

use Wame\DataGridControl\BaseGridColumn;

class NameLinkShowGridColumn extends BaseGridColumn
{
	public function addColumn($grid) {
		$grid->addColumnLink('name', 'Name', ":{$grid->getRoute()}:show");
		
		return $grid;
	}
}