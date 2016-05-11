<?php

namespace Wame\DataGridControl;

use Nette\Utils\Arrays;

class ColumnSorter
{
	
	private function createColumns($services)
	{
		$columns = [];
		
		foreach($services as $service) {
			$column = $service->addColumn();
			$columns[$column->name] = $service->addColumn();
		}
		
		return $colums;
	}
	
}