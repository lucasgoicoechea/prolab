<?php
/* $Id: server_variables.php,v 2.4 2004/01/22 02:13:47 rabus Exp $ */
// vim: expandtab sw=4 ts=4 sts=4:


/**
 * Does the common work
 */
require('./server_common.inc.php');


/**
 * Displays the links
 */
require('./server_links.inc.php');


/**
 * Displays the sub-page heading
 */
echo '<h2>' . "\n"
   . '    ' . $strServerVars . "\n"
   . '</h2>' . "\n";


/**
 * Checks if the user is allowed to do what he tries to...
 */
if (!$is_superuser && !$cfg['ShowMysqlVars']) {
    echo $strNoPrivileges;
    require_once('./footer.inc.php');
}


/**
 * Sends the queries and buffers the results
 */
if (PMA_MYSQL_INT_VERSION >= 40003) {
    $res = PMA_DBI_query('SHOW SESSION VARIABLES;');
    while ($row = PMA_DBI_fetch_row($res)) {
        $serverVars[$row[0]] = $row[1];
    }
    PMA_DBI_free_result($res);
    unset($res, $row);
    $res = PMA_DBI_query('SHOW GLOBAL VARIABLES;');
    while ($row = PMA_DBI_fetch_row($res)) {
        $serverVarsGlobal[$row[0]] = $row[1];
    }
    PMA_DBI_free_result($res);
    unset($res, $row);
} else {
    $res = PMA_DBI_query('SHOW VARIABLES;');
    while ($row = PMA_DBI_fetch_row($res)) {
        $serverVars[$row[0]] = $row[1];
    }
    PMA_DBI_free_result($res);
    unset($res, $row);
}
unset($res);
unset($row);


/**
 * Displays the page
 */
?>
<table border="0">
    <tr>
        <th>&nbsp;<?php echo $strVar; ?>&nbsp;</th>
<?php
echo '        <th>&nbsp;';
if (PMA_MYSQL_INT_VERSION >= 40003) {
    echo $strSessionValue . '&nbsp;</th>' . "\n"
       . '        <th>&nbsp;' . $strGlobalValue;
} else {
    echo $strValue;
}
echo '&nbsp;</th>' . "\n";
?>
    </tr>
<?php
$useBgcolorOne = TRUE;
foreach ($serverVars as $name => $value) {
?>
    <tr>
        <td bgcolor="<?php echo $useBgcolorOne ? $cfg['BgcolorOne'] : $cfg['BgcolorTwo']; ?>">
            <?php echo htmlspecialchars(str_replace('_', ' ', $name)) . "\n"; ?>
        </td>
        <td bgcolor="<?php echo $useBgcolorOne ? $cfg['BgcolorOne'] : $cfg['BgcolorTwo']; ?>">
            <?php echo htmlspecialchars($value) . "\n"; ?>
        </td>
<?php
    if (PMA_MYSQL_INT_VERSION >= 40003) {
?>
        <td bgcolor="<?php echo $useBgcolorOne ? $cfg['BgcolorOne'] : $cfg['BgcolorTwo']; ?>">
            <?php echo htmlspecialchars($serverVarsGlobal[$name]) . "\n"; ?>
        </td>
<?php
    }
    $useBgcolorOne = !$useBgcolorOne;
?>
    </tr>
<?php
}
?>
</table>
<?php


/**
 * Sends the footer
 */
require_once('./footer.inc.php');

?>
