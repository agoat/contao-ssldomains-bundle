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
 
use Contao\Controller;
use Contao\Environment;
use Contao\Frontend;



class Controller extends Controller
{
	
	// check for SSL and force a secure connection
	public function checkSSL ($strCacheKey)
	{
		$objRootPage = Frontend::getRootPageFromUrl();
		
		// force ssl when root is set to use ssl
		if ($objRootPage->useSSL && !Environment::get('ssl'))
		{
			$strUrl = 'https://' . Environment::get('httpHost') . Environment::get('requestUri');
			
			static::redirect($strUrl, 301);
		}

		return $strCacheKey;
	}
}

