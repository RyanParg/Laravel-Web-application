
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

@extends('layouts.app')

@section('title', $page->title)

@section('content')


  <h1>{{$page->title}}</h1>

  @if($page->image)
    <img src="{{asset("storage/$page->image")}}">
  @endif

  <h5>{{$page->content}}</h5>

<br>

<h3>Tags</h3>
<div>

@foreach ($page->tags as $tag)
    # {{$tag->name}} ,
@endforeach
</div>



<h2>Comments</h2>
@endsection
@section('comments')
<div id="root">
    <ul>
      <li v-for="(comment,index) in comments">Posted By: @{{ comment.user_name }} <br> @{{ comment.content }}<br>
        <template v-if="comment.user_id == currentUserId">
          <p>@{{updateErrorMsg}}</p>
        Edit: <textarea v-model="updateCommentContent[index]"></textarea>
        <br><button v-on:click="updateComment(comment.id,index)">Edit</button></li>
      </template>
    </ul>
    <p>@{{errorMsg}}</p>
  Comment: <input type="text" id="input" v-model="newCommentContent">
  <button @click="createComment">Create</button>
</div>



<script>

    var app = new Vue({
      el: "#root",
      data: {
        comments: [],
        newCommentContent: '',
        updateCommentContent: [],
        currentUserId: {{Auth::user()->id}},
        errorMsg: '',
        updateErrorMsg: '',

      },
      mounted(){
        axios.get("{{ route('api.comments.index', ['id'=> $page->id]) }}").then(response => {
          //success
          this.comments = response.data;
        })
        .catch(response => {
          //fail
          console.log(response);
        })
      },
      methods:{
        createComment:function(){
          axios.post("{{ route('api.comments.store', ['id'=> $page->id]) }}",{
            content: this.newCommentContent,
            user_id: {{Auth::user()->id}},
            user_name: "{{Auth::user()->name}}",
            page_id: {{$page->id}}
          })
          .then(response=>{
            //success
            this.errorMsg = '';
            this.comments.push(response.data);
            this.newCommentContent='';
          })
          .catch(error=>{
            //error
            this.errorMsg = error.response.data.errors.content[0];
          })
        },
        updateComment:function(id,index){
          axios.post("{{ route('api.comments.edit') }}",{
            content_id: id,
            content: this.updateCommentContent[index],
          })
          .then(response=>{
            this.updateErrorMsg = '';
            Vue.set(this.comments, index, response.data );
            Vue.set(this.updateCommentContent, index, '' );
          })
          .catch(error=>{
            //error
            this.updateErrorMsg = error.response.data.errors.content[0];
          })
        }
      }
    });
  </script>

  <p><a href="{{ route('blogs.show', ['user' => $page->user_id]) }}">Back</button>

@endsection
