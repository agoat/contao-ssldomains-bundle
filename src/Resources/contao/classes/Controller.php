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



class Controller extends Controller
{
	
	// check for SSL and force a secure connection
	public function checkSSL ()
	{
		if (!Environment::get('ssl'))
		{
			$host = Environment::get('host');
		
			// The language is set in the URL
			if (\Config::get('addLanguageToUrl') && \Input::get('language'))
			{
				$objRootPage = \PageModel::findFirstPublishedRootByHostAndLanguage($host, \Input::get('language'));
			}
			else
			{
				$objRootPage = \PageModel::findFirstPublishedRootByHostAndLanguage($host, Environment::get('httpAcceptLanguage'));
			}
			
			// No matching root page found
			if ($objRootPage !== null)
			{
				// force ssl when root is set to use ssl
				if ($objRootPage->useSSL)
				{
					$strUrl = 'https://' . Environment::get('httpHost') . Environment::get('requestUri');
					
					static::redirect($strUrl, 301);
				}
			}
		}
	}
}

