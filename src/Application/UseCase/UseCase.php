<?php

namespace App\Application\UseCase;

use App\Application\UseCase\Dto\ResponseDto;
use App\Application\UseCase\Exception\InvalidRequestBodyException;
use App\Domain\Model\EntityInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

abstract class UseCase
{
    protected ServerRequestInterface $request;
    protected ResponseInterface $response;
    protected array $requestBody = [];
    protected array $args;

    /**
     * @throws InvalidRequestBodyException
     */
    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response,
        array $args
    ): ResponseInterface {
        $this->request = $request;
        $this->response = $response;
        $this->args = $args;
        $this->requestBody = $this->parseRequestBody($request);
        try {
            $responseBody = $this->execute();
            $this->response->getBody()->write($responseBody->__toString());
            return $this->response
                ->withStatus($responseBody->getStatusCode())
                ->withHeader('Content-Type', 'Application/Json');
        } catch (\Exception $exception) {
            $this->response->getBody()->write($exception->getMessage());
            return $this->response
                ->withStatus(500)
                ->withHeader('Content-Type', 'Application/Json');
        }
    }

    /**
     * @throws InvalidRequestBodyException
     */
    private function parseRequestBody(ServerRequestInterface $request): array
    {
        $requestContent = $request->getBody()->getContents();
        if (empty($requestContent)) {
            return [];
        }
        $body = json_decode($request->getBody()->getContents(), true);
        if (json_last_error()) {
            throw new InvalidRequestBodyException();
        }
        return $body;
    }

    /**
     * @param EntityInterface[] $entities
     * @return array
     */
    protected function serializeEntities(array $entities): array
    {
        return array_map(fn($item) => $item->jsonSerialize(), $entities);
    }

    abstract public function execute(): ResponseDto;
}
