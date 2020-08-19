<?php

/**
 * ProjectsController
 * PHP version 7.1.3
 *
 * @category Class
 * @package  OpenAPI\Server\Controller
 * @author   OpenAPI Generator team
 * @link     https://github.com/openapitools/openapi-generator
 */

/**
 * Catroweb API
 *
 * API for the Catrobat Share Platform
 *
 * The version of the OpenAPI document: v1.0.42
 * Contact: webmaster@catrobat.org
 * Generated by: https://github.com/openapitools/openapi-generator.git
 *
 */

/**
 * NOTE: This class is auto generated by the openapi generator program.
 * https://github.com/openapitools/openapi-generator
 * Do not edit the class manually.
 */

namespace OpenAPI\Server\Controller;

use \Exception;
use JMS\Serializer\Exception\RuntimeException as SerializerRuntimeException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\Validator\Constraints as Assert;
use OpenAPI\Server\Api\ProjectsApiInterface;
use OpenAPI\Server\Model\FeaturedProjectResponse;
use OpenAPI\Server\Model\ProjectResponse;
use OpenAPI\Server\Model\UploadErrorResponse;

/**
 * ProjectsController Class Doc Comment
 *
 * @category Class
 * @package  OpenAPI\Server\Controller
 * @author   OpenAPI Generator team
 * @link     https://github.com/openapitools/openapi-generator
 */
class ProjectsController extends Controller
{

    /**
     * Operation projectIdGet
     *
     * Get the information of a project
     *
     * @param Request $request The Symfony request to handle.
     * @return Response The Symfony response.
     */
    public function projectIdGetAction(Request $request, $id)
    {
        // Figure out what data format to return to the client
        $produces = ['application/json'];
        // Figure out what the client accepts
        $clientAccepts = $request->headers->has('Accept')?$request->headers->get('Accept'):'*/*';
        $responseFormat = $this->getOutputFormat($clientAccepts, $produces);
        if ($responseFormat === null) {
            return new Response('', 406);
        }

        // Handle authentication

        // Read out all input parameter values into variables

        // Use the default value if no value was provided

        // Deserialize the input values that needs it
        try {
            $id = $this->deserialize($id, 'string', 'string');
        } catch (SerializerRuntimeException $exception) {
            return $this->createBadRequestResponse($exception->getMessage());
        }

        // Validate the input values
        $asserts = [];
        $asserts[] = new Assert\NotNull();
        $asserts[] = new Assert\Type("string");
        $asserts[] = new Assert\Regex("/^[a-zA-Z0-9\\-]+$/");
        $response = $this->validate($id, $asserts);
        if ($response instanceof Response) {
            return $response;
        }


        try {
            $handler = $this->getApiHandler();

            
            // Make the call to the business logic
            $responseCode = 200;
            $responseHeaders = [];
            $result = $handler->projectIdGet($id, $responseCode, $responseHeaders);

            // Find default response message
            $message = '';

            // Find a more specific message, if available
            switch ($responseCode) {
                case 200:
                    $message = 'Valid request';
                    break;
                case 400:
                    $message = 'Bad request (Invalid, or missing parameters)';
                    break;
                case 404:
                    $message = 'Not found';
                    break;
                case 406:
                    $message = 'Not acceptable - client must accept application/json as content type';
                    break;
            }

            return new Response(
                $result !== null ?$this->serialize($result, $responseFormat):'',
                $responseCode,
                array_merge(
                    $responseHeaders,
                    [
                        'Content-Type' => $responseFormat,
                        'X-OpenAPI-Message' => $message
                    ]
                )
            );
        } catch (Exception $fallthrough) {
            return $this->createErrorResponse(new HttpException(500, 'An unsuspected error occurred.', $fallthrough));
        }
    }

