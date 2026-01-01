# 📦 DBT Database System
**Computer Business Department, Lamphun Technical College**

An DBT Database System developed to streamline inventory tracking, borrowing, and returning processes for the Computer Business Department. This web application ensures efficient asset management and real-time tracking of equipment availability.

## 🛠️ Technologies Used (Tech Stack)

* **Frontend:**
    * HTML5 / CSS3
    * **Bootstrap 5** (for Responsive Design & UI Components)
    * JavaScript (Client-side logic & DOM manipulation)
* **Backend:**
    * **PHP** (Server-side processing)
* **Database:**
    * **MySQL** (Relational Database)
    * Managed via **phpMyAdmin**

## ✨ Key Features

* **User Authentication:** Secure login system for Administrators and Staff.
* **Dashboard:** Overview of total equipment, available items, and items currently borrowed.
* **Inventory Management (CRUD):**
    * Add new equipment with images and details.
    * Edit equipment information.
    * Delete or archive obsolete items.
* **Borrow & Return System:** Track who borrowed which item and when it is due for return.
* **Responsive UI:** Works seamlessly on desktops, tablets, and mobile devices (powered by Bootstrap).

## ⚙️ Installation & Setup

To run this project locally, please follow these steps:

1.  **Clone the Repository**
    ```bash
    git clone https://github.com/ThanarakCSW/DBT-DatabaseSystem_WEBAPPLICATION.git
    ```

2.  **Setup Web Server**
    * Copy the project folder to your server directory (e.g., `htdocs` for XAMPP or `www` for WAMP).

3.  **Database Configuration**
    * Open **phpMyAdmin**.
    * Create a new database named `equipment_db` (or check the SQL file name).
    * Import the `database.sql` file located in the `/database` folder of this project.

4.  **Connect Database**
    * Open the database connection file (e.g., `connect.php` or `db.php`).
    * Ensure the username, password, and database name match your local setup:
        ```php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "equipment_db";
        ```

5.  **Run the Project**
    * Open your browser and navigate to `http://localhost/your-project-folder`.

## Database Relationship
<img width="1105" height="908" alt="image" src="https://github.com/user-attachments/assets/25a13f1e-1718-45ff-920f-4fb4908f1e82" />

