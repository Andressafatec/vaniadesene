<?php

use App\Http\Controllers\ContatoController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\Painel\BannerController;
use App\Http\Controllers\Painel\CategoriasController;
use App\Http\Controllers\Painel\ContentsController;
use App\Http\Controllers\Painel\ConteudosController;
use App\Http\Controllers\Painel\CorretorController;
use App\Http\Controllers\Painel\ImoveisController;
use App\Http\Controllers\Painel\IndexController;
use App\Http\Controllers\Painel\ItensMenuController;
use App\Http\Controllers\Painel\MediaController;
use App\Http\Controllers\Painel\MenuController;
use App\Http\Controllers\Painel\TextosController;
use App\Http\Controllers\Painel\ToolsController;
use App\Http\Controllers\Painel\UserController;
use App\Http\Controllers\Site\LocacaoController;
use App\Http\Controllers\Site\VendaController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();

Route::prefix('admin')->middleware('auth')->name('admin.')->group(function () {
    Route::get('', [IndexController::class, 'index'])->name('index');
    Route::get('/dash', [IndexController::class, 'index'])->name('dash');
    Route::get('locale/{locale}', function ($locale) {
        Session::put('locale', $locale);
        App::setLocale($locale);
        return redirect()->back();
    })->name('locale');

    Route::prefix('contents/{slug}')->name('contents.')->group(function () {
        Route::get('/', [ContentsController::class, 'index'])->name('list');
        Route::get('/new', [ContentsController::class, 'create'])->name('new');
        Route::get('/getNewblock', [ContentsController::class, 'getNewblock'])->name('getNewblock');
        Route::get('/edit/{id}', [ContentsController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [ContentsController::class, 'update'])->name('update');
        Route::post('/store', [ContentsController::class, 'store'])->name('store');
        Route::get('/delete/{id}', [ContentsController::class, 'delete'])->name('delete');
    });
    
    Route::prefix('categories/{slug}')->name('categories.')->group(function () {
        Route::get('list/', [CategoriasController::class, 'list'])->name('list');
        Route::get('edit/{id}', [CategoriasController::class, 'editar'])->name('edit');
        Route::post('update/{id}', [CategoriasController::class, 'update'])->name('update');
        Route::get('new', [CategoriasController::class, 'new'])->name('new');
        Route::post('store', [CategoriasController::class, 'store'])->name('store');
        Route::get('delete/{id}', [CategoriasController::class, 'delete'])->name('delete');
    });
    
    Route::prefix('tools/')->name('tools.')->group(function () {
        Route::get('/', [ToolsController::class, 'list'])->name('list');
        Route::get('/novo', [ToolsController::class, 'novo'])->name('novo');
        Route::get('/editar/{id}', [ToolsController::class, 'editar'])->name('editar');
        Route::post('/update/{id}', [ToolsController::class, 'update'])->name('update');
        Route::post('/store', [ToolsController::class, 'store'])->name('store');
        Route::get('/delete/{id}', [ToolsController::class, 'delete'])->name('delete');
    });
    
    Route::prefix('textos/')->name('textos.')->group(function () {
        Route::get('/', [TextosController::class, 'index'])->name('index');
        Route::get('/novo', [TextosController::class, 'new'])->name('new');
        Route::get('/editar/{id}', [TextosController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [TextosController::class, 'update'])->name('update');
        Route::post('/store', [TextosController::class, 'store'])->name('store');
        Route::get('/delete/{id}', [TextosController::class, 'delete'])->name('delete');
    });
    Route::prefix('users')->name('users.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('list');
        Route::get('/new', [UserController::class, 'create'])->name('new');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [UserController::class, 'update'])->name('update');
        Route::post('/store', [UserController::class, 'store'])->name('store');
        Route::get('/delete/{id}', [UserController::class, 'delete'])->name('delete');
    });
    
    Route::prefix('conteudos')->name('conteudos.')->group(function () {
        Route::get('/paginas', [ConteudosController::class, 'paginas'])->name('paginas');
        Route::get('/noticias', [ConteudosController::class, 'noticias'])->name('noticias');
        Route::get('{slug}/editar/{id}', [ConteudosController::class, 'editar'])->name('editar');
        Route::post('{slug}/update/{id}', [ConteudosController::class, 'updatePaginas'])->name('update');
        Route::post('{slug}/store', [ConteudosController::class, 'storePaginas'])->name('store');
        Route::get('{slug}/delete/{id}', [ConteudosController::class, 'delete'])->name('delete');
    });
    
    Route::prefix('categorias')->name('categorias.')->group(function () {
        Route::get('list/{tipo?}', [CategoriasController::class, 'list'])->name('list');
        Route::get('editar/{tipo}/{id}', [CategoriasController::class, 'editar'])->name('editar');
        Route::post('update/{id}', [CategoriasController::class, 'update'])->name('update');
        Route::get('novo', [CategoriasController::class, 'novo'])->name('novo');
        Route::post('store', [CategoriasController::class, 'store'])->name('store');
        Route::get('delete/{id}/{tipo?}', [CategoriasController::class, 'delete'])->name('delete');
    });
    Route::prefix('banners')->name('banners.')->group(function () {
        Route::get('/', [BannerController::class, 'list'])->name('list');
        Route::get('novo', [BannerController::class, 'novo'])->name('novo');
        Route::get('editar/{id}', [BannerController::class, 'editar'])->name('editar');
        Route::get('delete/{id}', [BannerController::class, 'destroy'])->name('delete');
        Route::post('update/{id}', [BannerController::class, 'update'])->name('update');
        Route::post('store', [BannerController::class, 'store'])->name('store');
        Route::post('order', [BannerController::class, 'order'])->name('order');
    });

    Route::prefix('imoveis')->name('imoveis.')->group(function () {
        Route::get('/', [ImoveisController::class, 'list'])->name('list');
        Route::get('novo', [ImoveisController::class, 'novo'])->name('novo');
        Route::post('store', [ImoveisController::class, 'store'])->name('store');
        Route::post('upload', [ImoveisController::class, 'upload'])->name('upload');
        Route::get('deleteImg', [ImoveisController::class, 'deleteImg'])->name('deleteImg');
        Route::get('edit/{id}', [ImoveisController::class, 'edit'])->name('edit');
        Route::put('update/{id}', [ImoveisController::class, 'update'])->name('update');
        Route::get('delete/{id}', [ImoveisController::class, 'delete'])->name('delete');
    });
    Route::prefix('corretor')->name('corretor.')->group(function () {
        Route::get('/', [CorretorController::class, 'list'])->name('list');
        Route::get('novo', [CorretorController::class, 'novo'])->name('novo');
        Route::get('deleteImg', [CorretorController::class, 'deleteImg'])->name('deleteImg');
        Route::get('edit/{id}', [CorretorController::class, 'edit'])->name('edit');
        Route::get('delete/{id}', [CorretorController::class, 'delete'])->name('delete');
        Route::post('store', [CorretorController::class, 'store'])->name('store');
        Route::post('upload', [CorretorController::class, 'upload'])->name('upload');
        Route::put('update/{id}', [CorretorController::class, 'update'])->name('update');
    });
    
    Route::prefix('ajax')->name('ajax.')->group(function () {
        Route::post('banner-upload-foto', [BannerController::class, 'moveImg'])->name('banner-upload-foto');
        Route::get('banner-delete-foto', [BannerController::class, 'deleteImg'])->name('banner-delete-foto');
    
        Route::prefix('ordem')->name('ordem.')->group(function () {
            Route::post('menu', [ItensMenuController::class, 'ordem'])->name('menu');
        });
    
        Route::get('tokenUrl', [MediaController::class, 'tokenUrl'])->name('tokenUrl');
        Route::post('upload-media', [MediaController::class, 'moveFile'])->name('upload-media');
        Route::post('upload-ck-editor', [MediaController::class, 'moveFileCk'])->name('upload-ck-editor');
    
        Route::post('delete-media', [MediaController::class, 'deleteFile'])->name('delete-media');
    });
    
    Route::prefix('tiposMenu')->name('tiposMenu.')->group(function () {
        Route::get('/{id?}', [MenuController::class, 'index'])->name('index');
        Route::get('editar/{id}', [MenuController::class, 'editar'])->name('editar');
        Route::post('store', [MenuController::class, 'store'])->name('store');
        Route::get('delete/{id}', [MenuController::class, 'delete'])->name('delete');
        Route::post('update/{id}', [MenuController::class, 'update'])->name('update');
        Route::get('associacao/{id}', [MenuController::class, 'associacao'])->name('associacao');
        Route::post('associacao/{id}', [MenuController::class, 'associacaoStore'])->name('associacao.store');
    });
    Route::prefix('menu')->name('menu.')->group(function () {
        Route::get('/{id?}', [ItensMenuController::class, 'index'])->name('index');
        Route::post('store/{id}', [ItensMenuController::class, 'store'])->name('store');
        Route::post('/{idMenu}/update/{idItemMenu}', [ItensMenuController::class, 'update'])->name('update');
        Route::get('/{idMenu?}/editar/{idItemMenu}', [ItensMenuController::class, 'editar'])->name('editar');
        Route::get('/{idMenu}/delete/{idItemMenu}', [ItensMenuController::class, 'delete'])->name('delete');
        Route::get('/{idMenu}/modalConteudos/{idItemMenu}', [ItensMenuController::class, 'modalConteudos'])->name('modalConteudos');
        Route::post('/{idMenu}/modalConteudos/{idItemMenu}', [ItensMenuController::class, 'assocaicaoConteudo']);
    });
    
    Route::prefix('media')->name('media.')->group(function () {
        Route::get('popUp/{folder?}', [MediaController::class, 'popUp'])->name('popUp');
        Route::post('/list-folder/{folder?}', [MediaController::class, 'listFiles'])->name('list-files');
        Route::post('/newFolder', [MediaController::class, 'newFolder'])->name('newFolder');
        Route::get('/delFolder', [MediaController::class, 'delFolder'])->name('delFolder');
        Route::get('/getFile/{id?}', [MediaController::class, 'getFile'])->name('getFile');
        Route::get('/{folder?}', [MediaController::class, 'index'])->name('index');
    });
    
    Route::prefix('tools')->name('tools.')->group(function () {
        Route::get('/', [ToolsController::class, 'index'])->name('index');
        Route::get('/new', [ToolsController::class, 'new'])->name('new');
        Route::get('edit/{id}', [ToolsController::class, 'edit'])->name('edit');
        Route::post('store', [ToolsController::class, 'store'])->name('store');
        Route::get('delete/{id}', [ToolsController::class, 'delete'])->name('delete');
        Route::post('update/{id}', [ToolsController::class, 'update'])->name('update');
    });
});

