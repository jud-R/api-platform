<?php

namespace App\DataProvider;

use Ramsey\Uuid\Uuid;
use App\Entity\Dependency;
use ApiPlatform\Core\DataProvider\RestrictedDataProviderInterface;
use Doctrine\Migrations\Tools\Console\Exception\DependenciesNotSatisfied;
use ApiPlatform\Core\DataProvider\ContextAwareCollectionDataProviderInterface;
use ApiPlatform\Core\DataProvider\ItemDataProviderInterface;
use App\Repository\DependencyRepository;

class DependencyDataProvider implements ContextAwareCollectionDataProviderInterface,
RestrictedDataProviderInterface, ItemDataProviderInterface
{

    public function __construct(private DependencyRepository $dependencyRepository){}

    public function supports(string $resourceClass, ?string $operationName = null, array $context = []): bool
    {
        return $resourceClass === Dependency::class;
    }

    public function getItem(string $resourceClass, $id, ?string $operationName = null, array $context = [])
    {
        return $this->dependencyRepository->find($id);
    }

    public function getCollection(string $resourceClass, ?string $operationName = null, array $context = [])
    {
        return $this->dependencyRepository->findAll();
    }
}