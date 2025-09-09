<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <h2 class="page-title">Markat e Veturave</h2>

                <div x-data="{ show: false, message: '' }"
                    x-on:show-success.window="show = true; message = $event.detail; setTimeout(() => show = false, 3000)">
                    <div x-show="show" x-transition class="alert alert-success" x-text="message" style="display: none;">
                    </div>
                </div>

                <div class="add-product">
                    <a href="javascript:void(0);" wire:click="openCreateModal">
                        Shto Markë
                    </a>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">Lista e Markave</div>
                    <div class="panel-body">
                        <table class="table table-bordered table-striped mt-3">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Emri i Markës</th>
                                    <th>Veprime</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($brands as $index => $brand)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $brand->name }}</td>
                                        <td>
                                            <button class="btn btn-warning btn-sm"
                                                wire:click="openEditModal({{ $brand->id }})"
                                                   title="Përditëso Brendin">
                                                    <i class="fa fa-edit"></i>
                                            </button>
                                            <button class="btn btn-danger btn-sm" x-data
                                                    x-on:click.prevent="if(confirm('Je i sigurt që dëshiron ta fshish?')) $wire.delete({{ $brand->id }})"
                                                     title="Fshije Brendin">
                                                    <i class="fa fa-close text-white"></i>
                                                </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center">Nuk ka asnjë markë të regjistruar.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Modal Popup -->
                <div wire:ignore.self class="modal fade" id="brandModal" tabindex="-1" role="dialog"
                    aria-labelledby="brandModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form wire:submit.prevent="{{ $isEditMode ? 'update' : 'store' }}">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <h4 class="modal-title">{{ $modalTitle }}</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Emri i Markës</label>
                                        <input type="text" wire:model="name" class="form-control" required>
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Mbyll</button>
                                    <button type="submit"
                                        class="btn btn-primary">{{ $isEditMode ? 'Përditëso' : 'Shto' }}</button>
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


@push('scripts')
    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('openModal', () => {
                console.log('Livewire event: openModal');
                $('#brandModal').modal('show');
            });

            Livewire.on('closeModal', () => {
                $('#brandModal').modal('hide');
            });
        });
    </script>
@endpush
