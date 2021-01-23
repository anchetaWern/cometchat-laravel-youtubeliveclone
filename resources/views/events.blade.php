<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4 mt-5">
                <h4 class="text-center">Events</h4>

                <div class="list-group">
                    @foreach ($events as $event)
                    <a href="/event/{{ $event->cometchat_group_id }}" class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">{{ $event->title }}</h5>
                            <small>{{ $event->created_at }}</small>
                        </div>
                        <p class="mb-1">
                            {{ $event->description }}
                        </p>
                    </a>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</body>
</html>
