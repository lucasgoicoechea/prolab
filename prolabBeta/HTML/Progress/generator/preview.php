<?php
// +----------------------------------------------------------------------+
// | PHP Version 4                                                        |
// +----------------------------------------------------------------------+
// | Copyright (c) 1997-2004 The PHP Group                                |
// +----------------------------------------------------------------------+
// | This source file is subject to version 3.0 of the PHP license,       |
// | that is bundled with this package in the file LICENSE, and is        |
// | available at through the world-wide-web at                           |
// | http://www.php.net/license/3_0.txt.                                  |
// | If you did not receive a copy of the PHP license and are unable to   |
// | obtain it through the world-wide-web, please send a note to          |
// | license@php.net so we can mail you a copy immediately.               |
// +----------------------------------------------------------------------+
// | Author: Laurent Laville <pear@laurent-laville.org>                   |
// +----------------------------------------------------------------------+
//
// $Id: preview.php,v 1.1 2004/02/13 15:38:08 farell Exp $

/**
 * The ActionPreview class provides a live demonstration
 * of the progress bar built by HTML_Progress_Generator.
 *
 * @version    1.1
 * @author     Laurent Laville <pear@laurent-laville.org>
 * @access     public
 * @category   HTML
 * @package    HTML_Progress
 * @license    http://www.php.net/license/3_0.txt  PHP License 3.0
 */

class ActionPreview extends HTML_QuickForm_Action
{
    function perform(&$page, $actionName)
    {
        // like in Action_Next
        $page->isFormBuilt() or $page->buildForm();
        $page->handle('display');

        $strings = $page->controller->exportValue('page4','strings');
        $bar = $page->controller->createProgressBar();

        do {
            $percent = $bar->getPercentComplete();
            if ($bar->isStringPainted()) {
                if (substr($strings, -1) == ";") {
                    $str = explode(";", $strings);
                } else {
                    $str = explode(";", $strings.";");
                }
                for ($i=0; $i<count($str)-1; $i++) {
                    list ($p, $s) = explode(",", $str[$i]);
                    if ($percent == floatval($p)/100) {
                        $bar->setString(trim($s));
                    }
                }
            }
            $bar->display();
            if ($percent == 1) {
                break;   // the progress bar has reached 100%
            }
            $bar->incValue();
        } while(1);
    }
}
?>