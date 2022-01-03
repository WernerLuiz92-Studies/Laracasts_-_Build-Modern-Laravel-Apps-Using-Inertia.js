<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceResponse;

class NavbarLinks extends Controller
{
    public function index(Request $request)
    {
        return response(json_encode([
            'key' => [
                [
                    [
                        'title' => 'Dashboard',
                        'route' => 'dashboard',
                    ],
                    [
                        'title' => 'Grupos',
                        'route' => 'localgroups',
                    ],
                    [
                        'title' => 'Controle de Acesso',
                        'route' => 'access.control',
                    ],
                    [
                        'title' => 'Firewall',
                        'route' => 'firewall',
                    ],
                    [
                        'title' => 'VPN Empresarial',
                        'route' => 'vpns',
                    ],
                    [
                        'title' => 'Relatórios',
                        'route' => 'reports',
                    ]
                ]
            ],
            'more' => [
                [
                    [
                        'title' => 'Velocidade',
                        'route' => 'traffic_control',
                    ],
                ],
                [
                    [
                        'title' => 'Redes',
                        'route' => 'networks',
                    ],
                    [
                        'title' => 'Equipamentos',
                        'route' => 'clientips',
                    ],
                    [
                        'title' => 'Usuários',
                        'route' => 'users',
                    ],
                ],
                [
                    [
                        'title' => 'Registros DNS locais',
                        'route' => 'custom_dns_record',
                    ],
                    [
                        'title' => 'Compatibilidade AD',
                        'route' => 'conditional_forwarding_dns',
                    ],
                    [
                        'title' => 'Endereços MAC liberados',
                        'route' => 'ignored_macs',
                    ],
                ],
            ],
            'user' => [
                [
                    [
                        'title' => 'Dados de cliente',
                        'route' => 'settings',
                    ],
                    [
                        'title' => 'Preferências',
                        'route' => 'settings',
                    ],
                    [
                        'title' => 'Log de atividades',
                        'route' => 'settings',
                    ],
                ],
                [
                    [
                        'title' => 'Meus dados',
                        'route' => 'settings',
                    ],
                    [
                        'title' => 'Alterar senha',
                        'route' => 'settings',
                    ],
                    [
                        'title' => 'Excluir conta',
                        'route' => 'settings',
                    ],
                ],
                [
                    [
                        'title' => 'Sair',
                        'route' => 'logout',
                        'method' => 'POST',
                    ],
                ],
            ],
        ]));
    }
}