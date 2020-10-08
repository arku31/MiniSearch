<?php

namespace Arku\MiniSearch\Models;

interface ProductModelInterface
{
    public function getId(): int;
    public function getName(): string;
    public function getPrice(): int;
    public function toArray(): array;
}