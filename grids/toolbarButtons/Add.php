<?php

namespace Wame\DataGridControl\ToolbarButtons;

use Wame\DataGridControl\BaseGridItem;

class Add extends BaseGridItem
{
    const SMALL_MODAL = 'sm';
    const MEDIUM_MODAL = null;
    const LARGE_MODAL = 'lg';
    
    const FIXED_MODAL = true;
    const NO_FIXED_MODAL = false;
    
    
    /** @var string */
    protected $class = 'btn btn-success';
    
    /** @var string */
    protected $icon = 'fa fa-plus';
    
    /** @var boolean */
    protected $isAjaxModal = false;
    
    /** @var string */
    protected $ajaxModalType = null;
    
    /** @var boolean */
    protected $ajaxModalFixed = false;
    
    /** @var string */
    private $link;
    
    /** @var array */
    private $linkParams = [];
    
    /** @var string */
    private $title;
    
    
    /** set *******************************************************************/

    
    /**
     * Set button class
     * 
     * @param string $class
     * @return \Wame\DataGridControl\ToolbarButtons\Add
     */
    public function setClass($class)
    {
        $this->class = $class;
        
        return $this;
    }

    /**
     * Set button icon
     * 
     * @param string $icon
     * @return \Wame\DataGridControl\ToolbarButtons\Add
     */
    public function setIcon($icon)
    {
        $this->icon = $icon;
        
        return $this;
    }

    /**
     * Set button link
     * 
     * @param string $link
     * @return \Wame\DataGridControl\ToolbarButtons\Add
     */
    public function setLink($link, $params = [])
    {
        $this->link = $link;
        $this->linkParams = $params;
        
        return $this;
    }
    
    /**
     * Set button title
     * 
     * @param string $title
     * @return \Wame\DataGridControl\ToolbarButtons\Add
     */
    public function setTitle($title)
    {
        $this->title = $title;
        
        return $this;
    }
    
    /**
     * Open link in modal
     * 
     * @param string $type - sm - small modal, lg - large modal, null - normal modal
     * @param boolean $fixed - true - fixed header
     * @return \Wame\DataGridControl\ToolbarButtons\Add
     */
    public function isAjaxModal($type = null, $fixed = false)
    {
        $this->isAjaxModal = true;
        
        $this->ajaxModalType = $type;
        $this->ajaxModalFixed = $fixed;
        
        return $this;
    }
    
    
    /** get *******************************************************************/

    
    private function getClass()
    {
        $class = $this->class;
        
        if ($this->isAjaxModal) { 
            $class .= ' ajax-modal';
            
            if ($this->ajaxModalType) { $class .= ' ajax-modal-' . $this->ajaxModalType; }
            if ($this->ajaxModalFixed) { $class .= ' ajax-modal-fixed'; }
        }
        
        return $class;
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
    
    
    private function getLinkParams()
    {
        return $this->linkParams;
    }
    
    
    private function getTitle()
    {
        if ($this->title) {
            return $this->title;
        } else {
            return _('Add');
        }
    }

    
    /** render ****************************************************************/


    /** {@inheritDoc} */
	public function render($grid)
    {
        $grid->addToolbarButton($this->getLink($grid), $this->getTitle(), $this->getLinkParams())
                ->setIcon($this->getIcon())
                ->setClass($this->getClass());
                
		return $grid;
	}
    
}