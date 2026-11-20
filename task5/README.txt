ASSIGNMENT 4 - MYSQL STORE

Requirements:
- XAMPP (Apache + MySQL)
- PHP with PDO MySQL enabled
- Browser

INSTALLATION:
1. Copy the Assignment_4_MySQL folder into: C:\xampp\htdocs\
2. Open XAMPP Control Panel and start Apache and MySQL.
3. Open http://localhost/phpmyadmin
4. Import database/mysql_store.sql
5. Check db.php: default username root and empty password. Change if your MySQL setup differs.
6. Open http://localhost/Assignment_4_MySQL/setup_passwords.php ONCE.
   This sets password 123456 for all sample customers. Delete setup_passwords.php after running.
7. Open http://localhost/Assignment_4_MySQL/

DEMO LOGIN:
Customer ID: 1
Password: 123456

Database export:
The imported database is already provided in database/mysql_store.sql.
To export after changes: phpMyAdmin > mysql_store > Export > Quick > SQL > Go.

Notes:
- The assignment did not include a supplied database structure, so this project creates its own sample database.
- All database inputs use prepared statements and output is escaped.
