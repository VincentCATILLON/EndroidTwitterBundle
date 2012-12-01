<?php

namespace Endroid\Bundle\TwitterBundle\DependencyInjection;

use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;

class EndroidTwitterExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $container->setParameter('endroid.twitter.consumer_key', $config['consumer_key']);
        $container->setParameter('endroid.twitter.consumer_secret', $config['consumer_secret']);
        $container->setParameter('endroid.twitter.access_token', $config['access_token']);
        $container->setParameter('endroid.twitter.access_token_secret', $config['access_token_secret']);
        $container->setParameter('endroid.twitter.api_url', $config['api_url']);

        $loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');
    }
}
