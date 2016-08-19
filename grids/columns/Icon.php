<?php

namespace Wame\DataGridControl\Columns;

use Nette\Utils\Html;
use Wame\DataGridControl\BaseGridItem;

class Icon extends BaseGridItem
{
    /** {@inheritDoc} */
	public function render($grid) {
        $grid->addColumnText('icon', _('Icon'))
                ->setRenderer(function($item) {
                    return Html::el('span')->addAttributes([
                        'class' => 'fa fa-' . $item->icon, 
                        'aria-hidden' => 'true'
                    ]);
                });
		
		return $grid;
	}
    
}