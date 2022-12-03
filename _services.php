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
if (defined('DC_CONTEXT_ADMIN')) {
    return;
}

class commentNotificationsRestMethods
{
    public static function getNbComments()
    {
        $rsp = new xmlTag();
        $rsp->comments(dcCore::app()->blog->getComments(['no_content' => true], true)->f(0));

        return $rsp;
    }
}
