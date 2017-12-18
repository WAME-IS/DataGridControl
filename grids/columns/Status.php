<?php

namespace Wame\DataGridControl\Columns;

use Wame\DataGridControl\BaseGridItem;

class Status extends BaseGridItem
{
    /** @var DataGridControl */
    protected $grid;
    
    
    /** {@inheritDoc} */
	public function render($grid)
    {
        $this->grid = $grid;
        
		$grid->addColumnStatus('status', _('Status'))
				->addOption(1, _('Published'))
					->setIcon('check')
					->setClass('btn-success')
					->endOption()
				->addOption(2, _('Unpublished'))
					->setIcon('close')
					->setClass('btn-danger')
					->endOption()
				->onChange[] = [$this, 'statusChange'];
		
		return $grid;
	}

	
    /**
     * Status change callback
     * 
     * @param integer $id           id
     * @param integer $new_status   new status
     */
	public function statusChange($id, $new_status)
	{
        $entity = $this->getEntityById($id);
        
        $entity->status = $new_status;
        
        if ($this->grid->presenter->isAjax()) {
            $this->grid->redrawItem($id);
        }
	}


    /**
     * Get entity by id
     * 
     * @param integer $id   id
     * @return BaseEntity
     */
    protected function getEntityById($id)
    {
        return $this->grid->getDataModel()->getDataSource()->filterOne(['id' => $id])->getData()[0];
    }
    
}
