<?php

namespace App\Factory;

use App\Entity\Comic;
use Zenstruck\Foundry\Persistence\PersistentProxyObjectFactory;

/**
 * @extends PersistentProxyObjectFactory<Comic>
 */
final class ComicFactory extends PersistentProxyObjectFactory
{
    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services
     *
     * @todo inject services if required
     */
    public function __construct()
    {
    }

    public static function class(): string
    {
        return Comic::class;
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    protected function defaults(): array|callable
    {
        return [
            'author' => AuthorFactory::random(),
            'genres' => GenreFactory::randomRange(1, 3),
            'isBlackAndWhite' => self::faker()->boolean(),
            'name' => self::faker()->name(255),
            'type' => self::faker()->word(255),
            'releasedAt' => self::faker()->dateTimeBetween('-10 years', 'now'),
            'nbPage' => self::faker()->numberBetween(20, 150),
            'price' => self::faker()->numberBetween(5, 50),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): static
    {
        return $this
            // ->afterInstantiate(function(Comic $comic): void {})
        ;
    }
}
