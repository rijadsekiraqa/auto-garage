<div>
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <h2 class="page-title">Lista e Klienteve</h2>
                    <div x-data="{ show: false, message: '' }"
                        x-on:show-success.window="show = true; message = $event.detail; setTimeout(() => show = false, 3000)">
                        <div x-show="show" x-transition class="alert alert-success" x-text="message"
                            style="display: none;">
                        </div>
                    </div>
                    <div class="add-product">
                        <a href="javascript:void(0);" wire:click="openCreateModal">
                            Shto Kliente
                        </a>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading">Klientet e Regjistruar</div>
                        <div class="panel-body">
                            <table id="zctb" class="display table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Emri</th>
                                        <th>Email</th>
                                        <th>Telefoni</th>
                                        <th>Veturat</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($clients as $index => $client)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $client->name }}</td>
                                            <td>{{ $client->lastname }}</td>
                                            <td>{{ $client->phone }}</td>
                                            <td>
                                                @foreach ($client->cars as $car)
                                                    <button class="btn btn-info btn-sm text-uppercase m-1"
                                                        wire:click="openCarDetails({{ $car->id }})">
                                                        {{ $car->name }}
                                                    </button>
                                                @endforeach
                                            </td>
                                            <td>
                                                <button class="btn btn-info btn-sm"
                                                    wire:click="viewClient({{ $client->id }})"
                                                     title="Detajet e Klientit">
                                                    <i class="fa fa-eye"></i>
                                                </button>
                                                &nbsp;&nbsp;
                                                <button class="btn btn-primary btn-sm"
                                                    wire:click="openCarModal({{ $client->id }})"
                                                     title="Regjistro Veturë">
                                                    <i class="fa fa-car"></i>
                                                </button>
                                                &nbsp;&nbsp;
                                                <button class="btn btn-warning btn-sm"
                                                    wire:click="openEditModal({{ $client->id }})"
                                                     title="Përditëso Klientin">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                &nbsp;&nbsp;
                                                <button class="btn btn-danger btn-sm" x-data
                                                    x-on:click.prevent="if(confirm('Je i sigurt që dëshiron ta fshish?')) $wire.delete({{ $client->id }})"
                                                     title="Fshije Klientin">
                                                    <i class="fa fa-close text-white"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div wire:ignore.self class="modal fade" id="createClient" tabindex="-1" role="dialog"
        aria-labelledby="brandModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <h2 class="modal-title">{{ $modalTitle }}</h2>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Detajet e Klientit</div>
                                        <div class="panel-body">
                                            <form wire:submit.prevent="{{ $isEditMode ? 'update' : 'store' }}"
                                                class="form-horizontal">
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label">Emri <span
                                                                style="color:red">*</span></label>
                                                        <div class="col-sm-4">
                                                            <input type="text" wire:model="name" class="form-control"
                                                                required>
                                                        </div>

                                                        <label class="col-sm-2 control-label">Mbiemri <span
                                                                style="color:red">*</span></label>
                                                        <div class="col-sm-4">
                                                            <input type="text" wire:model="lastname"
                                                                class="form-control" required>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label">Numri i Telefonit
                                                            <span style="color:red">*</span></label>
                                                        <div class="col-sm-4">
                                                            <input type="number" wire:model="phone"
                                                                class="form-control" required>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            @foreach ($cars as $index => $car)
                                                                <div class="panel panel-default mb-3">
                                                                    <div class="panel-heading">
                                                                        Vetura #{{ $index + 1 }}
                                                                    </div>
                                                                    <div class="panel-body mt-3">
                                                                        <div class="form-group mb-3">
                                                                            <label class="col-sm-2 control-label">Emri i
                                                                                Vetures <span
                                                                                    style="color:red">*</span></label>
                                                                            <div class="col-sm-4">
                                                                                <input type="text"
                                                                                    class="form-control"
                                                                                    placeholder="Shkruaj emrin e veturës"
                                                                                    wire:model="cars.{{ $index }}.car_name">
                                                                            </div>

                                                                            <label class="col-sm-2 control-label">Marka
                                                                                <span style="color:red">*</span></label>
                                                                            <div class="col-sm-4">
                                                                                <select class="form-control"
                                                                                    wire:model="cars.{{ $index }}.car_brand">
                                                                                    <option value="">Zgjedh markën
                                                                                    </option>
                                                                                    @foreach ($brands as $brand)
                                                                                        <option
                                                                                            value="{{ $brand->id }}">
                                                                                            {{ $brand->name }}
                                                                                        </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group mb-3">
                                                                            <label
                                                                                class="col-sm-2 control-label">Transmisioni
                                                                                <span
                                                                                    style="color:red">*</span></label>
                                                                            <div class="col-sm-4">
                                                                                <select class="form-control"
                                                                                    wire:model="cars.{{ $index }}.transmission">
                                                                                    <option value="">Zgjedh
                                                                                        transmetimin</option>
                                                                                    <option value="Manual">Manual
                                                                                    </option>
                                                                                    <option value="Automatik">Automatik
                                                                                    </option>
                                                                                </select>
                                                                            </div>

                                                                            <label
                                                                                class="col-sm-2 control-label">Viti</label>
                                                                            <div class="col-sm-4">
                                                                                <input type="number"
                                                                                    class="form-control"
                                                                                    placeholder="P.sh 2020"
                                                                                    wire:model="cars.{{ $index }}.year">
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group mb-3">
                                                                            <label
                                                                                class="col-sm-2 control-label">Kubikazha</label>
                                                                            <div class="col-sm-4">
                                                                                <input type="text"
                                                                                    class="form-control"
                                                                                    placeholder="P.sh 1998cc"
                                                                                    wire:model="cars.{{ $index }}.cubical">
                                                                            </div>
                                                                            <label
                                                                                class="col-sm-2 control-label">Fuqia</label>
                                                                            <div class="col-sm-4">
                                                                                <input type="text"
                                                                                    class="form-control"
                                                                                    placeholder="P.sh 150HP"
                                                                                    wire:model="cars.{{ $index }}.power">
                                                                            </div>
                                                                        </div>
                                                                        {{-- @if (count($cars) > 1) --}}
                                                                            <button type="button"
                                                                                wire:click="removeCarField({{ $index }})"
                                                                                class="btn btn-danger btn-sm">
                                                                                Fshij Veturen
                                                                            </button>
                                                                        {{-- @endif --}}
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>

                                                    <button type="button" wire:click="addCarField"
                                                        class="btn btn-primary btn-sm">
                                                        + Shto Veture
                                                    </button>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default"
                                                        data-dismiss="modal">Mbyll</button>
                                                    <button type="submit" class="btn btn-primary">
                                                        {{ $isEditMode ? 'Përditëso' : 'Shto' }}
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div> 
                                </div> 
                            </div> 
                        </div> 
                    </div> 
                </div> 
            </div> 
        </div>
    </div> 

    <div class="modal fade" id="clientDetailsModal" tabindex="-1" aria-labelledby="carDetailsModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Detajet e Klientit</div>
                                        <div class="panel-body">
                                            <form wire:submit.prevent="openCarDetails" class="form-horizontal">
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="panel panel-default">
                                                                <div class="panel-heading">
                                                                    Te dhenat Personale
                                                                </div>
                                                                <div class="panel-body">
                                                                    <div class="form-group">
                                                                        <label
                                                                            class="col-sm-2 control-label">Emri</label>
                                                                        <div class="col-sm-4">
                                                                            <input type="text" wire:model="name"
                                                                                class="form-control" readonly>
                                                                        </div>

                                                                        <label
                                                                            class="col-sm-2 control-label">Mbiemri</label>
                                                                        <div class="col-sm-4">
                                                                            <input type="text"
                                                                                wire:model="lastname"
                                                                                class="form-control" readonly>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label
                                                                            class="col-sm-2 control-label">Telefoni</label>
                                                                        <div class="col-sm-4">
                                                                            <input type="text" wire:model="phone"
                                                                                class="form-control" readonly>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    @foreach ($selectedCar as $car)
                                                                        <div class="panel panel-default">
                                                                            <div class="panel-heading">
                                                                                Vetura e Klientit -
                                                                                {{ $car['car_name'] }}
                                                                            </div>
                                                                            <div class="panel-body">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="col-sm-2 control-label">Emri
                                                                                        i Vetures</label>
                                                                                    <div class="col-sm-4">
                                                                                        <input type="text"
                                                                                            value="{{ $car['car_name'] }}"
                                                                                            class="form-control"
                                                                                            readonly>
                                                                                    </div>

                                                                                    <label
                                                                                        class="col-sm-2 control-label">Marka</label>
                                                                                    <div class="col-sm-4">
                                                                                        <select class="form-control"
                                                                                            disabled>
                                                                                            @foreach ($brands as $brand)
                                                                                                <option
                                                                                                    value="{{ $brand->id }}"
                                                                                                    {{ $brand->id == $car['car_brand'] ? 'selected' : '' }}>
                                                                                                    {{ $brand->name }}
                                                                                                </option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="col-sm-2 control-label">Transmisioni</label>
                                                                                    <div class="col-sm-4">
                                                                                        <input type="text"
                                                                                            value="{{ $car['transmission'] }}"
                                                                                            class="form-control"
                                                                                            readonly>
                                                                                    </div>

                                                                                    <label
                                                                                        class="col-sm-2 control-label">Viti</label>
                                                                                    <div class="col-sm-4">
                                                                                        <input type="text"
                                                                                            value="{{ $car['year'] }}"
                                                                                            class="form-control"
                                                                                            readonly>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="col-sm-2 control-label">Kubikazha</label>
                                                                                    <div class="col-sm-4">
                                                                                        <input type="text"
                                                                                            value="{{ $car['cubical'] }}"
                                                                                            class="form-control"
                                                                                            readonly>
                                                                                    </div>
                                                                                    <label
                                                                                        class="col-sm-2 control-label">Fuqia</label>
                                                                                    <div class="col-sm-4">
                                                                                        <input type="text"
                                                                                            value="{{ $car['power'] }}"
                                                                                            class="form-control"
                                                                                            readonly>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default"
                                                        data-dismiss="modal">Mbyll</button>
                                                </div>
                                            </form>
                                        </div> 
                                    </div> 
                                </div> 
                            </div> 
                        </div> 
                    </div> 
                </div>
            </div>
        </div> 
    </div>


