
    @extends('layouts.app')
    @extends('layouts.layout')
    @section('content')
    <div class="row">
        {{-- Abdullllllllll --}}
    @foreach ($events as $event)
        
        <div class="col-sm-4">
          <div class="card">
            <div class="card-img-top">
              <img src="{{ $event->imageurl }}" alt="{{ $event->title }}" class="img-fluid">
          </div>
            <div class="card-body">
                <h5 class="card-title">{{$event->title}}</h5>
                <p class="card-text">{{$event->discription}}</p>
                <i class="fa-regular fa-clock fa-fw "><img src="{{URL('../clock.png')}}" alt="">{{$event->date->format('d-m-Y')}}</i>             
                <p class="card-text">{{$event->time }}</p>
                <a class="btn btn-primary" href="">submit</a>
              
              
              
            </div>
          </div>
        </div>
    
    @endforeach
    </div>
    
    @endsection
</body>
</html>