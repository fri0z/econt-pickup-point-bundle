<?php

declare(strict_types=1);

namespace Answear\EcontBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('answear_econt');

        $treeBuilder->getRootNode()
            ->children()
                ->scalarNode('user')->cannotBeEmpty()->end()
                ->scalarNode('password')->cannotBeEmpty()->end()
            ->end();

        return $treeBuilder;
    }
}
