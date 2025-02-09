@if(session('message'))<?php //si existe la sesión del mensaje ?>
<div class="alert alert-success">
    {{session('message')}}
</div>
@endif