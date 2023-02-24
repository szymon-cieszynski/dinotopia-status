<?php

namespace App\Tests\Unit\Service;

use App\Enum\HealthStatus;
use App\Service\GithubService;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class GitHubServiceTest extends TestCase
{
    /**
     * @dataProvider dinoNameProvider
     */
    public function testGetHealthReportReturnsCorrectHealthStatusForDino(HealthStatus $expectedStatus, string $dinoName): void
    {
        $mockLogger = $this->createMock(LoggerInterface::class);
        $mockClient = $this->createMock(HttpClientInterface::class);

        $service = new GithubService($mockClient, $mockLogger);

        self::assertSame($expectedStatus, $service->getHealthReport($dinoName));
    }

    public function dinoNameProvider(): \Generator
    {
        yield 'Sick Dino' => [
            HealthStatus::SICK,
            'Daisy',
        ];
        yield 'Healthy Dino' => [
            HealthStatus::HEALTHY,
            'Maverick',
        ];

    }
}