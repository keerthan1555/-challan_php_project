#Traffic Challan Management Application

This is a simple web application for managing traffic challan records. It allows registered officers to log in and add challan records, and also provides a way to view these records.

Features
Officer Login: Registered officers can log in with their username and password.
Challan Entry: Officers can add new challan records with details like vehicle number, violation type, date issued, and amount.
Challan Viewing: The application displays a table of existing challan records on the homepage.
Getting Started
Clone this repository to your local machine: git clone https://github.com/your-username/traffic-challan-app.git

Set up a local development environment using XAMPP.

Paste the contents of this repository into a new folder named traffic-challan-app (You can choose any filename but remeber the name of the folder to open the application) in the path C:\xampp\htdocs\

Import the SQL dump provided in traffic_challan_db.sql to set up the necessary database and tables.

Start your local web server and navigate to the application in your browser: `http://localhost/traffic-challan-app/'

Usage
Access the homepage to view existing challan records.
Click on the "Officer Login" button to log in using your registered credentials.
After logging in, you will be directed to the "Challan Entry" page. Fill out the form to add new challan records.
Successfully added challan records will show a "Challan Added Successfully" message. Click the "Done" button to return to the "Challan Entry" page.
To log out, you can click the "Logout" link in the navigation bar.
