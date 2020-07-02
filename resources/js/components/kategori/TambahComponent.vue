<template>
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Tambah Kategori</h4>
    </div>
    <div class="card-body">
      <form @submit.prevent="postKategori">
      	<div class="form-group">
      		<label for="kategori">Nama Kategori</label>
      		<input type="text" v-model="form.namaKategori" name="namaKategori" id="kategori" class="form-control">
      	</div>
      	<div class="form-group">
      		<button type="submit" name="submit" class="btn btn-sm btn-primary">+ Tambah</button>
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
        form:{
            'namaKategori' : null
        }
      }
    },
    methods:{
      postKategori(){
        axios.post("/api/kategori", this.form).then((response)=>{
          this.$router.push({name: "kategori"})
        })
      }
    }
  }
</script>
<style scoped>
  table{
    width: 100% !important;
  }
  .table thead th{
    border-bottom: none;
  }
</style>