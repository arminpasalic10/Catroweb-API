<?php
/**
 * UserApiInterface
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
 * The version of the OpenAPI document: v1.0.40
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
use OpenAPI\Server\Model\Register;
use OpenAPI\Server\Model\RegisterError;
use OpenAPI\Server\Model\UpdateUser;
use OpenAPI\Server\Model\UpdateUserError;
use OpenAPI\Server\Model\UserPrivateGet;
use OpenAPI\Server\Model\UserPublicGet;

/**
 * UserApiInterface Interface Doc Comment
 *
 * @category Interface
 * @package  OpenAPI\Server\Api
 * @author   OpenAPI Generator team
 * @link     https://github.com/openapitools/openapi-generator
 */
interface UserApiInterface
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
     * Operation userDelete
     *
     * Delete user account
     *
     * @param  integer $responseCode     The HTTP response code to return
     * @param  array   $responseHeaders  Additional HTTP headers to return with the response ()
     *
     * @return void
     *
     */
    public function userDelete(&$responseCode, array &$responseHeaders);

    /**
     * Operation userGet
     *
     * Get your private user data
     *
     * @param  integer $responseCode     The HTTP response code to return
     * @param  array   $responseHeaders  Additional HTTP headers to return with the response ()
     *
     * @return OpenAPI\Server\Model\UserPrivateGet
     *
     */
    public function userGet(&$responseCode, array &$responseHeaders);

    /**
     * Operation userIdGet
     *
     * Get the public data of a user
     *
     * @param  string $id  UUID/ID of any given user (required)
     * @param  integer $responseCode     The HTTP response code to return
     * @param  array   $responseHeaders  Additional HTTP headers to return with the response ()
     *
     * @return OpenAPI\Server\Model\UserPublicGet
     *
     */
    public function userIdGet(string $id, &$responseCode, array &$responseHeaders);

    /**
     * Operation userPost
     *
     * Register
     *
     * @param  OpenAPI\Server\Model\Register $register   (required)
     * @param  string $accept_language   (optional)
     * @param  integer $responseCode     The HTTP response code to return
     * @param  array   $responseHeaders  Additional HTTP headers to return with the response ()
     *
     * @return array
     *
     */
    public function userPost(Register $register, string $accept_language = null, &$responseCode, array &$responseHeaders);

    /**
     * Operation userPut
     *
     * Update User
     *
     * @param  OpenAPI\Server\Model\UpdateUser $update_user   (required)
     * @param  string $accept_language   (optional)
     * @param  integer $responseCode     The HTTP response code to return
     * @param  array   $responseHeaders  Additional HTTP headers to return with the response ()
     *
     * @return void
     *
     */
    public function userPut(UpdateUser $update_user, string $accept_language = null, &$responseCode, array &$responseHeaders);

    /**
     * Operation usersSearchGet
     *
     * Search for users
     *
     * @param  string $query   (required)
     * @param  int $limit   (optional, default to 20)
     * @param  int $offset   (optional, default to 0)
     * @param  integer $responseCode     The HTTP response code to return
     * @param  array   $responseHeaders  Additional HTTP headers to return with the response ()
     *
     * @return OpenAPI\Server\Model\UserPublicGet[]
     *
     */
    public function usersSearchGet(string $query, int $limit = 20, int $offset = 0, &$responseCode, array &$responseHeaders);
}
