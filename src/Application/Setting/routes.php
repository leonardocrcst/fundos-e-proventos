<?php

namespace App\Application\Setting;

use App\Application\UseCase\Ativo as Ativo;
use App\Application\UseCase\Lancamento as Lancamento;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\App;
use Slim\Routing\RouteCollectorProxy;
use Slim\Routing\RouteContext;

return function (App $app): void
{
    $app->group('/api/ativos', function (RouteCollectorProxy $group) {
        $group->get('', Ativo\ListarTodosOsAtivos::class);
        $group->post('', Ativo\CriarNovoAtivo::class);
        $group->delete('', Ativo\RemoverAtivo::class);
        $group->put('', Ativo\AtualizarAtivo::class);
    });

    $app->group('/api/lancamentos', function (RouteCollectorProxy $group) {
        $group->get('', Lancamento\ListarTodosOsLancamentos::class);
    });

    $app->any('/[{any:.*}]', function (
        ServerRequestInterface $request,
        ResponseInterface $response
    ) {
        $route  = RouteContext::fromRequest($request);
        $body = [
            'statusCode' => 404,
            'route' => $route->getRoutingResults()->getUri(),
            'message' => 'Not found'
        ];
        $response->getBody()->write(json_encode($body));
        return $response->withHeader('Content-Type', 'Application/Json')->withStatus(404);
    });
};
