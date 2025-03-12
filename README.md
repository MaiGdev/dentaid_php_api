# DentAid - Backend API (PHP/MySQL Version)

DentAid is the backend API for an online dental appointment management system. This version was built using PHP and MySQL and provides functionalities for patients, dentists, and administrators. It enables patients to book appointments, dentists to manage schedules, and administrators to oversee users and appointments.

## 🛠️ Technologies Used
- **PHP**: Server-side scripting language.
- **MySQL**: Relational database for data storage.
- **Firebase PHP-JWT**: For authentication and security using JSON Web Tokens (JWT).
- **Composer**: Dependency management for PHP.
- **CORS (Cross-Origin Resource Sharing)**: Enabled for cross-domain requests.
- **Apache (XAMPP)**: Local server environment for development.

## 📂 Project Structure
```
📁 dentaid_php_api-main
├── 📁 controllers          # Handles route logic
│   ├── AlergiaController.php
│   ├── CirugiaController.php
│   ├── EnfermedadController.php
│   ├── ExpedienteController.php
│   ├── HorarioController.php
│   ├── MedicamentoController.php
│   ├── MedicoController.php
│   ├── PacienteController.php
│   ├── RoutesController.php
│   └── UsuarioController.php
├── 📁 models               # Database models and logic
│   ├── AlergiaModel.php
│   ├── CirugiaModel.php
│   ├── EnfermedadModel.php
│   ├── ExpedienteModel.php
│   ├── HorarioModel.php
│   ├── MedicamentoModel.php
│   ├── MedicoModel.php
│   ├── MySqlConnect.php   # MySQL connection handler
│   ├── PacienteModel.php
│   ├── RolModel.php
│   └── UsuarioModel.php
├── 📁 routes               # API route definitions
│   └── routes.php
├── 📁 vendor               # Composer dependencies
│   ├── autoload.php
│   ├── 📁 composer         # Composer autoload files
│   └── 📁 firebase         # Firebase PHP-JWT library
│       └── 📁 php-jwt
│           └── 📁 src      # JWT implementation
├── composer.json          # Composer configuration
├── composer.lock          # Composer dependency lock file
└── index.php              # Entry point for the application
```

## 🔧 Installation
### Clone the Repository:
```bash
git clone https://github.com/MaiGdev/dentaid_php_api.git
cd dentaid_php_api-main
```
### Install Dependencies:
Ensure you have Composer installed, then run:
```bash
composer install
```
### Set Up the Database:
1. Import the provided MySQL database schema and data from the 'database' folder.
2. Update the MySQL connection details in `models/MySqlConnect.php`.

### Configure CORS:
Ensure the following headers are set in `index.php`:
```php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: *");
```
### Start the Server:
- Use XAMPP or any PHP-supported server environment.
- Place the project in the `htdocs` directory and start the Apache server.

## 📌 Main Models
### 🧑 User (`UsuarioModel.php`)
- `id`: Unique user ID.
- `email`: User's email.
- `password`: Hashed password.
- `rol`: User role (e.g., admin, patient, dentist).

### 🦷 Dentist (`MedicoModel.php`)
- `id`: Unique dentist ID.
- `usuario_id`: Reference to the user.
- `especialidad`: Dentist's specialization.
- `licencia_medica`: Medical license number.

### 🏥 Patient (`PacienteModel.php`)
- `id`: Unique patient ID.
- `usuario_id`: Reference to the user.
- `tipo_sangre`: Blood type.
- `alergias`: List of allergies.
- `enfermedades`: Existing medical conditions.

### 📅 Schedule (`HorarioModel.php`)
- `id`: Unique schedule ID.
- `medico_id`: Reference to the dentist.
- `dia_semana`: Day of the week.
- `hora_inicio`: Start time.
- `hora_fin`: End time.

### 📄 Medical Record (`ExpedienteModel.php`)
- `id`: Unique record ID.
- `paciente_id`: Reference to the patient.
- `cirugias`: List of surgeries.
- `medicamentos`: List of medications.

## 🔗 API Endpoints

### 🛡 Authentication
- `POST /auth/login` - Authenticate a user and return a JWT token.

### 👤 Users
- `GET /usuarios` - Get a list of all users.
- `GET /usuarios/{id}` - Get details of a specific user by ID.
- `POST /usuarios` - Create a new user.
- `PUT /usuarios` - Update an existing user.
- `DELETE /usuarios/{id}` - Delete a user by ID.
- `GET /usuarios/alltipos` - Get a list of all user types.
- `GET /usuarios/getipo/{id}` - Get a specific user type by ID.

### 🦷 Dentists
- `GET /medicos` - Get a list of all dentists.
- `POST /medicos` - Create a new dentist schedule.
- `GET /medicos/getHorarioPorMedico/{id}` - Get a dentist's schedule by ID.

### 🏥 Patients
- `GET /pacientes` - Get a list of all patients.

### 📅 Schedules
- `POST /horarios` - Create a new schedule.
- `PUT /horarios` - Update an existing schedule.

### 📄 Medical Records
- `GET /expedientes` - Get a list of all medical records.
- `GET /expedientes/{id}` - Get a specific medical record by ID.
- `POST /expedientes` - Create a new medical record.
- `PUT /expedientes` - Update an existing medical record.
- `POST /expedientes/createAlergia` - Associate allergies with a medical record.
- `POST /expedientes/createExpedienteCompartido` - Share a medical record with another user.
- `GET /expedientes/getAlergiaExpediente/{id}` - Get allergies associated with a medical record.

### 🦠 Allergies
- `GET /alergia` - Get a list of all allergies.
- `GET /alergia/{id}` - Get a specific allergy by ID.
- `GET /alergia/categorias` - Get a list of all allergy categories.
- `POST /alergia` - Create a new allergy.
- `PUT /alergia` - Update an existing allergy.
- `DELETE /alergia/{id}` - Delete an allergy by ID.

### 💊 Medications
- `GET /medicamento` - Get a list of all medications.
- `GET /medicamento/{id}` - Get a specific medication by ID.
- `POST /medicamento` - Create a new medication.
- `PUT /medicamento` - Update an existing medication.
- `DELETE /medicamento/{id}` - Delete a medication by ID.

### 🏥 Diseases
- `GET /enfermedad` - Get a list of all diseases.
- `GET /enfermedad/{id}` - Get a specific disease by ID.
- `POST /enfermedad` - Create a new disease.
- `PUT /enfermedad` - Update an existing disease.
- `DELETE /enfermedad/{id}` - Delete a disease by ID.

### 🪪 Roles
- `GET /rol` - Get a list of all roles.
- `GET /rol/{id}` - Get a specific role by ID.

### 🦷 Surgeries
- `GET /cirugia` - Get a list of all surgeries.
- `GET /cirugia/{id}` - Get a specific surgery by ID.

## 🔐 Authentication
- **JWT (JSON Web Tokens)**: Used for secure authentication.
- **Firebase PHP-JWT**: Library for encoding and decoding JWT tokens.

## 🌍 Environment Configuration
- **MySQL Connection**: Configured in `models/MySqlConnect.php`.
- **CORS Headers**: Set in `index.php` to allow cross-origin requests.

## 📝 Notes
- This backend version uses a relational database (MySQL) and follows a traditional PHP MVC (Model-View-Controller) architecture.
- The project uses Composer for dependency management and Firebase PHP-JWT for secure authentication.
- Ensure the server environment supports PHP and MySQL for proper functionality.

