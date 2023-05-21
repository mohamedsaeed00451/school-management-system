
@foreach(auth()->user()->unreadNotifications as $notification)

    @if($notification->type == 'app\Notifications\Parents\AddStudentNotification')
        <a href="{{ route('readNotification',[$notification->id,'parent.students']) }}" class="dropdown-item">
            تم إضافة ابنك {{$notification->data['Name']}} فى المدرسة
            <small class="float-right text-muted time">{{$notification->created_at}}</small>
        </a>
    @endif

    @if($notification->type == 'App\Notifications\parents\DeleteStudentNotification')
        <a href="{{ route('readNotification',[$notification->id,'back']) }}" class="dropdown-item">
            تم حذف ابنك {{$notification->data['Name']}} من المدرسة
            <small class="float-right text-muted time">{{$notification->created_at}}</small>
        </a>
    @endif

    @if($notification->type == 'App\Notifications\parents\AddInvoiceStudentNotification')
        <a href="{{ route('readNotification',[$notification->id,'parent.student.fees']) }}" class="dropdown-item">
            تم إضافة فاتورة على إبنك  {{$notification->data['Name']}} من المدرسة
            <small class="float-right text-muted time">{{$notification->created_at}}</small>
        </a>
    @endif

@endforeach
