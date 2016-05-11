<?php

namespace Wame\DataGridControl;

class PublishedGridColumn extends BaseGridColumn
{
	public function addColumn($grid) {
		$grid->addColumnDateTime('publishedBy', 'Published by', 'publishStartDate');
//				->setSortable();
		
		$grid->addColumnDateTime('publishedAt', 'Published at', 'publishEndDate');
//				->setSortable();
		
		return $grid;
	}
}