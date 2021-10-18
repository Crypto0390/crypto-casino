<?php

namespace App\Services;

use Exception;
use GuzzleHttp\Client;
use function GuzzleHttp\json_decode as jsonDecode;

class LicenseService
{
    /**
     * Register a license
     *
     * @param $code
     * @param $email
     * @return mixed
     */
    public function register($code, $email, $hash = NULL)
    {
        try {
            $client = new Client(['base_uri' => config('app.api.products.base_uri')]);

            $response = $client->request('POST', 'licenses/register', [
                'form_params' => [
                    'code' => $code,
                    'email' => $email,
                    'domain' => request()->getHost(),
                    'hash' => $hash ?: config('app.hash')
                ]
            ]);

            return jsonDecode($response->getBody()->getContents());
        } catch (Exception $e) {
            return (object) ['success' => FALSE, 'message' => $e->getMessage()];
        }
    }

    public function download($purchaseCode, $email, $hash, $version)
    {
        try {
            $client = new Client(['base_uri' => config('app.api.products.base_uri')]);
            $response = $client->request('POST', 'products/download', [
                'form_params' => [
                    'code' => $purchaseCode,
                    'email' => $email,
                    'domain' => request()->getHost(),
                    'hash' => $hash,
                    'version' => $version
                ],
            ]);

            return $response->getHeaderLine('Content-Type') == 'application/zip'
                ? $response->getBody()->getContents()
                : jsonDecode($response->getBody()->getContents());
        }  catch (Exception $e) {
            return (object) ['success' => FALSE, 'message' => $e->getMessage()];
        }
    }
}
