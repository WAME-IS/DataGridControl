<?php

namespace Wame\DataGridControl\GroupActions;

use Wame\DataGridControl\BaseGridItem;
use Doctrine\Common\Collections\Criteria;

class ChangeStatusSelected extends BaseGridItem
{
    /** {@inheritDoc} */
	public function render($grid)
    {
        $grid->addGroupAction('Status', $this->getItems())->onSelect[] = [$this, 'changeStatusSelected'];
        
		return $grid;
	}
    
    /**
     * Change status selected callback
     */
    public function changeStatusSelected(array $ids, $status)
    {
        $collection = new \Doctrine\Common\Collections\ArrayCollection($this->getParent()->getEntities());
        $criteria = Criteria::create()->where(Criteria::expr()->in('id', $ids));
        $selectedEntities = $collection->matching($criteria);
        
        foreach($selectedEntities as $entity) {
            $entity->setStatus($status);
        }
        
        if ($this->getParent()->getPresenter()->isAjax()) {
            $this->getParent()->reload();
        } else {
            $this->redirect('this');
        }
    }
    
    /**
     * Get items
     * 
     * @return array
     */
    protected function getItems()
    {
        return [
            1 => _('Enabled'),
            2 => _('Disabled')
        ];
    }
    
}