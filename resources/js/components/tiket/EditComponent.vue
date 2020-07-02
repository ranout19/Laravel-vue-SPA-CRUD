<template>
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Edit Tiket</h4>
    </div>
    <div class="card-body">
      <form @submit.prevent="putTiket">
        <div class="form-group">
          <label for="tiket">Nama Tiket</label>
          <input type="text" v-model="form.namaTiket" name="namaTiket" id="tiket" class="form-control">
        </div>
        <div class="form-group">
          <label for="jenis">Jenis Tiket</label>
          <select id="jenis" name="jenisTiket" v-model="form.jenisTiket" class="form-control">
            <option value="Sekali Pakai" :selected="form.jenisTiket == 'Sekali Pakai' ? true : false">Sekali Pakai</option>
            <option value="Pulang Pergi" :selected="form.jenisTiket == 'Pulang Pergi' ? true : false">Pulang Pergi</option>
            <option value="Jangka Panjang" :selected="form.jenisTiket == 'Jangka Panjang' ? true : false">Jangka Panjang</option>
          </select>
        </div>
        <div class="form-group">
          <label for="kategori">kategori Tiket</label>
          <select id="kategori" name="idKategori" v-model="form.idKategori" class="form-control">
            <option v-for="result in kategori" :value="result.id" :selected="result.id == form.idKategori ? true : false">
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
          <button type="submit" name="submit" class="btn btn-sm btn-success">Edit</button>
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
        form:{},
        kategori:{}
      }
    },
    mounted(){
      axios.get("/api/kategori").then(({ data }) => (this.kategori = data.data))
    },
    created(){
      axios.get(`/api/tiket/${this.$route.params.id}`)
      .then(res=>this.form=res.data.data)
    },
    methods:{
      putTiket(){
        axios.put(`/api/tiket/${this.$route.params.id}`, this.form)
        .then((response)=>{
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