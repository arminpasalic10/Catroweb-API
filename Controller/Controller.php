<?php
/**
 * Controller
 *
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

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;
use OpenAPI\Server\Service\SerializerInterface;
use OpenAPI\Server\Service\ValidatorInterface;

/**
 * Controller Class Doc Comment
 *
 * @category Class
 * @package  OpenAPI\Server\Controller
 * @author   OpenAPI Generator team
 * @link     https://github.com/openapitools/openapi-generator
 */
class Controller extends AbstractController
{
    protected $validator;
    protected $serializer;
    protected $apiServer;

    public function setValidator(ValidatorInterface $validator)
    {
        $this->validator = $validator;
    }

    public function setSerializer(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    public function setApiServer($server)
    {
        $this->apiServer = $server;
    }

    /**
     * This will return a response with code 400. Usage example:
     *     return $this->createBadRequestResponse('Unable to access this page!');
     *
     * @param string $message A message
     *
     * @return Response
     */
    public function createBadRequestResponse($message = 'Bad Request.')
    {
        return new Response($message, 400);
    }

    /**
     * This will return an error response. Usage example:
     *     return $this->createErrorResponse(new UnauthorizedHttpException());
     *
     * @param HttpException $exception An HTTP exception
     *
     * @return Response
     */
    public function createErrorResponse(HttpException $exception)
    {
        $statusCode = $exception->getStatusCode();
        $headers    = array_merge($exception->getHeaders(), ['Content-Type' => 'application/json']);

        $json = $this->exceptionToArray($exception);
        $json['statusCode'] = $statusCode;

        return new Response(json_encode($json, 15, 512), $statusCode, $headers);
    }

    /**
     * Serializes data to a given type format.
     *
     * @param mixed  $data   The data to serialize.
     * @param string $class  The source data class.
     * @param string $format The target serialization format.
     *
     * @return string A serialized data string.
     */
    protected function serialize($data, $format)
    {
        return $this->serializer->serialize($data, $format);
    }

    /**
     * Deserializes data from a given type format.
     *
     * @param string $data   The data to deserialize.
     * @param string $class  The target data class.
     * @param string $format The source serialization format.
     *
     * @return mixed A deserialized data.
     */
    protected function deserialize($data, $class, $format)
    {
        return $this->serializer->deserialize($data, $class, $format);
    }

    protected function validate($data, $asserts = null)
    {
        $errors = $this->validator->validate($data, $asserts);

        if (count($errors) > 0) {
            $errorsString = (string)$errors;
            return $this->createBadRequestResponse($errorsString);
        }
    }

    /**
     * Converts an exception to a serializable array.
     *
     * @param \Exception|null $exception
     *
     * @return array
     */
    private function exceptionToArray(\Exception $exception = null)
    {
        if (null === $exception) {
            return null;
        }

        if (!$this->container->get('kernel')->isDebug()) {
            return [
                'message'  => $exception->getMessage(),
            ];
        }

        return [
            'message'  => $exception->getMessage(),
            'type'     => get_class($exception),
            'previous' => $this->exceptionToArray($exception->getPrevious()),
        ];
    }

    protected function getOutputFormat($accept, array $produced)
    {
        // Figure out what the client accepts
        $accept = preg_split("/[\s,]+/", $accept);
        
        if (in_array('*/*', $accept) || in_array('application/*', $accept)) {
            // Prefer JSON if the client has no preference
            if (in_array('application/json', $produced)) {
                return 'application/json';
            }
            if (in_array('application/xml', $produced)) {
                return 'application/xml';
            }
        }

        if (in_array('application/json', $accept) && in_array('application/json', $produced)) {
            return 'application/json';
        }

        if (in_array('application/xml', $accept) && in_array('application/xml', $produced)) {
            return 'application/xml';
        }

        // If we reach this point, we don't have a common ground between server and client
        return null;
    }

    /**
     * Checks whether Content-Type request header presented in supported formats.
     *
     * @param Request $request  Request instance.
     * @param array   $consumes Array of supported content types.
     *
     * @return bool Returns true if Content-Type supported otherwise false.
     */
    public static function isContentTypeAllowed(Request $request, array $consumes = [])
    {
        if (!empty($consumes) && $consumes[0] !== '*/*') {
            $currentFormat = $request->getContentType();
            foreach ($consumes as $mimeType) {
                // canonize mime type
                if (is_string($mimeType) && false !== $pos = strpos($mimeType, ';')) {
                    $mimeType = trim(substr($mimeType, 0, $pos));
                }

                if (!$format = $request->getFormat($mimeType)) {
                    // add custom format to request
                    $format = $mimeType;
                    $request->setFormat($format, $format);
                    $currentFormat = $request->getContentType();
                }

                if ($format === $currentFormat) {
                    return true;
                }
            }

            return false;
        }

        return true;
    }
}
