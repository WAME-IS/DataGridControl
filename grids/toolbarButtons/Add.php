<?php

namespace Wame\DataGridControl\ToolbarButtons;

use Wame\DataGridControl\BaseGridItem;

class Add extends BaseGridItem
{
    /** {@inheritDoc} */
	public function render($grid)
    {
        $grid->addToolbarButton(":{$grid->presenter->getName()}:create", _('Add'))
                ->setIcon('fa fa-plus')
                ->setClass('btn btn-success');
                
		return $grid;
	}
    
}