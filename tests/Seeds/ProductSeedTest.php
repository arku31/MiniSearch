<?php

declare(strict_types=1);

namespace Arku\MiniSearch\Tests\Seeds;

use Arku\MiniSearch\Seeds\FakeDataSeeder;
use PHPUnit\Framework\TestCase;

final class ProductSeedTest extends TestCase
{
    public function testId(): void
    {
        $seeder = new FakeDataSeeder();
        $data = $seeder->seed('/products?id=111');
        $this->assertEquals(111, json_decode($data, true)['items'][0]['id']);
    }

    public function testMinPrice(): void
    {
        $seeder = new FakeDataSeeder();
        $data = $seeder->seed('/products?minPrice=5');
        $this->assertGreaterThan(5, json_decode($data, true)['items'][0]['price']);
    }

    public function testMaxPrice(): void
    {
        $seeder = new FakeDataSeeder();
        $data = $seeder->seed('/products?maxPrice=5');
        $this->assertLessThan(5, json_decode($data, true)['items'][0]['price']);
    }

    public function testSearch(): void
    {
        $this->markTestIncomplete('Search not supported yet');
        $seeder = new FakeDataSeeder();
        $data = $seeder->seed('/products?search=test');
        $this->assertContains('test', json_decode($data, true)['items'][0]['name']);
    }

}