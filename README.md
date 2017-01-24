# Contao SSL Domains extension
Contao 4 bundle

Redirects to ssl (https) when the website root is set to 'Use HTTPS'  

*This little extension is needed as long as the contao/core-bundle do not use the Symofony CMF router 
(see https://github.com/contao/core-bundle/issues/443)*
___

###Install

Add to app/AppKernel.php (after ContaoCoreBundle)
```
new Agoat\SSLDomainsBundle\AgoatSSLDomainsBundle(),
```