<div wire:ignore.self class="modal fade" id="carModal" tabindex="-1" role="dialog"
    aria-labelledby="carModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h2 class="modal-title">Regjistrimi i Veturës
                            </h2>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">Detajet e Veturës</div>
                                    <div class="panel-body">
                                        <form wire:submit.prevent="storeCar" class="form-horizontal">
                                            <div class="modal-body">
                                                @foreach ($cars as $index => $car)
                                                    <div class="panel panel-default p-3 mb-3">
                                                        <div class="panel-heading">
                                                                        Vetura #{{ $index + 1 }}
                                                        </div>
                                                    <div class="panel-body mt-3">
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">Emri i
                                                                Vetures<span style="color:red">*</span></label>
                                                            <div class="col-sm-4">
                                                                <input type="text"
                                                                    wire:model="cars.{{ $index }}.car_name"
                                                                    class="form-control" required>
                                                            </div>

                                                            <label class="col-sm-2 control-label">Marka<span
                                                                    style="color:red">*</span></label>
                                                            <div class="col-sm-4">
                                                                <select
                                                                    wire:model="cars.{{ $index }}.car_brand"
                                                                    class="form-control" required>
                                                                    <option value="">Zgjedh markën
                                                                    </option>
                                                                    @foreach ($brands as $brand)
                                                                        <option value="{{ $brand->id }}">
                                                                            {{ $brand->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">Transmisioni<span
                                                                    style="color:red">*</span></label>
                                                            <div class="col-sm-4">
                                                                <select
                                                                    wire:model="cars.{{ $index }}.transmission"
                                                                    class="form-control" required>
                                                                    <option value="">Zgjedh
                                                                        transmetimin</option>
                                                                    <option value="Manual">Manual</option>
                                                                    <option value="Automatik">Automatik
                                                                    </option>
                                                                </select>
                                                            </div>

                                                            <label class="col-sm-2 control-label">Viti</label>
                                                            <div class="col-sm-4">
                                                                <input type="number"
                                                                    wire:model="cars.{{ $index }}.year"
                                                                    class="form-control">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">Kubikazha</label>
                                                            <div class="col-sm-4">
                                                                <input type="text"
                                                                    wire:model="cars.{{ $index }}.cubical"
                                                                    class="form-control">
                                                            </div>

                                                            <label class="col-sm-2 control-label">Fuqia</label>
                                                            <div class="col-sm-4">
                                                                <input type="text"
                                                                    wire:model="cars.{{ $index }}.power"
                                                                    class="form-control">
                                                            </div>
                                                        </div>
                                                        
                                                        @if (count($cars) > 1)
                                                            <button type="button"
                                                                wire:click="removeCarField({{ $index }})"
                                                                class="btn btn-danger btn-sm">
                                                                Fshij Veturen
                                                            </button>
                                                        @endif
                                                    </div>
                                                    </div>
                                                @endforeach

                                                <button type="button" wire:click="addCarField"
                                                    class="btn btn-primary btn-sm">
                                                    + Shto Veture
                                                </button>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default"
                                                    data-dismiss="modal">Mbyll</button>
                                                <button type="submit" class="btn btn-primary">
                                                    Ruaj</button>
                                            </div>
                                        </form>
                                    </div> <!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col-md-12 -->
                        </div> <!-- row -->
                    </div> <!-- col-md-12 -->
                </div> <!-- row -->
            </div> <!-- container-fluid -->
        </div> <!-- modal-content -->
    </div> <!-- modal-dialog -->
</div> <!-- modal fade -->

<!-- Modal -->
<div class="modal fade" id="carDetailsModal" tabindex="-1" aria-labelledby="carDetailsModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h2 class="modal-title">Regjistrimi i Veturës:
                                {{ $selectedClient?->name }}
                                {{ $selectedClient?->lastname }}</h2>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">Detajet e Veturës</div>
                                    <div class="panel-body">
                                        <form wire:submit.prevent="openCarDetails" class="form-horizontal">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Emri i
                                                        Vetures</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" wire:model="car_name"
                                                            class="form-control" readonly>
                                                    </div>

                                                    <label class="col-sm-2 control-label">Marka</label>
                                                    <div class="col-sm-4">
                                                        <select wire:model="car_brand" class="form-control" disabled>
                                                            <option value="">Zgjedh markën
                                                            </option>
                                                            @foreach ($brands as $brand)
                                                                <option value="{{ $brand->id }}">
                                                                    {{ $brand->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">

                                                    <label class="col-sm-2 control-label">Transmisioni</label>
                                                    <div class="col-sm-4">
                                                        <select wire:model="transmission" class="form-control"
                                                            disabled>
                                                            <option value="">Zgjedh transmetimin
                                                            </option>
                                                            <option value="Manual">Manual</option>
                                                            <option value="Automatik">Automatik
                                                            </option>
                                                        </select>
                                                    </div>

                                                    <label class="col-sm-2 control-label">Viti</label>
                                                    <div class="col-sm-4">
                                                        <input type="number" wire:model="year" class="form-control"
                                                            readonly>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Kubikazha</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" wire:model="cubical"
                                                            class="form-control" readonly>
                                                    </div>

                                                    <label class="col-sm-2 control-label">Fuqia</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" wire:model="power" class="form-control"
                                                            readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default"
                                                    data-dismiss="modal">Mbyll</button>
                                            </div>
                                        </form>
                                    </div> <!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col-md-12 -->
                        </div> <!-- row -->
                    </div> <!-- col-md-12 -->
                </div> <!-- row -->
            </div> <!-- container-fluid -->
        </div> <!-- modal-content -->
    </div> <!-- modal-dialog -->
</div> <!-- modal fade -->
</div>
@push('scripts')
    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('openModal', () => {
                console.log('Livewire event: openModal');
                $('#createClient').modal('show');
            });

            Livewire.on('closeModal', () => {
                $('#createClient').modal('hide');
            });
        });
    </script>
    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('openModalCar', () => {
                $('#carModal').modal('show');
            });

            Livewire.on('closeModal', () => {
                $('#carModal').modal('hide');
            });
        });
    </script>

    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('openCarDetailsModal', () => {
                $('#carDetailsModal').modal('show');
            });
        });
    </script>
    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('openClientDetailsModal', () => {
                $('#clientDetailsModal').modal('show');
            });
        });
    </script>

@endpush
