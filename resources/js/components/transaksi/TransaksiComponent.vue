<template>
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Transaksi Tiket</h4>
    </div>
    <div class="card-body">
      <form @submit.prevent="postTransaksi">
        <div class="form-group">
          <label for="tiket">Nama Tiket</label>
          <select id="tiket" name="idTiket" v-model="form.idTiket" class="form-control">
            <option v-for="result in tiket" :value="result.id">
              {{ result.namaTiket }}
            </option>       
          </select>
        </div>
        <div class="form-group">
          <label for="qty">Quantity</label>
          <input type="number" v-model="form.qty" name="qty" id="qty" class="form-control">
        </div>
        <div class="form-group">
          <button type="submit" name="submit" class="btn btn-primary btn-flat">Simpan</button>
          <button @click="selesai()" class="btn btn-success btn-flat">Selesai</button>
          <button @click="print()" class="btn btn-info btn-flat text-white">Print</button>
        </div>
      </form>
      <h6 style="margin-top: 10px;font-style: oblique;">Detail Transaksi</h6>
      <table class="table table-hover">
        <thead class="thead-dark">
          <tr>
            <th>Nama Tiket</th>
            <th>Qty</th>
            <th>Harga Tiket</th>
            <th>Subtotal</th>
            <th style="text-align: center;">Batal</th>
          </tr>
        </thead>
        <tbody v-if="transaksi">
          <tr v-for="results in transaksi" :key="transaksiselesai.id">
            <td>{{results.namaTiket}}</td>
            <td>{{results.qty}}</td>
            <td>{{results.hargaTiket}}</td>
            <td>{{results.hargaTiket * results.qty}}</td>
            <td style="width: 124px;text-align: center;">
              <button @click="batal(results.id)" class="btn btn-sm btn-danger" style="border-radius: 50%;font-weight: 700;padding: 3px 8px;">X</button>
            </td>
          </tr>
        </tbody>
        <tbody v-else>
          <tr>
            <td align="center" colspan="5">Tidak ada transaksi</td>
          </tr>
        </tbody>
      </table>
      <h6 style="margin-top: 10px;font-style: oblique;">Riwayat Transaksi</h6>
      <table class="table table-hover" id="dataTable">
        <thead class="thead-dark">
          <tr>
            <th>Nama Tiket</th>
            <th>Qty</th>
            <th>Harga Tiket</th>
            <th>Subtotal</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="resultselesai in transaksiselesai" :key="transaksiselesai.id">
            <td>{{resultselesai.namaTiket}}</td>
            <td>{{resultselesai.qty}}</td>
            <td>{{resultselesai.hargaTiket}}</td>
            <td>{{resultselesai.hargaTiket * resultselesai.qty}}</td>
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
          form : {
            'idTiket' : null,
            'qty' : null
          },
          tiket : {},
          transaksi : {},
          transaksiselesai : {}
      }
    },
    methods:{
      getTiket(){
        axios.get("/api/tiket").then(({ data }) => (this.tiket = data.data))
      },
      getTransaksi(){
        axios.get("/api/transaksi").then(({ data }) => (this.transaksi = data.data))
      },
      getTransaksiSelesai(){
        axios.get("/api/transaksi/selesai").then(({ data }) => (this.transaksiselesai = data.data))
      },
      batal(id){
        axios.delete(`/api/transaksi/${id}+`).then((response)=>{
         this.getTransaksi(); 
        })
      },
      selesai(){
        axios.get("/api/transaksi/update").then((response)=>{
         this.getTransaksiSelesai(); 
        })
      },
      postTransaksi(){
        axios.post("/api/transaksi/tambah", this.form).then((response)=>{
         this.getTransaksi(); 
        })
      }
    },
    created(){
      this.getTiket()
      this.getTransaksi()
      this.getTransaksiSelesai()
    }
  }
</script>
<style scoped>
  table{
    width: 100% !important;
  }
</style>