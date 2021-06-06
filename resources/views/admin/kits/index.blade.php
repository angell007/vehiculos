@extends('layouts.app')
@section('content')

<div class="ml-auto d-flex align-items-center secondary-menu text-center m-2">

    <h5 class="m-2">
        {{-- <i class="fa fa-car"></i> Vehiculos --}}
    </h5>

</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card card-statistics">
            <div class="card-body">
                <div class="export-table-wrapper table-responsive">
                    <table class="table table-bordered dT" style="color:black" id="dataTableVehiculosListas" width="100%" cellspacing="0">
                        <thead class="thead">
                            <tr>
                                <th>S. No</th>
                                <th>Propietario</th>
                                <th>Placa</th>
                                <th>Tipo de Vehiculo</th>
                                <th>km Actual</th>
                                <th>Marca</th>
                                <th>Modelo</th>
                                <th>Color</th>
                                <th>Estado</th>
                                <th></th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@stop

@section('scripts')
<script src="{{ asset('/js/apiKits.js') }}"></script>
@endsection




