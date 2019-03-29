<?php
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Input;
use App\Client;
use App\Solicitation;

Route::group(['middleware' => ['web']], function() {

	Auth::routes();

	Route::get('/send', function(){return view('emails.aberturaCRM');});

	Route::get('/route', function(){return view('emails.route');});

	Route::get('/satisfaction' ,['as' => 'pesquisa.satisfacao', 'uses' => 'SolicitationController@sendSatisfaction']);

	Route::post('/relatorio',['as' => 'pesquisa.relatorio', 'uses' => 'SolicitationController@sendEmailSatisfaction']);

	Route::auth();

	Route::group(['middleware'=>['auth', 'cors']], function() {

			Route::get('relatorios/chamados/{st}/{id}/{fd}/{cn}/{ri}/{searchType}', ['as' => 'reports.solicitations', 'uses' => 'ReportsController@solicitations']);

			Route::get('relatorios/crm/exportar/{st}', ['as' => 'reports.crm.export', 'uses' => 'ReportsController@crmExport']);

			Route::get('relatorios/chamados/exportar/{st}/{id}/{fd}/{cn}/{ri}/{searchType}', ['as' => 'reports.solicitations.export', 'uses' => 'ReportsController@solicitationsExport']);

			Route::get('relatorios/crm/{st}', ['as' => 'reports.crm', 'uses' => 'ReportsController@crm']);

			Route::get('relatorios/crm/{st}/visualizar', ['as' => 'reports.crm.show', 'uses' => 'ReportsController@crmShow']);

			Route::get('relatorios/chamados/visualizar/{id}', ['as' => 'reports.solicitations.show', 'uses' => 'ReportsController@solicitationsShow']);

			Route::get('/relatorios/chamados/{typesearch}/pesquisa', ['as' => 'reports.search', 'uses' => 'ReportsController@search']);

			Route::get('relatorios/busca-tecnicos', ['as' => 'reports.searchusers', 'uses' => 'ReportsController@searchUsers']);

			Route::resource('users','UsersController');

			Route::resource('tasks', 'TaskController');			

			Route::get('usuario/search' , 'UsersController@search');

			Route::get('/', 'HomeController@index');

			Route::get('/panel', ['as' => 'panel.status', 'uses'=>'UsersController@panel']);

			Route::post('/panel/status', ['as' => 'panel.st', 'uses'=>'UsersController@status']);

			Route::get('clientes',['as' => 'clients.index', 'uses' => 'ClientController@index'] );

			Route::get('clientes/search' , 'ClientController@search');

			Route::get('/clientes/novo',['as' => 'clients.create', 'uses' => 'ClientController@create'] );

			Route::post('/clientes/salvar', ['as' => 'clients.store', 'uses'=>'ClientController@store']);

			Route::delete('/clientes/{id}/destroy', ['as'=>'clients.destroy', 'uses'=>'ClientController@destroy']);

			Route::get('/clientes/{id}/edit',['as'=>'clients.edit','uses'=>'ClientController@edit']);

			Route::patch('/clientes/{id}/update',['as'=>'clients.update', 'uses'=>'ClientController@update']);

			Route::get('/clientes/{id}/visualizar', ['as'=>'clients.show', 'uses'=>'ClientController@show']);

			Route::get('/chamados', ['as' => 'solicitations.index', 'uses' => 'SolicitationController@index']);

			Route::get('chamados/search' , 'SolicitationController@search');

			Route::get('/chamados/novo', ['as' => 'solicitations.create', 'uses' => 'SolicitationController@create']);

			Route::post('/chamados/salvar', ['as' => 'solicitations.store', 'uses' => 'SolicitationController@store']);

			Route::get('/chamados/{id}/editar', ['as' => 'solicitations.edit', 'uses' => 'SolicitationController@edit']);

			Route::post('/chamados/{id}/fechamento', ['as' => 'solicitations.update', 'uses' => 'SolicitationController@update']);

			Route::get('/chamados/novo/getresponsibles/{id}',['as' => 'solicitations.getresponsibles', 'uses' => 'SolicitationController@getResponsibles']);

			Route::get('base-de-conhecimento',['as' => 'knowledge-bases.index', 'uses' => 'KnowledgeBaseController@index'] );

			Route::get('base-de-conhecimento/search' , 'KnowledgeBaseController@search');

			Route::get('base-de-conhecimento/novo', ['as' => 'knowledge-bases.create', 'uses' => 'KnowledgeBaseController@create']);

			Route::post('base-de-conhecimento/salvar', ['as' => 'knowledge-bases.store', 'uses' => 'KnowledgeBaseController@store']);

			Route::get('base-de-conhecimento/{id}/edit',['as'=>'knowledge-bases.edit', 'uses'=>'KnowledgeBaseController@edit']);

			Route::patch('base-de-conhecimento/{id}/update',['as'=>'knowledge-bases.update', 'uses'=>'KnowledgeBaseController@update']);

			Route::get('base-de-conhecimento/{id}/visualizar', ['as'=>'knowledge-bases.show', 'uses'=>'KnowledgeBaseController@show']);

			Route::get('/crm', ['as' => 'crm.index', 'uses' => 'CRMController@index']);

			Route::get('/crm/search' , 'CRMController@search');

			Route::get('/crm/novo', ['as' => 'crm.create', 'uses' => 'CRMController@create']);

			Route::post('/crm/salvar', ['as' => 'crm.store', 'uses' => 'CRMController@store']);

			Route::get('/crm/{id}/atualizar', ['as' => 'crm.edit', 'uses' => 'CRMController@edit']);

			Route::post('/crm/{id}/action', ['as' => 'crm.update', 'uses' => 'CRMController@update']);

			Route::get('/tipos-de-ocorrencia', ['as' => 'occurrence-types.index', 'uses' => 'OccurrenceTypesController@index']);

			Route::get('/tipos-de-ocorrencia/novo', ['as' => 'occurrence-types.create', 'uses' => 'OccurrenceTypesController@create']);

			Route::post('/tipos-de-ocorrencia/salvar', ['as' => 'occurrence-types.store', 'uses' => 'OccurrenceTypesController@store']);

			Route::get('/tipos-de-ocorrencia/{id}/editar', ['as' => 'occurrence-types.edit', 'uses' => 'OccurrenceTypesController@edit']);

			Route::patch('/tipos-de-ocorrencia/{id}/atualizar', ['as' => 'occurrence-types.update', 'uses' => 'OccurrenceTypesController@update']);

			Route::get('/categorias', ['as' => 'categories.index', 'uses' => 'CategoriesController@index']);

			Route::get('/categorias/novo', ['as' => 'categories.create', 'uses' => 'CategoriesController@create']);

			Route::post('/categorias/salvar', ['as' => 'categories.store', 'uses' => 'CategoriesController@store']);

			Route::get('/categorias/{id}/editar', ['as' => 'categories.edit', 'uses' => 'CategoriesController@edit']);

			Route::patch('/categorias/{id}/atualizar', ['as' => 'categories.update', 'uses' => 'CategoriesController@update']);

			Route::get('/statuses', ['as' => 'statuses.index', 'uses' => 'StatusesController@index']);

			Route::get('/statuses/novo', ['as' => 'statuses.create', 'uses' => 'StatusesController@create']);

			Route::post('/statuses/salvar', ['as' => 'statuses.store', 'uses' => 'StatusesController@store']);

			Route::get('/statuses/{id}/editar', ['as' => 'statuses.edit', 'uses' => 'StatusesController@edit']);

			Route::patch('/statuses/{id}/atualizar', ['as' => 'statuses.update', 'uses' => 'StatusesController@update']);

			Route::get('/chamados/novo/getclient', ['as' => 'search.client', 'uses' => 'SolicitationController@getClient']);

			Route::resource('emitentes','EmitenteController');

			Route::get('emitentes/{id}/altera-status', ['as' => 'altera.status', 'uses' => 'EmitenteController@serialStatus']);

			Route::post('emitentes/altera-hd', ['as' => 'altera.hd', 'uses' => 'EmitenteController@alteraHd']);

	});

});

Route::get('emitentes/json/{num_serial}', 'EmitenteController@getBySerial');
Route::get('emitentes/hd/{num_serial}/{num_hd}', 'EmitenteController@assignToHd');
