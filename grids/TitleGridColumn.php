<?php

namespace Wame\DataGridControl;

class TitleGridColumn extends BaseGridColumn
{
	public function addColumn($grid) {
		$grid->addColumnText('title', 'Title')
//				->setSortable()
				->setRenderer(function($item) {
					return $item->langs[$this->lang]->title;
				});
		
		return $grid;
	}
}