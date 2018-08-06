<template>
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">項目名稱</th>
          <th scope="col">票數</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(v,k) in items">
          <th scope="row">{{ k+1 }}</th>
          <td>{{ v.name }}</td>
          <td>{{ v.rate }}</td>
          <td>
              <button type="button" class="btn btn-primary" @click="vote(k)">投票</button>
          </td>
        </tr>
      </tbody>
    </table>
</template>

<script>
export default {
    data() {
        return {
            items: []
        }
    },
    methods: {
        init: function() {
            let self = this
            axios.get('/items')
                .then(function(response){
                    self.items = response.data
                })
                .catch(function(err){
                    console.log(err)
                })
        },
        vote: function(key){
            let self = this
            axios.get('/vote/'+key)
                .then(function(response){
                    self.init()
                })
                .catch(function(err){
                    console.log(err)
                })
        }
    },
    mounted() {
        this.init();
    }
}
</script>
