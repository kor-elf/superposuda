<?php
namespace App\Services\Retailcrm;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;
use App\Helpers\FunctionResult;

class RetailcrmBase
{
    private string $token;
    private string $url;
    private int $timeout;

    public function __construct(Config $config)
    {
        $this->token = $config::get('retailcrm.token');
        $this->url = $config::get('retailcrm.url');
        $this->timeout = $config::get('retailcrm.timeout');
    }

    protected function send(string $link, array $params = []): array
    {
        $url = $this->url . $link;
        $response = Http::timeout($this->timeout)
                    ->withHeaders([
                        'X-API-KEY' => $this->token
                    ])
                    ->get($url, $params)
                    ->throw()->json();

        return $response;
    }
}
