-Customer Managment Dashboard Application-
-Created and Documented by Clint Myers-

Introduction:

  This application was created using Laravel 5.4, with additional support from Laravel Collective HTML/Forms and Guzzle.

Installation and usage:

  Step 1: Save the folder to your computer.

  Step 2: Install Composer (getcomposer.org)

  Step 3: Open your terminal application, direct it to the root of the application directory, and run "Composer Install" to install all dependencies from package.json to your vendor folder

  Step 4: Open your serving/database applications and direct them to the /public directory of the application

  Step 5: Create a new database called 'c9'. Import 'database.txt' into the the new database. The default database port for the application is 8889, but can be changed in the env file in the root directory.

  Step 6: Open your browser to localhost:8887 to see the landing page. You may log in with the credentials email:'clint@clint.com' and password:'clint1'. You may register/login with another account, however, the password will *need* to be changed in the home.blade.php file due to the use of Guzzle. The file is located in /resources/views/home.blade.php, line 22.

  Step 7: Manipulate the list of customers by adding new customers or removing existing customers.

  Step 8: Test api endpoints using any registered user's email and password.
    GET (/customers)  ---  Get the entire JSON array of customers for the authenticated user
    PUT (/customers/add/{customer})  ---  Add a customer to the end of the array
    PUT (/customers/remove/{index})  ---  Remove a customer by index

Known issues with web application:

1. The application may not respond well to rapid inputs. Safeguards should be implemented to prevent repetitive actions.
2. A token mismatch error occurs upon logout.
3. With the current implementation of Guzzle, the password must be entered into the home.blade.php file manually. Guzzle will be removed in the next release to fix this issue.