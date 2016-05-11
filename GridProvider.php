<?php

namespace Wame\DataGridControl;

class GridProvider
{
	/** @var array */
	private $columns = [];
	
	
//	/** @var ColumnSorder */
//	private $columnSorter;
	
	
	public function __construct(/*ColumnSorter $columnSoter*/) {
//		$this->columnSorter = $columnSorter;
	}
	
	
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
		
//		foreach($grid->columns as $column) {
//			dump($column);
//			$column->setDefaultHide(true);
//		}
		
		
		
//		return $this->columnSorter->sort($this->services);
		return $grid;
	}
	
}