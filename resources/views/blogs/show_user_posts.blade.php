
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>




  <h1>{{$page->title}}</h1>



  <p>{{$page->content}}</p>




<h2>Comments</h2>
<div id="root">
  <ul>
    <li v-for="comment in comments">@{{ comment.content }}</li>
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
          axios.post("{{ route('api.comments.store') }}",{
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
