<?php

namespace Wame\DataGridControl\GroupActions;

use Wame\DataGridControl\BaseGridItem;

class DeleteSelected extends BaseGridItem
{
    /** @var DataGridControl */
    private $grid;
    
    
    /** {@inheritDoc} */
	public function render($grid) {
        $this->grid;
        
        $grid->addGroupAction('Delete selected')->onSelect[] = [$this, 'deleteSelected'];
        
		return $grid;
	}
    
    /**
     * Delete selected callback
     */
    public function deleteSelected()
    {
        // delete
        
        if ($this->isAjax()) {
            $this->grid->reload();
        } else {
            $this->redirect('this');
        }
    }
    
}