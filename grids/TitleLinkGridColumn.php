<?php

namespace Wame\DataGridControl;

use Wame\DataGridControl\BaseGridColumn;

class TitleLinkGridColumn extends BaseGridColumn
{
	public function addColumn($grid) {
		$grid->addColumnLink('title', _('Title'), ":{$grid->presenter->getName()}:show", 'title')
                ->setSortable('l0.title')
				->setFilterText(['l0.title']);
//				->setRenderer(function($item) {
//					return $item->title;
//				});
		
		return $grid;
	}
}