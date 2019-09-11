@extends('layout')
@section('contenido')
<body>
    <section class="container mt-5">
        <h2 class="mb-3 font-weight-bold"> Aviso legal lgtbCrevillent </h2>
        <nav class="nav pl-4">
            <ul class="nav navbar-collapse"> 
                <li class="nav-item">
                    <h5 class="text-primary"> A. Términos de uso </h5>
                    <p class="pl-4"> En cumplimiento con el deber de información recogido en artículo 10 de la Ley 34/2002, de 11 de julio, de Servicios de la Sociedad de la Información y del Comercio Electrónico, a continuación se reflejan los siguientes datos: la empresa titular de dominio web es <span class="font-weight-bold"> lgtbCrevillent </span>e (en adelante <span class="font-weight-bold"> lgtbCrevillent </span>), con domicilio a estos efectos en Plaça Dr. Mas Candela, 15, 03330 Crevillent, Alicante número de C.I.F: 74392843-X. Correo electrónico de contacto: LGTBCrevillent@hotmail.com. <p>
                    <p class="pl-4"> <span> USUARIOS: </span> El acceso y/o uso de este sitio web de <span class="font-weight-bold"> lgtbCrevillent </span> atribuye la condición de <span> USUARIO</span>, que acepta, desde dicho acceso y/o uso, los presentes términos de uso. </p>

                    <p class="pl-4"> <span> USO DEL SITIO WEB: </span> <a href="{{ route('home') }}"> https://lgtbcrevillent-2.000webhostapp.com/ </a> proporciona el acceso a artículos, informaciones y datos (en adelante, "los contenidos") propiedad de <span class="font-weight-bold"> lgtbCrevillent </span>.<span> EL USUARIO </span> asume la responsabilidad del uso de la web. </p>

                    <p class="pl-4"> <span> EL USUARIO </span> se compromete a hacer un uso adecuado de los contenidos que <span class="font-weight-bold"> lgtbCrevillent </span> ofrece a través de su web y con carácter enunciativo pero no limitativo, a no emplearlos para: </p>
                    <nav class="nav menu-aviso-legal pl-4">
                        <ul class="navbar-collapse">
                            <li class="nav-item"> Incurrir en actividades ilícitas, ilegales o contrarias a la buena fe y al orden público; </li>

                            <li class="nav-item"> Difundir contenidos o propaganda de carácter racista, xenófobo, pornográfico-ilegal, de apología del terrorismo o atentatorio contra los derechos humanos; </li>

                            <li class="nav-item"> Provocar daños en los sistemas físicos y lógicos de <span class="font-weight-bold"> lgtbCrevillent </span>, de sus proveedores o de terceras personas, introducir o difundir en la red virus informáticos o cualesquiera otros sistemas físicos o lógicos que sean susceptibles de provocar los daños anteriormente mencionados; </li>

                            <li class="nav-item"> Intentar acceder y, en su caso, utilizar las cuentas de correo electrónico de otros usuarios y modificar o manipular sus mensajes.</li>
                        </ul>
                    </nav>
                    <p class="pl-4"> <span class="font-weight-bold"> lgtbCrevillent </span> se reserva el derecho de retirar todos aquellos comentarios y aportaciones que vulneren el respeto a la dignidad de la persona, que sean discriminatorios, xenófobos, racistas, pornográficos, que atenten contra la juventud o la infancia, el orden o la seguridad pública o que, a su juicio, no resultaran adecuados para su publicación. </p>

                    <p class="pl-4"> En cualquier caso, <span class="font-weight-bold"> lgtbCrevillent </span> no será responsable de las opiniones vertidas por los usuarios a través del blog u otras herramientas de participación que puedan crearse, conforme a lo previsto en la normativa de aplicación. </p>
                </li>
                
                <li class="nav-item">           
                    <h5 class="text-info"> <a href=""> B. Política de privacidad </a> </h5>
                </li>
                
                <li class="nav-item item-aviso">
                    <h5 class="text-info"> <a href=""> C. Aviso legal de cookies </a> </h5>
                </li>
                
                <li class="nav-item item-aviso">
                    <h5 class="text-primary"> D. Política de enlaces externos </h5>

                    <p class="pl-4"> En el caso de que en <a href="{{ route('home') }}">  https://lgtbcrevillent-2.000webhostapp.com </a> se dispusiesen enlaces o hipervínculos hacía otros sitios de Internet, <span class="font-weight-bold"> lgtbCrevillent </span> no ejercerá ningún tipo de control sobre dichos sitios y contenidos. </p>

                    <p class="pl-4"> En ningún caso <span class="font-weight-bold"> lgtbCrevillent </span> asumirá responsabilidad alguna por los contenidos de algún enlace perteneciente a un sitio web ajeno, ni garantizará la disponibilidad técnica, calidad, fiabilidad, exactitud, amplitud, veracidad, validez y constitucionalidad de cualquier material o información contenida en ninguno de dichos hipervínculos u otros sitios de Internet. </p>

                    <p class="pl-4"> Igualmente la inclusión de estas conexiones externas no implicará ningún tipo de asociación, fusión o participación con las entidades conectadas a no ser que así se indique en el texto que acompañe a dicho enlace. </p>
                </li>
                    
                <li class="nav-item item-aviso">
                    <h5 class="text-primary"> E. Condiciones de contratación de tus productos o servicios </h5>
                </li>
                
                <li class="nav-item item-aviso">
                    <h5 class="text-primary"> F. Legislación aplicable y jurisdicción. </h5> 
                    <p class="pl-4"> Estas condiciones legales se han redactado en virtud a la ley española. En caso de conflicto en la interpretación de las presentes condiciones, la jurisdicción competente será la del domicilio del comprador y, subsidiariamente, los Juzgados de Crevillente. </p>
                </li>
                
                <li class="nav-item item-aviso">
                    <h5 class="text-primary"> G. Modificación del contenido del aviso legal. </h5> 
                    <p class="pl-4"> Estas condiciones podrán ser modificadas en cualquier momento, atendiendo a la evolución de este blog/web y los contenidos en él ofrecidos. En este caso, se informará a los usuarios de dichas modificaciones mediante aviso en la página principal. </p>    
                </li>
            </ul>
        </nav>
    </section>
</body>
</html>
@stop