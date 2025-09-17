<div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Codigo</th>
                <th scope="col">Producto</th>
                <th scope="col">Atributo</th>
                <th scope="col">Valor</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Fotos</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($modelos as $modelo)
                <tr>
                    <td>{{$modelo->id}}</td>
                    <td>{{$modelo->producto_id}}</td>
                    <td>{{$modelo->atr}}</td>
                    <td>{{$modelo->valor}}</td>
                    <td>{{$modelo->cantidad}}</td>
                    <td>
                        @php
                            $fotos = $modelo->getMedia("*");
                        @endphp
                        @foreach ($fotos as $foto)
                            @php
                                $ruta = 'public/img/';
                                $src = $ruta . $foto->file_name;
                            @endphp
                            <img src='{{asset($src) }}' alt="" width="50" height="50">
                        @endforeach
                    </td>
                </tr>
                <td>
                    
                </td>
            @endforeach
        </tbody>
    </table>
    
</div>
