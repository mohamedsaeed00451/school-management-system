@foreach(auth()->user()->unreadNotifications as $notification)

    @if($notification->type == 'App\Notifications\Teachers\AddTeacherNotification')
        <a href="{{ route('readNotification',[$notification->id,'back']) }}" class="dropdown-item">
            تم إضافة {{$notification->data['Name']}} إلى مدرسين المدرسة
            <small class="float-right text-muted time">{{$notification->created_at}}</small>
        </a>
    @endif


    @if($notification->type == 'App\Notifications\Admins\AddQuizzNotification')
        <a href="{{ route('readNotification',[$notification->id,'teacherQuizzes.index']) }}" class="dropdown-item">
            تم إضافة إختبار جديد ( {{$notification->data['Name']}} )
            <small class="float-right text-muted time">{{$notification->created_at}}</small>
        </a>
    @endif

@endforeach
