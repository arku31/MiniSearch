<?php

namespace Arku\MiniSearch\Seeds;

interface FakeDataSeederInterface
{
    public function seed(string $url): string;
}