# Student Registration System

A Laravel-based Student Registration System developed for **ITST 302 – Client-Server Technologies**, Week 4 Mini Project 03.

---

## Introduction

The Student Registration System is a web-based application designed to provide a simple and organized way of collecting student information digitally.

Instead of using a paper-based registration process, students can enter their personal, contact, and academic information through an online form. The submitted information is validated before it is accepted by the system and stored in the database.

Data validation is important because it helps prevent incomplete, incorrectly formatted, and duplicate records. In this project, Laravel validation checks required fields, Student ID format, unique Student IDs and email addresses, valid email format, numeric mobile numbers, valid dates, and uploaded profile images.

Registration systems are also commonly used in enterprise applications such as universities, companies, hospitals, banks, and government systems. The same process of receiving user input, validating information, storing records, and returning a response is used in many real-world applications.

---

## Objectives

The project accomplished the following objectives:

- Create a student registration form using Laravel Blade.
- Process client requests using Laravel routes and controllers.
- Apply server-side validation to user input.
- Prevent duplicate Student IDs and email addresses.
- Validate email addresses and mobile numbers.
- Validate uploaded profile pictures.
- Upload student profile images using Laravel Storage.
- Store student information in a MySQL database.
- Store only the uploaded image path in the database.
- Display validation errors when submitted information is invalid.
- Display a flash success message after successful registration.
- Display the registered student's information.
- Display a list of registered students.
- Apply Git and GitHub version control.
- Document the development process using Markdown, screenshots, and diagrams.

---

## Laravel Request Lifecycle

When a student submits the registration form, the request passes through several Laravel components before the system returns a response.

1. **Browser** – The student opens the registration page, fills out the form, uploads a profile picture, and submits the information.
2. **Route** – Laravel receives the request and matches it with the correct route in `routes/web.php`.
3. **Controller** – The request is sent to the appropriate method inside `StudentController`.
4. **Validation** – Laravel checks the submitted information using server-side validation rules.
5. **Model** – If the information is valid, the Student model prepares the data for database storage.
6. **Database** – The validated student information and uploaded profile picture path are stored in the MySQL `students` table.
7. **Response** – Laravel redirects the user to the student profile page and displays a success message. If validation fails, the user is returned to the form with validation errors.

### Laravel Request Lifecycle Diagram

The diagram below shows how a student registration request moves through the Laravel application.

![Laravel Request Lifecycle Diagram](documentation/Laravel%20Request%20Lifecycle%20Diagram.png)

---

## Validation Rules

### Required Fields

Required validation stops students from leaving important fields blank. The form will not be accepted until the student provides their Student ID, first name, last name, email, mobile number, date of birth, gender, program, year level, address, and profile picture. This prevents incomplete records from causing issues later when the data is stored and processed.

### Unique Constraints

The system uses unique validation on the Student ID and email address. This stops two students from using the same Student ID or email. It helps keep records accurate and reduces duplicate entries in the database.

### Email Validation

The email field uses Laravel's built-in email validation rule. This checks that the submitted value is a valid email format. Valid emails are important because the university uses email for communication and identification. Invalid formats could make it hard to contact a student.

### Numeric Validation

The mobile number field is validated to contain only numeric characters. It also checks for the expected number of digits. This prevents invalid values like letters or special characters from being stored as a student's contact number.

### Image Validation

The profile picture field only accepts image files. The system allows JPG, JPEG, and PNG formats. This ensures the field contains an actual image, not an unrelated file like a document or executable.

### File Size Restrictions

The uploaded profile picture has a maximum file size of 2048 KB (2 MB). This restriction prevents excessively large uploads, reduces unnecessary storage use, and keeps file uploads manageable for the application.

---

## Database Design

The system uses a MySQL database named:

```
week04_student_registration
```

The main application table is the `students` table. Laravel also maintains a `migrations` table to track migrations that have already been executed.

### Database ER Diagram

The diagram below shows the database design of the Student Registration System.

![Database ER Diagram](documentation/Database%20ER%20Diagram.png)

### Students Table Fields

The `students` table contains:

| Column | Description |
|---|---|
| `id` | Primary key |
| `student_id` | Unique Student ID |
| `first_name` | First name |
| `middle_name` | Middle name |
| `last_name` | Last name |
| `email` | Unique email address |
| `mobile_number` | Mobile number |
| `date_of_birth` | Date of birth |
| `gender` | Gender |
| `program` | Academic program |
| `year_level` | Year level |
| `address` | Address |
| `profile_picture` | Stores the uploaded image path |
| `created_at` | Timestamp |
| `updated_at` | Timestamp |

The `id` column is the primary key, while `student_id` and `email` are protected by unique constraints.

---

## Registration Flowchart

The registration process starts when the user opens the registration page and ends when the registered student's profile is displayed. If the submitted information is invalid, Laravel returns the user to the registration form and displays validation errors.

### Registration Flowchart Diagram

![Registration Flowchart](documentation/Registration%20Flowchart.png)

---

## Screenshots

The following screenshots document the completed system and show that the required features are working.

### Registration Form – Part 1

The screenshot below shows the first part of the student registration form.

![Registration Form Part 1](Screenshots/Registration%20Form%201.png)

### Registration Form – Part 2

The screenshot below shows the remaining fields of the registration form.

![Registration Form Part 2](Screenshots/Registration%20Form%202.png)

### Validation Error

The screenshot below shows Laravel validation feedback when invalid information is submitted.

![Validation Errors](Screenshots/Validation%20Errors.png)

### Flash Success Message

The screenshot below shows the success notification displayed after a successful registration.