    /**
     * Operation projectsFeaturedGet
     *
     * Get the currently featured projects
     *
     * @param Request $request The Symfony request to handle.
     * @return Response The Symfony response.
     */
    public function projectsFeaturedGetAction(Request $request)
    {
        // Figure out what data format to return to the client
        $produces = ['application/json'];
        // Figure out what the client accepts
        $clientAccepts = $request->headers->has('Accept')?$request->headers->get('Accept'):'*/*';
        $responseFormat = $this->getOutputFormat($clientAccepts, $produces);
        if ($responseFormat === null) {
            return new Response('', 406);
        }

        // Handle authentication

        // Read out all input parameter values into variables
        $platform = $request->query->get('platform');
        $max_version = $request->query->get('max_version');
        $limit = $request->query->get('limit');
        $offset = $request->query->get('offset');
        $flavor = $request->query->get('flavor');

        // Use the default value if no value was provided

        // Deserialize the input values that needs it
        try {
            $platform = $this->deserialize($platform, 'string', 'string');
            $max_version = $this->deserialize($max_version, 'string', 'string');
            $limit = $this->deserialize($limit, 'int', 'string');
            $offset = $this->deserialize($offset, 'int', 'string');
            $flavor = $this->deserialize($flavor, 'string', 'string');
        } catch (SerializerRuntimeException $exception) {
            return $this->createBadRequestResponse($exception->getMessage());
        }

        // Validate the input values
        $asserts = [];
        $asserts[] = new Assert\Choice([ "android", "ios" ]);
        $asserts[] = new Assert\Type("string");
        $response = $this->validate($platform, $asserts);
        if ($response instanceof Response) {
            return $response;
        }
        $asserts = [];
        $asserts[] = new Assert\Type("string");
        $response = $this->validate($max_version, $asserts);
        if ($response instanceof Response) {
            return $response;
        }
        $asserts = [];
        $asserts[] = new Assert\Type("int");
        $asserts[] = new Assert\GreaterThanOrEqual(0);
        $response = $this->validate($limit, $asserts);
        if ($response instanceof Response) {
            return $response;
        }
        $asserts = [];
        $asserts[] = new Assert\Type("int");
        $asserts[] = new Assert\GreaterThanOrEqual(0);
        $response = $this->validate($offset, $asserts);
        if ($response instanceof Response) {
            return $response;
        }
        $asserts = [];
        $asserts[] = new Assert\Type("string");
        $response = $this->validate($flavor, $asserts);
        if ($response instanceof Response) {
            return $response;
        }


        try {
            $handler = $this->getApiHandler();

            
            // Make the call to the business logic
            $responseCode = 200;
            $responseHeaders = [];
            $result = $handler->projectsFeaturedGet($platform, $max_version, $limit, $offset, $flavor, $responseCode, $responseHeaders);

            // Find default response message
            $message = '';

            // Find a more specific message, if available
            switch ($responseCode) {
                case 200:
                    $message = 'OK';
                    break;
                case 400:
                    $message = 'Bad request (Invalid, or missing parameters)';
                    break;
                case 406:
                    $message = 'Not acceptable - client must accept application/json as content type';
                    break;
            }

            return new Response(
                $result !== null ?$this->serialize($result, $responseFormat):'',
                $responseCode,
                array_merge(
                    $responseHeaders,
                    [
                        'Content-Type' => $responseFormat,
                        'X-OpenAPI-Message' => $message
                    ]
                )
            );
        } catch (Exception $fallthrough) {
            return $this->createErrorResponse(new HttpException(500, 'An unsuspected error occurred.', $fallthrough));
        }
    }

