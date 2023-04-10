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
use Dotclear\Helper\Html\XmlTag;

class Prepend extends dcNsProcess
{
    public static function init(): bool
    {
        static::$init = defined('DC_RC_PATH');

        return static::$init;
    }

    public static function process(): bool
    {
        if (!static::$init) {
            return false;
        }

        dcCore::app()->rest->addFunction('getNbComments', function (): XmlTag {
            $rsp = new XmlTag();
            $rsp->comments(dcCore::app()->blog->getComments(['no_content' => true], true)->f(0));

            return $rsp;
        });

        return true;
    }
}
