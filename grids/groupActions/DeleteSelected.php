<?php

namespace Wame\DataGridControl\GroupActions;

use Wame\DataGridControl\BaseGridItem;

class DeleteSelected extends BaseGridItem
{
    /** {@inheritDoc} */
	public function render($grid)
    {
        $grid->addGroupAction('Delete')->onSelect[] = [$this, 'deleteSelected'];
        
		return $grid;
	}
    
    /**
     * Delete selected callback
     */
    public function deleteSelected(array $ids)
    {
        $this->delete($ids);
        
        if ($this->getParent()->getPresenter()->isAjax()) {
            $this->getParent()->reload();
        } else {
            $this->redirect('this');
        }
    }
    
    private function delete(array $ids)
    {
        $collection = new \Doctrine\Common\Collections\ArrayCollection($this->getParent()->getEntities());
        $criteria = Criteria::create()->where(Criteria::expr()->in('id', $ids));
        $selectedEntities = $collection->matching($criteria);
        
        foreach($selectedEntities as $entity) {
            $entity->setStatus(0);
        }
    }
    
}