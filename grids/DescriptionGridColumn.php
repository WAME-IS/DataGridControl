<?php

namespace Wame\DataGridControl;

use Nette\Utils\Html;


class DescriptionGridColumn extends BaseGridColumn
{
	public function addColumn($grid) 
	{
		$grid->addColumnText('description', _('Description'))
				->setRenderer(function($item) {
					return Html::el('small')->setText($item->langs[$this->lang]->description);
				});
		
		return $grid;
	}

}