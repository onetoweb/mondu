<?php

namespace Onetoweb\Mondu;

/**
 * Webhook Authenticater.
 */
class WebhookAuthenticater
{
    const TRUSTED_SANDBOX_IPS = [
        '3.67.101.172',
        '3.69.55.142',
        '3.72.30.70'
    ];
    
    const TRUSTED_PRODUCTION_IPS = [
        '3.68.36.187',
        '3.127.195.5',
        '18.194.230.169'
    ];
    
    /**
     * @param string $secret
     */
    public function __construct(
        
        #[\SensitiveParameter]
        private string $secret,
        private bool $sandbox = false
    ) {
        
    }
    
    /**
     * @param string $content
     * @param string $hash
     * @param string $remoteAddress
     * 
     * @return bool
     */
    public function authenticate(string $content, string $hash = null, string $remoteAddress = null): bool
    {
        if ($hash === null or $remoteAddress === null) {
            return false;
        }
        
        if ($this->sandbox) {
            
            if (!in_array($remoteAddress, self::TRUSTED_SANDBOX_IPS)) {
                return false;
            }
            
        }  else {
            
            if (!in_array($remoteAddress, self::TRUSTED_PRODUCTION_IPS)) {
                return false;
            }
        }
        
        $key = hash_hmac('sha256', $content, $this->secret);
        
        return ($key == $hash);
    }
}