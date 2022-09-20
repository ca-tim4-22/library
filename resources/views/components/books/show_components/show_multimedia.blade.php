
<div style="margin-top: 50px">
        @if ($book->placeholder == 0)
        @foreach($book->gallery as $photo)
        <img 
        style="margin: 10px;border-radius: 10px"
        width="200"
        class="img object-cover {{$photo->cover == 1 ? 'cover' : ''}}" 
        height="auto"
        width="auto"
        src="{{'/storage/book-covers/' . $photo->photo}}" 
        alt="{{$photo->cover == 1 ? 'Naslovna' : 'Fotografija'}}" 
        title="{{$photo->cover == 1 ? 'Naslovna' : 'Fotografija'}}" />
        @endforeach
        @else
        @foreach($book->gallery as $photo)
        @if ($photo->cover == 1)
        <img 
        style="margin: 10px;border-radius: 10px"
        width="200"
        class="img object-cover {{$photo->cover == 1 ? 'cover' : ''}}" 
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
        class="img object-cover {{$photo->cover == 1 ? 'cover' : ''}}" 
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
<style>
    .cover {
        border: 2px solid #4558BE;
    }
</style>

<style>
.img {
    display: inline-block;
    vertical-align: middle; 
}
</style>