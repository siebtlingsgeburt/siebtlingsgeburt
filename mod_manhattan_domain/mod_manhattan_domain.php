<?php

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Helper\ModuleHelper;

// Require the module helper file
require_once __DIR__ . '/helper.php';


try {
    // Get a new ModManhattanDomainHelper instance
    $helper = new ModManhattanDomainHelper;

    // Setup joomla cache
    $cache = Factory::getCache('mod_manhattan_domain');
    if ($lifeTime = (int)$params->get('api_cache_time', 60)) {
        $cache->setCaching(true);
        $cache->setLifeTime($lifeTime);
    }

    // Get the data
    $data = $cache->call([$helper, 'getData'], $params);

    // Get the Layout
    require ModuleHelper::getLayoutPath('mod_manhattan_domain', $params->get('layout', 'table'));

} catch (Exception $e) {
    if (Factory::getConfig()->get('debug', '0') === '1') {
        Factory::getApplication()->enqueueMessage($e->getMessage(), 'error');
    }
}



