<?php

namespace Wame\DataGridControl;

use Wame\DataGridControl\BaseGridColumn;

class NameGridColumn extends BaseGridColumn
{
	public function addColumn($grid) {
		$grid->addColumnText('name', _('Name'))
                ->setSortable()
				->setFilterText();
                
		return $grid;
	}
    
}