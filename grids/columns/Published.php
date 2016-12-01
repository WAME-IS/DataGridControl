<?php

namespace Wame\DataGridControl\Columns;

use Nette\Utils\Html;
use Wame\DataGridControl\BaseGridItem;
use Wame\Utils\Date;


class Published extends BaseGridItem
{
    /** {@inheritDoc} */
	public function render($grid)
    {
		$grid->addColumnDateTime('publishedBy', _('Published by'), 'publishStartDate')
                ->setFormat('d.m.Y H:i')
                ->setRenderer(function($user) {
                    $date = $user->getPublishStartDate();

                    return Html::el('div')->setText(Date::toString($date, 'd.m.Y')) . Html::el('small')->setText(Date::toString($date, 'H:i:s'));
                })
                ->setTemplateEscaping(false)
				->setSortable()
				->setFilterDate();


		$grid->addColumnDateTime('publishedAt', _('Published at'), 'publishEndDate')
                ->setFormat('d.m.Y H:i')
                ->setRenderer(function($user) {
                    $date = $user->getPublishEndDate();

                    return Html::el('div')->setText(Date::toString($date, 'd.m.Y')) . Html::el('small')->setText(Date::toString($date, 'H:i:s'));
                })
                ->setTemplateEscaping(false)
				->setSortable()
				->setFilterDate();

		return $grid;
	}

}
