<?php

namespace Wame\DataGridControl\Repositories;

use Wame\Core\Repositories\BaseRepository;
use Wame\DataGridControl\Entities\GridEntity;

class GridRepository extends BaseRepository
{
	public function __construct()
    {
		parent::__construct(GridEntity::CLASS);
	}
	
}