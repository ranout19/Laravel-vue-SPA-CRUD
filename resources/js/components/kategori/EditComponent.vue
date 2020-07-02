<template>
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Edit Kategori</h4>
    </div>
    <div class="card-body">
      <form @submit.prevent="putKategori">
        <div class="form-group">
          <label for="kategori">Nama Kategori</label>
          <input type="text" v-model="form.namaKategori" name="namaKategori" id="kategori" class="form-control">
        </div>
        <div class="form-group">
          <button type="submit" name="submit" class="btn btn-sm btn-success">Edit</button>
          <router-link to="/kategori" class="btn btn-sm btn-danger">Batal</router-link>
        </div>
      </form>
    </div>
  </div>
</template>
<script>
  export default{
    data(){
      return {
        form:{}
      }
    },
    created(){
      axios.get(`/api/kategori/${this.$route.params.id}`)
      .then(res=>this.form=res.data.data)
    },
    methods:{
      putKategori(){
        axios.put(`/api/kategori/${this.$route.params.id}`, this.form)
        .then((response)=>{
          this.$router.push({name: "kategori"})
        })
      }
    }
  }
</script>
<style scoped>
</style>