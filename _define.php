<?php
/**
 * @brief commentNotifications, a plugin for Dotclear 2
 *
 * @package Dotclear
 * @subpackage Plugin
 *
 * @author Tomtom (http://blog.zenstyle.fr/)
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
    'Tomtom (http://blog.zenstyle.fr/)',
    '0.4',
    [
        'requires'    => [['core', '2.24']],
        'permissions' => dcCore::app()->auth->makePermissions([
            dcAuth::PERMISSION_USAGE,
        ]),
        'type'       => 'plugin',
        'support'    => 'https://github.com/JcDenis/commentNotifications',
        'details'    => 'https://plugins.dotaddict.org/dc2/details/commentNotifications',
        'repository' => 'https://raw.githubusercontent.com/JcDenis/commentNotifications/master/',
    ]
);
