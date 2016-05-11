<?php

namespace Wame\DataGridControl;

class TitleGridColumn extends BaseGridColumn
{
	public function addColumn($grid) {
		$grid->addColumnText('title', 'Title')
				->setRenderer(function($item) {
					return $item->langs[$this->lang]->title;
				});
		
		return $grid;
	}
}