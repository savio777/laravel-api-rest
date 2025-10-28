# API Routes

## test

-   **GET|HEAD** api/test ..............................................................

## users

-   **GET|HEAD** api/users .......................... users.index › UserController@index
-   **POST** api/users .......................... users.store › UserController@store
-   **GET|HEAD** api/users/{user} ..................... users.show › UserController@show
-   **PUT|PATCH** api/users/{user} ................. users.update › UserController@update
-   **DELETE** api/users/{user} ............... users.destroy › UserController@destroy
