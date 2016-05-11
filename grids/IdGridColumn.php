<?php

namespace Wame\DataGridControl;

//interface IIdGridColumn
//{
//	/** @return IdGridColumn */
//	public function create();
//}

class IdGridColumn extends BaseGridColumn
{
	public function addColumn($grid) {
		$grid->addColumnText('id', 'ID');
		
		return $grid;
	}
}