<template>
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Data tiket</h4>
      <router-link to="/tiket/tambah" class="btn btn-primary btn-sm float-right" style="margin-top: -27px;">+ Tambah</router-link>
    </div>
    <div class="card-body">
      <table class="table table-hover" id="dataTable">
        <thead class="thead-dark">
          <tr>
            <th>Id</th>
            <th>Nama</th>
            <th>Jenis</th>
            <th>Kategori</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Opsi</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="result in tiket" :key="tiket.id">
            <td>{{result.id}}</td>
            <td>{{result.namaTiket}}</td>
            <td>{{result.jenisTiket}}</td>
            <td>{{result.namaKategori}}</td>
            <td>{{result.hargaTiket}}</td>
            <td>{{result.jumlahTiket}}</td>
            <td style="width: 134px;text-align: center;">
              <router-link :to="{name: 'editTiket', params:{id:result.id}}" class="btn btn-sm btn-success">Edit</router-link>
              <button @click="deleteTiket(result.id)" class="btn btn-sm btn-danger">Hapus</button>
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
          tiket : {}
      }
    },
    methods:{
      getTiket(){
        axios.get("api/tiket").then(({ data }) => (this.tiket = data.data));
      },
      deleteTiket(id){
        confirm('Yakin hapus data?');
        axios.delete(`/api/tiket/${id}+`).then(res=>this.getTiket())
      }
    },
    created(){
        this.getTiket();
    }
  }
</script>
<style scoped>
  table{
    width: 100% !important;
  }
</style>