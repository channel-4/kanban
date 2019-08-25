@if (session('flash_message'))
<div class="container">
    <div class="col-md-6">
        <div class="panel panel-info">
            <div class="panel-heading">
                {{ session('flash_message') }}
            </div>
        </div>
    </div> 
</div>
@endif