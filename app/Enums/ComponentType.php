<?php

namespace App\Enums;

enum ComponentType
{
    const BLADE = 'Blade';
    const ROTOR = 'Rotor';
    const HUB = 'Hub';
    const GENERATOR = 'Generator';

    /**
     * Get all component types.
     *
     * @return array<string>
     */
    public static function all(): array
    {
        return [
            self::BLADE,
            self::ROTOR,
            self::HUB,
            self::GENERATOR,
        ];
    }
}
