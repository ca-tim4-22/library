<html lang="sr">

<head>
    <link rel="stylesheet" href="{{asset('image_preview/image_preview.css')}}">
</head>

<body>
    
<div style="margin-top: 50px">
    @if ($book->placeholder == 0)
    @foreach($book->gallery as $photo)
    <div style="display: inline-block">
    <form action="{{route('delete-book-photo', $photo->id)}}" method="POST" style="display: inline-block">
        @csrf @honeypot   
        @method('DELETE')
            <button style="outline: none;" value="{{$photo->photo}}" name="photo"><span class="close"><i class="fas fa-times multimedia-times"></i></span></button>
    </form>
    <img 
    style="margin: 10px;border-radius: 10px;"
    width="200"
    class="lightbox img object-cover {{$photo->cover == 1 ? 'cover' : ''}}" 
    height="auto"
    width="auto"
    src="{{'/storage/book-covers/' . $photo->photo}}" 
    alt="{{$photo->cover == 1 ? 'Naslovna' : 'Fotografija'}}" 
    title="{{$photo->cover == 1 ? 'Naslovna' : 'Fotografija'}}" />
    </div>
    @endforeach
    @else
    @foreach($book->gallery as $photo)
    @if ($photo->cover == 1)
    <img 
    style="margin: 10px;border-radius: 10px"
    width="200"
    class="lightbox img object-cover {{$photo->cover == 1 ? 'cover' : ''}}" 
    height="auto"
    width="auto"
    src="{{$photo->photo}}" 
    alt="{{$photo->cover == 1 ? 'Naslovna' : 'Fotografija'}}" 
    title="{{$photo->cover == 1 ? 'Naslovna' : 'Fotografija'}}" />
    @else
    @foreach($book->gallery->where('cover', 0) as $photo)
    <img 
    style="margin: 10px;border-radius: 10px"
    width="200"
    class="lightbox img object-cover {{$photo->cover == 1 ? 'cover' : ''}}" 
    height="auto"
    width="auto"
    src="{{'/storage/book-covers/' . $photo->photo}}" 
    alt="{{$photo->cover == 1 ? 'Naslovna' : 'Fotografija'}}" 
    title="{{$photo->cover == 1 ? 'Naslovna' : 'Fotografija'}}" />
    @endforeach
    @endif
    @endforeach
    @endif
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="{{asset('image_preview/image_preview.js')}}"></script>

</body>

</html>





