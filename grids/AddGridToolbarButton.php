<?php

namespace Wame\DataGridControl;

class AddGridToolbarButton extends \Wame\DataGridControl\BaseGridColumn
{
	public function addColumn($grid)
    {
        $grid->addToolbarButton(":{$grid->presenter->getName()}:create", _('Add item'))
                ->setIcon('fa fa-plus')
                ->setClass('btn btn-success');
                
		return $grid;
	}
}