<?php

namespace Wame\DataGridControl\Columns;

use Nette\Utils\Html;
use Wame\DataGridControl\BaseGridItem;
use Wame\Utils\Date;


class EditDate extends BaseGridItem
{
    const COLUMN_EDITDATE = 'editDate';
    
    
    /** {@inheritDoc} */
	public function render($grid)
    {
		$grid->addColumnDateTime(self::COLUMN_EDITDATE, _('Edit date'))
                ->setFormat('d.m.Y H:i')
                ->setRenderer(function($item) {
                    if(is_array($item)) {
                        $date = $item[self::COLUMN_EDITDATE];
                    } else {
                        $date = $item->getEditDate();
                    }
                    
                    return Html::el('div')
                            ->setText(Date::toString($date, 'd.m.Y')) . Html::el('small')
                            ->setText(Date::toString($date, 'H:i:s'));
                })
                ->setTemplateEscaping(false)
                ->setSortable()
                ->setFilterDate();

		return $grid;
	}

}
