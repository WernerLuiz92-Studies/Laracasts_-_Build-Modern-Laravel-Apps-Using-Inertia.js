<?php

use App\Models\User;

if (!function_exists('checkUserHasAccess')) {
    /**
     * Verifica se o usuário tem permissão para acessar determinada feature
     * 
     * @param string $roles
     * @param string $features
     * @param \App\Models\User $user
     * @param bool $ignoreAdmin
     * 
     * @return bool
     */
    function checkUserHasAccess(array $roles, array $features, \App\Models\User $user, bool $adminIgnore = false): bool
    {
        if (!$user or empty($roles) or empty($features)) {
            return false;
        }

        if (!$user->isAdmin() or $adminIgnore) {
            if (!$user->hasRoles($roles)) {
                return false;
            }
        }

        if ($features) {
            if (!$user->hasFeatures($features)) {
                return false;
            }
        }

        return true;
    }
}