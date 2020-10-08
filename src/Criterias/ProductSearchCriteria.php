<?php

declare(strict_types=1);

namespace Arku\MiniSearch\Criterias;

final class ProductSearchCriteria implements ProductSearchCriteriaInterface
{
    private ?int $id = null;
    private ?string $search = null;
    private ?int $minPrice = null;
    private ?int $maxPrice = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSearch(): ?string
    {
        return $this->search;
    }

    public function getMinPrice(): ?int
    {
        return $this->minPrice;
    }

    public function getMaxPrice(): ?int
    {
        return $this->maxPrice;
    }

    public function setId(int $id): ProductSearchCriteriaInterface
    {
        $this->id = $id;
        return $this;
    }

    public function setSearch(string $search): ProductSearchCriteriaInterface
    {
        $this->search = $search;
        return $this;
    }

    public function setMinPrice(int $minPrice): ProductSearchCriteriaInterface
    {
        $this->minPrice = $minPrice;
        return $this;
    }

    public function setMaxPrice(int $maxPrice): ProductSearchCriteriaInterface
    {
        $this->maxPrice = $maxPrice;
        return $this;
    }
}