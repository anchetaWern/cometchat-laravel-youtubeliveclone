<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $event->title }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
    .chat__thumbnail, .message__date, .message__timestamp, .action__message, .user__status {
        display: none  !important;
    }

    .message__name {
        font-size: 15px;
        font-weight: 600;
    }

    .message__details {
        flex-direction: row;
        align-items: center !important;
    }

    .message__txt__wrapper {
        background: none;
        color: #000
    }

    .message__name__wrapper {
        display: flex;
        align-self: auto;
        padding: 0 5px;
    }

    .message__text__container {
        display: flex;
        align-self: auto !important;
    }

    .message__info__wrapper {
        display: none;
    }

    .message__thumbnail {
        width: 30px;
        height: 30px;
        margin: 0 5px;
    }

   .receiver__message__container, .sender__message__container {
        margin: 0;
    }

    .receiver__message__container {
        max-width: 100%;
    }

    .message__wrapper {
        align-items: center !important;
        padding: 3px 0;
    }

    .input__inner {
        border: none;
    }

    .chat__list {
        background-color: #F9F9F9;
    }

    .input__message-input {
        border-bottom: 1px solid #B8B8B8;
    }

    .input__sticky {
        justify-content: flex-end;
        background-color: #FFF;
    }
    /**/
    .video-info-container {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        border-bottom: 1px solid #ececec;
        padding: 10px 0;
    }

    .video-actions {
        display: flex;
        flex-direction: row;
    }

    .action-item {
        padding: 0 10px;
        align-self: flex-end;
    }

    .sub-text {
        color: #909090;
    }


    .subscription-container {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: flex-end;
        padding: 10px 0;
    }

    .icon-container .fab {
        font-size: 45px;
    }

    .account-container {
        display: flex;
        flex-direction: row;
    }

    .small-text {
        font-size: 12px;
    }

    .icon-container {
        padding-right: 10px;
        color: #E43D32;
    }
    </style>

    <script>
    var cometchat_app_id = "{!! config('services.comet_chat.app_id') !!}";
    var cometchat_region = "{!! config('services.comet_chat.region') !!}";
    var cometchat_auth_key = "{!! config('services.comet_chat.api_key') !!}";
    var cometchat_widget_id = "{!! config('services.comet_chat.widget_id') !!}";
    var event_id = "{!! $event->cometchat_group_id !!}";
    var user_id = "{!! $cometchat_user_id !!}";
    </script>
    <script defer src="https://widget-js.cometchat.io/v2/cometchatwidget.js"></script>
</head>
<body>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-7 mt-5">
                <iframe width="100%" height="500" src="https://www.youtube.com/embed/{{ youtubeID($event->youtube_url) }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                <div class="video-info-container">
                    <div class="video-description">
                        <h4 class="text-left">{{ $event->title }}</h4>
                        <span class="date sub-text">{{ $event->created_at->format('M d, Y') }}</span>
                    </div>

                    <div class="video-actions sub-text">
                        <div class="action-item">
                            <i class="fas fa-thumbs-up"></i> 1000
                        </div>
                        <div class="action-item">
                            <i class="fas fa-thumbs-down"></i> 150
                        </div>
                        <div class="action-item">
                            <i class="fas fa-share"></i> Share
                        </div>
                        <div class="action-item">
                            <i class="fas fa-save"></i> Save
                        </div>
                        <div class="action-item">
                            <i class="fas fa-ellipsis-h"></i>
                        </div>
                    </div>
                </div>

                <div class="subscription-container">
                    <div class="account-container">
                        <div class="icon-container">
                            <i class="fab fa-youtube"></i>
                        </div>
                        <div>
                            <div>
                                <strong>YouTube</strong>
                            </div>

                            <div>
                                <span class="small-text sub-text">200M subscribers</span>
                            </div>
                        </div>

                    </div>
                    <div class="subscribe-container">
                        <button class="btn btn-danger">Subscribe</button>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mt-5">

                <div id="comet-chat-widget"></div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/chat-widget.js') }}" defer></script>
</body>
</html>
