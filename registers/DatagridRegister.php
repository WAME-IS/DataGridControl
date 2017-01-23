<?php

namespace Wame\DataGridControl\Registers;

use Wame\Core\Registers\PriorityRegister;
use Wame\DataGridControl\BaseGridItem;

class DatagridRegister extends PriorityRegister
{
    public function __construct()
    {
        parent::__construct(BaseGridItem::class);
    }
    
}
