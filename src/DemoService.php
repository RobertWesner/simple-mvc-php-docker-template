<?php

namespace App;

use RobertWesner\DependencyInjection\Attributes\AutowireEnv;
use RobertWesner\DependencyInjection\Attributes\BufferFile;

final readonly class DemoService
{
    public function __construct(
        #[AutowireEnv(__BASE_DIR__ . '/.env', 'MOTD')]
        #[BufferFile]
        private string $motd,
    ) {}

    public function getMottoOfTheDay(): string
    {
        return $this->motd ?: 'No Motto today, sorry!';
    }
}
