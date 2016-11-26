<?php
 
 /**
 * Contao Open Source CMS - SSL Domains extension
 *
 * Copyright (c) 2016 Arne Stappen (aGoat)
 *
 *
 * @package   ssldomains-bundle
 * @author    Arne Stappen <http://agoat.de>
 * @license	  LGPL-3.0+
 */


 /**
 * Hooks
 */

$GLOBALS['TL_HOOKS']['initializeSystem'][] = array('Agoat\\SSLDomains\\Controller','checkSSL');
