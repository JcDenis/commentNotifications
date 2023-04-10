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
declare(strict_types=1);

namespace Dotclear\Plugin\commentNotifications;

use dcCore;
use dcNsProcess;
use dcPage;

class Backend extends dcNsProcess
{
    public static function init(): bool
    {
        static::$init = defined('DC_CONTEXT_ADMIN')
            && dcCore::app()->auth->check(dcCore::app()->auth->makePermissions([
                dcCore::app()->auth::PERMISSION_USAGE,
            ]), dcCore::app()->blog->id);

        return static::$init;
    }

    public static function process(): bool
    {
        if (!static::$init) {
            return false;
        }

        dcCore::app()->addBehavior('adminPageHTMLHead', function (): void {
            echo
            dcPage::jsModuleLoad(My::id() . '/js/backend.js') .
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

        return true;
    }
}
