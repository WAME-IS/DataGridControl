<?php

namespace Wame\DataGridControl;

class TitleGridColumn extends BaseGridColumn
{
	public function addColumn($grid) {
		$grid->addColumnText('title', _('Title'))
//				->setSortable()
				->setRenderer(function($item) {
					return $item->langs[$this->lang]->title;
				})
				->setFilterText();
		
		return $grid;
	}
}