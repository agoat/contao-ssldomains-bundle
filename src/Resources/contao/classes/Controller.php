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
 
use Contao\Environment;


class Controller extends \Contao\Controller
{
	
	// check for SSL and force a secure connection
	public function checkSSL ()
	{
		if (!Environment::get('ssl'))
		{
			// The language is set in the URL
			if (\Config::get('addLanguageToUrl') && \Input::get('language'))
			{
				$objRootPage = \PageModel::findFirstPublishedRootByHostAndLanguage(Environment::get('host'), \Input::get('language'));
			}
			else
			{
				$objRootPage = \PageModel::findFirstPublishedRootByHostAndLanguage(Environment::get('host'), Environment::get('httpAcceptLanguage'));
			}

			// No matching root page found
			if ($objRootPage !== null)
			{
				// force ssl when root is set to use ssl
				if ($objRootPage->useSSL && $objRootPage->dns != '')
				{
					$strUrl = 'https://' . Environment::get('httpHost') . Environment::get('requestUri');
					
					static::redirect($strUrl, 301);
				}
			}
		}
	}
}

