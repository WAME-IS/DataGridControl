<?php

namespace Wame\DataGridControl;

class StatusGridColumn extends BaseGridColumn
{
	private $items;
	
	public function addColumn($grid) {
		$this->items = $this->getItems($grid);
		
		$grid->addColumnStatus('status', _('Status'))
				->setTemplate(__DIR__ . '/../templates/column_status.latte')
				->addOption(1, _('Published'))
					->setIcon('check')
					->setClass('btn-success')
					->endOption()
				->addOption(2, _('Unpublished'))
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