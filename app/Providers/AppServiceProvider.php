<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\User;
use App\Observers\UserObserver;
use Livewire\Livewire;

use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Failed;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Http;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // User::observe(UserObserver::class);
    }

    /**
     * Bootstrap any application services.
     */

    // public function handle(Login|Failed $event) {
    public function boot(): void
    {
        Event::listen([Login::class, Failed::class], function ($event) {
            $ip = request()->ip();
            $userAgent = request()->userAgent();
// dd($event->user['email']);

// dd($event->attributes['email']);
            // Obtener datos geográficos
            $geoData = $this->getGeoData($ip);

            DB::table('login_histories')->insert([
                'user_id' => $event->user->id ?? null,
                'email_attempted' => $event->credentials['email'] ?? $event->user['email'],

                // Datos de red
                'ip_address' => $ip,
                'country' => $geoData['country'] ?? null,
                'city' => $geoData['city'] ?? null,
                'region' => $geoData['region'] ?? null,
                'is_vpn' => $geoData['is_vpn'] ?? false,

                // Datos del dispositivo
                'user_agent' => $userAgent,
                'device_type' => $this->getDeviceType($userAgent),
                'platform' => $this->getPlatform($userAgent),
                'browser' => $this->getBrowser($userAgent),
                'browser_version' => $this->getBrowserVersion($userAgent),

                // Contexto de autenticación
                'login_successful' => $event instanceof Login,
                'failure_reason' => $event instanceof Failed ? 'wrong_password' : null,
                'auth_method' => 'password',

                // Timestamps
                'login_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),

                // Evaluación de riesgo
                'suspicious_activity' => $this->evaluateRisk($event, $ip, $geoData),
                'risk_score' => $this->calculateRiskScore($event, $ip, $geoData),
            ]);
        });
    }

    private function getDeviceType($userAgent)
    {
        $userAgent = strtolower($userAgent);

        if (preg_match('/(mobile|android|iphone|ipod|blackberry|webos)/i', $userAgent)) {
            return 'mobile';
        } elseif (preg_match('/(tablet|ipad|playbook|kindle)/i', $userAgent)) {
            return 'tablet';
        }
        return 'desktop';
    }

    private function getPlatform($userAgent)
    {
        $userAgent = strtolower($userAgent);

        if (preg_match('/windows/i', $userAgent)) return 'Windows';
        if (preg_match('/mac os|x|macintosh/i', $userAgent)) return 'macOS';
        if (preg_match('/linux/i', $userAgent)) return 'Linux';
        if (preg_match('/android/i', $userAgent)) return 'Android';
        if (preg_match('/iphone|ipad/i', $userAgent)) return 'iOS';
        if (preg_match('/cros/i', $userAgent)) return 'Chrome OS';
        return 'Unknown';
    }

    private function getBrowser($userAgent)
    {
        $userAgent = strtolower($userAgent);

        if (preg_match('/edg/i', $userAgent)) return 'Edge';
        if (preg_match('/chrome/i', $userAgent)) return 'Chrome';
        if (preg_match('/firefox|fxios/i', $userAgent)) return 'Firefox';
        if (preg_match('/safari/i', $userAgent)) return 'Safari';
        if (preg_match('/opera|opr/i', $userAgent)) return 'Opera';
        if (preg_match('/msie|trident/i', $userAgent)) return 'Internet Explorer';
        return 'Unknown';
    }

    private function getBrowserVersion($userAgent)
    {
        $userAgent = strtolower($userAgent);

        if (preg_match('/chrome\/([0-9.]+)/i', $userAgent, $matches)) {
            return $matches[1];
        } elseif (preg_match('/firefox\/([0-9.]+)/i', $userAgent, $matches)) {
            return $matches[1];
        } elseif (preg_match('/safari\/([0-9.]+)/i', $userAgent, $matches)) {
            return $matches[1];
        } elseif (preg_match('/edg\/([0-9.]+)/i', $userAgent, $matches)) {
            return $matches[1];
        }

        return 'Unknown';
    }

    private function getGeoData($ip)
    {
        if ($ip === '127.0.0.1' || $ip === '::1') {
            return [
                'country' => 'Local',
                'city' => 'Local',
                'region' => 'Local',
                'is_vpn' => false
            ];
        }

        try {
            // Opción gratuita: ipapi.co (sin API key para datos básicos)
            $response = Http::timeout(3)->get("http://ipapi.co/{$ip}/json/");

            if ($response->successful()) {
                $data = $response->json();
                return [
                    'country' => $data['country_name'] ?? null,
                    'city' => $data['city'] ?? null,
                    'region' => $data['region'] ?? null,
                    'is_vpn' => false // ipapi.co no proporciona este dato en free tier
                ];
            }
        } catch (\Exception $e) {
            // Silenciar errores
        }

        return [
            'country' => null,
            'city' => null,
            'region' => null,
            'is_vpn' => false
        ];
    }

    private function evaluateRisk($event, $ip, $geoData)
    {
        $riskFactors = 0;

        if ($ip === '127.0.0.1' || $ip === '::1') {
            return false;
        }

        if ($geoData['is_vpn'] ?? false) {
            $riskFactors++;
        }

        if ($event instanceof Failed) {
            $riskFactors++;
        }

        return $riskFactors >= 1;
    }

    private function calculateRiskScore($event, $ip, $geoData)
    {
        if ($ip === '127.0.0.1' || $ip === '::1') {
            return 'low';
        }

        $score = 0;
        if ($geoData['is_vpn'] ?? false) $score += 2;
        if ($event instanceof Failed) $score += 3;

        if ($score >= 3) return 'high';
        if ($score >= 1) return 'medium';
        return 'low';
    }

        // Event::listen(Login::class, function (Login $event) {
        //     $user = $event->user;

        //     DB::table('login_histories')->insert([
        //         'user_id' => $user->id,
        //         'ip_address' => request()->ip(),
        //         'user_agent' => request()->userAgent(),
        //         'login_at' => now(),
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ]);
        // });


    protected function configureComponents() {
        Livewire::component('calendar-component', \App\View\Components\Registro\CalendarioComponent::class);
    }

}
