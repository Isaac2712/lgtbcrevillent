@extends('layout')
@section('contenido')
<section class="container mt-5">
    <!--<header class="hover-titulo">-->
    <header><!-- modificado 23-9-19 Isaac -->
    <hr class="mt-5">
    <main class="row">
        <aside class="col-lg-12 text-center">
            <h2 class="h2-title"> ¿quienes somos? </h2>
            <hr class="hr-title">
        </aside>
    </main>
    <hr class="mb-4">
    </header>
    <article id="articulo-quienes-somos" class="pr-3 pl-3">
        <p>LGTB Crevillent, colectivo de lesbianas, gays, transexuales y bisexuales es una <b> asociación privada sin ánimo de lucro que se constituye el 6 de marzo de 2015 </b> motivada por la situación de discriminación y marginación social que sufriamos las personas con orientaciones sexuales, identidades y/o expresiones de género diversas en poblaciones inferiores a 30.000 habitantes.</p>
        <p>Nuestra razón de ser pasa por:</p>
        <p>
            <ul>
                <li>Denunciar de manera pública la discriminación legal y la marginación social sobre la realidad del hecho de ser homosexual, transexual y bisexual. Igualmente, luchar para conseguir la completa igualdad legal y social de todas las personas con independecia de su orientación sexual y/o identidad y expresión de género.</li>
                <li>Fomentar, en la comunidad LGTB, la salud, la participación social y la cultura de manera inclusiva; así como prestar servicios de formación, de asesoramiento y apoyo.</li>
            </ul>
        </p>
        <p>Las principales metas que pretendemos son:</p>
        <p>   
            <ul>
                <li>Conseguir y mantener los derechos del colectivo LGTB.</li>
                <li>Erradicación de la LGTBFobia.</li>
                <li>Erradicación de la discriminación laboral por motivo de orientación sexual y/o identidad de género.</li>
                <li>Educación en la diversidad afectivo-sexual en todos los ámbitos de la sociedad.</li>
                <li>Empoderamiento de la mujer.</li>
                <li>Por la visibilidad del colectivo LGTB.</li>
                <li>Salud integral del colectivo LGTB.</li>
                <li>Maternidad y paternidad con pleno derecho para las personas LGTB.</li>
                <li>Reconocimiento de los derechos de las familias LGTB.</li>
                <li>Desarrollo y visibilización de la cultura LGTB.</li>
                <li>Envejecimiento digno de las personas mayores LGTB.</li>
                <li>Implicación del voluntariado en la lucha LGTB.</li>
                <li>Despatologización social del colectivo LGTB.</li>
                <li>Apoyo al colectivo LGTB en el ámbito rural.</li>
                <li>Desestigmatización social de las personas VIH positivas.</li>
                <li>Juventud LGTB visible y libre.</li>
                <li>Trato igualitario en los médios de comunicación.</li>
                <li>Igualdad de todas las letras L=G=T=B.</li>
                <li>Respeto de las distintas confesiones religiosas hacia el colectivo LGTB.</li>
            </ul>
        </p>

        <h3>Nuestros valores</h3>
        <p>Los valores que nos identifican y que determinan nuestra forma de ser y actuar, como la asociación que somos, son:</p>
        <p>
            <ul>
                <li><i>Carácter democrático y participativo:</i> uno de nuestros grandes valores son las personas que colaboran de forma voluntaria.</li>
                <li><i>Equidad:</i> perseguimos y promocionamos la paridad a nuestros órganos de decisión.</li>
                <li><i>Respeto:</i> somos personas respetuosas con la diversidad de orientaciones, identidades y expresiones de género, tanto dentro del propio colectivo como en la sociedad en general. Por lo tanto, trabajamos para superar los estereotipos y perjuicios que marca la sociedad.</li>
                <li><i>Responsabilidad:</i> somos responsables de las acciones que llevamos a cabo.</li>
                <li>Defendemos y reivindicamos el derecho y la promoción de la salud y de una educación sexual integral.</li>
                <li>Defendemos la educación en valores de igualdad efectiva, respeto y libertad.</li>
            </ul>
        </p>

        <h3>Servicios que ofrecemos:</h3>
        <p>El servicio de información es una de las comisiones fundamentales ya que es la puerta de entrada al colectivo.Los voluntarios/as que la forman se encuentran permanentemente para recibir y/o atender a los usuarios; por ello, somos el primer contacto, ya sea presencial, telefónico o virtual para todos los usuarios que acuden por primera vez, y también para los nuevos voluntarios. En el despacho, atendemos consultas sobre cualquier tema LGTB convirtiéndonos en punto de referencia para muchos usuarios con diversas necesidades psicosociales que se acercan al colectivo.</p>

        <p> Desarrollamos nuestra actividad desde diversas fuentes: </p>
        <ul>
            <li><b>Atención directa</b>, en la sede situada en Plaça Dr. Mas Candela, 15, 03330 Crevillent, Alacant <a href="{{ route('contacto') }}">(como llegar)</a>.</li>
            <li><b>Atención telefónica</b> - de lunes a viernes de 9 a 21h - <b>687 63 20 97</b>.</li>
            <li><b>Atención on-line</b> - a través del <b>correo eléctronico</b> <a href='mailto:lgtbcrevillent@hotmail.com'>lgtbcrevillent@hotmail.com</a> y a través de nuestra web <a href="{{ route('contacto') }}">lgtbcrevillent.com</a>.</li>
            <li>
                <b>Redes sociales:</b>
                <ul>
                    <li>
                        <b>Facebook:</b>
                        <a id="" class="p-2" href="https://es-es.facebook.com/LGTBCREVILLENT/" class="fb-ic">
                            <i class="fab fa-facebook-f white-text mr-4"> </i>
                        </a>
                    </li>
                    <li>
                        <b>Twitter:</b>
                        <a id="" class="p-2" href="https://twitter.com/crevillentlgtb?lang=es">
                            <i class="fab fa-twitter white-text mr-4"> </i>
                        </a>
                    </li>
                    <li>
                        <b>Instagram:</b>
                        <a id="" class="p-2" href="">
                            <i class="fab fa-instagram white-text mr-4"> </i>
                        </a>
                    </li>
                    <li>
                        <b>Youtube:</b>
                        <a id="" class="p-2" href="https://www.youtube.com/channel/UCl2qNdR0cVu9WxVO2yWkJAw">
                            <i class="fab fa-youtube white-text"> </i>
                        </a>
                    </li>
                </ul>
            </li>
            <li><b>Whatsapp</b> en horario abierto, a través del numero <b>687 63 20 97</b>.</li>
        </ul>
    </article>
</section>
<section class="container mt-5 mb-5">
    <aside class="embed-responsive embed-responsive-21by9">
      <iframe class="embed-responsive-item" ng-show="showvideo" src="https://www.youtube.com/embed/3fmYkJnuiPo" frameborder="0" allowfullscreen></iframe>
    </aside>
</section>
@stop