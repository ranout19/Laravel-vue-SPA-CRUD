<template>
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Data Kategori</h4>
      <router-link to="/kategori/tambah" class="btn btn-primary btn-sm float-right" style="margin-top: -27px;">+ Tambah</router-link>
    </div>
    <div class="card-body">
      <table class="table table-hover table-borderless" id="dataTable">
        <thead class="thead-dark">
          <tr>
            <th>Id</th>
            <th>Kategori</th>
            <th>Opsi</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="result in kategori" :key="kategori.id">
            <td>{{result.id}}</td>
            <td>{{result.namaKategori}}</td>
            <td style="width: 170px;text-align: center;">
              <router-link :to="{name: 'editkategori', params:{id:result.id}}" class="btn btn-sm btn-success">Edit</router-link>
              <button @click="deleteKategori(result.id)" class="btn btn-sm btn-danger">Hapus</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>
<script>
  export default{
    data(){
      return {
        kategori : {}
      }
    },
    methods:{
      getKategori(){
        axios.get("/api/kategori").then(({ data }) => (this.kategori = data.data));
      },
      deleteKategori(id){
        confirm('Yakin hapus data?');
        axios.delete(`/api/kategori/${id}+`).then(res=>this.getKategori())
      }
    },
    created(){
        this.getKategori();
    }
  }
</script>
<style scoped>
  table{
    width: 100% !important;
  }
</style>