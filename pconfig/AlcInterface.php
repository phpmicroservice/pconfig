<?php

namespace pconfig;

/**
 *
 */
interface AlcInterface
{
   
    /**
     * Checks whether a user is allowed to access an resource.
     *
     * @param string $resourceName Resource name.
     * @return bool
     */
    public function isAllowedAccess($resource);
}
