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


namespace Agoat\SSLDomains;
 
use Contao\System;
use Contao\Controller;
use Contao\Environment;



class Controller extends Controller
{

	// add frontend stylesheets to backend
	public function checkSSL ($objPage, $objLayout, $_this)
	{
		// force ssl when root is set to use ssl
		if ($objPage->rootUseSSL && !Environment::get('ssl'))
		{
			$strUrl = 'https://' . Environment::get('httpHost') . Environment::get('requestUri');
			
			static::redirect($strUrl, 301);
		}
	}
}

