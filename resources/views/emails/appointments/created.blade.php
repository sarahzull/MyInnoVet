<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <style>
        p {
            font-size: 12px;
        }

        .signature {
            font-style: italic;
        }
    </style>
</head>
<body>
  <h1>New Appointment Created</h1>

  <p>Hello {{ $staff->name }},</p>

  <p>A new appointment has been created:</p>

  <p>
      <strong>Patient:</strong> {{ $patient->name }}<br>
      <strong>Staff:</strong> {{ $staff->name }}<br>
      <strong>Type:</strong> {{ $appointment->type }}<br>
      <strong>Date:</strong> {{ $appointment->slot->date }}<br>
      <strong>Slot:</strong> {{ $appointment->slot->slot }}
  </p>

  <p>Thank you.</p>
</body>
</html>