<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function version(Request $request)
    {
        return parent::version($request);
    }

    /**
     * Defines the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function share(Request $request)
    {
        $users = [
            [
                'id' => 1,
                'name' => 'Werner Luiz Gottschalt',
                'email' => 'werner@lumiun.com',
                'avatar' => 'https://secure.gravatar.com/avatar/' . md5(strtolower(trim('werner@lumiun.com'))) . '.png?s=32&r=pg&d=404',
            ],
            [
                'id' => 2,
                'name' => 'John Doe',
                'email' => 'john.doe@gmail.com',
                'avatar' => 'https://secure.gravatar.com/avatar/' . md5(strtolower(trim('john.doe@gmail.com'))) . '.png?s=32&r=pg&d=404',
            ],
            [
                'id' => 3,
                'name' => 'Amanda Terra',
                'email' => 'amanda@lumiun.com',
                'avatar' => 'https://secure.gravatar.com/avatar/' . md5(strtolower(trim('amanda@lumiun.com'))) . '.png?s=32&r=pg&d=404',
            ],
        ];

        return array_merge(parent::share($request), [
            'auth' => [
                'user' => $users[rand(0, count($users) - 1)],
                'client' => [
                    'id' => 1,
                    'name' => 'Amme - Organização Social Associação Mantenedora De Mães Especiais',
                    'logo' => '',
                ],
            ],
        ]);
    }
}