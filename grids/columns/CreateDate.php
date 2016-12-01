<?php

namespace Wame\DataGridControl\Columns;

use Nette\Utils\Html;
use Wame\DataGridControl\BaseGridItem;
use Wame\Utils\Date;


class CreateDate extends BaseGridItem
{
    /** {@inheritDoc} */
	public function render($grid)
    {
		$grid->addColumnDateTime('createDate', _('Created'))
                ->setFormat('d.m.Y H:i')
                ->setRenderer(function($user) {
                    $date = $user->getCreateDate();

                    return Html::el('div')->setText(Date::toString($date, 'd.m.Y')) . Html::el('small')->setText(Date::toString($date, 'H:i:s'));
                })
                ->setTemplateEscaping(false)
                ->setSortable()
                ->setFilterDate();

		return $grid;
	}

}
