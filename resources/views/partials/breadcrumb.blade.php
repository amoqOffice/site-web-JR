@php
    $titre = '';
@endphp
<div class="page-header">
    <div class="align-items-center">
        <div class="col bg-light" style="padding: 10px 20px; border-radius: 15px">
            <h3 class="page-title">Users</h3>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('back.home') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Users</li>
            </ul>
        </div>
    </div>
</div>
@dump($titre)
