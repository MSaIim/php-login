# ![](http://i.imgur.com/sIx9aU3.png) PHP Login
A login form that uses PHP to connect to a MySQL database for validation. It can also insert (register) users into the database.

+ Uses BCrypt to hash the passwords.
+ Queries to the database are done using PDO (PHP Data Objects) for best security.
+ Everything is done using POST.

## ![](http://i.imgur.com/qKIYv2n.png?1) Usage
Create a MySQL database called `usersDB` with a table called `users` and add four columns named `id`, `username`, `email`, `password`. Here's the SQL script:

```sql
CREATE DATABASE IF NOT EXISTS usersDB;
CREATE TABLE users
(
    id INT NOT NULL AUTO_INCREMENT,
    username VARCHAR(20) NOT NULL,
    email VARCHAR(20) NOT NULL,
    password VARCHAR(500) NOT NULL,
    PRIMARY KEY(id)
);
```

Edit `$username` and `$password` inside [`myConn.php`](https://github.com/MSaIim/php-login/blob/master/scripts/php/myconn.php) to reflect your database username and password.
