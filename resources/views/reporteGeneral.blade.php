<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Reporte General</title>
    <link href="{{'estiloPdf/css/style.css'}}" rel="stylesheet">
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="img/logo.jpg">
      </div>
      <div id="company">
        <h2 class="name">Universidad Ceprog</h2>
        <div>Carretera Palenque - Catazajá Km 26+500</div>
        <div>+52 (916) 345 3906</div>
        <div><a href="#">admisiones.palenque@uceprog.edu.mx</a></div>
        <div><a href="#">contacto@uceprog.edu.mx</a></div>
      </div>
      </div>
    </header>
    <main>
      <div id="details" class="clearfix">
        <div id="client">
          <div class="to">Examen:</div>
          <h2 class="name">{{$examen->catedratico}}</h2>
          <div class="address">{{$examen->materia->name}}</div>
        </div>
        <div id="invoice">
          <h1>{{$examen->modulo}}</h1>
          <div class="date">{{$examen->created_at}}</div>
        </div>
      </div>
      <table border="0" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th class="no">#</th>
            <th class="desc">Alumnos/Preguntas</th>
            @foreach($examen->preguntas as $contador => $pregunta)
            <th class="unit">({{$contador + 1}}){{$pregunta->contenido}}</th>
            @endforeach
          </tr>
        </thead>
        <tbody>
            @foreach($examen->materia->semestre->users as $contador => $user)
             <tr>
            <td class="no">{{$contador + 1}}</td>
            <td class="desc">{{$user->name}}</td>
            @foreach($examen->preguntas as $pregunta)
              @foreach($user->respuestasUser as $preguntaUser)
                @if($pregunta->id == $preguntaUser->pregunta_id)
                  @foreach($pregunta->respuestas as $respuesta)
                      @if($respuesta->id == $preguntaUser->respuesta_id)
                        @if($respuesta->estado==1)
                          <td class="unit">1</td>
                        @else
                        <td class="unit">0</td>
                        @endif
                      @endif
                  @endforeach
                @endif
              @endforeach
            @endforeach
            </tr> 
            @endforeach
        </tbody>
        <tfoot>
          <tr>
            <td colspan="2"></td>
            <td colspan="2">SUBTOTAL</td>
            <td>$5,200.00</td>
          </tr>
          <tr>
            <td colspan="2"></td>
            <td colspan="2">TAX 25%</td>
            <td>$1,300.00</td>
          </tr>
          <tr>
            <td colspan="2"></td>
            <td colspan="2">GRAND TOTAL</td>
            <td>$6,500.00</td>
          </tr>
        </tfoot>
      </table>
      <div id="thanks">Thank you!</div>
      <div id="notices">
        <div>NOTICE:</div>
        <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
      </div>
    </main>
    <footer>
      Invoice was created on a computer and is valid without the signature and seal.
    </footer>
  </body>
</html>