    /**
     * Operation projectsGet
     *
     * Get projects
     *
     * @param Request $request The Symfony request to handle.
     * @return Response The Symfony response.
     */
    public function projectsGetAction(Request $request)
    {
        // Figure out what data format to return to the client
        $produces = ['application/json'];
        // Figure out what the client accepts
        $clientAccepts = $request->headers->has('Accept')?$request->headers->get('Accept'):'*/*';
        $responseFormat = $this->getOutputFormat($clientAccepts, $produces);
        if ($responseFormat === null) {
            return new Response('', 406);
        }

        // Handle authentication

        // Read out all input parameter values into variables
        $category = $request->query->get('category');
        $max_version = $request->query->get('max_version');
        $limit = $request->query->get('limit');
        $offset = $request->query->get('offset');
        $flavor = $request->query->get('flavor');
        $accept_language = $request->headers->get('Accept-Language');

        // Use the default value if no value was provided

        // Deserialize the input values that needs it
        try {
            $category = $this->deserialize($category, 'string', 'string');
            $accept_language = $this->deserialize($accept_language, 'string', 'string');
            $max_version = $this->deserialize($max_version, 'string', 'string');
            $limit = $this->deserialize($limit, 'int', 'string');
            $offset = $this->deserialize($offset, 'int', 'string');
            $flavor = $this->deserialize($flavor, 'string', 'string');
        } catch (SerializerRuntimeException $exception) {
            return $this->createBadRequestResponse($exception->getMessage());
        }

        // Validate the input values
        $asserts = [];
        $asserts[] = new Assert\NotNull();
        $asserts[] = new Assert\Choice([ "recent", "random", "most_viewed", "most_downloaded", "example", "scratch" ]);
        $asserts[] = new Assert\Type("string");
        $response = $this->validate($category, $asserts);
        if ($response instanceof Response) {
            return $response;
        }
        $asserts = [];
        $asserts[] = new Assert\Type("string");
        $response = $this->validate($accept_language, $asserts);
        if ($response instanceof Response) {
            return $response;
        }
        $asserts = [];
        $asserts[] = new Assert\Type("string");
        $response = $this->validate($max_version, $asserts);
        if ($response instanceof Response) {
            return $response;
        }
        $asserts = [];
        $asserts[] = new Assert\Type("int");
        $asserts[] = new Assert\GreaterThanOrEqual(0);
        $response = $this->validate($limit, $asserts);
        if ($response instanceof Response) {
            return $response;
        }
        $asserts = [];
        $asserts[] = new Assert\Type("int");
        $asserts[] = new Assert\GreaterThanOrEqual(0);
        $response = $this->validate($offset, $asserts);
        if ($response instanceof Response) {
            return $response;
        }
        $asserts = [];
        $asserts[] = new Assert\Type("string");
        $response = $this->validate($flavor, $asserts);
        if ($response instanceof Response) {
            return $response;
        }


        try {
            $handler = $this->getApiHandler();

            
            // Make the call to the business logic
            $responseCode = 200;
            $responseHeaders = [];
            $result = $handler->projectsGet($category, $accept_language, $max_version, $limit, $offset, $flavor, $responseCode, $responseHeaders);

            // Find default response message
            $message = '';

            // Find a more specific message, if available
            switch ($responseCode) {
                case 200:
                    $message = 'OK';
                    break;
                case 400:
                    $message = 'Bad request (Invalid, or missing parameters)';
                    break;
                case 406:
                    $message = 'Not acceptable - client must accept application/json as content type';
                    break;
            }

            return new Response(
                $result !== null ?$this->serialize($result, $responseFormat):'',
                $responseCode,
                array_merge(
                    $responseHeaders,
                    [
                        'Content-Type' => $responseFormat,
                        'X-OpenAPI-Message' => $message
                    ]
                )
            );
        } catch (Exception $fallthrough) {
            return $this->createErrorResponse(new HttpException(500, 'An unsuspected error occurred.', $fallthrough));
        }
    }

