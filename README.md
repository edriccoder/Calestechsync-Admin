# Calisthenics Admin Setup Guide

This guide will walk you through setting up the Calisthenics Admin system on your local machine using XAMPP.

---

## Prerequisites

- **XAMPP**: Installed and running on your machine.
- **Project Files**: The Calisthenics Admin project files, including the `conn.php` file and the database SQL file.

---

## Step 1: Configure `conn.php`

1. Locate the `conn.php` file in your project (usually in the root or `config` folder).
2. Open the file in a text editor and update the database connection settings:

    ```php
    <?php
    // Database connection settings
    $servername = "localhost";  // Server name (usually 'localhost' if using XAMPP)
    $username = "root";         // Default username for XAMPP
    $password = "";             // Default password for XAMPP (empty)
    $dbname = "calisthenics_db"; // Name of your database

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully";
    ?>
    ```

3. Save the `conn.php` file after making changes.

---

## Step 2: Import the Database

1. **Start XAMPP**:
   - Open the XAMPP Control Panel.
   - Start the `Apache` and `MySQL` services.

2. **Access phpMyAdmin**:
   - Open your browser and go to `http://localhost/phpmyadmin`.

3. **Create a New Database**:
   - In phpMyAdmin, click "New" in the left sidebar.
   - Enter a name for your database (e.g., `calisthenics_db`) and click "Create".

4. **Import the Database File**:
   - Select the newly created database from the left sidebar.
   - Click the "Import" tab at the top.
   - Click "Choose File" and select the SQL file from the `database` folder of your project.
   - Click "Go" to import the database.

---

## Step 3: Start the Application

1. **Place the Project in the XAMPP Directory**:
   - Move your project folder (e.g., `calisthenics_admin`) to the `htdocs` directory inside the XAMPP installation folder (usually `C:\xampp\htdocs`).

2. **Access the Application**:
   - Open your browser and navigate to `http://localhost/calisthenics_admin` (replace `calisthenics_admin` with the name of your project folder).

3. **Verify the Connection**:
   - If everything is set up correctly, you should see "Connected successfully" or a similar message.

---

## Step 4: Troubleshooting

- **Connection Issues**: Double-check the `conn.php` file for typos or incorrect credentials.
- **Database Import Issues**: Ensure the SQL file is not corrupted and matches the expected structure.
- **XAMPP Issues**: Check the XAMPP Control Panel for error messages and ensure no other services are using the same ports (e.g., port 80 for Apache, port 3306 for MySQL).

---

## Step 5: Admin Access

- **Login to the Admin Panel**: Navigate to the login page (e.g., `http://localhost/calisthenics_admin/admin/login.php`).
- **Use Default Credentials**: email:admin@admin.com password:password.

---

## Preview
![1](https://github.com/user-attachments/assets/ca25f419-ee98-4b3a-929d-8d163a1ffb97)
![2](https://github.com/user-attachments/assets/9434b0ca-0b59-4ee7-a26c-70d1199e3ea5)
![3](https://github.com/user-attachments/assets/85bf7a86-4057-4b0e-b201-88dfceeaffe5)
![4](https://github.com/user-attachments/assets/9895a8d2-2457-4eec-a49a-9bab3d27cd37)
![5](https://github.com/user-attachments/assets/563fcef1-360a-4ca3-b9fd-e62a1da42710)
![6](https://github.com/user-attachments/assets/3added9a-d715-4999-b1a1-e4e35ae2e30c)
![7](https://github.com/user-attachments/assets/f1f95dc3-370a-49f3-a0cb-aafc96e83a4a)

## Conclusion

You should now have the Calisthenics Admin system running on your local machine. If you encounter any issues, refer to the troubleshooting steps or consult the documentation for your specific application.

---

**Happy Coding!** 🚀
