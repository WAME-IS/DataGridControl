<?php

namespace Wame\DataGridControl\Columns;

use Nette\Utils\Html;
use Wame\DataGridControl\BaseGridItem;


class Url extends BaseGridItem
{
    /** {@inheritDoc} */
	public function render($grid)
    {
		$grid->addColumnText('url', _('Url'))
                ->setRenderer(function($item) {
                    if ($item->getUrl()) {
                        return Html::el('a')->setHref($item->getUrl())->setAttribute('target', '_blank')->setText($item->getUrl());
                    } else {
                        return '-';
                    }
                });
		
		return $grid;
	}

}
