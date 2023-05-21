@foreach(auth()->user()->unreadNotifications as $notification)

    @if($notification->type == 'App\Notifications\Admins\AddQuizzNotification')
        <a href="{{ route('readNotification',[$notification->id,'studentQuizzes.index']) }}" class="dropdown-item">
            تم إضافة إختبار جديد ( {{$notification->data['Name']}} )
            <small class="float-right text-muted time">{{$notification->created_at}}</small>
        </a>
    @endif

    @if($notification->type == 'App\Notifications\Admins\AddOnlineClassrooms')
        <a href="{{ route('readNotification',[$notification->id,'student.classrooms']) }}" class="dropdown-item">
            تم إضافة حصة جديدة ( {{$notification->data['Name']}} )
            <small class="float-right text-muted time">{{$notification->created_at}}</small>
        </a>
    @endif

@endforeach
