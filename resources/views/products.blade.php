
 {{($data[0]['tags'][0]['title'])}}

 @foreach ($data as $key => $value)
 {{$value['qty']}}
     @foreach ($value['tags'] as $key => $tag)
     
         {{$tag['title']}}
     @endforeach
 @endforeach