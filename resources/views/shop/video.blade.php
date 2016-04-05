<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=no">
    <title>使用教程</title>
    <link rel="stylesheet" href="{{asset('/css/frozen.css')}}">
    <link rel="stylesheet" href="{{asset('/css/main.css')}}">
</head>
<body>
<div>
    @foreach($videos as $video)
        <ul class="ui-list ui-list-text ui-border-tb ui-txt-sub ui-top">
            <li class="ui-border-t">
                <div class="ui-txt-info">{{$video->video_name}}</div>
            </li>
            <li class="ui-border-t">
                <video controls="controls"
                       src="{{$video->video_url}}"
                       width="100%" height="100%"
                        >
                </video>
            </li>
        </ul>
    @endforeach
</div>

</body>
</html>