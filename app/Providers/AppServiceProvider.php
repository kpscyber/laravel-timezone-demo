<?php

namespace App\Providers;

use Filament\Forms\Components\DateTimePicker;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\ServiceProvider;

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
        DateTimePicker::configureUsing(function (DateTimePicker $component) {
            $component::$defaultDateDisplayFormat = 'd/m/Y';
            $component::$defaultDateTimeDisplayFormat = 'd/my/Y H:i';
            $component->timezone(auth()->user()->timezone);
        });

        TextColumn::configureUsing(function (TextColumn $column) {
            $column->timezone(auth()->user()->timezone);
        });

        Table::configureUsing(function (Table $table) {
            $table::$defaultDateDisplayFormat = 'd F Y';
            $table::$defaultDateTimeDisplayFormat = 'd F Y H:i';
        });
    }
}
