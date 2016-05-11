<?php

namespace Wame\DataGridControl\Repositories;

use Wame\DataGridControl\Entities\GridEntity;
use Wame\UserModule\Entities\UserEntity;
use Wame\Core\Exception\RepositoryException;

class GridRepository extends \Wame\Core\Repositories\BaseRepository
{
	/** @var UserEntity */
	private $userEntity;
	
	public function __construct(
		\Nette\DI\Container $container, 
		\Kdyby\Doctrine\EntityManager $entityManager, 
		\h4kuna\Gettext\GettextSetup $translator, 
		\Nette\Security\User $user
	) {
		parent::__construct($container, $entityManager, $translator, $user, GridEntity::CLASS);
		
		$this->userEntity = $this->entityManager->getRepository(UserEntity::class)->findOneBy(['id' => $user->id]);
	}
	
}