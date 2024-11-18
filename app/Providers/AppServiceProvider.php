<?php

namespace App\Providers;

use App\Models\SocialMedia;
use Illuminate\Support\ServiceProvider;
use App\Models\User;
use Filament\Forms\Components\Actions\Action;
use Filament\Facades\Filament;
use Filament\Forms\Components\Field;
use Filament\Navigation\NavigationItem;
use Filament\Navigation\UserMenuItem;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('viewPulse', function (User $user) {
            return $user->isAdmin();
        });

        Field::macro("tooltip", function(string $tooltip) {
            return $this->hintAction(
                Action::make('help')
                    ->icon('heroicon-o-question-mark-circle')
                    ->extraAttributes(["class" => "text-gray-500"])
                    ->label("")
                    ->tooltip($tooltip)
            );
        });

        View::composer('*', function ($view) {
            $social = SocialMedia::where('perusahaan_id', 1)->get();
            $socialUrl = SocialMedia::where('perusahaan_id', 1)
                        ->where('platform', 'like', 'whatsapp')
                        ->value('url');
            $view->with('social', $social)->with('socialUrl', $socialUrl);
        });

        \Opcodes\LogViewer\Facades\LogViewer::auth(function ($request) {
            return $request->user() ? $request->user()->isAdmin() : false;
        });
    }
}