    /**
     * Operation projectsPost
     *
     * Upload a catrobat project
     *
     * @param Request $request The Symfony request to handle.
     * @return Response The Symfony response.
     */
    public function projectsPostAction(Request $request)
    {
        // Figure out what data format to return to the client
        $produces = ['application/json'];
        // Figure out what the client accepts
        $clientAccepts = $request->headers->has('Accept')?$request->headers->get('Accept'):'*/*';
        $responseFormat = $this->getOutputFormat($clientAccepts, $produces);
        if ($responseFormat === null) {
            return new Response('', 406);
        }

        // Handle authentication
        // Authentication 'PandaAuth' required
        // HTTP basic authentication required
        $securityPandaAuth = $request->headers->get('authorization');

        // Read out all input parameter values into variables
        $accept_language = $request->headers->get('Accept-Language');
        $checksum = $request->request->get('checksum');
        $file = $request->files->get('file');
        $flavor = $request->request->get('flavor');
        $private = $request->request->get('private');

        // Use the default value if no value was provided

        // Deserialize the input values that needs it
        try {
            $checksum = $this->deserialize($checksum, 'string', 'string');
            $accept_language = $this->deserialize($accept_language, 'string', 'string');
            $flavor = $this->deserialize($flavor, 'string', 'string');
            $private = $this->deserialize($private, 'bool', 'string');
        } catch (SerializerRuntimeException $exception) {
            return $this->createBadRequestResponse($exception->getMessage());
        }

        // Validate the input values
        $asserts = [];
        $asserts[] = new Assert\NotNull();
        $asserts[] = new Assert\Type("string");
        $response = $this->validate($checksum, $asserts);
        if ($response instanceof Response) {
            return $response;
        }
        $asserts = [];
        $asserts[] = new Assert\NotNull();
        $asserts[] = new Assert\File();
        $response = $this->validate($file, $asserts);
        if ($response instanceof Response) {
            return $response;
        }
        $asserts = [];
        $asserts[] = new Assert\Type("string");
        $response = $this->validate($accept_language, $asserts);
        if ($response instanceof Response) {
            return $response;
        }
        $asserts = [];
        $asserts[] = new Assert\Type("string");
        $response = $this->validate($flavor, $asserts);
        if ($response instanceof Response) {
            return $response;
        }
        $asserts = [];
        $asserts[] = new Assert\Type("bool");
        $response = $this->validate($private, $asserts);
        if ($response instanceof Response) {
            return $response;
        }


        try {
            $handler = $this->getApiHandler();

            // Set authentication method 'PandaAuth'
            $handler->setPandaAuth($securityPandaAuth);
            
            // Make the call to the business logic
            $responseCode = 200;
            $responseHeaders = [];
            $result = $handler->projectsPost($checksum, $file, $accept_language, $flavor, $private, $responseCode, $responseHeaders);

            // Find default response message
            $message = '';

            // Find a more specific message, if available
            switch ($responseCode) {
                case 201:
                    $message = 'Project successfully uploaded.';
                    break;
                case 400:
                    $message = 'Bad request (Invalid, or missing parameters)';
                    break;
                case 401:
                    $message = 'Invalid JWT token | JWT token not found | JWT token expired';
                    break;
                case 406:
                    $message = 'Not acceptable - client must accept application/json as content type';
                    break;
                case 422:
                    $message = 'Upload Error';
                    break;
            }

            return new Response(
                $result !== null ?$this->serialize($result, $responseFormat):'',
                $responseCode,
                array_merge(
                    $responseHeaders,
                    [
                        'Content-Type' => $responseFormat,
                        'X-OpenAPI-Message' => $message
                    ]
                )
            );
        } catch (Exception $fallthrough) {
            return $this->createErrorResponse(new HttpException(500, 'An unsuspected error occurred.', $fallthrough));
        }
    }

    /**
     * Operation projectsSearchGet
     *
     * Search for projects associated with a keywords
     *
     * @param Request $request The Symfony request to handle.
     * @return Response The Symfony response.
     */
    public function projectsSearchGetAction(Request $request)
    {
        // Figure out what data format to return to the client
        $produces = ['application/json'];
        // Figure out what the client accepts
        $clientAccepts = $request->headers->has('Accept')?$request->headers->get('Accept'):'*/*';
        $responseFormat = $this->getOutputFormat($clientAccepts, $produces);
        if ($responseFormat === null) {
            return new Response('', 406);
        }

        // Handle authentication

        // Read out all input parameter values into variables
        $query = $request->query->get('query');
        $max_version = $request->query->get('max_version');
        $limit = $request->query->get('limit');
        $offset = $request->query->get('offset');
        $flavor = $request->query->get('flavor');

        // Use the default value if no value was provided

        // Deserialize the input values that needs it
        try {
            $query = $this->deserialize($query, 'string', 'string');
            $max_version = $this->deserialize($max_version, 'string', 'string');
            $limit = $this->deserialize($limit, 'int', 'string');
            $offset = $this->deserialize($offset, 'int', 'string');
            $flavor = $this->deserialize($flavor, 'string', 'string');
        } catch (SerializerRuntimeException $exception) {
            return $this->createBadRequestResponse($exception->getMessage());
        }

        // Validate the input values
        $asserts = [];
        $asserts[] = new Assert\NotNull();
        $asserts[] = new Assert\Type("string");
        $response = $this->validate($query, $asserts);
        if ($response instanceof Response) {
            return $response;
        }
        $asserts = [];
        $asserts[] = new Assert\Type("string");
        $response = $this->validate($max_version, $asserts);
        if ($response instanceof Response) {
            return $response;
        }
        $asserts = [];
        $asserts[] = new Assert\Type("int");
        $asserts[] = new Assert\GreaterThanOrEqual(0);
        $response = $this->validate($limit, $asserts);
        if ($response instanceof Response) {
            return $response;
        }
        $asserts = [];
        $asserts[] = new Assert\Type("int");
        $asserts[] = new Assert\GreaterThanOrEqual(0);
        $response = $this->validate($offset, $asserts);
        if ($response instanceof Response) {
            return $response;
        }
        $asserts = [];
        $asserts[] = new Assert\Type("string");
        $response = $this->validate($flavor, $asserts);
        if ($response instanceof Response) {
            return $response;
        }


        try {
            $handler = $this->getApiHandler();

            
            // Make the call to the business logic
            $responseCode = 200;
            $responseHeaders = [];
            $result = $handler->projectsSearchGet($query, $max_version, $limit, $offset, $flavor, $responseCode, $responseHeaders);

            // Find default response message
            $message = '';

            // Find a more specific message, if available
            switch ($responseCode) {
                case 200:
                    $message = 'OK';
                    break;
                case 400:
                    $message = 'Bad request (Invalid, or missing parameters)';
                    break;
                case 406:
                    $message = 'Not acceptable - client must accept application/json as content type';
                    break;
            }

            return new Response(
                $result !== null ?$this->serialize($result, $responseFormat):'',
                $responseCode,
                array_merge(
                    $responseHeaders,
                    [
                        'Content-Type' => $responseFormat,
                        'X-OpenAPI-Message' => $message
                    ]
                )
            );
        } catch (Exception $fallthrough) {
            return $this->createErrorResponse(new HttpException(500, 'An unsuspected error occurred.', $fallthrough));
        }
    }

