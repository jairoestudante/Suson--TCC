<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Agenda</title>
  <link rel="stylesheet" href="../style/reset.css">
  <link rel="stylesheet" href="../style/style.css">
  <link href='https://cdn.jsdelivr.net/npm/fullcalendar@3.10.2/dist/fullcalendar.min.css' rel='stylesheet' />
</head>
<body>
  <header>
    <?php
      $title = "Calendário";
      include 'cabecalho.php';
    ?>
  </header>

  <div id="calendar"></div>

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js'></script>
  <script src='https://cdn.jsdelivr.net/npm/fullcalendar@3.10.2/dist/fullcalendar.min.js'></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendar');
      var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        events: [
          <?php
            include_once("../modelo/conexao.php");
            $sql = "SELECT id_vacinadas, proxima_vacina FROM vacina_pessoa";
            $result = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_array($result)) {
              $id = $row['id_vacinadas'];
              $date = $row['proxima_vacina'];
              echo "{";
              echo "id: '$id',";
              echo "title: 'Próxima vacina',";
              echo "start: '$date'";
              echo "},";
            }

            mysqli_close($conn);
          ?>
        ]
      });
      calendar.render();
    });
  </script>

  <div class="wraper">
    <div class="days-week">
      <span>Segunda</span>
      <span>Terça</span>
      <span>Quarta</span>
      <span>Quinta</span>
      <span>Sexta</span>
      <span>Sábado</span>
      <span>Domingo</span>
    </div>

    <div class="number-days">
      <span class="mes-anterior">30</span>
      <span class="mes-anterior">31</span>
    </div>
  </div>

  <script>
    let el = document.querySelector('.number-days');
    for (i = 1; i <= 31; i++) {
      el.innerHTML += '<span>' + i + '</span>';
    }
  </script>

  <div class="local">
    <div class="local">
      <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d30190.342948469723!2d-47.01014334981147!3d-18.94056026145525!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1subs%20patrocinio!5e0!3m2!1spt-BR!2sbr!4v1661304445239!5m2!1spt-BR!2sbr" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
  </div>
</body>
</html>
