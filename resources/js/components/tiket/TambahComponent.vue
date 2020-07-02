<template>
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Tambah Tiket</h4>
    </div>
    <div class="card-body">
      <form @submit.prevent="postTiket">
        <div class="form-group">
          <label for="tiket">Nama Tiket</label>
          <input type="text" v-model="form.namaTiket" name="namaTiket" id="tiket" class="form-control">
        </div>
        <div class="form-group">
          <label for="jenis">Jenis Tiket</label>
          <select id="jenis" name="jenisTiket" v-model="form.jenisTiket" class="form-control">
            <option value="Sekali Pakai">Sekali Pakai</option>
            <option value="Pulang Pergi">Pulang Pergi</option>
            <option value="Jangka Panjang">Jangka Panjang</option>
          </select>
        </div>
        <div class="form-group">
          <label for="kategori">kategori Tiket</label>
          <select id="kategori" name="idKategori" v-model="form.idKategori" class="form-control">
            <option v-for="result in kategori" :value="result.id">
              {{ result.namaKategori }}
            </option>       
          </select>
        </div>
        <div class="form-group">
          <label for="harga">Harga Tiket</label>
          <input type="number" v-model="form.hargaTiket" name="hargaTiket" id="harga" class="form-control">
        </div>
        <div class="form-group">
          <label for="jumlah">Jumlah Tiket</label>
          <input type="number" v-model="form.jumlahTiket" name="jumlahTiket" id="jumlah" class="form-control">
        </div>
        <div class="form-group">
          <button type="submit" name="submit" class="btn btn-sm btn-primary">+ Tambah</button>
          <router-link to="/tiket" class="btn btn-sm btn-danger">Batal</router-link>
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
            'namaTiket' : null,
            'jenisTiket' : null,
            'hargaTiket' : null,
            'jumlahTiket' : null,
            'idKategori' : null
        },
        kategori:{}
      }
    },
    created(){
      axios.get("/api/kategori").then(({ data }) => (this.kategori = data.data))
    },
    methods:{
      postTiket(){
        axios.post("/api/tiket", this.form).then((response)=>{
          this.$router.push({name: "tiket"})
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