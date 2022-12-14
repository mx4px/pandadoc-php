<?php
/**
 * WebhookEventsApi
 * PHP version 7.3
 *
 * @category Class
 * @package  PandaDoc\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * PandaDoc Public API
 *
 * PandaDoc Public API documentation
 *
 * Generated by: https://openapi-generator.tech
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace PandaDoc\Client\Api;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use PandaDoc\Client\ApiException;
use PandaDoc\Client\Configuration;
use PandaDoc\Client\HeaderSelector;
use PandaDoc\Client\ObjectSerializer;

/**
 * WebhookEventsApi Class Doc Comment
 *
 * @category Class
 * @package  PandaDoc\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class WebhookEventsApi
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var Configuration
     */
    protected $config;

    /**
     * @var HeaderSelector
     */
    protected $headerSelector;

    /**
     * @var int Host index
     */
    protected $hostIndex;

    /**
     * @param ClientInterface $client
     * @param Configuration   $config
     * @param HeaderSelector  $selector
     * @param int             $hostIndex (Optional) host index to select the list of hosts if defined in the OpenAPI spec
     */
    public function __construct(
        ClientInterface $client = null,
        Configuration $config = null,
        HeaderSelector $selector = null,
        $hostIndex = 0
    ) {
        $this->client = $client ?: new Client();
        $this->config = $config ?: new Configuration();
        $this->headerSelector = $selector ?: new HeaderSelector();
        $this->hostIndex = $hostIndex;
    }

    /**
     * Set the host index
     *
     * @param int $hostIndex Host index (required)
     */
    public function setHostIndex($hostIndex): void
    {
        $this->hostIndex = $hostIndex;
    }

    /**
     * Get the host index
     *
     * @return int Host index
     */
    public function getHostIndex()
    {
        return $this->hostIndex;
    }

    /**
     * @return Configuration
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Operation detailsWebhookEvent
     *
     * Get webhook event by uuid
     *
     * @param  string $id Webhook event uuid (required)
     *
     * @throws \PandaDoc\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \PandaDoc\Client\Model\WebhookEventDetailsResponse|object|object
     */
    public function detailsWebhookEvent($id)
    {
        list($response) = $this->detailsWebhookEventWithHttpInfo($id);
        return $response;
    }

    /**
     * Operation detailsWebhookEventWithHttpInfo
     *
     * Get webhook event by uuid
     *
     * @param  string $id Webhook event uuid (required)
     *
     * @throws \PandaDoc\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \PandaDoc\Client\Model\WebhookEventDetailsResponse|object|object, HTTP status code, HTTP response headers (array of strings)
     */
    public function detailsWebhookEventWithHttpInfo($id)
    {
        $request = $this->detailsWebhookEventRequest($id);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\PandaDoc\Client\Model\WebhookEventDetailsResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\PandaDoc\Client\Model\WebhookEventDetailsResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 401:
                    if ('object' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }

                    return [
                        ObjectSerializer::deserialize($content, 'object', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 429:
                    if ('object' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }

                    return [
                        ObjectSerializer::deserialize($content, 'object', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\PandaDoc\Client\Model\WebhookEventDetailsResponse';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\PandaDoc\Client\Model\WebhookEventDetailsResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        'object',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 429:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        'object',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation detailsWebhookEventAsync
     *
     * Get webhook event by uuid
     *
     * @param  string $id Webhook event uuid (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function detailsWebhookEventAsync($id)
    {
        return $this->detailsWebhookEventAsyncWithHttpInfo($id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation detailsWebhookEventAsyncWithHttpInfo
     *
     * Get webhook event by uuid
     *
     * @param  string $id Webhook event uuid (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function detailsWebhookEventAsyncWithHttpInfo($id)
    {
        $returnType = '\PandaDoc\Client\Model\WebhookEventDetailsResponse';
        $request = $this->detailsWebhookEventRequest($id);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'detailsWebhookEvent'
     *
     * @param  string $id Webhook event uuid (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function detailsWebhookEventRequest($id)
    {
        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling detailsWebhookEvent'
            );
        }

        $resourcePath = '/public/v1/webhook-events/{id}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($id !== null) {
            $resourcePath = str_replace(
                '{' . 'id' . '}',
                ObjectSerializer::toPathValue($id),
                $resourcePath
            );
        }


        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\Query::build($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('Authorization');
        if ($apiKey !== null) {
            $headers['Authorization'] = $apiKey;
        }
        // this endpoint requires OAuth (access token)
        if ($this->config->getAccessToken() != null) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\Query::build($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation listWebhookEvent
     *
     * Get webhook event page
     *
     * @param  int $count Number of element in page (required)
     * @param  int $page Page number (required)
     * @param  \DateTime $since Filter option: all events from specified timestamp (optional)
     * @param  \DateTime $to Filter option: all events up to specified timestamp (optional)
     * @param  \PandaDoc\Client\Model\WebhookEventTriggerEnum[] $type Filter option: all events of type (optional)
     * @param  \PandaDoc\Client\Model\WebhookEventHttpStatusCodeGroupEnum[] $httpStatusCode Filter option: all events of http status code (optional)
     * @param  \PandaDoc\Client\Model\WebhookEventErrorEnum[] $error Filter option: all events with following error (optional)
     *
     * @throws \PandaDoc\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \PandaDoc\Client\Model\WebhookEventPageResponse|object|object
     */
    public function listWebhookEvent($count, $page, $since = null, $to = null, $type = null, $httpStatusCode = null, $error = null)
    {
        list($response) = $this->listWebhookEventWithHttpInfo($count, $page, $since, $to, $type, $httpStatusCode, $error);
        return $response;
    }

    /**
     * Operation listWebhookEventWithHttpInfo
     *
     * Get webhook event page
     *
     * @param  int $count Number of element in page (required)
     * @param  int $page Page number (required)
     * @param  \DateTime $since Filter option: all events from specified timestamp (optional)
     * @param  \DateTime $to Filter option: all events up to specified timestamp (optional)
     * @param  \PandaDoc\Client\Model\WebhookEventTriggerEnum[] $type Filter option: all events of type (optional)
     * @param  \PandaDoc\Client\Model\WebhookEventHttpStatusCodeGroupEnum[] $httpStatusCode Filter option: all events of http status code (optional)
     * @param  \PandaDoc\Client\Model\WebhookEventErrorEnum[] $error Filter option: all events with following error (optional)
     *
     * @throws \PandaDoc\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \PandaDoc\Client\Model\WebhookEventPageResponse|object|object, HTTP status code, HTTP response headers (array of strings)
     */
    public function listWebhookEventWithHttpInfo($count, $page, $since = null, $to = null, $type = null, $httpStatusCode = null, $error = null)
    {
        $request = $this->listWebhookEventRequest($count, $page, $since, $to, $type, $httpStatusCode, $error);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\PandaDoc\Client\Model\WebhookEventPageResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\PandaDoc\Client\Model\WebhookEventPageResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 401:
                    if ('object' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }

                    return [
                        ObjectSerializer::deserialize($content, 'object', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 429:
                    if ('object' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }

                    return [
                        ObjectSerializer::deserialize($content, 'object', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\PandaDoc\Client\Model\WebhookEventPageResponse';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\PandaDoc\Client\Model\WebhookEventPageResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        'object',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 429:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        'object',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation listWebhookEventAsync
     *
     * Get webhook event page
     *
     * @param  int $count Number of element in page (required)
     * @param  int $page Page number (required)
     * @param  \DateTime $since Filter option: all events from specified timestamp (optional)
     * @param  \DateTime $to Filter option: all events up to specified timestamp (optional)
     * @param  \PandaDoc\Client\Model\WebhookEventTriggerEnum[] $type Filter option: all events of type (optional)
     * @param  \PandaDoc\Client\Model\WebhookEventHttpStatusCodeGroupEnum[] $httpStatusCode Filter option: all events of http status code (optional)
     * @param  \PandaDoc\Client\Model\WebhookEventErrorEnum[] $error Filter option: all events with following error (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function listWebhookEventAsync($count, $page, $since = null, $to = null, $type = null, $httpStatusCode = null, $error = null)
    {
        return $this->listWebhookEventAsyncWithHttpInfo($count, $page, $since, $to, $type, $httpStatusCode, $error)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation listWebhookEventAsyncWithHttpInfo
     *
     * Get webhook event page
     *
     * @param  int $count Number of element in page (required)
     * @param  int $page Page number (required)
     * @param  \DateTime $since Filter option: all events from specified timestamp (optional)
     * @param  \DateTime $to Filter option: all events up to specified timestamp (optional)
     * @param  \PandaDoc\Client\Model\WebhookEventTriggerEnum[] $type Filter option: all events of type (optional)
     * @param  \PandaDoc\Client\Model\WebhookEventHttpStatusCodeGroupEnum[] $httpStatusCode Filter option: all events of http status code (optional)
     * @param  \PandaDoc\Client\Model\WebhookEventErrorEnum[] $error Filter option: all events with following error (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function listWebhookEventAsyncWithHttpInfo($count, $page, $since = null, $to = null, $type = null, $httpStatusCode = null, $error = null)
    {
        $returnType = '\PandaDoc\Client\Model\WebhookEventPageResponse';
        $request = $this->listWebhookEventRequest($count, $page, $since, $to, $type, $httpStatusCode, $error);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'listWebhookEvent'
     *
     * @param  int $count Number of element in page (required)
     * @param  int $page Page number (required)
     * @param  \DateTime $since Filter option: all events from specified timestamp (optional)
     * @param  \DateTime $to Filter option: all events up to specified timestamp (optional)
     * @param  \PandaDoc\Client\Model\WebhookEventTriggerEnum[] $type Filter option: all events of type (optional)
     * @param  \PandaDoc\Client\Model\WebhookEventHttpStatusCodeGroupEnum[] $httpStatusCode Filter option: all events of http status code (optional)
     * @param  \PandaDoc\Client\Model\WebhookEventErrorEnum[] $error Filter option: all events with following error (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function listWebhookEventRequest($count, $page, $since = null, $to = null, $type = null, $httpStatusCode = null, $error = null)
    {
        // verify the required parameter 'count' is set
        if ($count === null || (is_array($count) && count($count) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $count when calling listWebhookEvent'
            );
        }
        if ($count < 0) {
            throw new \InvalidArgumentException('invalid value for "$count" when calling WebhookEventsApi.listWebhookEvent, must be bigger than or equal to 0.');
        }

        // verify the required parameter 'page' is set
        if ($page === null || (is_array($page) && count($page) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $page when calling listWebhookEvent'
            );
        }
        if ($page < 0) {
            throw new \InvalidArgumentException('invalid value for "$page" when calling WebhookEventsApi.listWebhookEvent, must be bigger than or equal to 0.');
        }


        $resourcePath = '/public/v1/webhook-events';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($count !== null) {
            if('form' === 'form' && is_array($count)) {
                foreach($count as $key => $value) {
                    $queryParams[$key] = $value;
                }
            }
            else {
                $queryParams['count'] = $count;
            }
        }
        // query params
        if ($page !== null) {
            if('form' === 'form' && is_array($page)) {
                foreach($page as $key => $value) {
                    $queryParams[$key] = $value;
                }
            }
            else {
                $queryParams['page'] = $page;
            }
        }
        // query params
        if ($since !== null) {
            if('form' === 'form' && is_array($since)) {
                foreach($since as $key => $value) {
                    $queryParams[$key] = $value;
                }
            }
            else {
                $queryParams['since'] = $since;
            }
        }
        // query params
        if ($to !== null) {
            if('form' === 'form' && is_array($to)) {
                foreach($to as $key => $value) {
                    $queryParams[$key] = $value;
                }
            }
            else {
                $queryParams['to'] = $to;
            }
        }
        // query params
        if ($type !== null) {
            if('form' === 'form' && is_array($type)) {
                foreach($type as $key => $value) {
                    $queryParams[$key] = $value;
                }
            }
            else {
                $queryParams['type'] = $type;
            }
        }
        // query params
        if ($httpStatusCode !== null) {
            if('form' === 'form' && is_array($httpStatusCode)) {
                foreach($httpStatusCode as $key => $value) {
                    $queryParams[$key] = $value;
                }
            }
            else {
                $queryParams['http_status_code'] = $httpStatusCode;
            }
        }
        // query params
        if ($error !== null) {
            if('form' === 'form' && is_array($error)) {
                foreach($error as $key => $value) {
                    $queryParams[$key] = $value;
                }
            }
            else {
                $queryParams['error'] = $error;
            }
        }




        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\Query::build($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('Authorization');
        if ($apiKey !== null) {
            $headers['Authorization'] = $apiKey;
        }
        // this endpoint requires OAuth (access token)
        if ($this->config->getAccessToken() != null) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\Query::build($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create http client option
     *
     * @throws \RuntimeException on file opening failure
     * @return array of http client options
     */
    protected function createHttpClientOption()
    {
        $options = [];
        if ($this->config->getDebug()) {
            $options[RequestOptions::DEBUG] = fopen($this->config->getDebugFile(), 'a');
            if (!$options[RequestOptions::DEBUG]) {
                throw new \RuntimeException('Failed to open the debug file: ' . $this->config->getDebugFile());
            }
        }

        return $options;
    }
}
