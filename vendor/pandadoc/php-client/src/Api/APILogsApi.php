<?php
/**
 * APILogsApi
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
 * APILogsApi Class Doc Comment
 *
 * @category Class
 * @package  PandaDoc\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class APILogsApi
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
     * Operation detailsLog
     *
     * Details API Log
     *
     * @param  string $id Log event id. (required)
     *
     * @throws \PandaDoc\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \PandaDoc\Client\Model\APILogDetailsResponse|object|object|object
     */
    public function detailsLog($id)
    {
        list($response) = $this->detailsLogWithHttpInfo($id);
        return $response;
    }

    /**
     * Operation detailsLogWithHttpInfo
     *
     * Details API Log
     *
     * @param  string $id Log event id. (required)
     *
     * @throws \PandaDoc\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \PandaDoc\Client\Model\APILogDetailsResponse|object|object|object, HTTP status code, HTTP response headers (array of strings)
     */
    public function detailsLogWithHttpInfo($id)
    {
        $request = $this->detailsLogRequest($id);

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
                    if ('\PandaDoc\Client\Model\APILogDetailsResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\PandaDoc\Client\Model\APILogDetailsResponse', []),
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
                case 404:
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

            $returnType = '\PandaDoc\Client\Model\APILogDetailsResponse';
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
                        '\PandaDoc\Client\Model\APILogDetailsResponse',
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
                case 404:
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
     * Operation detailsLogAsync
     *
     * Details API Log
     *
     * @param  string $id Log event id. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function detailsLogAsync($id)
    {
        return $this->detailsLogAsyncWithHttpInfo($id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation detailsLogAsyncWithHttpInfo
     *
     * Details API Log
     *
     * @param  string $id Log event id. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function detailsLogAsyncWithHttpInfo($id)
    {
        $returnType = '\PandaDoc\Client\Model\APILogDetailsResponse';
        $request = $this->detailsLogRequest($id);

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
     * Create request for operation 'detailsLog'
     *
     * @param  string $id Log event id. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function detailsLogRequest($id)
    {
        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling detailsLog'
            );
        }

        $resourcePath = '/public/v1/logs/{id}';
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
     * Operation listLogs
     *
     * List API Log
     *
     * @param  string $since Determines a point in time from which logs should be fetched. Either a specific ISO 8601 datetime or a relative identifier such as \&quot;-90d\&quot; (for past 90 days). (optional)
     * @param  string $to Determines a point in time from which logs should be fetched. Either a specific ISO 8601 datetime or a relative identifier such as \&quot;-10d\&quot; (for past 10 days) or a special \&quot;now\&quot; value. (optional)
     * @param  int $count The amount of items on each page. (optional)
     * @param  int $page Page number of the results returned. (optional)
     * @param  int[] $statuses Returns only the predefined status codes. Allows 1xx, 2xx, 3xx, 4xx, and 5xx. (optional)
     * @param  string[] $methods Returns only the predefined HTTP methods. Allows GET, POST, PUT, PATCH, and DELETE. (optional)
     * @param  string $search Returns the results containing a string. (optional)
     * @param  string $environmentType Returns logs for production/sandbox. (optional)
     *
     * @throws \PandaDoc\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \PandaDoc\Client\Model\APILogListResponse|object|object|object
     */
    public function listLogs($since = null, $to = null, $count = null, $page = null, $statuses = null, $methods = null, $search = null, $environmentType = null)
    {
        list($response) = $this->listLogsWithHttpInfo($since, $to, $count, $page, $statuses, $methods, $search, $environmentType);
        return $response;
    }

    /**
     * Operation listLogsWithHttpInfo
     *
     * List API Log
     *
     * @param  string $since Determines a point in time from which logs should be fetched. Either a specific ISO 8601 datetime or a relative identifier such as \&quot;-90d\&quot; (for past 90 days). (optional)
     * @param  string $to Determines a point in time from which logs should be fetched. Either a specific ISO 8601 datetime or a relative identifier such as \&quot;-10d\&quot; (for past 10 days) or a special \&quot;now\&quot; value. (optional)
     * @param  int $count The amount of items on each page. (optional)
     * @param  int $page Page number of the results returned. (optional)
     * @param  int[] $statuses Returns only the predefined status codes. Allows 1xx, 2xx, 3xx, 4xx, and 5xx. (optional)
     * @param  string[] $methods Returns only the predefined HTTP methods. Allows GET, POST, PUT, PATCH, and DELETE. (optional)
     * @param  string $search Returns the results containing a string. (optional)
     * @param  string $environmentType Returns logs for production/sandbox. (optional)
     *
     * @throws \PandaDoc\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \PandaDoc\Client\Model\APILogListResponse|object|object|object, HTTP status code, HTTP response headers (array of strings)
     */
    public function listLogsWithHttpInfo($since = null, $to = null, $count = null, $page = null, $statuses = null, $methods = null, $search = null, $environmentType = null)
    {
        $request = $this->listLogsRequest($since, $to, $count, $page, $statuses, $methods, $search, $environmentType);

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
                    if ('\PandaDoc\Client\Model\APILogListResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\PandaDoc\Client\Model\APILogListResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
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

            $returnType = '\PandaDoc\Client\Model\APILogListResponse';
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
                        '\PandaDoc\Client\Model\APILogListResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        'object',
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
     * Operation listLogsAsync
     *
     * List API Log
     *
     * @param  string $since Determines a point in time from which logs should be fetched. Either a specific ISO 8601 datetime or a relative identifier such as \&quot;-90d\&quot; (for past 90 days). (optional)
     * @param  string $to Determines a point in time from which logs should be fetched. Either a specific ISO 8601 datetime or a relative identifier such as \&quot;-10d\&quot; (for past 10 days) or a special \&quot;now\&quot; value. (optional)
     * @param  int $count The amount of items on each page. (optional)
     * @param  int $page Page number of the results returned. (optional)
     * @param  int[] $statuses Returns only the predefined status codes. Allows 1xx, 2xx, 3xx, 4xx, and 5xx. (optional)
     * @param  string[] $methods Returns only the predefined HTTP methods. Allows GET, POST, PUT, PATCH, and DELETE. (optional)
     * @param  string $search Returns the results containing a string. (optional)
     * @param  string $environmentType Returns logs for production/sandbox. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function listLogsAsync($since = null, $to = null, $count = null, $page = null, $statuses = null, $methods = null, $search = null, $environmentType = null)
    {
        return $this->listLogsAsyncWithHttpInfo($since, $to, $count, $page, $statuses, $methods, $search, $environmentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation listLogsAsyncWithHttpInfo
     *
     * List API Log
     *
     * @param  string $since Determines a point in time from which logs should be fetched. Either a specific ISO 8601 datetime or a relative identifier such as \&quot;-90d\&quot; (for past 90 days). (optional)
     * @param  string $to Determines a point in time from which logs should be fetched. Either a specific ISO 8601 datetime or a relative identifier such as \&quot;-10d\&quot; (for past 10 days) or a special \&quot;now\&quot; value. (optional)
     * @param  int $count The amount of items on each page. (optional)
     * @param  int $page Page number of the results returned. (optional)
     * @param  int[] $statuses Returns only the predefined status codes. Allows 1xx, 2xx, 3xx, 4xx, and 5xx. (optional)
     * @param  string[] $methods Returns only the predefined HTTP methods. Allows GET, POST, PUT, PATCH, and DELETE. (optional)
     * @param  string $search Returns the results containing a string. (optional)
     * @param  string $environmentType Returns logs for production/sandbox. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function listLogsAsyncWithHttpInfo($since = null, $to = null, $count = null, $page = null, $statuses = null, $methods = null, $search = null, $environmentType = null)
    {
        $returnType = '\PandaDoc\Client\Model\APILogListResponse';
        $request = $this->listLogsRequest($since, $to, $count, $page, $statuses, $methods, $search, $environmentType);

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
     * Create request for operation 'listLogs'
     *
     * @param  string $since Determines a point in time from which logs should be fetched. Either a specific ISO 8601 datetime or a relative identifier such as \&quot;-90d\&quot; (for past 90 days). (optional)
     * @param  string $to Determines a point in time from which logs should be fetched. Either a specific ISO 8601 datetime or a relative identifier such as \&quot;-10d\&quot; (for past 10 days) or a special \&quot;now\&quot; value. (optional)
     * @param  int $count The amount of items on each page. (optional)
     * @param  int $page Page number of the results returned. (optional)
     * @param  int[] $statuses Returns only the predefined status codes. Allows 1xx, 2xx, 3xx, 4xx, and 5xx. (optional)
     * @param  string[] $methods Returns only the predefined HTTP methods. Allows GET, POST, PUT, PATCH, and DELETE. (optional)
     * @param  string $search Returns the results containing a string. (optional)
     * @param  string $environmentType Returns logs for production/sandbox. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function listLogsRequest($since = null, $to = null, $count = null, $page = null, $statuses = null, $methods = null, $search = null, $environmentType = null)
    {
        if ($count !== null && $count < 1) {
            throw new \InvalidArgumentException('invalid value for "$count" when calling APILogsApi.listLogs, must be bigger than or equal to 1.');
        }

        if ($page !== null && $page < 1) {
            throw new \InvalidArgumentException('invalid value for "$page" when calling APILogsApi.listLogs, must be bigger than or equal to 1.');
        }


        $resourcePath = '/public/v1/logs';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

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
        if ($statuses !== null) {
            if('form' === 'form' && is_array($statuses)) {
                foreach($statuses as $key => $value) {
                    $queryParams[$key] = $value;
                }
            }
            else {
                $queryParams['statuses'] = $statuses;
            }
        }
        // query params
        if ($methods !== null) {
            if('form' === 'form' && is_array($methods)) {
                foreach($methods as $key => $value) {
                    $queryParams[$key] = $value;
                }
            }
            else {
                $queryParams['methods'] = $methods;
            }
        }
        // query params
        if ($search !== null) {
            if('form' === 'form' && is_array($search)) {
                foreach($search as $key => $value) {
                    $queryParams[$key] = $value;
                }
            }
            else {
                $queryParams['search'] = $search;
            }
        }
        // query params
        if ($environmentType !== null) {
            if('form' === 'form' && is_array($environmentType)) {
                foreach($environmentType as $key => $value) {
                    $queryParams[$key] = $value;
                }
            }
            else {
                $queryParams['environment_type'] = $environmentType;
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
