<?php

namespace Wame\DataGridControl;

class StatusGridColumn extends BaseGridColumn
{
	private $items;
	
	public function addColumn($grid) {
		$this->items = $this->getItems($grid);
		
		$grid->addColumnStatus('status', 'Status')
				->setTemplate(__DIR__ . './../templates/column_status.latte')
				->addOption(1, 'Published')
					->setIcon('check')
					->setClass('btn-success')
					->endOption()
				->addOption(2, 'Unpublished')
					->setIcon('close')
					->setClass('btn-danger')
					->endOption()
				->onChange[] = [$this, 'statusChange'];
		
		return $grid;
	}
	
	public function statusChange($id, $new_status)
	{
		$item = $this->items[$id];
		$item->status = $new_status;
	}
}