    /**
     * Operation projectsUserGet
     *
     * Get the projects of the logged in user
     *
     * @param Request $request The Symfony request to handle.
     * @return Response The Symfony response.
     */
    public function projectsUserGetAction(Request $request)
    {
        // Figure out what data format to return to the client
        $produces = ['application/json'];
        // Figure out what the client accepts
        $clientAccepts = $request->headers->has('Accept')?$request->headers->get('Accept'):'*/*';
        $responseFormat = $this->getOutputFormat($clientAccepts, $produces);
        if ($responseFormat === null) {
            return new Response('', 406);
        }

        // Handle authentication
        // Authentication 'PandaAuth' required
        // HTTP basic authentication required
        $securityPandaAuth = $request->headers->get('authorization');

        // Read out all input parameter values into variables
        $max_version = $request->query->get('max_version');
        $limit = $request->query->get('limit');
        $offset = $request->query->get('offset');
        $flavor = $request->query->get('flavor');

        // Use the default value if no value was provided

        // Deserialize the input values that needs it
        try {
            $max_version = $this->deserialize($max_version, 'string', 'string');
            $limit = $this->deserialize($limit, 'int', 'string');
            $offset = $this->deserialize($offset, 'int', 'string');
            $flavor = $this->deserialize($flavor, 'string', 'string');
        } catch (SerializerRuntimeException $exception) {
            return $this->createBadRequestResponse($exception->getMessage());
        }

        // Validate the input values
        $asserts = [];
        $asserts[] = new Assert\Type("string");
        $response = $this->validate($max_version, $asserts);
        if ($response instanceof Response) {
            return $response;
        }
        $asserts = [];
        $asserts[] = new Assert\Type("int");
        $asserts[] = new Assert\GreaterThanOrEqual(0);
        $response = $this->validate($limit, $asserts);
        if ($response instanceof Response) {
            return $response;
        }
        $asserts = [];
        $asserts[] = new Assert\Type("int");
        $asserts[] = new Assert\GreaterThanOrEqual(0);
        $response = $this->validate($offset, $asserts);
        if ($response instanceof Response) {
            return $response;
        }
        $asserts = [];
        $asserts[] = new Assert\Type("string");
        $response = $this->validate($flavor, $asserts);
        if ($response instanceof Response) {
            return $response;
        }


        try {
            $handler = $this->getApiHandler();

            // Set authentication method 'PandaAuth'
            $handler->setPandaAuth($securityPandaAuth);
            
            // Make the call to the business logic
            $responseCode = 200;
            $responseHeaders = [];
            $result = $handler->projectsUserGet($max_version, $limit, $offset, $flavor, $responseCode, $responseHeaders);

            // Find default response message
            $message = '';

            // Find a more specific message, if available
            switch ($responseCode) {
                case 200:
                    $message = 'Valid request';
                    break;
                case 400:
                    $message = 'Bad request (Invalid, or missing parameters)';
                    break;
                case 401:
                    $message = 'Invalid JWT token | JWT token not found | JWT token expired';
                    break;
                case 406:
                    $message = 'Not acceptable - client must accept application/json as content type';
                    break;
            }

            return new Response(
                $result !== null ?$this->serialize($result, $responseFormat):'',
                $responseCode,
                array_merge(
                    $responseHeaders,
                    [
                        'Content-Type' => $responseFormat,
                        'X-OpenAPI-Message' => $message
                    ]
                )
            );
        } catch (Exception $fallthrough) {
            return $this->createErrorResponse(new HttpException(500, 'An unsuspected error occurred.', $fallthrough));
        }
    }

