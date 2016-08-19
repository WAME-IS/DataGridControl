<?php

namespace Wame\DataGridControl\Columns;

use Nette\Utils\Html;
use Wame\DataGridControl\BaseGridItem;

class Description extends BaseGridItem
{
    /** {@inheritDoc} */
	public function render($grid) 
	{
		$grid->addColumnText('description', _('Description'))
				->setRenderer(function($item) {
					return Html::el('small')->setText($item->description);
				});
		
		return $grid;
	}

}