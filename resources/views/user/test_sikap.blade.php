<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Test Sikap</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  @vite(['resources/css/style.css', 'resources/js/app.js'])
</head>

<body>
  <div class="container">
    <div class="logo">
        <img src="{{ asset('assets/img/logo.png') }}" alt="logo tans dent" height="40">
    </div>
    <form id="pretest-form" class="rounded m-auto p-4 w-90 border border-2">
      <h1 class="mt-2 mb-4">Sikap</h1>

      <div class="navigation d-flex flex-row justify-content-end gap-3 p-5">
        <button type="button" class="btn btn-secondary prev-question">Soal Sebelumnya</button>
        <button type="button" class="btn btn-secondary next-question">Soal Berikutnya</button>
        <button type="button" class="btn btn-primary d-none check-answers">Submit Jawaban</button>
      </div>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</body>

</html>