<?php

declare(strict_types=1);

namespace Tests\Everlution\FileJet\Management;

use Everlution\FileJet\Management\HttpClient;
use Everlution\FileJet\Management\UploadImpl;
use Everlution\FileJet\Management\UploadRequest;
use Everlution\FileJet\Management\UploadRequestImpl;
use Everlution\FileJet\Management\UploadResponse;
use Everlution\FileJet\Management\RemoteStorage;
use GuzzleHttp\Psr7\Response;
use Http\Mock\Client;
use PHPUnit\Framework\TestCase;

final class UploadImplTest extends TestCase
{
    /** @var HttpClient */
    private $httpClient;
    /** @var UploadRequest */
    private $uploadRequest;
    /** @var RemoteStorage */
    private $uploadStorage;

    public function setUp()
    {
        $client = new Client();
        $client->setDefaultResponse();
        $this->httpClient = new HttpClientMock(
            new Response(200, [], json_encode(self::UPLOAD_DATA))
        );

        $this->uploadRequest = new UploadRequestImpl(self::FILE_PATH, self::FILE_CONTENT_TYPE);
        $this->uploadStorage = new RemoteStorageMock();
    }

    public function testExplicit(): void
    {
        $upload = new UploadImpl($this->httpClient);
        $response = $upload->explicit($this->uploadRequest, $this->uploadStorage);
        $this->assertUploadResponseIsValid($response);
    }

    public function testUnique(): void
    {
        $upload = new UploadImpl($this->httpClient);
        $response = $upload->unique($this->uploadRequest, $this->uploadStorage);
        $this->assertUploadResponseIsValid($response);
    }

    private function assertUploadResponseIsValid(UploadResponse $response)
    {
        $this->assertEquals(self::UPLOAD_DATA['identifier'], $response->getFileIdentifier());
        $storageRequest = $response->getStorageRequest();
        $this->assertEquals(self::FILE_CONTENT_TYPE, $storageRequest->getHeaders()['content-type']);
        $this->assertEquals(self::UPLOAD_DATA['requestFormat']['httpMethod'], $storageRequest->getRequestMethod());
    }

    private const FILE_PATH = __DIR__ . '/sample.png';
    private const FILE_CONTENT_TYPE = 'image/png';
    private const UPLOAD_DATA = [
        'identifier' => 'uniqueIdentifier',
        'requestFormat' => [
            'url' => 'https://some.url',
            'httpMethod' => 'PUT',
            'headers' => [
                'content-type' => self::FILE_CONTENT_TYPE,
            ]
        ]
    ];
}
