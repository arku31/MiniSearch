<?php

declare(strict_types=1);

namespace Arku\MiniSearch\Seeds;

use Faker\Factory;
use Faker\Generator;

final class FakeDataSeeder implements FakeDataSeederInterface
{
    private Generator $faker;

    public function __construct()
    {
        $this->faker = $faker = Factory::create();
    }

    public function seed(string $url): string //@TODO add search
    {
        $urlAsArray = parse_url($url)['query'] ?? '';
        parse_str($urlAsArray, $urlAsArray);

        $minPrice = isset($urlAsArray['minPrice']) ? intval($urlAsArray['minPrice']) : null;
        $maxPrice = isset($urlAsArray['maxPrice']) ? intval($urlAsArray['maxPrice']) : null;

        if (isset($urlAsArray['id'])) {
            $items[] = $this->getOneItem(intval($urlAsArray['id']), $minPrice, $maxPrice);
        } else {
            for ($i = 1; $i < 100; $i++) {
                $items[] = $this->getOneItem($i, $minPrice, $maxPrice);
            }
        }

        return json_encode(['items' => $items ?? []]);
    }

    private function getOneItem(int $id, ?int $minPrice, ?int $maxPrice): array
    {
        return [
            'id' => $id,
            'name' => $this->faker->text(100),
            'price' => $this->faker->randomFloat(2, $minPrice, $maxPrice),
        ];
    }
}