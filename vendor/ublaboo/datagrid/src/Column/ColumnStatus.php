<?php

namespace Wame\Vendor\Ublaboo\Datagrid\Column;

use Ublaboo\DataGrid\DataGrid;
use Ublaboo\DataGrid\Column\ColumnStatus as UblabooColumnStatus;
use Wame\DataGridControl\AdminDataGridControl;


class ColumnStatus extends UblabooColumnStatus
{
	/**
	 * @param DataGrid $grid
	 * @param string   $key
	 * @param string   $column
	 * @param string   $name
	 */
    public function __construct(DataGrid $grid, $key, $column, $name)
	{
		parent::__construct($grid, $key, $column, $name);

		$this->setTemplate(AdminDataGridControl::TEMPLATE_PATH . 'column_status.latte');
    }

}
