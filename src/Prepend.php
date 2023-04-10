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

Clearbricks::lib()->autoload(['commentNotificationsRestMethods' => __DIR__ . '/_services.php']);

dcCore::app()->rest->addFunction('getNbComments', ['commentNotificationsRestMethods','getNbComments']);
