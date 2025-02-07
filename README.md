# Uploader.

A simple and dynamic web application for sending files to your own/someone's email address without the hassle for logging in to your own mail account. `phpmailer` is a library i used to do so without needing any backend server.

## Features

- Send emails in real-time without any delays.

## Drawbacks

- Only supports one file at a time.

## Technologies Used

- **Frontend**: HTML, CSS, JavaScript
- **Mail**: `phpmailer` library


## Credits

- [phpmailer](https://github.com/PHPMailer/PHPMailer)


## Setup

Update these lines in `send_email.php` with your values.

```bash
  $mail->Host = 'smtp.example.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'contact@example.com';
        $mail->Password = 'example123@';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->setFrom('contact@example.com', 'Jash Vakharia');
```
    