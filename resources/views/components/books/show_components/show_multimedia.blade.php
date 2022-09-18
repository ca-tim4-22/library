
<div style="margin-top: 50px">
        @foreach($book->gallery as $photo)
        <img 
        style="margin: 10px;border-radius: 10px"
        width="200"
        class="object-cover {{$photo->cover == 1 ? 'cover' : ''}}" 
        height="auto"
        width="auto"
        src="{{'/storage/book-covers/' . $photo->photo}}" 
        alt="{{$photo->cover == 1 ? 'Naslovna' : 'Fotografija'}}" 
        title="{{$photo->cover == 1 ? 'Naslovna' : 'Fotografija'}}" />
        @endforeach
    </div>
<style>
    .cover {
        border: 2px solid #4558BE;
    }
</style>

<style>
img {
    display: inline-block;
    vertical-align: middle; 
}
</style>