![Flash Success Message](Screenshots/Flash%20Success%20Message.png)

### Uploaded Profile Picture

The screenshot below shows the uploaded student profile picture stored by the application.

![Uploaded Image](Screenshots/Uploaded%20Image.png)

### Student Profile

The screenshot below shows the registered student's information after a successful submission.

![Student Profile](Screenshots/Student%20Profile.png)

### Database Records

The screenshot below shows student information stored in the MySQL database.

![Database Records](Screenshots/Database%20Records.png)

### Laravel Project Structure

The screenshot below shows the Laravel project structure in Visual Studio Code.

![Laravel Project Structure](Screenshots/Laravel%20Project%20Structure.png)

### Terminal Output

The screenshot below confirms that the student migration has run, the required routes are registered, and the Laravel development server is working.

![Terminal Output](Screenshots/Terminal%20Output.png)

### Browser Output

The screenshot below shows the running Laravel application in the browser.

![Browser Output](Screenshots/Browser%20Output%20(2).png)

### GitHub Repository

The screenshot below shows the public GitHub repository used for the project.

![GitHub Repository](Screenshots/GitHub%20Repository%20(2).png)

---

## Problems Encountered

During the development of the project, I encountered several issues that helped me understand Laravel configuration and debugging more clearly.

### MySQL Connection Error

Laravel initially attempted to connect to MySQL using the wrong port. Because no MySQL server was listening on that port, the application returned a connection refused error.

### Missing Sessions Table

After removing unused default Laravel migrations, the application returned an error saying that the sessions table did not exist. Laravel was still configured to use database-backed sessions even though the related table was no longer available.

### Profile Picture Storage

The uploaded profile picture was stored inside Laravel's storage directory, but it could not be accessed directly from the browser until the public storage link was created.

### Git Staging and Commit Organization

While developing several features, unrelated modified files sometimes appeared in `git status`. I needed to stage only the files related to a specific feature so that each commit would represent one meaningful change.

---

## Solutions

### Correct MySQL Configuration

The Laravel `.env` configuration was updated to use the correct MySQL host, port, database name, username, and password. Laravel's cached configuration was also cleared before testing again.

### Use File-Based Sessions

The project was configured to use file-based sessions instead of database sessions. This removed the need for the deleted sessions table.

The relevant configuration uses:

```env
SESSION_DRIVER=file
CACHE_STORE=file
QUEUE_CONNECTION=sync
```

### Create the Laravel Storage Link

The following command was used:

```bash
php artisan storage:link
```

This created a connection between:

- `public/storage`
- `storage/app/public`

This allows uploaded profile pictures to be displayed in the browser while Laravel continues storing the files inside its storage directory.

### Use Meaningful Git Commits

Related files were staged and committed separately instead of using one large commit for every change. Examples include:

```
feat: create student migration
feat: build registration form
feat: implement validation rules
feat: add flash messages
feat: upload student profile picture
feat: display registered student profile
feat: display list of registered students
docs: add project screenshots
docs: add system diagrams
```

---

## Reflection

Creation of the Student Registration System gave me an insight into the way various components of the Laravel application cooperate to process the user input. Prior to creating this system, I saw the registration form as just another simple page where a user inputs some information and pushes a button. But after completing the implementation of the system, I realized that there are many important processes that occur between the user's input and the final entry in the database.

The main thing that I learned from the development process was the importance of validation. There is no need to trust any user information automatically. All required fields need to be validated, e-mails need to have correct formatting, Student IDs and e-mails should be unique, and restrictions should be imposed on uploading files. The validation helps to enhance the quality of the information in the database and avoids many issues beforehand. Also, I realized that it is possible to use database constraints and Laravel validation together to secure the student records.

This assignment also taught me how different client-side validation and server-side validation are. Attributes like `required` in HTML help to improve the usability of forms because the browser will right away inform the user that some fields are not filled. Still, validation in the browser is not sufficient because the client side can be bypassed. Server-side validation is more crucial because Laravel performs validation of the incoming request prior to accepting and saving the data. Therefore, both types of validation provide a good user experience while at the same time protecting the application from the server side.

File upload protection is another essential aspect of this project. Profile picture cannot be regarded just as another text parameter. The upload must be authenticated to ensure that the file being uploaded is an image; the format of the image is among the allowed ones and that there is a restriction on the size of the image file. I have learned how Laravel Storage ensures that the files uploaded are not stored within the MySQL database. The uploaded images are not stored within the MySQL database; instead, the path to the file is saved within the student table.

With respect to how Laravel works, I gained an understanding of the request cycle where the request from the browser is forwarded through the route to the controller, validation takes place, the model manipulates data in the database and the response from the Laravel is sent to the client. This process made it easy for me to understand the function of the route, controller, model, Blade view and migration.

Lastly, through this project, I have seen the importance of registration systems in the real-life enterprise applications. It is important for institutions like universities to have organized and accurate data. In order to achieve this, an application developer must be keen on handling inputs, database design, file management, error reporting and feedback from the users.

---

## References

- Laravel. (2026). *Laravel documentation*. https://laravel.com/docs
- MDN Web Docs. (n.d.). *HTML forms*. Mozilla. https://developer.mozilla.org/en-US/docs/Learn_web_development/Extensions/Forms
- MySQL. (n.d.). *MySQL 8.0 reference manual*. Oracle. https://dev.mysql.com/doc/refman/8.0/en/
- PHP Documentation Group. (n.d.). *PHP manual*. https://www.php.net/manual/en/
- Tailwind Labs. (n.d.). *Tailwind CSS documentation*. https://tailwindcss.com/docs
