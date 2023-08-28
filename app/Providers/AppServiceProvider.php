<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Locale;
use App\Models\ItensMenu;
use App\Models\Menu;
use App\Models\Tools;
use App\Models\Textos;
use App\Models\Sections;
use Illuminate\Http\Request;
use App\Models\TipoMenu;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Arr;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Request $request)
    {
        date_default_timezone_set('America/Sao_Paulo');
setlocale(LC_ALL, 'pt_BR.utf-8', 'ptb', 'pt_BR', 'portuguese-brazil', 'portuguese-brazilian', 'bra', 'brazil', 'br');
setlocale(LC_TIME, 'pt_BR.utf-8', 'ptb', 'pt_BR', 'portuguese-brazil', 'portuguese-brazilian', 'bra', 'brazil', 'br');


        Paginator::useBootstrap();
        $locales = Locale::all();
        View::share('locales', $locales);



        if (strpos(url()->current(), "admin")) {
            $arrayStatus = [
                "0" => '<span class="badge badge-danger">inactive</span>',
                "1" => '<span class="badge badge-success">active</span>',
                "3" => '<span class="badge badge-secondary">Removed</span>',
            ];
            View::share('arrayStatus', $arrayStatus);
        } else {
        }

        Builder::macro('whereLike', function ($attributes, string $searchTerm) {
            $this->where(function (Builder $query) use ($attributes, $searchTerm) {
                foreach (Arr::wrap($attributes) as $attribute) {
                    $query->when(
                        str_contains($attribute, '.'),
                        function (Builder $query) use ($attribute, $searchTerm) {
                            [$relationName, $relationAttribute] = explode('.', $attribute);

                            $query->orWhereHas($relationName, function (Builder $query) use ($relationAttribute, $searchTerm) {
                                $query->where($relationAttribute, 'LIKE', "%{$searchTerm}%");
                            });
                        },
                        function (Builder $query) use ($attribute, $searchTerm) {
                            $query->orWhere($attribute, 'LIKE', "%{$searchTerm}%");
                        }
                    );
                }
            });

            return $this;
        });



        view()->composer('layouts.painel', function ($view) {
            $sections = Sections::orderBy('title','asc')->get();
            $view->with('sections', $sections);
        });
        view()->composer('*', function ($view) {

            $config = Tools::all();
            $configSite = [];

            foreach ($config as $key => $value) {
                $configSite[$value->param] = $value->value;
            }

            $textos = Textos::locale()->get();
            $configTextos = [];

            foreach ($textos as $key => $value) {
                $configTextos[$value->param] = $value->value;
            }
            //dd($configTextos);

            $tiposMenus = TipoMenu::where('status','1')->get();
            foreach($tiposMenus as $key => $value){
              
                View::share('menu_'.$value->slug_menu, $value->mainMenu());
            }
            
           

            $locale = app()->getLocale();
            
           

            $view->with('configSite', $configSite);
            $view->with('configTextos', $configTextos);
        });
    }
}
