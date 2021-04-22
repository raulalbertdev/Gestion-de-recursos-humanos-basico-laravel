<table>
    <thead>
    <tr>
        <th style="background-color: black; color: white; width: 20px; text-align: center;">EPS</th>
        <th style="background-color: black; color: white; width: 35px; text-align: center;">Subdireccion</th>
        <th style="background-color: black; color: white; width: 80px; text-align: center;">Gerencia</th>
        <th style="background-color: black; color: white; width: 20px; text-align: center;">Ficha</th>
        <th style="background-color: black; color: white; width: 28px; text-align: center;">Nombre</th>
        <th style="background-color: black; color: white; width: 10px; text-align: center;">Rc</th>{{-- subdireccion --}}
        <th style="background-color: black; color: white; width: 45px; text-align: center;">profesion</th>
        <th style="background-color: black; color: white; width: 20px; text-align: center;">Posicion</th>
        <th style="background-color: black; color: white; width: 35px; text-align: center;">Plaza</th>
        <th style="background-color: black; color: white; width: 30px; text-align: center;">Nivel</th>
        <th style="background-color: black; color: white; width: 10px; text-align: center;">Grupo</th>
        <th style="background-color: black; color: white; width: 30px; text-align: center;">Categoria</th>
        <th style="background-color: black; color: white; width: 35px; text-align: center;">Motivo de Vacante</th>
        <th style="background-color: black; color: white; width: 35px; text-align: center;">Vigencia</th>
        <th style="background-color: black; color: white; width: 15px; text-align: center;">N. Cedula</th>
        <th style="background-color: black; color: white; width: 15px; text-align: center;">SIPAP</th>
        {{-- <th style="background-color: black; color: white; width: 30px; text-align: center;">Clasificacion</th> --}}
            {{-- <th style="background-color: black; color: white; width: 35px; text-align: center;">Resultados Tecnicos</th> --}}
            <th style="background-color: black; color: white; width: 160px; text-align: center;">Nombre Desarrollo Local</th>
    </tr>
    </thead>
    <tbody>
        <tr>
            <td style="text-align: center;">{{$candidato_contratado->eps}}</td>
            <td style="text-align: center;">{{$candidato_contratado->subdireccion}}</td>
            <td style="text-align: center;">{{$candidato_contratado->gerencia}}</td>
            <td style="text-align: center;">{{$candidato_contratado->ficha}}</td>
            <td style="text-align: center;">{{$candidato_contratado->nombre}}</td>
            <td style="text-align: center;">{{$candidato_contratado->situacion_Contractual}}</td>
            <td style="text-align: center;">{{$candidato_contratado->profesion}}</td>
            <td style="text-align: center;">{{$candidato_contratado->posicion}}</td>
            <td style="text-align: center;">{{$candidato_contratado->plaza}}</td>
            <td style="text-align: center;">{{$candidato_contratado->nivel}}</td>
            <td style="text-align: center;">{{$candidato_contratado->grupo}}</td>
            <td style="text-align: center;">{{$candidato_contratado->categoria}}</td>
            <td style="text-align: center;">{{$candidato_contratado->motivo_vacante}}</td>
            <td style="text-align: center;">{{$candidato_contratado->vigencia}}</td>
            <td style="text-align: center;">{{$candidato_contratado->num_Cedula}}</td>
            <td style="text-align: center;">{{$candidato_contratado->cpp}}</td>{{-- SIPAP --}}
            {{-- <td style="text-align: center;">{{$candidato_contratado->clasificacion}}</td> --}}
            {{-- <td style="text-align: center;">{{$candidato_contratado->resultados_tecnicos}}</td> --}}
            <td style="text-align: center;"> <b>Desarrollo Humano:</b><span style="font-weight: 200;">{{$candidato_contratado->dh_valida}}</span></td>
        </tr>
    </tbody>
</table>