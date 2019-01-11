@extends("Layouts.layout")

@section('Titulo')
    Fotos
@endsection
@section('active_photos')
active
@endsection

@section('Seccion')

    <div class="row">
        <h1 class="thin red-text text-lighten-1 center ">Fotos</h1>
        <div class="col s10 offset-s1">
            <p align="justify">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius eligendi et magni perferendis totam. At culpa ducimus fugit,
                id inventore ipsa ipsum laboriosam praesentium quia, quos sapiente sequi tenetur vel!
            </p>
        </div>
    </div>
    <!--Formato correcto para repetir los albunes-->

   <div class="row">
       <div class="col s10  offset-s1">
           <div class="row">
               <div class="container">
                   <div id="galley">
                        @forelse($albums as $album)
                          <ul class="pictures">
                             <li><img class="col s12 m3 l3 xl3" src="{{$album->archivo}}" class="responsive-img" width="200" style="margin: 0; padding: 0;" ></li>
                          </ul>
                        @empty
                   </div>
               </div>
           </div>
       </div>
   </div>
    @endforelse
@endsection
<script>
    window.addEventListener('DOMContentLoaded', function () {
        var galley = document.getElementById('galley');
        var viewer = new Viewer(galley, {
            url: 'data-original',
            toolbar: {
                oneToOne: true,

                prev: function() {
                    viewer.prev(true);
                },

                play: true,

                next: function() {
                    viewer.next(true);
                },
            },
        });
    });
</script>