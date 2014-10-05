personal-expense-tracker
========================

Very small application to keep track of my expenses (and learn some Yii programming at the same time..;) )

Installation instructions
========================

1. Put both framework and gestorgastos folders at the same level anywhere you prefer on your webserver.
2. Configure a virtual host in Apache with the document root pointing to gestorgastos folder.
3. Create a database in your mysql server, and use the dump inside gestorgastos/protected/data/gestorgastos_initial_db.sql to create the required DB schema.
4. Configure the connection to your newly created DB properly in gestorgastos/protected/config/main.php

Main features
========================

The application allows multiple users to keep track of their own expenses.
The expense categories are shared between all users. Anyone can create or edit categories.
But only the admin user can delete them. Admin user is the user with the Id 1.
The initial admin user is created with the following user/pass: admin/admin.
Also the admin user is the only one who can manage users (create new ones, edit their data).