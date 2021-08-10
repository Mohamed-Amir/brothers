<div class="card">
    <div class="card-body">
        <center class="m-t-30">
            <img title="{{$team->name}}" src="{{getImageUrl('Team',$team->image)}}" class="rounded-circle" width="150" />
            <h4 class="nameOfUser card-title m-t-10">{{$team->name}}</h4>
            <h6 class="card-subtitle">{{$team->email}}</h6>
            <div class="row text-center justify-content-md-center">
            </div>
        </center>
    </div>
    <div>
        <hr> </div>
    <div class="card-body">
        <small class="text-muted">الهاتف </small><h6>{{$team->phone }}</h6>
        <small class="text-muted">المدينة </small><h6>{{$team->city }}</h6>
        <small class="text-muted">التخصص </small><h6>{{$team->specialization }}</h6>
        <small class="text-muted">نبذة عن التخصص </small><h6>{{$team->specialization_desc }}</h6>
        <small class="text-muted p-t-30 db">الحالة</small><h6>{{$team->status == 1 ? 'مفعل' : 'غير مفعل'}}</h6>

{{--        <small class="text-muted p-t-30 db">Social Profile</small>--}}
{{--        <br/>--}}
{{--        <button class="btn btn-circle btn-secondary"><i class="fab fa-facebook-f"></i></button>--}}
{{--        <button class="btn btn-circle btn-secondary"><i class="fab fa-twitter"></i></button>--}}
{{--        <button class="btn btn-circle btn-secondary"><i class="fab fa-youtube"></i></button>--}}
    </div>
</div>
