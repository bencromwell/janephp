<?php

namespace Github\Endpoint;

class ProjectsDeleteCard extends \Github\Runtime\Client\BaseEndpoint implements \Github\Runtime\Client\Endpoint
{
    protected $card_id;
    /**
     * 
     *
     * @param int $cardId card_id parameter
     */
    public function __construct(int $cardId)
    {
        $this->card_id = $cardId;
    }
    use \Github\Runtime\Client\EndpointTrait;
    public function getMethod(): string
    {
        return 'DELETE';
    }
    public function getUri(): string
    {
        return str_replace(['{card_id}'], [$this->card_id], '/projects/columns/cards/{card_id}');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        return [[], null];
    }
    public function getExtraHeaders(): array
    {
        return ['Accept' => ['application/json']];
    }
    /**
     * {@inheritdoc}
     *
     * @throws \Github\Exception\ProjectsDeleteCardForbiddenException
     * @throws \Github\Exception\ProjectsDeleteCardUnauthorizedException
     * @throws \Github\Exception\ProjectsDeleteCardNotFoundException
     *
     * @return null
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (204 === $status) {
            return null;
        }
        if (304 === $status) {
            return null;
        }
        if (is_null($contentType) === false && (403 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Github\Exception\ProjectsDeleteCardForbiddenException($serializer->deserialize($body, 'Github\Model\ProjectsColumnsCardsCardIdDeleteResponse403', 'json'), $response);
        }
        if (is_null($contentType) === false && (401 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Github\Exception\ProjectsDeleteCardUnauthorizedException($serializer->deserialize($body, 'Github\Model\BasicError', 'json'), $response);
        }
        if (is_null($contentType) === false && (404 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Github\Exception\ProjectsDeleteCardNotFoundException($serializer->deserialize($body, 'Github\Model\BasicError', 'json'), $response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return [];
    }
}