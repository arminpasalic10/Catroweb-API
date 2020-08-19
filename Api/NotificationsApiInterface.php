<?php
/**
 * NotificationsApiInterface
 * PHP version 7.1.3
 *
 * @category Class
 * @package  OpenAPI\Server
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

namespace OpenAPI\Server\Api;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use OpenAPI\Server\Model\NotificationFetchResponse;
use OpenAPI\Server\Model\NotificationsCountResponse;

/**
 * NotificationsApiInterface Interface Doc Comment
 *
 * @category Interface
 * @package  OpenAPI\Server\Api
 * @author   OpenAPI Generator team
 * @link     https://github.com/openapitools/openapi-generator
 */
interface NotificationsApiInterface
{

    /**
     * Sets authentication method PandaAuth
     *
     * @param string $value Value of the PandaAuth authentication method.
     *
     * @return void
     */
    public function setPandaAuth($value);

    /**
     * Operation notificationsCountGet
     *
     * Count the number of unseen notifications
     *
     * @param  integer $responseCode     The HTTP response code to return
     * @param  array   $responseHeaders  Additional HTTP headers to return with the response ()
     *
     * @return OpenAPI\Server\Model\NotificationsCountResponse
     *
     */
    public function notificationsCountGet(&$responseCode, array &$responseHeaders);

    /**
     * Operation notificationsGet
     *
     * Get user notifications
     *
     * @param  int $limit   (optional, default to 20)
     * @param  int $offset   (optional, default to 0)
     * @param  string $type   (optional)
     * @param  integer $responseCode     The HTTP response code to return
     * @param  array   $responseHeaders  Additional HTTP headers to return with the response ()
     *
     * @return OpenAPI\Server\Model\NotificationFetchResponse[]
     *
     */
    public function notificationsGet(int $limit = 20, int $offset = 0, string $type = null, &$responseCode, array &$responseHeaders);

    /**
     * Operation notificationsMarkallPut
     *
     * Mark all notifications as read
     *
     * @param  integer $responseCode     The HTTP response code to return
     * @param  array   $responseHeaders  Additional HTTP headers to return with the response ()
     *
     * @return void
     *
     */
    public function notificationsMarkallPut(&$responseCode, array &$responseHeaders);

    /**
     * Operation notificationsMarkasreadIdPut
     *
     * Mark specified notification as read
     *
     * @param  int $id   (required)
     * @param  integer $responseCode     The HTTP response code to return
     * @param  array   $responseHeaders  Additional HTTP headers to return with the response ()
     *
     * @return void
     *
     */
    public function notificationsMarkasreadIdPut(int $id, &$responseCode, array &$responseHeaders);
}
