<?php

declare(strict_types=1);

namespace Tests\Everlution\FileJet\Management;

use Everlution\FileJet\Management\DeletionImpl;
use Everlution\FileJet\Management\HttpClient;
use Everlution\FileJet\Management\RemoteStorage;
use GuzzleHttp\Psr7\Response;
use Http\Mock\Client;
use PHPUnit\Framework\TestCase;

final class DeleteImplTest extends TestCase
{
    /** @var HttpClient */
    private $httpClient;
    /** @var RemoteStorage */
    private $uploadStorage;

    public function setUp()
    {
        $client = new Client();
        $client->setDefaultResponse();
        $this->httpClient = new HttpClientMock(
            new Response(200)
        );

        $this->uploadStorage = new RemoteStorageMock();
    }

    public function testExplicit(): void
    {
        $deletion = new DeletionImpl($this->httpClient);
        $response = $deletion->delete(self::FILE_IDENTIFIER, $this->uploadStorage);

        self::assertTrue($response->isSuccessful());
    }

    private const FILE_IDENTIFIER = 'uniqueIdentifier';
}
