<?php

namespace Github\Endpoint;

class PullsUpdateBranch extends \Github\Runtime\Client\BaseEndpoint implements \Github\Runtime\Client\Endpoint
{
    protected $owner;
    protected $repo;
    protected $pull_number;
    /**
     * Updates the pull request branch with the latest upstream changes by merging HEAD from the base branch into the pull request branch.
     *
     * @param string $owner 
     * @param string $repo 
     * @param int $pullNumber 
     * @param null|\Github\Model\ReposOwnerRepoPullsPullNumberUpdateBranchPutBody $requestBody 
     */
    public function __construct(string $owner, string $repo, int $pullNumber, ?\Github\Model\ReposOwnerRepoPullsPullNumberUpdateBranchPutBody $requestBody = null)
    {
        $this->owner = $owner;
        $this->repo = $repo;
        $this->pull_number = $pullNumber;
        $this->body = $requestBody;
    }
    use \Github\Runtime\Client\EndpointTrait;
    public function getMethod(): string
    {
        return 'PUT';
    }
    public function getUri(): string
    {
        return str_replace(['{owner}', '{repo}', '{pull_number}'], [$this->owner, $this->repo, $this->pull_number], '/repos/{owner}/{repo}/pulls/{pull_number}/update-branch');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \Github\Model\ReposOwnerRepoPullsPullNumberUpdateBranchPutBody) {
            return [['Content-Type' => ['application/json']], $serializer->serialize($this->body, 'json')];
        }
        return [[], null];
    }
    public function getExtraHeaders(): array
    {
        return ['Accept' => ['application/json']];
    }
    /**
     * {@inheritdoc}
     *
     * @throws \Github\Exception\PullsUpdateBranchUnprocessableEntityException
     * @throws \Github\Exception\PullsUpdateBranchForbiddenException
     * @throws \Github\Exception\PullsUpdateBranchUnsupportedMediaTypeException
     *
     * @return null|\Github\Model\ReposOwnerRepoPullsPullNumberUpdateBranchPutResponse202
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (202 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'Github\Model\ReposOwnerRepoPullsPullNumberUpdateBranchPutResponse202', 'json');
        }
        if (is_null($contentType) === false && (422 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Github\Exception\PullsUpdateBranchUnprocessableEntityException($serializer->deserialize($body, 'Github\Model\ValidationError', 'json'), $response);
        }
        if (is_null($contentType) === false && (403 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Github\Exception\PullsUpdateBranchForbiddenException($serializer->deserialize($body, 'Github\Model\BasicError', 'json'), $response);
        }
        if (is_null($contentType) === false && (415 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Github\Exception\PullsUpdateBranchUnsupportedMediaTypeException($serializer->deserialize($body, 'Github\Model\ResponsePreviewHeaderMissing', 'json'), $response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return [];
    }
}