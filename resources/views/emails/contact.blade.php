<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulaire de contact</title>
    <!-- bootstrap css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="css/style.css">
    {{-- java script --}}
    <script src="https://cdn.jsdelivr.net/npm/emailjs-com@3/dist/email.min.js"></script>
    <script>
        emailjs.init('YOUR_USER_ID'); // Initialiser avec votre ID EmailJS
    </script>
</head>

<body>
    <h2>Nouveau message de contact</h2>
<p><strong>Nom :</strong> {{ $contact->name }}</p>
<p><strong>Email :</strong> {{ $contact->email }}</p>
<p><strong>Téléphone :</strong> {{ $contact->phone }}</p>
<p><strong>Message :</strong></p>
<p>{{ $contact->message }}</p>

</body>

</html>