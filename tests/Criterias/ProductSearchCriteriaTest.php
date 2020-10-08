<?php

declare(strict_types=1);

namespace Arku\MiniSearch\Tests\Criterias;

use Arku\MiniSearch\Criterias\ProductSearchCriteria;
use PHPUnit\Framework\TestCase;

final class ProductSearchCriteriaTest extends TestCase
{
    public function testCriteriaSetId(): void
    {
        $criteria = new ProductSearchCriteria();
        $criteria->setId(1);
        $this->assertEquals(1, $criteria->getId());
    }

    public function testCriteriaSetSearch(): void
    {
        $criteria = new ProductSearchCriteria();
        $criteria->setSearch('test');
        $this->assertEquals('test', $criteria->getSearch());
    }

    public function testCriteriaMinPrice(): void
    {
        $criteria = new ProductSearchCriteria();
        $criteria->setMinPrice(10);
        $this->assertEquals(10, $criteria->getMinPrice());
    }

    public function testCriteriaSetMaxPrice(): void
    {
        $criteria = new ProductSearchCriteria();
        $criteria->setMaxPrice(20);
        $this->assertEquals(20, $criteria->getMaxPrice());
    }
}