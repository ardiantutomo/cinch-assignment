# Product Rental Service API

This repository contains the implementation of a Product Rental Service API. The API allows users to retrieve product details, attributes, rental periods, and regional pricing. It is designed with a clean architecture using service and repository layers, and includes features such as eager loading, pagination, and filtering.
I add simple authentication to the api too.
I prepare 2 API endpoints for the product list and product details. The product list endpoint has a filter and pagination feature. The product details endpoint is used to get the product details by id.
The product list is simpler (flattened) than the product details endpoint (providing all nested information).

I also provided the seeders for dummy data and user. (you can also register a user and use the access token to access the protected routes)

## Implementation Details

The Product Rental Service API is built using a clean architecture approach, which separates the application into different layers, each with its own responsibility. This design pattern helps in maintaining a scalable and maintainable codebase.

### Layers

1. **Controller Layer**: This layer handles the incoming HTTP requests and delegates the processing to the appropriate service layer. It is responsible for returning the HTTP responses to the client.

2. **Service Layer**: The service layer contains the business logic of the application. It processes the data received from the controller layer and interacts with the repository layer to perform CRUD operations.

3. **Repository Layer**: The repository layer is responsible for interacting with the database. It contains methods for querying the database and returning the data to the service layer.

### Features

-   **Eager Loading**: To optimize the performance of the API, eager loading is used to load related entities along with the main entity in a single query. This reduces the number of database queries and improves the response time.

-   **Pagination**: The product list endpoint supports pagination, allowing clients to retrieve a specific number of products per page. This helps in managing large datasets and improves the user experience.

-   **Filtering**: The product list endpoint also supports filtering based on various attributes such as category, price range, and availability. This allows clients to narrow down the search results based on their preferences.

-   **Authentication**: Simple authentication is implemented to secure the API endpoints. Users need to register and obtain an access token to access the protected routes.

### Endpoints

-   **Product List**: This endpoint returns a list of products with support for filtering and pagination. The response includes a simplified (flattened) version of the product details.

-   **Product Details**: This endpoint returns detailed information about a specific product, including all nested information such as attributes, rental periods, and regional pricing.

### Seeders

Seeders are provided to populate the database with dummy data and a test user. This helps in setting up the development environment quickly and allows for testing the API without manually adding data.

### Postman Collection

