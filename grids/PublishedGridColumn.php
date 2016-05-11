<?php

namespace Wame\DataGridControl;

class PublishedGridColumn extends BaseGridColumn
{
	public function addColumn($grid) {
		$grid->addColumnDateTime('publishedBy', 'Published by', 'publishStartDate');
		
		$grid->addColumnDateTime('publishedAt', 'Published at', 'publishEndDate');
		
		return $grid;
	}
}