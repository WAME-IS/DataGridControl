<?php

namespace Wame\DataGridControl;

use Wame\DataGridControl\BaseGridColumn;

class TitleLinkGridColumn extends BaseGridColumn
{
	public function addColumn($grid) {
		$grid->addColumnLink('title', 'Title', ":{$grid->parent->presenterName}:show", 'title')
//				->setSortable()
				->setRenderer(function($item) {
					return $item->langs[$this->lang]->title;
				});
		
		return $grid;
	}
}