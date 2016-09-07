<?php
 
 /**
 * Contao Open Source CMS - SSL Domain extension
 *
 * Copyright (c) 2016 Arne Stappen (aGoat)
 *
 *
 * @package   ssldomain-bundle
 * @author    Arne Stappen <http://agoat.de>
 * @license	  LGPL-3.0+
 */


 /**
 * Hooks
 */

$GLOBALS['TL_HOOKS']['getPageLayout'][] = array('Agoat\\SSLDomain\\Controller','checkSSL');

