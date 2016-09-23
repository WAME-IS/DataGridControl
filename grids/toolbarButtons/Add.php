<?php

namespace Wame\DataGridControl\ToolbarButtons;

use Wame\DataGridControl\BaseGridItem;

class Add extends BaseGridItem
{
    /** @var string */
    protected $class = 'btn btn-success';
    
    /** @var string */
    protected $icon = 'fa fa-plus';
    
    /** @var string */
    private $link;
    
    /** @var string */
    private $title;
    
    
    /** set **********************************************************************/


    public function setClass($class)
    {
        $this->class = $class;
        
        return $this;
    }


    public function setIcon($icon)
    {
        $this->icon = $icon;
        
        return $this;
    }


    public function setLink($link)
    {
        $this->link = $link;
        
        return $this;
    }
    
    
    public function setTitle($title)
    {
        $this->title = $title;
        
        return $this;
    }
    
    
    /** get **********************************************************************/

    
    private function getClass()
    {
        return $this->class;
    }
    
    
    private function getIcon()
    {
        return $this->icon;
    }
    
    
    private function getLink($grid)
    {
        if ($this->link) {
            return $this->link;
        } else {
            return ":{$grid->presenter->getName()}:create";
        }
    }
    
    
    private function getTitle()
    {
        if ($this->title) {
            return $this->title;
        } else {
            return _('Add');
        }
    }

    
    /** render **********************************************************************/


    /** {@inheritDoc} */
	public function render($grid)
    {
        $grid->addToolbarButton($this->getLink($grid), $this->getTitle())
                ->setIcon($this->getIcon())
                ->setClass($this->getClass());
                
		return $grid;
	}
    
}