    /**
     * Operation projectsUserIdGet
     *
     * Get the public projects of a given user
     *
     * @param Request $request The Symfony request to handle.
     * @return Response The Symfony response.
     */
    public function projectsUserIdGetAction(Request $request, $id)
    {
        // Figure out what data format to return to the client
        $produces = ['application/json'];
        // Figure out what the client accepts
        $clientAccepts = $request->headers->has('Accept')?$request->headers->get('Accept'):'*/*';
        $responseFormat = $this->getOutputFormat($clientAccepts, $produces);
        if ($responseFormat === null) {
            return new Response('', 406);
        }

        // Handle authentication

        // Read out all input parameter values into variables
        $max_version = $request->query->get('max_version');
        $limit = $request->query->get('limit');
        $offset = $request->query->get('offset');
        $flavor = $request->query->get('flavor');

        // Use the default value if no value was provided

        // Deserialize the input values that needs it
        try {
            $id = $this->deserialize($id, 'string', 'string');
            $max_version = $this->deserialize($max_version, 'string', 'string');
            $limit = $this->deserialize($limit, 'int', 'string');
            $offset = $this->deserialize($offset, 'int', 'string');
            $flavor = $this->deserialize($flavor, 'string', 'string');
        } catch (SerializerRuntimeException $exception) {
            return $this->createBadRequestResponse($exception->getMessage());
        }

        // Validate the input values
        $asserts = [];
        $asserts[] = new Assert\NotNull();
        $asserts[] = new Assert\Type("string");
        $asserts[] = new Assert\Regex("/^[a-zA-Z0-9\\-]+$/");
        $response = $this->validate($id, $asserts);
        if ($response instanceof Response) {
            return $response;
        }
        $asserts = [];
        $asserts[] = new Assert\Type("string");
        $response = $this->validate($max_version, $asserts);
        if ($response instanceof Response) {
            return $response;
        }
        $asserts = [];
        $asserts[] = new Assert\Type("int");
        $asserts[] = new Assert\GreaterThanOrEqual(0);
        $response = $this->validate($limit, $asserts);
        if ($response instanceof Response) {
            return $response;
        }
        $asserts = [];
        $asserts[] = new Assert\Type("int");
        $asserts[] = new Assert\GreaterThanOrEqual(0);
        $response = $this->validate($offset, $asserts);
        if ($response instanceof Response) {
            return $response;
        }
        $asserts = [];
        $asserts[] = new Assert\Type("string");
        $response = $this->validate($flavor, $asserts);
        if ($response instanceof Response) {
            return $response;
        }


        try {
            $handler = $this->getApiHandler();

            
            // Make the call to the business logic
            $responseCode = 200;
            $responseHeaders = [];
            $result = $handler->projectsUserIdGet($id, $max_version, $limit, $offset, $flavor, $responseCode, $responseHeaders);

            // Find default response message
            $message = '';

            // Find a more specific message, if available
            switch ($responseCode) {
                case 200:
                    $message = 'Valid request';
                    break;
                case 400:
                    $message = 'Bad request (Invalid, or missing parameters)';
                    break;
                case 404:
                    $message = 'Not found';
                    break;
                case 406:
                    $message = 'Not acceptable - client must accept application/json as content type';
                    break;
            }

            return new Response(
                $result !== null ?$this->serialize($result, $responseFormat):'',
                $responseCode,
                array_merge(
                    $responseHeaders,
                    [
                        'Content-Type' => $responseFormat,
                        'X-OpenAPI-Message' => $message
                    ]
                )
            );
        } catch (Exception $fallthrough) {
            return $this->createErrorResponse(new HttpException(500, 'An unsuspected error occurred.', $fallthrough));
        }
    }

    /**
     * Returns the handler for this API controller.
     * @return ProjectsApiInterface
     */
    public function getApiHandler()
    {
        return $this->apiServer->getApiHandler('projects');
    }
}
