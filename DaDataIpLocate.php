<?php

namespace mrssoft\dadata;

use InvalidArgumentException;
use Yii;
use yii\base\Component;

/**
 * IP Address Locate
 *
 * @see https://dadata.ru/api/iplocate/
 */
class DaDataIpLocate extends Component
{
    /**
     * Token
     * @var string
     */
    public $token;

    /**
     * @var string
     */
    public $apiUrl = 'https://suggestions.dadata.ru/suggestions/api/4_1/rs/iplocate/address?ip=';

    /**
     * Yii cache component name
     * @var string
     */
    public $cache = 'cache';

    /**
     * Cache duration (default: month)
     * @var string
     */
    public $cacheDuration = 2592000;

    public function address(?string $ip = null): ?array
    {
        if ($ip === null) {
            $ip = Yii::$app->request->userIP;
        }

        if ($this->cache) {
            /** @var yii\caching\Cache $cache */
            $cache = Yii::$app->get($this->cache);
            if ($cache && $data = $cache->get('dadata-ip-' . $ip)) {
                return $data;
            }
        }

        $response = $this->request($ip);
        $response = $response ? $response['location'] : null;

        if (isset($cache)) {
            $cache->set('dadata-ip-' . $ip, $response, $this->cacheDuration);
        }

        return $response ?: null;
    }

    private function request(string $ip): ?array
    {
        if (empty($this->token)) {
            throw new InvalidArgumentException('Token is empty.');
        }

        $curl = curl_init($this->apiUrl . $ip);
        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => [
                'Authorization: Token ' . $this->token,
                'Accept: application/json'
            ]
        ]);

        $response = curl_exec($curl);
        $code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);

        return $code === 200 ? json_decode($response, true) : null;
    }
}