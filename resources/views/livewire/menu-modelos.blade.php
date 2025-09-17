<div>
    <div class="modal fade" id="modelo" wire:ignore.self tab-index="-1" aria-labelledby="modal-modelo" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-modelo">Modelos</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>     
                </div>
                <div class="modal-body">   
                    <div style="overflow-y: auto">               
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Atributo</th>
                                        <th scope="col">Valor</th>
                                        <th scope="col">Cantidad</th>
                                        <th scope="col">Activo</th>
                                        <th scope="col">Fotos</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if($modelos != null && count($modelos) > 0)
                                    @foreach ($modelos as $modelo)
                                    <tr>
                                        <th scope="row">{{ $modelo->id }}</th>
                                        <td>{{ $modelo->atr }}</td>
                                        <td>{{ $modelo->valor }} </td>
                                        <td>{{ $modelo->cantidad }}</td>
                                        <td>{{ $modelo->activo }}</td>
                                        <td> </td>
                                    </tr>
                                    @endforeach
                                 @endif
                                </tbody>
                            </table>
                    </div>
                        
                </div>
                
            </div>
        </div>
    </div>
</div>
