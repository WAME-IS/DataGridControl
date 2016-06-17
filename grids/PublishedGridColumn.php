<?php

namespace Wame\DataGridControl;

class PublishedGridColumn extends BaseGridColumn
{
	public function addColumn($grid) {
		$grid->addColumnDateTime('publishedBy', _('Published by'), 'publishStartDate')
//				->setSortable()
				->setFilterDate();
		
		$grid->addColumnDateTime('publishedAt', _('Published at'), 'publishEndDate')
//				->setSortable()
				->setFilterDate();
		
		return $grid;
	}
    
}