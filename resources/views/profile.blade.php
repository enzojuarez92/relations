<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $user->name }}</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="relative flex">
           
            <div class="container">
                <div class="row">
                    <div class="col-12 my-3 pt-3 shadow">
                        <img src="{{ $user->image->url }}" class="float-start rounded-circle mx-1">
                        <h1>{{ $user->name }}</h1>
                        <h3>{{ $user->email }}</h3>
                        <p>
                            <Strong>Instagram: </Strong>{{ $user->profile->instagram}}<br/>
                            <Strong>GitHub: </Strong>{{ $user->profile->github}}<br/>
                            <Strong>Web: </Strong>{{ $user->profile->web}}
                        </p>
                        <p>
                            <Strong>País: </Strong>{{ $user->location->country}}<br/>
                            <Strong>Nivel: </Strong>
                            @if($user->level)
                                <a href="{{ route('level', $user->level->id) }}" class="text-decoration-none">
                                    {{ $user->level->name}}
                                </a>
                            @else
                                ---
                            @endif<br/>
                        </p>
                        <hr>
                        <p>
                            <strong>Grupos:</strong>
                            @forelse ($user->groups as $group)
                                <span class="badge bg-primary">{{ $group->name }}</span>
                            @empty
                                <em>No pertenece a algún grupo</em>
                            @endforelse
                        </p>
                        <h3>Posts</h3>
                        <div class="row no-gutters">
                            @foreach ($posts as $post)
                                <div class="col-6">
                                    <div class="card mb-3">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <img src="{{ $post->image->url}}" alt="" class="card-img">
                                            </div>
                                            <div class="col-md-8">
                                               <div class="card-body">
                                                 <h5 class="card-title">{{ $post->name}}</h5>
                                                    <h6 class="card-subtitle">
                                                        {{ $post->category->name}} | 
                                                        {{ $post->comments_count}}
                                                        {{ Str::plural('comentario', $post->comments_count)}}
                                                    </h6>
                                                    <p class="card-text small">
                                                        @foreach($post->tags as $tag)
                                                            <span class="badge bg-success">
                                                            #{{ $tag->name }}
                                                            </span>
                                                        @endforeach
                                                    </p>
                                               </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <h3>Videos</h3>
                        <div class="row no-gutters">
                            @foreach ($videos as $video)
                                <div class="col-6">
                                    <div class="card mb-3">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <img src="{{ $video->image->url}}" alt="" class="card-img">
                                            </div>
                                            <div class="col-md-8">
                                               <div class="card-body">
                                                 <h5 class="card-title">{{ $video->name}}</h5>
                                                    <h6 class="card-subtitle">
                                                        {{ $video->category->name}} | 
                                                        {{ $video->comments_count}}
                                                        {{ Str::plural('comentario', $video->comments_count)}}
                                                    </h6>
                                                    <p class="card-text small">
                                                        @foreach($video->tags as $tag)
                                                            <span class="badge bg-success">
                                                            #{{ $tag->name }}
                                                            </span>
                                                        @endforeach
                                                    </p>
                                               </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            

        </div>
    </body>
</html>
