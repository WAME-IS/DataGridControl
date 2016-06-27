<?php

namespace Wame\DataGridControl;

class GridProvider
{
	/** @var array */
	private $columns = [];
	
	
	public function addColumn($column)
	{
		$this->columns[] = $column;
		
		return $this;
	}
	
	/**
	 * Get columns from services
	 * 
	 */
	public function getColumns($grid)
	{
		foreach($this->columns as $column)
		{
			$column->addColumn($grid);
		}
        
		return $grid;
	}
	
}