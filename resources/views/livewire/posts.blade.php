<div> 
    <h1 style="margin-top : 150px;" wire:poll='pollingChanges'>
        {{ $counter }} <br>
    </h1>
    <button wire:click="tambahCounter" type="button" class="btn btn-dark">Add(+)</button>
    <button wire:click="clearCounter" type="button" class="btn btn-dark">Clear(-)</button>
    <hr>

    <form wire:submit.prevent='setLimit'>
        <div class="row">
            <div class="col-7">
                <h1>Number of image retrieved : {{ count($this->arr) }}</h1>
            </div>
            <div class="col">
                <button style="display : block; margin-top : 8px;" wire:click="getArrayOfImage" type="button" class="btn btn-success">Fetch Image List</button>
            </div>
        </div>
        <div class="form-group">
            <label for="exampleInputLimit">Limit the image</label>
            {{-- <input type="text" class="form-control" wire:model="posts" aria-describedby="LimitHelp" placeholder="Enter Limit"> --}}
            <input type="text" class="form-control" wire:model.defer="limit" aria-describedby="LimitHelp" placeholder="Enter Limit">
            <small id="LimitHelp" class="form-text text-muted">Put the number of image you want to retrieved</small>
        </div>
        <button type="submit" class="btn btn-primary">Retrieve Image</button>
        <small id="LimitHelp" class="form-text text-muted">Downloaded locaton : live-data\storage\app\downloaded</small>
    </form>
    <br>
    <h1>History</h1>
    <div class="container">
        @foreach($history as $hist)
            <div class="alert alert-success" role="alert">
                ({{ $hist->bil }}) images has been retrieved on {{ $hist->semasa }}
            </div>
        @endforeach
    </div>
</div>