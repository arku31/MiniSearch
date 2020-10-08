<?php

namespace Arku\MiniSearch\Criterias;

interface ProductSearchCriteriaInterface
{
    public function getId(): ?int;

    public function getSearch(): ?string;

    public function getMinPrice(): ?int;

    public function getMaxPrice(): ?int;

    public function setId(int $id): ProductSearchCriteriaInterface;

    public function setSearch(string $search): ProductSearchCriteriaInterface;

    public function setMinPrice(int $minPrice): ProductSearchCriteriaInterface;

    public function setMaxPrice(int $maxPrice): ProductSearchCriteriaInterface;
}