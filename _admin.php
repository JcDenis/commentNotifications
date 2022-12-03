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
if (!defined('DC_CONTEXT_ADMIN')) {
    return null;
}

dcCore::app()->addBehavior('adminPageHTMLHead', function () {
    echo
    dcPage::jsLoad(dcPage::getPF('commentNotifications/_admin.js')) .
    '<script type="text/javascript">' . "\n" .
    "//<![CDATA[\n" .
    dcPage::jsVar('notificator.nb_comments', dcCore::app()->blog->getComments([], true)->f(0)) .
    dcPage::jsVar('notificator.reload_nb_comments', (preg_match('/' . preg_quote(dcCore::app()->adminurl->get('admin.comments')) . '(.*)?/', $_SERVER['REQUEST_URI']) ? 'true' : 'false')) .
    dcPage::jsVar('notificator.msg.comment', __('comment')) .
    dcPage::jsVar('notificator.msg.comments', __('comments')) .
    dcPage::jsVar('notificator.msg.recent', __('new')) .
    dcPage::jsVar('notificator.msg.recents', __('news')) .
    "\n//]]>\n" .
    "</script>\n";
});
