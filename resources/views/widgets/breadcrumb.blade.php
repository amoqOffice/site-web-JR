<div class="page-header">
    <div class="align-items-center">
        <div class="col bg-light" style="padding: 10px 20px; border-radius: 15px">
            <h3 class="page-title">{{ $config->content }}</h3>
            <ul class="breadcrumb">
                @foreach ($config->data as $content)
                    <li class="breadcrumb-item"><a class="{{ $content->css_class }}" href="{{ $content->link }}">{{ $content->text }}</a></li>
                    {{-- <li class="breadcrumb-item active">Users</li> --}}
                @endforeach
            </ul>
        </div>
    </div>
</div>
