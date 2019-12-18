
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>




  <h1>{{$page->title}}</h1>

  @if($page->image)
    <img src="{{asset("storage/$page->image")}}">
  @endif

  <p>{{$page->content}}</p>

<br>

<h3>Tags</h3>
<div>

@foreach ($page->tags as $tag)
    # {{$tag->name}} ,
@endforeach
</div>



<h2>Comments</h2>
<div id="root">
  <ul>
    <li v-for="comment in comments">Posted By: @{{ comment.user_id }} <br> @{{ comment.content }} </li>
  </ul>

  Comment: <input type="text" id="input" v-model="newCommentContent">
  <button @click="createComment">Create</button>
</div>



<script>

    var app = new Vue({
      el: "#root",
      data: {
        comments: [],
        newCommentContent: '',
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
            page_id: {{$page->id}}
          })
          .then(response=>{
            this.newCommentContent='';
            //success
            this.comments.push(response.data);
            this.newCommentContent='';
          })
          .catch(response=>{
            //error
            console.log(response);
          })
        }
      }
    });
  </script>
