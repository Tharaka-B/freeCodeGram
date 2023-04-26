@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-4 p-5">
            <img src="{{$user->profile->profileImage()}}"  class="rounded-circle w-100" >
        </div>
        <div class="col-8 pt-5">
            <div class="ps-3 d-flex justify-content-between align-items-baseline">
                <div class="d-flex align-items-center pb-3">
                    <div class= "h4">{{ $user->username }} </div>
                    
                    <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
                </div>

                @can ('update', $user->profile)
                    <a href="/p/create">Add New Post</a>
                @endcan
                
            </div>
            
            <div class="ps-3">
                @can ('update', $user->profile)
                    <a href="/profile/{{$user->id}}/edit">Edit Profile </a>
                @endcan 
            </div>
            
            <div class="d-flex">
                <div class="ps-3"><strong>{{ $postCount }}</strong>posts</div>
                <div class="ps-3"><strong>{{  $followersCount }}</strong>followers</div>
                <div class="ps-3"><strong>{{ $followingCount }}</strong>following</div>
            </div>
            <div class="pt-4 ps-3 fw-bold"><strong>{{$user->profile->title}} </strong> </div>
            <div class="ps-3">{{$user->profile->description}} </div>
            <div class="ps-3"> <a href="#">{{$user->profile->url}}</a> </div>
        </div>
    </div>
    <div class="row pt-5">
        @foreach($user->posts as $post)   
          <div class="col-4 pb-4">
            <a href="/p/{{ $post->id }}">
                <img src="/storage/{{$post->image}}" class="w-100">
            </a>
        </div>

        @endforeach        
    </div>
</div>
@endsection
