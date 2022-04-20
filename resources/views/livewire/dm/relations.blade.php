<div class="row">
    <div class="col-md-12">
        @include('include.messages')
    </div>

    <div class="col-md-12">
        <div class="iq-card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 form-group mb-4">
                        <label for="disease">Disease</label>
                        <select name="disease" wire:model="disease" id="disease" class="form-control">
                            <option value="">Select</option>
                            @foreach ($diseases as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 form-group mb-4">
                        <label for="search">Search</label>
                        <input type="text" name="search" wire:model="search" placeholder="Search medicine" autocomplete="off" wire:change="searchMed" id="search" class="form-control">
                    </div>
                </div>

                <div class="row">
                    @foreach ($medicines as $item)
                    @php
                        $ischecked = '';
                        $dm = null;
                        if($disease){
                            $dm = "App\Models\DiseaseMedicine"::where('disease', $disease)->where('medicine', $item->id)->first();
                        }

                        if($dm){
                            $ischecked = 'checked';
                        }
                    @endphp
                    <div class="form-group col-md-3 mb-2">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" {{ $ischecked }} wire:change="create({{ $item->id }})" id="med_{{ $item->id }}">
                            <label class="custom-control-label" for="med_{{ $item->id }}">{{ $item->name }} {{ $item->unit }}</label>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
