
<!DOCTYPE html>
  <html lang="pt-br">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../style/reset.css">
    <link rel="stylesheet" href="../style/style.css">
    <title>Agenda</title>
    <style>
      *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }
      body{
        background-color: transparent;
      }
      .wraper{
        max-width: 760px;
        margin: 10px auto;
        background-color: transparent;
        padding: 20px;
        display: flex;
        flex-wrap: wrap;
        border-radius: 8px solid #ccc;
      
        
      }
      .days-week {
        
        display: flex;
        width: 100%;
        flex-wrap: wrap;
        padding: 10px 0;
        border-bottom: 1px solid #555;
      }

      .number-days {
        display: flex;
        width: 100%;
        flex-wrap: wrap;
        
      }
      .days-week span{
        color: black;
        font-weight: bold;
        display: inline-block;
        width: 14.2%;  
        
      }
      .number-days span{
        color: #ccc;
        display: inline-block;
        width: 14.2%;
        margin: 8px 0px;
      }
      .mes-anterior{
        opacity: 0.5;
      }
      .local {
      display: flex;
      justify-content: center;
      align-items: center;
      width: 50%;
    }

    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset='utf-8' />
    <link href='fullcalendar/main.css' rel='stylesheet' />
    <script src='fullcalendar/main.js'></script>
    <script>

      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth'
        });
        calendar.render();
      });
      
    </script>
 
   
      <body>
      <header>
        
        <?php $title = "Calendário";
         include 'cabecalho.php';
         ?>
    </header>

    <?php
    include_once("../modelo/conexao.php");

        $sql = "SELECT id_vacinadas, proxima_vacina FROM vacina_pessoa";
        $result = mysqli_query($conn, $sql);

        echo '<div id="calendar"></div>';
        echo '<script>';
        echo 'document.addEventListener("DOMContentLoaded", function() {';
        echo 'var calendarEl = document.getElementById("calendar");';
        echo 'var calendar = new FullCalendar.Calendar(calendarEl, {';
        echo 'events: [';

        while ($row = mysqli_fetch_array($result)) {
            $id = $row['id_vacinadas'];
            $date = $row['proxima_vacina'];
            echo "{";
            echo "id: '$id',";
            echo "title: 'Próxima vacina',";
            echo "start: '$date',";
            echo "},";
        }

        echo '],';
        echo '});';
        echo 'calendar.render();';
        echo '});';
        echo '</script>';

        mysqli_close($conn);
        ?>


      <div id='calendar'></div>
      <a href="/style/node_modules/fullcalendar/main.js"></a>
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
          for(i = 1;i <= 31; i++){
            el.innerHTML+='<span>'+i+'</span>';
          }
       </script>
         <div class="local">
        <div class="local">            
         <iframe aligner="center" src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d30190.342948469723!2d-47.01014334981147!3d-18.94056026145525!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1subs%20patrocinio!5e0!3m2!1spt-BR!2sbr!4v1661304445239!5m2!1spt-BR!2sbr" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
 
      </body><br>

      
  </html>
