<?php

namespace JGI\BillogramBundle\DependencyInjection;

use Billogram\Api;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

class JGIBillogramExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');

        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $container->setParameter('billogram.id', $config['id']);
        $container->setParameter('billogram.password', $config['password']);
        $container->setParameter('billogram.url', Api::API_URL_BASE);

        if ($config['sandbox']) {
            $container->setParameter('billogram.id', $config['sandbox_id']);
            $container->setParameter('billogram.password', $config['sandbox_password']);
            $container->setParameter('billogram.url', 'https://sandbox.billogram.com/api/v2');
        }
    }
}