Route::prefix('/')->middleware(['web'])->name('admin.')->group(function () {
    Route::get('/', [\App\Http\Controllers\Site\IndexController::class, 'index'])->name('index');
    Route::get('/contato', [\App\Http\Controllers\Site\IndexController::class, 'contato'])->name('contato');
    Route::get('/quem-somos', [\App\Http\Controllers\Site\IndexController::class, 'quem_somos'])->name('quem_somos');
    Route::get('/cadastre-seu-imovel', [\App\Http\Controllers\Site\IndexController::class, 'cadastro_imoveis'])->name('cadastro_imoveis');
    Route::get('/pesquisa', [\App\Http\Controllers\Site\IndexController::class, 'pesquisa'])->name('pesquisa');
    Route::get('/busca_avancada', [\App\Http\Controllers\Site\IndexController::class, 'busca_avancada'])->name('busca_avancada');

    Route::prefix('locacao')->name('locacao.')->group(function () {
        Route::get('/', [LocacaoController::class, 'index'])->name('index');
        Route::get('/detalhes/{id}', [LocacaoController::class, 'detalhes'])->name('detalhes');
        Route::get('/filtrar', [LocacaoController::class, 'index'])->name('filtrar');
    });

    Route::prefix('venda')->name('venda.')->group(function () {
        Route::get('/', [VendaController::class, 'index'])->name('index');
        Route::get('/detalhes/{id}', [VendaController::class, 'detalhes'])->name('detalhes');
        Route::get('/filtrar', [VendaController::class, 'index'])->name('filtrar');
    });

    Route::get('/mail', [MailController::class, 'index'])->name('mail');
    Route::post('/sendMail', [MailController::class, 'store'])->name('sendMail');

    Route::get('/{slug}', ['as'=>'paginas','uses'=>'\App\Http\Controllers\Site\ContentsController@content']);

});


