<?php

namespace Wame\DataGridControl\Columns;

use Nette\Utils\Html;
use Wame\DataGridControl\BaseGridItem;
use Wame\Utils\Date;


class CreateDate extends BaseGridItem
{
    const COLUMN_CREATEDATE = 'createDate';
    
    
    /** {@inheritDoc} */
	public function render($grid)
    {
		$grid->addColumnDateTime(self::COLUMN_CREATEDATE, _('Create date'))
                ->setFormat('d.m.Y H:i')
                ->setRenderer(function($item) {
                    if(is_array($item)) {
                        $date = $item[self::COLUMN_CREATEDATE];
                    } else {
                        $date = $item->getCreateDate();
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
