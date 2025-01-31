<?php

namespace Github\Endpoint;

class MigrationsGetStatusForAuthenticatedUser extends \Github\Runtime\Client\BaseEndpoint implements \Github\Runtime\Client\Endpoint
{
    protected $migration_id;
    /**
    * Fetches a single user migration. The response includes the `state` of the migration, which can be one of the following values:
    
    *   `pending` - the migration hasn't started yet.
    *   `exporting` - the migration is in progress.
    *   `exported` - the migration finished successfully.
    *   `failed` - the migration failed.
    
    Once the migration has been `exported` you can [download the migration archive](https://developer.github.com/v3/migrations/users/#download-a-user-migration-archive).
    *
    * @param int $migrationId migration_id parameter
    * @param array $queryParameters {
    *     @var array $exclude 
    * }
    */
    public function __construct(int $migrationId, array $queryParameters = [])
    {
        $this->migration_id = $migrationId;
        $this->queryParameters = $queryParameters;
    }
    use \Github\Runtime\Client\EndpointTrait;
    public function getMethod(): string
    {
        return 'GET';
    }
    public function getUri(): string
    {
        return str_replace(['{migration_id}'], [$this->migration_id], '/user/migrations/{migration_id}');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        return [[], null];
    }
    public function getExtraHeaders(): array
    {
        return ['Accept' => ['application/json']];
    }
    protected function getQueryOptionsResolver(): \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getQueryOptionsResolver();
        $optionsResolver->setDefined(['exclude']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults([]);
        $optionsResolver->addAllowedTypes('exclude', ['array']);
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \Github\Exception\MigrationsGetStatusForAuthenticatedUserNotFoundException
     * @throws \Github\Exception\MigrationsGetStatusForAuthenticatedUserForbiddenException
     * @throws \Github\Exception\MigrationsGetStatusForAuthenticatedUserUnauthorizedException
     *
     * @return null|\Github\Model\Migration
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'Github\Model\Migration', 'json');
        }
        if (is_null($contentType) === false && (404 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Github\Exception\MigrationsGetStatusForAuthenticatedUserNotFoundException($serializer->deserialize($body, 'Github\Model\BasicError', 'json'), $response);
        }
        if (304 === $status) {
            return null;
        }
        if (is_null($contentType) === false && (403 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Github\Exception\MigrationsGetStatusForAuthenticatedUserForbiddenException($serializer->deserialize($body, 'Github\Model\BasicError', 'json'), $response);
        }
        if (is_null($contentType) === false && (401 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Github\Exception\MigrationsGetStatusForAuthenticatedUserUnauthorizedException($serializer->deserialize($body, 'Github\Model\BasicError', 'json'), $response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return [];
    }
}