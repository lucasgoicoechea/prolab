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
// $Id: ITDynamic.php,v 1.1 2004/02/13 15:36:55 farell Exp $

require_once 'HTML/QuickForm/Renderer/ITDynamic.php';
// can use either HTML_Template_Sigma or HTML_Template_ITX
require_once 'HTML/Template/ITX.php';
//require_once 'HTML/Template/Sigma.php';

/**
 * The ActionDisplay class provides a ITDynamic form rendering
 * with template engine IT[x] family.
 *
 * @version    1.1
 * @author     Laurent Laville <pear@laurent-laville.org>
 * @access     public
 * @category   HTML
 * @package    HTML_Progress
 * @license    http://www.php.net/license/3_0.txt  PHP License 3.0
 */

class ActionDisplay extends HTML_QuickForm_Action_Display
{
    function _renderForm(&$page) 
    {
        $pageName = $page->getAttribute('name');
        $tabPreview = array_slice ($page->controller->_tabs, -2, 1);

        // can use either HTML_Template_Sigma or HTML_Template_ITX
        $tpl =& new HTML_Template_ITX('./templates');
        // $tpl =& new HTML_Template_Sigma('./templates');

        $tpl->loadTemplateFile('itdynamic.html');

        // on preview tab, add progress bar javascript and stylesheet
        if ($pageName == $tabPreview[0][0]) {
            $bar = $page->controller->createProgressBar();

            $tpl->setVariable(array(
                'qf_style'  => $bar->getStyle(),
                'qf_script' => $bar->getScript()
                )
            );

            $barElement =& $page->getElement('progressBar');
            $barElement->setText( $bar->toHtml() );
        }

        $renderer =& new HTML_QuickForm_Renderer_ITDynamic($tpl);
        $renderer->setElementBlock(array(
            'buttons'     => 'qf_buttons'
        ));

        $page->accept($renderer);

        $tpl->show();
    }
}
?>