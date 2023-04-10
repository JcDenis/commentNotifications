<?php
/**
 * @brief commentNotifications, a plugin for Dotclear 2
 *
 * @package Dotclear
 * @subpackage Plugin
 *
 * @author Tomtom and Contributors
 *
 * @copyright Jean-Christian Denis
 * @copyright GPL-2.0 https://www.gnu.org/licenses/gpl-2.0.html
 */
if (!defined('DC_RC_PATH')) {
    return null;
}

$this->registerModule(
    'commentNotifications',
    'Displays notifications on menu and dashboard when new comments arrive',
    'Tomtom and Contributors',
    '0.5-dev',
    [
        'requires'    => [['core', '2.26']],
        'permissions' => dcCore::app()->auth->makePermissions([
            dcAuth::PERMISSION_USAGE,
        ]),
        'type'       => 'plugin',
        'support'    => 'https://github.com/JcDenis/commentNotifications',
        'details'    => 'https://plugins.dotaddict.org/dc2/details/commentNotifications',
        'repository' => 'https://raw.githubusercontent.com/JcDenis/commentNotifications/master/',
    ]
);
