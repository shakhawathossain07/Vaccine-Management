# Vaccine Management System

## Overview
The Vaccine Management System is a web-based application designed to manage vaccine inventory, batches, and appointments efficiently. This system supports both admin and user functionalities, ensuring smooth operations and accurate record-keeping. Admins can add, edit, delete, and manage vaccines, batches, and appointments, while users can view and schedule their appointments.

<img width="960" alt="image" src="https://github.com/user-attachments/assets/cc00bac9-6026-40cc-b757-8deccff818af">


## Features
### Admin Functionalities:
- **Manage Vaccines**: Add, edit, and delete vaccines with stock levels.
- **Manage Vaccine Batches**: Add, edit, and delete vaccine batches with expiration dates.
- **Manage Appointments**: View, edit, and delete user appointments.
- **User Roles**: Admin and User roles with specific functionalities.

<img width="960" alt="image" src="https://github.com/user-attachments/assets/e7c0ef5e-6dfa-4cee-864b-f7778ba9d579">


### User Functionalities:
- **View Appointments**: Users can view their scheduled appointments.
- **Schedule Appointments**: Users can schedule new appointments for available vaccines.

<img width="960" alt="image" src="https://github.com/user-attachments/assets/4f60ff6f-273f-48f3-b149-d5c9b4ba4b56">


## Technologies Used
- **Frontend**: HTML, CSS
- **Backend**: PHP
- **Database**: MySQL
- **Server**: XAMPP (Apache, MySQL)

## Getting Started
### Prerequisites
- XAMPP or any local server with PHP and MySQL support.

### Installation
1. **Clone the Repository**:
    ```bash
    git clone https://github.com/yourusername/vaccine-management-system.git
    ```

2. **Start the XAMPP server** and ensure Apache and MySQL are running.

3. **Create the Database**:
    - Open phpMyAdmin.
    - Create a new database named `vaccine_management`.
    - Import the database schema from the `database.sql` file provided in the repository.

4. **Configure Database Connection**:
    - Update the `db.php` file with your database credentials if different from the default XAMPP settings.

### Database Schema

<img width="960" alt="image" src="https://github.com/user-attachments/assets/38e6148c-a808-4cf5-b923-0b819a3ca9e9">

Relationships

Roles: Contains the roles (e.g., admin, user).

Users: Contains user details and references the Roles table.

Vaccines: Contains vaccine details.

Appointments: Stores appointment details and references both the Users and Vaccines tables.

User_Roles: Manages the many-to-many relationship between users and roles.

Vaccine_Batches: Stores details of vaccine batches and references the Vaccines table.

Stock_Levels: Manages vaccine stock levels and references the Vaccines table.

Vaccination_Sites: Stores details of vaccination sites.

Logs: Keeps a log of user actions and references the Users table.

Notifications: Stores user notifications and references the Users table.


Usage

Admin Login: Use the predefined admin credentials.

Username: admin

Password: admin

Register New Users: Users can register and log in to schedule their appointments.

Dashboard Access: Admins can access the dashboard to manage vaccines, batches, and appointments.

File Structure
/vaccine-management-system

├── db.php

├── login.php

├── register.php

├── dashboard.php

├── add_vaccine.php

├── edit_vaccine.php

├── update_vaccine.php

├── delete_vaccine.php

├── add_batch.php

├── edit_batch.php

├── update_batch.php

├── delete_batch.php

├── schedule.php

├── delete_appointment.php

├── edit_appointment.php

├── update_appointment.php

├── login.html

├── register.html

├── dashboard.html

├── styles.css

├── dashboard.css

└── database.sql

Contributing
Feel free to submit issues and enhancement requests.

License
This project is licensed under the CC0 1.0 Universal License.

Contact
For any queries, please contact [Md. Shakhawat Hossain] at [shakhawat.hossain07.edu@gmail.com].
