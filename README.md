Edwill Themba Application Manual
This is a full stack web application means both the REST API combined with the front end technology.
Technologies Used In This App
1.Back End (laravel  PHP framework) 
2. Database Mysql
3.Front-end – Vue (javascript framework) Bootstrap for styling as    required
4. Security Method – laravel passport grant user access to protected pages by giving them unique tokens
5.Postman – REST client for entering backdoor data such as the payloads and already exists users in json
How does the app structured
The back end has to two controllers  AuthController and DataPacket Controller,this controllers are placed under app\http\controllers on the project directory.
1.AuthController – is resposible for authenthicating user by generating access tokens, make sure that the user gaining access to the protected routes are authorized and logging the user outs
2.I used the bcrypt function to encrypt the password as you do not want letters
3.DataPacket Controller is for view and inserting the data packet data
4.Under routes folder,there is file called api.php which is responsible for redirecting the user to the required url
5.The front end files are place under resources js and css,the picture below show how the app works,  the is responsive in mobile screens and show error message when incorrect data is entered as you see on the picture below




Application in a mobile is screen 
 
In case use logs with valid data it shows the use name in that case is Admin
 
	
 
How to run this  application
1.First need to have a xampp/lamp/mamp/wamp 
2. You need to download the application on the given url
3.put the database folder under C:/xampp/mysql/data
4.Paste the app on C:/xampp/htdocs
5.Open a terminal of your choice and run this commad php artisan serve
6.Copy the url to the browser of your choice and user is admin@gmail.com and password admin or you can add your user by adding this url http://127.0.0.1:8000/api/register  to any Rest client 



