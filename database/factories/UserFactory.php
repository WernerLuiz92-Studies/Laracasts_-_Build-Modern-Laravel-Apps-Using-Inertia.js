<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'stripe_token' => Str::random(10),
            'is_admin' => $this->faker->boolean(),
            'roles' => implode('|', $this->faker->randomElements(['root', 'client', 'internet', 'marketing', 'ad', 'demo'], 3)),
            'features' => implode('|', $this->faker->randomElements([
                'access_control_categories',
                'report_realtime',
                'reports',
                'level_security',
                'custom_blocked_page',
                'access_control_sites',
                'access_by_time',
                'access_control',
                'report_topsites',
                'report_topsites_blocked',
                'report_topcategories',
                'reports_by_email',
                'help_desk',
                'lookup',
                'report_access_period',
                'report_archive',
                'localgroup',
                'client_ips',
                'client_users',
                'custom_dns_record',
                'report_traffic_volume',
                'report_traffic_speed',
                'conditional_forwarding_dns',
                'speed_limit_by_group',
                'wireless',
                'safe_search',
                'chat',
                'firewall',
                'harmful',
                'reports2',
                'report_security',
                'report_admin',
                'vpn',
                'vpn_time',
                'vpn_direct',
                'ignore_macs',
                'access_control_v2'
            ], 3)),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}