A [Postman collection](https://github.com/ardiantutomo/cinch-assignment/blob/master/Cinch%20Assignment.postman_collection.json) is available for testing the API endpoints. It includes pre-configured requests for all the available endpoints, making it easier to test and debug the API.

## Products database schema

![Product Schema](https://raw.githubusercontent.com/ardiantutomo/cinch-assignment/refs/heads/master/image.png)

## Dummy User Credentials

-   **Email:** test@example.com
-   **Password:** password

## Setup

1. Clone the repository:

    ```bash
    git clone https://github.com/ardiantutomo/cinch-assignment.git
    ```

2. Install PHP and MySQL (I use XAMPP for this)

3. Install Composer

4. Install dependencies:

    ```bash
    composer install
    ```

5. setup .env file (I use .env.example as template)

6. Run the migrations:

    ```bash
    php artisan migrate
    ```

7. Run the seeders:
    ```bash
    php artisan db:seed
    ```
8. Start the development server:
    ```bash
    php artisan serve
    ```
9. Register a user by using the register endpoint
10. Use the access token to access the protected routes (List and Show product)
11. Can check [postman collection](https://github.com/ardiantutomo/cinch-assignment/blob/master/Cinch%20Assignment.postman_collection.json) for testing

## Running Unit Tests

Unit tests are implemented to ensure the functionality of the API. To run the tests, use the following command:

```bash
php artisan test
```

## Note

If there is an error about the encryption key, you can generate the key by using the following command:
`php artisan key:generate`

## Sample Output for the List API (Added pricing in attributes level too)

{
"current_page": 1,
"data": [
{
"id": 1,
"name": "Product 1",
"description": "Description for product 1",
"sku": "SKU-0001",
"created_at": "2025-02-26T07:38:02.000000Z",
"updated_at": "2025-02-26T07:38:02.000000Z",
"attributes": [
{
"id": 1,
"pricing": [
{
"price": "832.00",
"rental_period_months": 3,
"region_name": "Malaysia"
}
],
"value": "Red",
"name": "Color"
},
{
"id": 2,
"pricing": [],
"value": "Small",
"name": "Size"
}
],
"pricing": [
{
"price": "920.00",
"rental_period_months": 3,
"region_name": "Singapore"
}
]
}
],
"first_page_url": "http://localhost:8000/api/products?page=1",
"from": 1,
"last_page": 1,
"last_page_url": "http://localhost:8000/api/products?page=1",
"links": [
{
"url": null,
"label": "&laquo; Previous",
"active": false
},
{
"url": "http://localhost:8000/api/products?page=1",
"label": "1",
"active": true
},
{
"url": null,
"label": "Next &raquo;",
"active": false
}
],
"next_page_url": null,
"path": "http://localhost:8000/api/products",
"per_page": 1,
"prev_page_url": null,
"to": 1,
"total": 1
}

## Sample Output for the List API (Old before interview)

```
{
    "current_page": 1,
    "data": [
        {
            "id": 1,
            "name": "Leather Jacket",
            "description": "Nice jacket",
            "sku": "SKU-123",
            "created_at": "2025-02-25T09:48:53.000000Z",
            "updated_at": "2025-02-25T09:48:53.000000Z",
            "attributes": [
                {
                    "id": 1,
                    "value": "red",
                    "name": "color"
                },
                {
                    "id": 2,
                    "value": "xl",
                    "name": "color"
                }
            ],
            "pricing": [
                {
                    "price": "1000.00",
                    "rental_period_months": 3,
                    "region_name": "Singapore"
                },
                {
                    "price": "3000.00",
                    "rental_period_months": 3,
                    "region_name": "Malaysia"
                },
                {
                    "price": "1000.00",
                    "rental_period_months": 6,
                    "region_name": "Singapore"
                },
                {
                    "price": "3000.00",
                    "rental_period_months": 6,
                    "region_name": "Malaysia"
                }
            ]
        }
    ],
    "first_page_url": "http://localhost:8000/api/products?page=1",
    "from": 1,
    "last_page": 1,
    "last_page_url": "http://localhost:8000/api/products?page=1",
    "links": [
        {
            "url": null,
            "label": "&laquo; Previous",
            "active": false
        },
        {
            "url": "http://localhost:8000/api/products?page=1",
            "label": "1",
            "active": true
        },
        {
            "url": null,
            "label": "Next &raquo;",
            "active": false
        }
    ],
    "next_page_url": null,
    "path": "http://localhost:8000/api/products",
    "per_page": 10,
    "prev_page_url": null,
    "to": 1,
    "total": 1
}
```

## Sample Output for the Show API

```
{
    "id": 1,
    "name": "Leather Jacket",
    "description": "Nice jacket",
    "sku": "SKU-123",
    "created_at": "2025-02-25T09:48:53.000000Z",
    "updated_at": "2025-02-25T09:48:53.000000Z",
    "attributes": [
        {
            "id": 1,
            "product_id": 1,
            "attribute_value_id": 1,
            "created_at": null,
            "updated_at": null,
            "attribute_values": {
                "id": 1,
                "attribute_id": 1,
                "value": "red",
                "created_at": "2025-02-25T09:48:53.000000Z",
                "updated_at": "2025-02-25T09:48:53.000000Z",
                "attribute": {
                    "id": 1,
                    "name": "color",
                    "created_at": "2025-02-25T09:47:18.000000Z",
                    "updated_at": "2025-02-25T09:47:18.000000Z"
                }
            }
        },
        {
            "id": 2,
            "product_id": 1,
            "attribute_value_id": 2,
            "created_at": null,
            "updated_at": null,
            "attribute_values": {
                "id": 2,
                "attribute_id": 1,
                "value": "xl",
                "created_at": "2025-02-25T09:48:53.000000Z",
                "updated_at": "2025-02-25T09:48:53.000000Z",
                "attribute": {
                    "id": 1,
                    "name": "color",
                    "created_at": "2025-02-25T09:47:18.000000Z",
                    "updated_at": "2025-02-25T09:47:18.000000Z"
                }
            }
        }
    ],
    "pricing": [
        {
            "id": 1,
            "product_id": 1,
            "rental_period_id": 1,
            "region_id": 1,
            "price": "1000.00",
            "created_at": "2025-02-25T09:48:53.000000Z",
            "updated_at": "2025-02-25T09:48:53.000000Z",
            "rental_period": {
                "id": 1,
                "months": 3,
                "created_at": "2025-02-25T09:47:43.000000Z",
                "updated_at": "2025-02-25T09:47:43.000000Z"
            },
            "region": {
                "id": 1,
                "name": "Singapore",
                "created_at": "2025-02-25T09:47:31.000000Z",
                "updated_at": "2025-02-25T09:47:31.000000Z"
            }
        },
        {
            "id": 2,
            "product_id": 1,
            "rental_period_id": 1,
            "region_id": 2,
            "price": "3000.00",
            "created_at": "2025-02-25T09:48:53.000000Z",
            "updated_at": "2025-02-25T09:48:53.000000Z",
            "rental_period": {
                "id": 1,
                "months": 3,
                "created_at": "2025-02-25T09:47:43.000000Z",
                "updated_at": "2025-02-25T09:47:43.000000Z"
            },
            "region": {
                "id": 2,
                "name": "Malaysia",
                "created_at": "2025-02-25T09:47:35.000000Z",
                "updated_at": "2025-02-25T09:47:35.000000Z"
            }
        },
        {
            "id": 3,
            "product_id": 1,
            "rental_period_id": 2,
            "region_id": 1,
            "price": "1000.00",
            "created_at": "2025-02-25T09:48:53.000000Z",
            "updated_at": "2025-02-25T09:48:53.000000Z",
            "rental_period": {
                "id": 2,
                "months": 6,
                "created_at": "2025-02-25T09:47:45.000000Z",
                "updated_at": "2025-02-25T09:47:45.000000Z"
            },
            "region": {
                "id": 1,
                "name": "Singapore",
                "created_at": "2025-02-25T09:47:31.000000Z",
                "updated_at": "2025-02-25T09:47:31.000000Z"
            }
        },
        {
            "id": 4,
            "product_id": 1,
            "rental_period_id": 2,
            "region_id": 2,
            "price": "3000.00",
            "created_at": "2025-02-25T09:48:53.000000Z",
            "updated_at": "2025-02-25T09:48:53.000000Z",
            "rental_period": {
                "id": 2,
                "months": 6,
                "created_at": "2025-02-25T09:47:45.000000Z",
                "updated_at": "2025-02-25T09:47:45.000000Z"
            },
            "region": {
                "id": 2,
                "name": "Malaysia",
                "created_at": "2025-02-25T09:47:35.000000Z",
                "updated_at": "2025-02-25T09:47:35.000000Z"
            }
        }
    ]
}
```
