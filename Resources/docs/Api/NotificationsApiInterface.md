# OpenAPI\Server\Api\NotificationsApiInterface

All URIs are relative to *https://share.catrob.at/api*

Method | HTTP request | Description
------------- | ------------- | -------------
[**notificationsCountGet**](NotificationsApiInterface.md#notificationsCountGet) | **GET** /notifications/count | Count the number of unseen notifications
[**notificationsGet**](NotificationsApiInterface.md#notificationsGet) | **GET** /notifications | Get user notifications
[**notificationsMarkallPut**](NotificationsApiInterface.md#notificationsMarkallPut) | **PUT** /notifications/markall | Mark all notifications as read
[**notificationsMarkasreadIdPut**](NotificationsApiInterface.md#notificationsMarkasreadIdPut) | **PUT** /notifications/markasread/{id} | Mark specified notification as read


## Service Declaration
```yaml
# src/Acme/MyBundle/Resources/services.yml
services:
    # ...
    acme.my_bundle.api.notifications:
        class: Acme\MyBundle\Api\NotificationsApi
        tags:
            - { name: "open_api_server.api", api: "notifications" }
    # ...
```

## **notificationsCountGet**
> OpenAPI\Server\Model\NotificationsCountResponse notificationsCountGet()

Count the number of unseen notifications

### Example Implementation
```php
<?php
// src/Acme/MyBundle/Api/NotificationsApiInterface.php

namespace Acme\MyBundle\Api;

use OpenAPI\Server\Api\NotificationsApiInterface;

class NotificationsApi implements NotificationsApiInterface
{

    // ...

    /**
     * Implementation of NotificationsApiInterface#notificationsCountGet
     */
    public function notificationsCountGet()
    {
        // Implement the operation ...
    }

    // ...
}
```

### Parameters
This endpoint does not need any parameter.

### Return type

[**OpenAPI\Server\Model\NotificationsCountResponse**](../Model/NotificationsCountResponse.md)

### Authorization

[PandaAuth](../../README.md#PandaAuth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

## **notificationsGet**
> OpenAPI\Server\Model\NotificationFetchResponse notificationsGet($limit, $offset, $type)

Get user notifications

### Example Implementation
```php
<?php
// src/Acme/MyBundle/Api/NotificationsApiInterface.php

namespace Acme\MyBundle\Api;

use OpenAPI\Server\Api\NotificationsApiInterface;

class NotificationsApi implements NotificationsApiInterface
{

    // ...

    /**
     * Implementation of NotificationsApiInterface#notificationsGet
     */
    public function notificationsGet(int $limit = '20', int $offset = '0', string $type = '''all''')
    {
        // Implement the operation ...
    }

    // ...
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **limit** | **int**|  | [optional] [default to 20]
 **offset** | **int**|  | [optional] [default to 0]
 **type** | **string**|  | [optional] [default to &#39;&#39;all&#39;&#39;]

### Return type

[**OpenAPI\Server\Model\NotificationFetchResponse**](../Model/NotificationFetchResponse.md)

### Authorization

[PandaAuth](../../README.md#PandaAuth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

## **notificationsMarkallPut**
> notificationsMarkallPut()

Mark all notifications as read

### Example Implementation
```php
<?php
// src/Acme/MyBundle/Api/NotificationsApiInterface.php

namespace Acme\MyBundle\Api;

use OpenAPI\Server\Api\NotificationsApiInterface;

class NotificationsApi implements NotificationsApiInterface
{

    // ...

    /**
     * Implementation of NotificationsApiInterface#notificationsMarkallPut
     */
    public function notificationsMarkallPut()
    {
        // Implement the operation ...
    }

    // ...
}
```

### Parameters
This endpoint does not need any parameter.

### Return type

void (empty response body)

### Authorization

[PandaAuth](../../README.md#PandaAuth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

## **notificationsMarkasreadIdPut**
> notificationsMarkasreadIdPut($id)

Mark specified notification as read

### Example Implementation
```php
<?php
// src/Acme/MyBundle/Api/NotificationsApiInterface.php

namespace Acme\MyBundle\Api;

use OpenAPI\Server\Api\NotificationsApiInterface;

class NotificationsApi implements NotificationsApiInterface
{

    // ...

    /**
     * Implementation of NotificationsApiInterface#notificationsMarkasreadIdPut
     */
    public function notificationsMarkasreadIdPut(int $id)
    {
        // Implement the operation ...
    }

    // ...
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**|  | [default to 0]

### Return type

void (empty response body)

### Authorization

[PandaAuth](../../README.md#PandaAuth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

